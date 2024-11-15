@extends ('layouts.template-landing-page.web.master')

@section('domain')
@include ('app.hosting-plans.pricing.domain.section1')
@include ('app.hosting-plans.pricing.domain.section2')
@include ('app.hosting-plans.pricing.domain.section3')
@include ('app.hosting-plans.pricing.domain.section4')
@include ('app.hosting-plans.pricing.domain.section5')
@include ('app.hosting-plans.pricing.domain.section6')
@include ('app.hosting-plans.pricing.domain.section7')
@include ('app.hosting-plans.pricing.domain.section8')
@endsection

@push ('scripts')
<script>
    function redirectToCheckout() {
        const domainName = document.getElementById('domain-search').value;

        if (domainName) {
            window.location.href = `/checkout?tld_name=${encodeURIComponent(domainName)}`;
        } else {
            alert("Please enter a domain name.");
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        /*
        ========================================================
                            Section1 - Javascript
        ========================================================
        */
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

        // Search Domain Availability and Handle TLD Replacement
        const searchButton = document.getElementById('search-button');
        const searchBtn = document.getElementById('search-btn');
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');
        const componentTransfer = document.getElementById('component-transfer');
        const transferForm = document.getElementById('transfer-form');
        const successMessage = document.getElementById('success-message');
        const searchInput = document.getElementById('domain-search');

        function checkDomainAvailability(domainName) {
            return new Promise((resolve, reject) => {
                const apiKey = 'at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop';
                const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${domainName}&outputFormat=JSON`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        console.log('API Response:', data); // Log respons API

                        // Logika untuk menentukan ketersediaan domain
                        const hasWhoisData = data.WhoisRecord && data.WhoisRecord.domainName;
                        const hasDataError = data.WhoisRecord && data.WhoisRecord.dataError;

                        // Jika ada data error, anggap domain tersedia
                        if (hasDataError) {
                            console.log('Domain is available (data error present)');
                            resolve(true);
                        } else if (hasWhoisData) {
                            console.log('Domain is not available');
                            resolve(false);
                        } else {
                            console.log('Domain is available (no WHOIS data)');
                            resolve(true);
                        }
                    })
                    .catch(error => {
                        console.error('Error checking domain availability:', error);
                        reject(error);
                    });
            });
        }
        // Event listener untuk pencarian domain
        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                const searchQuery = searchInput.value;

                if (searchQuery) {
                    const domainParts = searchQuery.split('.');
                    const tld = domainParts.pop();
                    const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');
                    const baseDomain = `${mainDomainPart}.${tld}`;

                    // Periksa ketersediaan domain
                    checkDomainAvailability(baseDomain)
                        .then(isAvailable => {
                            const messageContainer = `
                    <div id="component-search">
                        <div class="message is-success flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong>${baseDomain}</strong> is ${isAvailable ? 'available' : 'not available'}
                                ${isAvailable ? '<br>Exclusive offer: Rp20.000/mon for a 2-year plan' : ''}
                            </div>
                            ${isAvailable ? 
                                `<button class="button h-button is-success rounded-full" onclick="redirectToCheckout('${baseDomain}')">Buy Now</button>` : 
                                `<button class="button h-button rounded-full h-modal-trigger" data-modal="modal-whois" data-domain-name="${baseDomain}">WHOIS</button>`
                            }
                        </div>
                    </div>
                `;

                            dropdownContent.innerHTML = messageContainer;

                            // Panggil setupWhoisModal setelah menambahkan konten
                            if (!isAvailable) {
                                setupWhoisModal();
                            }

                            dropdownContainer.classList.add('show');
                            componentTransfer.classList.add('hidden');
                        })
                        .catch(error => {
                            dropdownContent.innerHTML = `
                    <div class="notification is-danger">
                        Unable to check domain availability. Please try again later.
                    </div>
                `;
                            console.error('Domain availability check failed:', error);
                        });
                } else {
                    dropdownContainer.classList.remove('show');
                }
            });
        }

        if (searchButton) {
            searchButton.addEventListener('click', function() {
                const searchQuery = searchInput.value;

                if (searchQuery) {
                    const domainParts = searchQuery.split('.');
                    const tld = domainParts.pop();
                    const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');
                    const baseDomain = `${mainDomainPart}.${tld}`;

                    // Reset state sebelumnya
                    if (transferForm) {
                        transferForm.classList.add('hidden');
                    }
                    if (successMessage) {
                        successMessage.classList.add('hidden');
                    }

                    // Tampilkan form transfer
                    dropdownContent.innerHTML = `
                    <div id="component-search">
                        <div class="message is-success flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong id="search-tld-name">${baseDomain}</strong> is available for transfer
                                <br>Transfer this domain at a discount!
                            </div>
                            <button class="button h-button is-success rounded-full" id="show-transfer-form">
                                Transfer Now
                            </button>
                        </div>
                    </div>`;

                    // Tampilkan dropdown
                    dropdownContainer.classList.add('show');
                    componentTransfer.classList.remove('hidden');

                    // Setup event listener untuk tombol Transfer Now yang baru
                    const showTransferFormBtn = document.getElementById('show-transfer-form');
                    if (showTransferFormBtn && transferForm) {
                        showTransferFormBtn.addEventListener('click', function() {
                            transferForm.classList.remove('hidden');
                            // Scroll ke form
                            setTimeout(() => {
                                transferForm.scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }, 100);
                        });
                    }
                } else {
                    dropdownContainer.classList.remove('show');
                }
            });
        }

        // Fungsi untuk setup event listener tombol transfer
        function setupTransferButton() {
            const transferButton = document.getElementById('transfer-button');
            const transferForm = document.getElementById('transfer-form');

            if (transferButton && transferForm) {
                transferButton.addEventListener('click', function() {
                    // Tampilkan form dengan menghapus class hidden
                    transferForm.classList.remove('hidden');

                    // Optional: Scroll ke form
                    transferForm.scrollIntoView({
                        behavior: 'smooth'
                    });
                });
            }
        }

        // Event listener untuk tombol Continue
        const continueButton = document.getElementById('continue-button');
        if (continueButton) {
            continueButton.addEventListener('click', function() {
                const eppCodeInput = document.querySelector('input[placeholder="Enter your EPP code here"]');

                if (eppCodeInput) {
                    const eppCode = eppCodeInput.value.trim();

                    if (eppCode) {
                        // Simulasi validasi EPP (ganti dengan validasi sebenarnya)
                        setTimeout(() => {
                            if (successMessage) {
                                successMessage.classList.remove('hidden');
                                // Scroll ke success message
                                successMessage.scrollIntoView({
                                    behavior: 'smooth'
                                });
                            }
                        }, 1000);
                    } else {
                        alert('Please enter EPP Code');
                    }
                }
            });
        }

        // Single event listener untuk close message
        const deleteMessage = document.getElementById('delete-message');
        if (deleteMessage) {
            deleteMessage.addEventListener('click', function() {
                if (successMessage) {
                    successMessage.classList.add('hidden');
                }
            });
        }
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

        function replaceTLD(domainName, newTLD) {
            return domainName.replace(/(\.[a-z]{2,63}\.[a-z]{2,63}|(\.[a-z]{2,63})){1}$/, newTLD);
        }

        function renderComponent(componentIdToShow) {
            const component1 = document.getElementById('component-transfer');
            const component2 = document.getElementById('component-search');

            if (component1 && component2) {
                component1.classList.add('hidden');
                component2.classList.add('hidden');
                document.getElementById(componentIdToShow).classList.remove('hidden');
            }
        }

        // Transfer Domain Logic
        const transferButtons = document.querySelectorAll('.transfer-button');
        if (transferButtons.length > 0) {
            transferButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('epp-input-container').classList.remove('hidden');
                });
            });
        }

        document.getElementById('delete-message').addEventListener('click', function() {
            document.getElementById('success-message').classList.add('hidden');
        });

        /*
        ========================================================
                            Section6 - Javascript
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
    });

    // Panggil function filterDomains dengan default "View All" saat halaman pertama kali dimuat    
    document.addEventListener('DOMContentLoaded', function() {
        console.log('DOM fully loaded');

        // Panggil filterDomains('View All') saat DOM loaded
        if (typeof filterDomains === 'function') {
            filterDomains('View All');
        } else {
            console.warn('filterDomains function is not defined');
        }

        function orderTLD(button) {
            if (!button) {
                console.error('Button element is null or not passed correctly.');
                return;
            }

            const tldName = button.getAttribute('data-tld-name');
            const tldPrice = button.getAttribute('data-tld-price');

            if (!tldName || !tldPrice) {
                console.error('Missing data attributes:', {
                    tldName,
                    tldPrice
                });
                return;
            }

            console.log('TLD Name:', tldName);
            console.log('TLD Price:', tldPrice);

            fetch('/order-tld', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        tld_name: tldName,
                        tld_price: tldPrice
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('TLD successfully ordered!');
                    } else {
                        alert('Error ordering TLD!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });

            // Tambahkan fungsionalitas untuk mengisi input pencarian
            var searchInput = document.getElementById('domain-search');
            if (searchInput) {
                searchInput.value = tldName;
                searchInput.focus();
                searchInput.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            } else {
                console.error('Input search tidak ditemukan');
            }
        }

        // Menambahkan event listener ke semua tombol Order
        var orderButtons = document.querySelectorAll('button[data-tld-name]');
        console.log('Found', orderButtons.length, 'order buttons');

        orderButtons.forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                orderTLD(this);
            });
        });
    });

    console.log('Script TLD order loaded');
</script>
@endpush