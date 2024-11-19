@extends('layouts.template-landing-page.web.master')

@section('landing-page')

@include("app.hosting-plans.landing-page.section1")
<div id="section2">
    @include("app.hosting-plans.landing-page.section2")
</div>
@include("app.hosting-plans.landing-page.section3")
@include("app.hosting-plans.landing-page.section4")
@include("app.hosting-plans.landing-page.section5")
<div id="section6">
    @include("app.hosting-plans.landing-page.section6")
</div>
@include("app.hosting-plans.landing-page.section7")
@include("app.hosting-plans.landing-page.section8")
@include("app.hosting-plans.landing-page.section9")
@include("app.hosting-plans.landing-page.section10")
@include("app.hosting-plans.landing-page.section11")
@include("app.hosting-plans.landing-page.section12")

@endsection

@section('scripts')
<script>
    /*
========================================================
                    Section1 - Javascript
========================================================
*/
    document.addEventListener('DOMContentLoaded', () => {
        const words = ['Easy', 'Fast', 'Secure', 'Efficient'];
        let currentIndex = 0;

        function changeText() {
            const animatedTextElement = document.getElementById('animated-text'); // Ubah ini
            animatedTextElement.classList.add('changing');
            setTimeout(() => {
                animatedTextElement.classList.remove('changing');
                animatedTextElement.textContent = words[currentIndex]; // Gunakan ID ini
            }, 300);
            currentIndex = (currentIndex + 1) % words.length;
        }

        setInterval(changeText, 1800);
    });

    /*scroll to section6 javascript*/
    function scrollToSection() {
        document.getElementById("section6").scrollIntoView({
            behavior: 'smooth'
        });
    }

    /*
    ========================================================
                        Section2 - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
        if (window.location.pathname === '/checkout') {
            const urlParams = new URLSearchParams(window.location.search);
            const domainName = urlParams.get('tld_name');

            if (domainName) {
                // Update the domain display
                const h3DomainDisplay = document.getElementById('h3-domain-display');
                if (h3DomainDisplay) {
                    h3DomainDisplay.textContent = domainName;
                }

                // Automatically click the continue button once
                const continueButton = document.getElementById('next-button');
                if (continueButton && !sessionStorage.getItem('continueClicked')) {
                    continueButton.click();
                    sessionStorage.setItem('continueClicked', 'true');
                }
            }
        }

        // Handle Price List Toggle
        const viewPriceListLink = document.getElementById('view-price-list');
        const priceListSection = document.getElementById('price-list-section');

        if (viewPriceListLink && priceListSection) {
            const arrowIcon = viewPriceListLink.querySelector('svg');
            viewPriceListLink.addEventListener('click', event => {
                event.preventDefault();
                priceListSection.classList.toggle('active');
                arrowIcon.classList.toggle('rotate-180');
            });
        }

        // Get DOM elements
        const searchBtn = document.getElementById('search-btn');
        const searchButton = document.getElementById('search-button');
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');
        const componentTransfer = document.getElementById('component-transfer');
        const searchInput = document.getElementById('domain-search');
        const tldResults = document.getElementById('tld-results');
        const eppInputContainer = document.getElementById('epp-input-container');

        // Event listeners for search buttons
        if (searchButton) {
            searchButton.addEventListener('click', function() {
                searchDomain('transfer');
            });
        }

        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                searchDomain('new');
            });
        }

        // General function for domain search
        async function searchDomain(type) {
            console.log('searchDomain called with type:', type);

            if (!searchInput) {
                console.error('Domain search input field not found');
                return;
            }

            const searchQuery = searchInput.value.trim();
            console.log('searchQuery:', searchQuery);

            if (!dropdownContainer || !dropdownContent) {
                console.error('Dropdown container or content elements not found');
                return;
            }

            if (!searchQuery) {
                dropdownContainer.classList.remove('show');
                dropdownContainer.classList.add('hidden');
                return;
            }

            // Parse domain
            const domainParts = searchQuery.split('.');
            const tld = domainParts.pop() || '';
            const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');
            const baseDomain = mainDomainPart && tld ? `${mainDomainPart}.${tld}` : searchQuery;

            const apiKey = 'at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop';
            const apiUrl = `https://domain-availability.whoisxmlapi.com/api/v1?apiKey=${apiKey}&domainName=${baseDomain}&outputFormat=json`;
            console.log('API URL:', apiUrl);

            try {
                const response = await fetch(apiUrl);
                console.log('Response Status:', response.status);
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const data = await response.json();
                console.log('API response data:', data);

                let dropdownHTML = '';

                if (type === 'new') {
                    // Cek ketersediaan domain untuk pencarian baru
                    const isAvailable = data.DomainInfo && data.DomainInfo.domainAvailability === "AVAILABLE";

                    if (isAvailable) {
                        // Kondisi jika domain tersedia
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong id="search-tld-name">${baseDomain}</strong> is available as a new domain
                            <br>Exclusive offer: Rp 20.000/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full" onclick="window.redirectToCheckout('${searchQuery}')">
                            Buy Now
                        </button>
                    </div>
                </div>`;
                    } else {
                        // Kondisi jika domain tidak tersedia
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> is not available
                        </div>
                        <button class="button h-button rounded-full h-modal-trigger" data-modal="demo-right-actions-modal">WHOIS</button>
                    </div>
                </div>`;
                    }
                } else if (type === 'transfer') {
                    // Cek ketersediaan domain untuk transfer
                    if (data.DomainInfo && data.DomainInfo.domainAvailability === "AVAILABLE") {
                        // Domain is available (not registered) - show "create new domain" message
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message is-danger flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> I'm sorry, your current domain isn't registered
                            <br>Do you want to create a new domain?
                        </div>
                        <button class="button h-button is-danger rounded-full" data-domain-name="${baseDomain}">
                            New Domain
                        </ button>
                    </div>
                </div>`;
                    } else {
                        // Domain is not available (registered) - show transfer option
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong id="search-tld-name">${baseDomain}</strong> is available for transfer
                            <br>Exclusive offer: Rp 185.000/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full" id="transfer-button" data-domain-name="${baseDomain}">
                            Transfer Now
                        </button>
                    </div>
                </div>`;
                    }
                }

                // Update konten dropdown dan tampilkan
                dropdownContent.innerHTML = dropdownHTML;
                dropdownContainer.classList.remove('hidden');
                dropdownContainer.classList.add('show');

                // Menambahkan event listener untuk tombol "Transfer Now"
                const transferButton = document.getElementById('transfer-button');
                if (transferButton) {
                    transferButton.addEventListener('click', displayEPPInputContainer);
                }
            } catch (error) {
                console.error('Error checking domain availability:', error);
                dropdownContent.innerHTML = `
        <div id="component-search">
            <div class="message is-danger flex-row flex justify-between items-center">
                <div class="message-body">
                    <strong>${baseDomain}</strong> Unable to check availability. Please try again later.
                </div>
            </div>
        </div>`;
                dropdownContainer.classList.remove('hidden');
                dropdownContainer.classList.add('show');
            }
        }

        // Fungsi untuk menampilkan form EPP
        function displayEPPInputContainer() {
            eppInputContainer.classList.remove('hidden');
            eppInputContainer.classList.add('flex-table-container'); // Pastikan untuk menambahkan kelas yang sesuai untuk menampilkan
        }

        function setupWhoisModal() {
            const whoisButtons = document.querySelectorAll('.h-modal-trigger[data-modal="demo-right-actions-modal"]');
            whoisButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = document.getElementById('demo-right-actions-modal');
                    if (modal) {
                        modal.classList.add('is-active'); // Tampilkan modal
                        // Panggil fungsi untuk mendapatkan WHOIS data
                        fetchWhoisData();
                    }
                });
            });

            // Menutup modal saat latar belakang atau tombol close diklik
            const closeModalButtons = document.querySelectorAll('.h-modal-close');
            closeModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const modal = button.closest('.modal');
                    if (modal) {
                        modal.classList.remove('is-active'); // Hapus kelas untuk menyembunyikan modal
                    }
                });
            });
        }

        // Function to fetch WHOIS data
        function fetchWhoisData() {
            const searchQuery = document.getElementById('domain-search').value; // Ambil nilai dari input
            const apiKey = 'at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop'; // Ganti dengan API key Anda
            const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${searchQuery}&outputFormat=JSON`;

            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    const whoisOutput = document.getElementById('whois-output'); // Ambil elemen untuk menampilkan hasil

                    if (data.WhoisRecord) {
                        // Tampilkan data yang diambil di elemen whois-output
                        whoisOutput.innerHTML = `
                    <p><strong>Domain name:</strong> ${data.WhoisRecord.domainName || 'Not available'}</p>
                    <p><strong>Contact email:</strong> ${data.WhoisRecord.contactEmail || 'Not available'}</p>
                    <p><strong>Registrar:</strong> ${data.WhoisRecord.registrarName || 'Not available'}</p>
                    <p><strong>Creation Date:</strong> ${data.WhoisRecord.createdDate || 'Not available'}</p>
                    <p><strong>Expiration Date:</strong> ${data.WhoisRecord.expiresDate || 'Not available'}</p>
                `;
                    } else {
                        console.log('No WHOIS record found.');
                        whoisOutput.innerHTML = '<p>No WHOIS record found.</p>';
                    }
                })
                .catch(error => {
                    console.error('Error fetching WHOIS data:', error);
                });
        }

        // Function to handle domain selection
        function handleDomainSelection(domainName) {
            console.log('Domain selected:', domainName); // Debugging log
            searchInput.value = domainName; // Contoh: Setel input pencarian ke domain yang dipilih
        }

        // Function to replace TLD
        function replaceTLD(domainName, newTLD) {
            return domainName.replace(/(\.[a-z]{2,63}\.[a-z]{2,63}|(\.[a-z]{2,63})){1}$/, newTLD);
        }

        // Pick TLD Card
        document.querySelectorAll('.popular-domain').forEach(domainCard => {
            domainCard.addEventListener('click', () => {
                const domainName = domainCard.getAttribute('data-domain-name');
                handleDomainSelection(domainName);
                dropdownContainer.classList.remove('show');
                dropdownContainer.classList.add('hidden');
                const nextStepId = 'form-step-2'; // Ubah ID sesuai langkah berikutnya
                renderComponent(nextStepId);
            });
        });

        // Dapatkan tombol continue
        const continueButton = document.getElementById('continue-button');

        // Tambahkan event listener untuk tombol continue
        if (continueButton) {
            continueButton.addEventListener('click', function() {
                // Menghapus kelas 'hidden' dari komponen transfer
                if (componentTransfer) {
                    componentTransfer.classList.remove('hidden');
                    console.log('Component transfer displayed'); // Debugging log
                }
                // Tampilkan pesan sukses
                showSuccessMessage();
            });
        }

        // Function to show success message
        function showSuccessMessage() {
            // Membuat elemen div untuk pesan sukses
            const successMessage = document.createElement('div');
            successMessage.className = 'message is-success'; // Menambahkan kelas CSS untuk styling
            successMessage.innerHTML = '<div class="message-body">The domain has been successfully transferred!</div>';

            // Menambahkan elemen pesan sukses ke dalam komponen
            componentTransfer.appendChild(successMessage);

            // Menghilangkan pesan sukses setelah 3 detik
            setTimeout(() => {
                successMessage.remove(); // Menghapus elemen setelah 3 detik
            }, 3000); // 3000 ms = 3 detik
        }


        // Fungsi untuk merender komponen
        function renderComponent(componentId) {
            const steps = document.querySelectorAll('.form-step');
            steps.forEach(step => {
                if (step.id === componentId) {
                    step.classList.remove('hidden');
                    console.log('Step rendered:', componentId); // Debugging log
                } else {
                    step.classList.add('hidden');
                }
            });
        }
    });

    function redirectToCheckout(domainName) {
        if (domainName) {
            // Clear the previous continue click state
            sessionStorage.removeItem('continueClicked');
            // Redirect to checkout with the domain name
            window.location.href = `/checkout?tld_name=${encodeURIComponent(domainName)}`;
        } else {
            alert("Please enter a domain name.");
        }
    }

    document.getElementById('continue-button').addEventListener('click', function() {
        // Ambil nilai EPP Code dari input pengguna
        const eppCode = document.getElementById('epp-code-input').value;
        console.log('masuk');

        // Ambil nama domain yang ditampilkan
        const domainName = document.getElementById('search-tld-name').textContent;

        // Ambil harga dari elemen yang berisi informasi harga
        const priceText = document.querySelector('.message-body').textContent;

        // Menggunakan regex untuk mendapatkan harga setelah 'Rp'
        const priceMatch = priceText.match(/Rp (\d[\d\.]*)/); // Cocokkan angka setelah 'Rp'

        if (priceMatch) {
            // Mengonversi harga menjadi integer dengan menghapus titik
            const price = parseInt(priceMatch[1].replace(/\./g, ''));

            if (!eppCode || !domainName) {
                alert('Please ensure both domain name and EPP code are provided.');
                return;
            }

            // Kirim data ke server menggunakan AJAX (Fetch API)
            fetch('/store-epp', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    },
                    body: JSON.stringify({
                        nama_domain: domainName,
                        price: price, // Kirim harga sebagai integer
                        epp_code: eppCode,
                    }),
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('success-message').classList.remove('hidden');
                    } else {
                        alert('Failed to transfer domain.');
                    }
                })
                .catch(error => console.error('Error:', error));
        } else {
            alert('Could not extract the price from the page.');
        }
    });


    /*
        ========================================================
                            Section3 - Javascript
        ========================================================
        */
    function orderTLD(button) {
        // Dapatkan elemen Section 2
        var section2 = document.getElementById('section2');

        // Gulir ke Section 2
        if (section2) {
            section2.scrollIntoView({
                behavior: 'smooth'
            });
        }

        // Ambil data TLD dari atribut data-tld-name pada tombol
        var tldName = button.getAttribute('data-tld-name');

        // Masukkan data TLD ke dalam input teks
        var domainSearchInput = document.getElementById('domain-search');
        if (domainSearchInput) {
            domainSearchInput.value = tldName;
        }
    }

    /*
        ========================================================
                            Section6 - Javascript
        ========================================================
        */



    /*
    ========================================================
                        Section9 - Javascript
    ========================================================
    */
    const slider = document.querySelector('#slider');
    const sliderContent = document.querySelector('.slider-content');
    const sliderItems = document.querySelectorAll('.slider-item');
    if (slider && sliderContent && sliderItems.length > 0) {
        let currentIndex = 0;

        function showSlide(index) {
            const itemWidth = sliderItems[0].offsetWidth;
            sliderContent.style.transform = `translateX(${-index * itemWidth}px)`;
        }

        document.querySelector('#prev').addEventListener('click', () => {
            if (currentIndex > 0) {
                currentIndex--;
                showSlide(currentIndex);
            }
        });

        document.querySelector('#next').addEventListener('click', () => {
            if (currentIndex < sliderItems.length - 1) {
                currentIndex++;
                showSlide(currentIndex);
            }
        });

        sliderContent.style.width = `${sliderItems.length * 34}%`;
    }

    /*
    ========================================================
                        Section11 - Javascript
    ========================================================
    */
    document.getElementById('contactForm').addEventListener('submit', function(e) {
        e.preventDefault(); // Mencegah form dikirim secara tradisional

        // Ambil data dari form
        let formData = new FormData(this);

        // Kirim form menggunakan AJAX
        fetch("/contact-us", {
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name=_token]').value
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    // Tampilkan modal setelah berhasil
                    document.getElementById('demo-right-actions-modal').classList.add('is-active');
                } else {
                    // Handle error, tampilkan pesan error atau lakukan sesuatu
                    alert('Something went wrong!');
                }
            })
            .catch(error => console.log('Error:', error));
    });

    // Tutup modal saat tombol "Cancel" atau ikon "x" ditekan
    document.querySelectorAll('.h-modal-close').forEach(function(el) {
        el.addEventListener('click', function() {
            document.getElementById('demo-right-actions-modal').classList.remove('is-active');
        });
    });

    /*
    ========================================================
                        Section14 - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
        const orderNowBtn = document.getElementById('orderNowBtn');
        orderNowBtn.addEventListener('click', function() {
            const section7 = document.getElementById('section7');
            if (section7) {
                section7.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    });

    /*Scroll To Top javascript*/
    document.addEventListener('DOMContentLoaded', function() {
        var scrollToTopBtn = document.getElementById('scrollToTopBtn');
        var rootElement = document.documentElement;

        function handleScroll() {
            var scrollTotal = rootElement.scrollHeight - rootElement.clientHeight;
            if ((rootElement.scrollTop / scrollTotal) > 0.20) {
                scrollToTopBtn.classList.add('visible');
            } else {
                scrollToTopBtn.classList.remove('visible');
            }
        }

        function scrollToTop() {
            rootElement.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        }

        scrollToTopBtn.addEventListener('click', scrollToTop);
        document.addEventListener('scroll', handleScroll);
    });

    /*
    ========================================================
                        AI CHAT - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
        const chatButton = document.getElementById('ai-chat-button');
        const chatWindow = document.getElementById('ai-chat-window');
        const closeChat = document.getElementById('close-chat');
        const userInput = document.getElementById('user-input');
        const sendMessage = document.getElementById('send-message');
        const chatMessages = document.getElementById('chat-messages');
        const initialContent = document.getElementById('initial-content');
        const greeting = document.getElementById('greeting');

        console.log('DOM Loaded');

        if (chatWindow) {
            chatWindow.classList.add('hidden');
        }

        if (chatButton) {
            chatButton.addEventListener('click', function() {
                console.log('Chat button clicked');
                chatWindow.classList.toggle('hidden');
                userInput.focus();
            });
        }

        if (closeChat) {
            closeChat.addEventListener('click', function() {
                console.log('Close button clicked');
                chatWindow.classList.add('hidden');
                // Reset chat when closed
                if (initialContent) initialContent.style.display = 'block';
                if (greeting) greeting.style.display = 'block';
                if (chatMessages) {
                    chatMessages.style.display = 'none';
                    chatMessages.innerHTML = '';
                }
            });
        }

        if (sendMessage) {
            sendMessage.addEventListener('click', sendUserMessage);
        }

        if (userInput) {
            userInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    sendUserMessage();
                }
            });
        }

        function sendUserMessage() {
            const message = userInput.value.trim();
            if (message) {
                console.log('Sending message:', message);

                // Hide initial content and greeting
                if (initialContent) {
                    initialContent.style.display = 'none';
                }
                if (greeting) {
                    greeting.style.display = 'none';
                }

                // Show and clear chat messages
                if (chatMessages) {
                    chatMessages.style.display = 'block';
                    chatMessages.innerHTML = ''; // Clear existing messages
                }

                addMessage('user', message);
                userInput.value = '';

                // Simulate AI response
                setTimeout(() => {
                    addMessage('ai', `You said: ${message}`);
                }, 1000);
            } else {
                console.log('Message is empty');
            }
        }

        function addMessage(sender, text) {
            if (!chatMessages) return;

            const messageElement = document.createElement('div');
            messageElement.style.width = '279px';
            messageElement.style.height = 'auto';
            messageElement.style.padding = '15px 20px';
            messageElement.style.gap = '10px';
            messageElement.style.borderRadius = '12px 0px 12px 12px';
            messageElement.style.border = '1px solid #BDBDBD';
            messageElement.style.opacity = '1';
            messageElement.style.boxShadow = '0px 4px 4px 0px rgba(0, 0, 0, 0.25)';
            messageElement.style.marginBottom = '10px';

            // Apply text styles
            messageElement.style.fontFamily = 'Roboto, sans-serif';
            messageElement.style.fontSize = '13.3px';
            messageElement.style.fontWeight = '400';
            messageElement.style.lineHeight = '19.95px';
            messageElement.style.textAlign = 'left';

            if (sender === 'user') {
                messageElement.style.background = 'linear-gradient(90deg, #4A6DCB 0%, rgba(100, 52, 147, 0.8) 100%)';
                messageElement.style.color = '#FFFFFF';
                messageElement.style.marginLeft = 'auto';
            } else {
                messageElement.style.backgroundColor = '#FFFFFF';
                messageElement.style.color = '#000000';
            }

            messageElement.textContent = text;
            chatMessages.appendChild(messageElement);

            // Auto-scroll to the bottom
            chatMessages.scrollTop = chatMessages.scrollHeight;
        }
    });
</script>
@endsection