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

        // Search Domain Availability
        const searchBtn = document.getElementById('search-btn');
        const searchButton = document.getElementById('search-button');
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');
        const componentTransfer = document.getElementById('component-transfer');
        const searchInput = document.getElementById('domain-search');
        const tldResults = document.getElementById('tld-results');

        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                const searchQuery = searchInput.value;

                if (searchQuery) {
                    dropdownContent.innerHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${searchQuery}</strong> is available
                            <br>Exclusive offer: $1.50/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full" onclick="redirectToCheckout('${searchQuery}')">
                            Buy Now
                        </button>
                    </div>
                    <div class="message flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${searchQuery}</strong> is not available
                        </div>
                        <button class="button h-button rounded-full" id="whoisButton">WHOIS</button>
                    </div>
                </div>
            `;

                    // Tambahkan event listener untuk whoisButton setelah elemen dimasukkan ke DOM
                    const whoisButton = document.getElementById('whoisButton');
                    if (whoisButton) {
                        whoisButton.addEventListener('click', function() {
                            const searchQuery = document.getElementById('domain-search').value; // Ambil nilai dari input
                            const apiKey = 'at_qAvnE2wQKsqDR6aLMgThLwluvbewU'; // Ganti dengan API key Anda
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
                        });
                    }

                    // Tampilkan dropdown
                    dropdownContainer.classList.add('show');
                    dropdownContainer.classList.remove('hidden');
                    componentTransfer.classList.add('hidden');
                } else {
                    dropdownContainer.classList.remove('show');
                    dropdownContainer.classList.add('hidden');
                }
            });
        }

        // Fungsi untuk mengganti domain TLD
        function replaceTLD(domainName, newTLD) {
            return domainName.replace(/(\.[a-z]{2,63}\.[a-z]{2,63}|(\.[a-z]{2,63})){1}$/, newTLD);
        }

        // Pick TLD Card
        document.querySelectorAll('.popular-domain').forEach(domainCard => {
            domainCard.addEventListener('click', function() {
                const selectedTLD = this.getAttribute('data-domain');
                const currentDomain = searchInput.value;

                if (currentDomain) {
                    searchInput.value = replaceTLD(currentDomain, selectedTLD);
                } else {
                    searchInput.value = selectedTLD;
                }
            });
        });

        // Transfer Domain Logic
        const transferButtons = document.querySelectorAll('.transfer-button');
        if (transferButtons.length > 0) {
            transferButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('epp-input-container').classList.remove('hidden');
                });
            });
        }
    });

    // Fungsi untuk mengarahkan ke halaman checkout
    function redirectToCheckout(domainName) {
        if (domainName) {
            window.location.href = `/checkout?tld_name=${encodeURIComponent(domainName)}`;
        } else {
            alert("Please enter a domain name.");
        }
    }

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
    const storageSlider = document.getElementById('storage-slider');
    const ramSlider = document.getElementById('ram-slider');
    const cpuSlider = document.getElementById('cpu-slider');

    const totalPriceElement = document.getElementById('total-price');

    // Storage options
    const storageOptions = [{
            value: '120 GB',
            price: 5000
        },
        {
            value: '240 GB',
            price: 10000
        },
        {
            value: '256 GB',
            price: 15000
        },
        {
            value: '480 GB',
            price: 20000
        },
        {
            value: '512 GB',
            price: 25000
        }
    ];

    // RAM options
    const ramOptions = [{
            value: '4 GB',
            price: 5000
        },
        {
            value: '8 GB',
            price: 10000
        },
        {
            value: '16 GB',
            price: 15000
        },
        {
            value: '32 GB',
            price: 20000
        },
        {
            value: '64 GB',
            price: 25000
        }
    ];

    // CPU options
    const cpuOptions = [{
        value: '4 Core',
            price: 5000
        },
        {
            value: '8 Core',
            price: 10000
        },
        {
            value: '12 Core',
            price: 15000
        },
        {
            value: '16 Core',
            price: 20000
        },
        {
            value: '24 Core',
            price: 25000
        }
    ];

    function updateTotalPrice() {
        const selectedStorage = storageOptions[storageSlider.value].price;
        const selectedRam = ramOptions[ramSlider.value].price;
        const selectedCpu = cpuOptions[cpuSlider.value].price;

        // Hitung total harga
        const totalPrice = selectedStorage + selectedRam + selectedCpu;

        // Update tampilan total harga dengan titik sebagai pemisah ribuan
        totalPriceElement.textContent = `${totalPrice.toLocaleString('id-ID')}`;
    }

    // Set event listener untuk update harga
    storageSlider.addEventListener('input', updateTotalPrice);
    ramSlider.addEventListener('input', updateTotalPrice);
    cpuSlider.addEventListener('input', updateTotalPrice);

    // Set harga awal
    updateTotalPrice();


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