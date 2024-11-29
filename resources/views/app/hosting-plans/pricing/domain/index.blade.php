<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Domain</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N8ZNRQ9');
    </script>
    <!-- End Google Tag Manager -->

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

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

        async function searchDomain(domainName, type = 'new') {
            const apiKey = 'at_50ndnvrxO5vW0BVGxlhraK54ndQJp';
            const allowedTLDs = [
                'com', 'net', 'org', 'info', 'biz',
                'id', 'ac', 'co.id', 'or.id',
                'edu', 'gov', 'mil',
                'io', 'app', 'dev'
            ];

            // Validasi TLD
            const domainParts = domainName.split('.');
            const tld = domainParts.pop();

            if (!allowedTLDs.includes(tld)) {
                return {
                    status: 'error',
                    message: `The TLD .${tld} is not allowed. Use: ${allowedTLDs.join(', ')}`
                };
            }

            const baseDomain = domainName;
            const apiUrl = `https://domain-availability.whoisxmlapi.com/api/v1?apiKey=${apiKey}&domainName=${baseDomain}&outputFormat=json`;

            try {
                const response = await fetch(apiUrl);
                if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                const data = await response.json();
                const isAvailable = data.DomainInfo && data.DomainInfo.domainAvailability === "AVAILABLE";

                // Logika berbeda berdasarkan tipe pencarian
                switch (type) {
                    case 'new':
                        return {
                            status: isAvailable ? 'success' : 'unavailable',
                                domain: baseDomain,
                                isAvailable: isAvailable,
                                message: isAvailable ?
                                `${baseDomain} is available as a new domain` :
                                `${baseDomain} is not available`
                        };

                    case 'transfer':
                        return {
                            status: isAvailable ? 'not-registered' : 'transferable',
                                domain: baseDomain,
                                isAvailable: isAvailable,
                                message: isAvailable ?
                                `${baseDomain} is not registered` :
                                `${baseDomain} is available for transfer`
                        };

                    case 'hosting-only':
                        return {
                            status: !isAvailable ? 'hosting-ready' : 'create-new',
                                domain: baseDomain,
                                isAvailable: !isAvailable,
                                message: !isAvailable ?
                                `${baseDomain} is available for Hosting` :
                                `${baseDomain} is not found, create new domain?`
                        };

                    default:
                        return {
                            status: 'error',
                                message: 'Invalid search type'
                        };
                }
            } catch (error) {
                console.error('Domain availability check failed:', error);
                return {
                    status: 'error',
                    message: `Unable to check ${baseDomain}. Try again later.`
                };
            }
        }

        // Modifikasi event listener untuk menggunakan fungsi baru
        if (searchBtn) {
            searchBtn.addEventListener('click', async function() {
                const searchQuery = searchInput.value.trim();

                // Validasi input
                if (searchQuery.split('.').length < 2) {
                    dropdownContent.innerHTML = `
    <div id="component-search">
        <div class="message is-danger flex-row flex justify-between items-center">
            <div class="message-body">
                Please enter a valid domain name (e.g., example.com)
            </div>
        </div>
    </div>`;
                    dropdownContainer.classList.add('show');
                    return;
                }

                const domainParts = searchQuery.split('.');
                const tld = domainParts.pop();
                const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');

                // Memastikan bahwa bagian domain utama tidak kosong
                if (!mainDomainPart) {
                    dropdownContent.innerHTML = `
    <div id="component-search">
        <div class="message is-danger flex-row flex justify-between items-center">
            <div class="message-body">
                Please enter a valid domain name (e.g., example.com)
            </div>
        </div>
    </div>`;
                    dropdownContainer.classList.add('show');
                    return;
                }

                const baseDomain = `${mainDomainPart}.${tld}`;

                try {
                    // Gunakan fungsi baru untuk pencarian domain
                    const result = await searchDomain(baseDomain, 'new');

                    const messageContainer = `
<div id="component-search">
    <div class="message ${result.isAvailable ? 'is-success' : ''} flex-row flex justify-between items-center">
        <div class="message-body">
            <strong>${baseDomain}</strong> is ${result.isAvailable ? 'available' : 'not available'}
            ${result.isAvailable ? '<br>Exclusive offer: Rp20.000/mon for a 2-year plan' : ''}
        </div>
        ${result.isAvailable ? 
            `<button class="button h-button is-success rounded-full" onclick="redirectToCheckout('${baseDomain}')">Buy Now</button>` : 
            `<button class="button h-button rounded-full h-modal-trigger" data-modal="modal-whois" data-domain-name="${baseDomain}">WHOIS</button>`
        }
    </div>
</div>
`;

                    dropdownContent.innerHTML = messageContainer;

                    // Panggil setupWhoisModal setelah menambahkan konten
                    if (!result.isAvailable) {
                        setupWhoisModal();
                    }

                    dropdownContainer.classList.add('show');
                    componentTransfer.classList.add('hidden');
                } catch (error) {
                    dropdownContent.innerHTML = `
<div id="component-search">
    <div class="message flex-row flex justify-between items-center">
        <div class="message-body">
            Unable to check domain availability. Please try again later.
        </div>
    </div>
</div>`;
                    console.error('Domain availability check failed:', error);
                }
            });
        }

        // Fungsi lama tetap dapat dipertahankan jika masih diperlukan
        function checkDomainAvailability(domainName) {
            return new Promise((resolve, reject) => {
                const apiKey = 'at_50ndnvrxO5vW0BVGxlhraK54ndQJp';
                const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${domainName}&outputFormat=JSON`;

                fetch(url)
                    .then(response => {
                        if (!response.ok) throw new Error('Network response was not ok');
                        return response.json();
                    })
                    .then(data => {
                        console.log('API Response:', data);

                        const hasWhoisData = data.WhoisRecord && data.WhoisRecord.domainName;
                        const hasDataError = data.WhoisRecord && data.WhoisRecord.dataError;

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

        // Event listener untuk tombol Transfer
        const transferButton = document.getElementById('search-button'); // Tombol Transfer
        if (transferButton) {
            transferButton.addEventListener('click', async function() {
                const searchQuery = searchInput.value.trim();

                // Memeriksa apakah input kosong atau hanya terdiri dari TLD
                if (!searchQuery || searchQuery.split('.').length < 2) {
                    dropdownContent.innerHTML = `
            <div id="component-search">
                <div class="message is-danger flex-row flex justify-between items-center">
                    <div class="message-body">
                        Please enter a valid domain name (e.g., example.com)
                    </div>
                </div>
            </div>`;
                    dropdownContainer.classList.add('show'); // Tampilkan dropdown
                    return;
                }

                const domainParts = searchQuery.split('.');
                const tld = domainParts.pop();
                const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');

                // Memastikan bahwa bagian domain utama tidak kosong
                if (!mainDomainPart) {
                    dropdownContent.innerHTML = `
            <div id="component-search">
                <div class="message is-danger flex-row flex justify-between items-center">
                    <div class="message-body">
                        Please enter a valid domain name (e.g., example.com)
                    </div>
                </div>
            </div>`;
                    dropdownContainer.classList.add('show'); // Tampilkan dropdown
                    return;
                }

                const baseDomain = `${mainDomainPart}.${tld}`;
                const apiKey = 'at_50ndnvrxO5vW0BVGxlhraK54ndQJp';

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

                    // Cek jika domain tersedia (tidak terdaftar)
                    if (data.DomainInfo && data.DomainInfo.domainAvailability === "AVAILABLE") {
                        // Domain tidak terdaftar - tampilkan opsi untuk membuat domain baru
                        dropdownContent.innerHTML = `
                <div id="component-search">
                    <div class="message is-danger flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> I'm sorry, your current domain isn't registered
                            <br>Do you want to create a new domain?
                        </div>
                        <a href="/checkout" class="button h-button is-danger rounded-full">
                            New Domain
                        </a>
                    </div>
                </div>`;
                    } else {
                        // Domain terdaftar - tampilkan opsi transfer
                        dropdownContent.innerHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong id="search-tld-name">${baseDomain}</strong> is available for transfer
                            <br>Exclusive offer: Rp 185.000/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full" id="transfer-now-button" data-domain-name="${baseDomain}">
                            Transfer Now
                        </button>
                    </div>
                </div>`;

                        // Tambahkan event listener untuk tombol Transfer Now
                        const transferNowButton = document.getElementById('transfer-now-button');
                        transferNowButton.addEventListener('click', function() {
                            const transferForm = document.getElementById('transfer-form');
                            transferForm.classList.remove('hidden'); // Tampilkan form EPP
                        });
                    }

                    dropdownContainer.classList.add('show');
                } catch (error) {
                    console.error('Error checking domain availability for transfer:', error);
                    dropdownContent.innerHTML = `
            <div id="component-search">
                <div class="message is-danger flex-row flex justify-between items-center">
                    <div class="message-body">
                        <strong>${baseDomain}</strong> Unable to check transfer availability. Please try again later.
                    </div>
                </div>
            </div>`;
                }
            });
        }

        function setupTransferButton() {
            const transferButton = document.getElementById('transfer-button');
            const transferForm = document.getElementById('transfer-form');

            if (transferButton && transferForm) {
                transferButton.addEventListener('click', function() {
                    // Tampilkan form dengan menghapus class hidden
                    transferForm.classList.remove('hidden');
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

        document.getElementById('continue-button').addEventListener('click', function() {
            // Ambil nilai EPP Code dari input pengguna
            const eppCode = document.getElementById('epp-code-input').value;
            const domainName = document.getElementById('search-tld-name').textContent;
            const priceText = document.querySelector('.message-body').textContent;

            // Gunakan regex untuk mendapatkan harga setelah 'Rp'
            const priceMatch = priceText.match(/Rp (\d[\d\.]*)/);

            if (priceMatch) {
                const price = parseInt(priceMatch[1].replace(/\./g, ''));

                if (!eppCode || !domainName) {
                    alert('Please ensure both domain name and EPP code are provided.');
                    return;
                }

                // Kirim data ke server menggunakan Fetch API
                fetch('/store-epp', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        },
                        body: JSON.stringify({
                            nama_domain: domainName,
                            price: price,
                            epp_code: eppCode,
                        }),
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            const successMessage = document.getElementById('success-message');
                            if (successMessage) {
                                successMessage.classList.remove('hidden');
                            }
                        } else {
                            alert('Failed to transfer domain.');
                        }
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                alert('Could not extract the price from the page.');
            }
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