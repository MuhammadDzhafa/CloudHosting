<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="user-id" content="{{ Auth::id() }}">

    <title>Awan Hosting :: Checkout</title>
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

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <!--Mobile navbar-->
        @include('layouts.template-admin.mobile.navbar')
        <!--Mobile subsidebar-->
        @include('layouts.template-admin.mobile.subsidebar')
        <!-- Content Wrapper -->
        <div id="form-layout-5" class="view-wrapper is-webapp" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" style="margin-left:unset; width:100%;">

            <div class="">
                @include("layouts.template-landing-page.web.partials.navbar")
                <div class="">
                    <div class="w-full mx-auto">
                        <div class="section-frame padding-1 " style="width:unset; width:100%;">
                            <!-- Mobile Steps -->
                            <div class="mobile-steps">
                                <ul class="steps has-content-centered is-thin is-horizontal is-short">
                                    <li id="mobile-step-segment-0" class="steps-segment is-active">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[43px]">Step 1</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-1" class="steps-segment">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[43px]">Step 2</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-2" class="steps-segment">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[43px]">Step 3</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-3" class="steps-segment">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[44px]">Step 4</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-4" class="steps-segment">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[43px]">Step 5</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-5" class="steps-segment">
                                        <span class="steps-marker"></span>
                                        <div class="steps-content">
                                            <p class="step-number w-[43px]">Step 6</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Form Layout 5 -->
                            <div class="stepper-form" style="max-width: unset; margin: unset; padding-top: unset;">
                                <div class="form-sections w-full" style="max-width:unset;">
                                    @include('app.hosting-plans.checkout.step1')
                                </div>
                                <div id="form-step-1" class="form-section" style="font-family: Inter;">
                                    @include('app.hosting-plans.checkout.step2')
                                </div>
                                <div id="form-step-2" class="form-section">
                                    @include('app.hosting-plans.checkout.step3')
                                </div>
                                <div id="form-step-3" class="form-section">
                                    @include('app.hosting-plans.checkout.step4')
                                </div>
                                <div id="form-step-4" class="form-section">
                                    @include('app.hosting-plans.checkout.step5')
                                </div>

                                <div id="form-step-5" class="form-section">
                                    @include('app.hosting-plans.checkout.step6')
                                </div>
                                <!-- Navigation Buttons -->
                                <div class="navigation-buttons">
                                    <div class="buttons is-right">
                                        <button id="next-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white" style="min-height: unset; min-width: unset;">
                                            Continue
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="form-stepper">
                                <ul class="steps is-vertical is-thin is-short">
                                    <li id="step-segment-0" class="steps-segment is-active">
                                        <a href="#" class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 1</p>
                                            <p class="step-info">Domain</p>
                                        </div>
                                    </li>
                                    <li id="step-segment-1" class="steps-segment">
                                        <a href="#" class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 2</p>
                                            <p class="step-info">Domain Information</p>
                                        </div>
                                    </li>
                                    <li id="step-segment-2" class="steps-segment">
                                        <a class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 3</p>
                                            <p class="step-info">Hosting</p>
                                        </div>
                                    </li>
                                    <li id="step-segment-3" class="steps-segment">
                                        <a class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 4</p>
                                            <p class="step-info">Addons</p>
                                        </div>
                                    </li>
                                    <li id="step-segment-4" class="steps-segment">
                                        <a class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 5</p>
                                            <p class="step-info">Billing Address</p>
                                        </div>
                                    </li>
                                    <li id="step-segment-5" class="steps-segment">
                                        <a class="steps-marker"></a>
                                        <div class="steps-content">
                                            <p class="step-number">STEP 6</p>
                                            <p class="step-info">Payment</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="demo-right-actions-modal" class="modal h-modal">
                    <div class="modal-background  h-modal-close"></div>
                    <div class="modal-content">
                        <div class="modal-card">
                            <header class="modal-card-head">
                                <h3>Did you know?</h3>
                                <button class="h-modal-close ml-auto" aria-label="close">
                                    <i data-feather="x"></i>
                                </button>
                            </header>
                            <div class="modal-card-body">
                                <div class="inner-content">
                                    <div class="section-placeholder">
                                        <div class="placeholder-content">
                                            <img src="assets/img/placeholders/huro-1.svg" alt="">
                                            <h3 class="dark-inverted">Go Premium</h3>
                                            <p>Unlock more features and business tools by going premium</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-card-foot is-end">
                                <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                <a class="button h-button is-primary is-raised is-rounded">Confirm</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Huro Scripts-->
    <!--Load Mapbox-->

    <!-- Concatenated plugins -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <!-- Huro js -->
    <script src="{{ asset('assets/js/functions.js') }}" async></script>
    <script src="{{ asset('assets/js/main.js') }}" async></script>
    <script src="{{ asset('assets/js/components.js') }}" async></script>
    <script src="{{ asset('assets/js/popover.js') }}" async></script>
    <script src="{{ asset('assets/js/widgets.js') }}" async></script>

    <!-- Additional Features -->
    <script src="{{ asset('assets/js/touch.js') }}" async></script>

    <!-- Landing page js -->

    <!-- Dashboards js -->
    <script src="{{ asset('assets/js/syntax.js')}}" async></script>
    <!-- Charts js -->

    <!--Forms-->
    <script src="{{ asset('assets/js/forms.js') }}" async></script>

</body>

</html>

<!--Wizard-->

<!-- Layouts js -->

<script src="assets/js/syntax.js" async></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Mengelola tab
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        const slider = document.querySelector('.slider');


        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                const tabId = tab.getAttribute('data-tab');
                tabs.forEach(t => {
                    t.classList.remove('active', 'text-white');
                    t.classList.add('text-gray-600');
                });
                tab.classList.add('active', 'text-white');
                const index = Array.from(tabs).indexOf(tab);
                tabContents.forEach(content => content.classList.add('hidden'));
                document.getElementById(`${tabId}-domain-content`).classList.remove('hidden');
            });
        });

        // Ambil parameter tld_name dari URL
        const urlParams = new URLSearchParams(window.location.search);
        let tldName = urlParams.get('tld_name') || sessionStorage.getItem('tld_name');

        // Update elemen <h3> dan <p> dengan nama domain utama + TLD
        const h3DomainDisplay = document.getElementById('h3-domain-display');
        const pDomainDisplay = document.getElementById('p-domain-display');

        if (h3DomainDisplay && pDomainDisplay && tldName) {
            // Hapus "www" jika ada, lalu tampilkan nama domain utama + TLD
            const cleanedDomain = tldName.replace(/^www\./, '');
            h3DomainDisplay.textContent = cleanedDomain;
            pDomainDisplay.textContent = cleanedDomain;
        }

        // Auto-klik tombol "Continue" jika tldName tersedia
        const nextButton = document.getElementById('next-button');
        if (nextButton && tldName) {
            setTimeout(() => {
                if (document.getElementById('form-step-3').classList.contains('is-active')) {
                    nextButton.click();
                }
            }, 100);
        }

        // Event listener untuk halaman checkout
        if (window.location.pathname === '/checkout') {
            let urlParams = new URLSearchParams(window.location.search);
            let tldName = urlParams.get('tld_name');

            if (tldName) {
                setTimeout(() => {
                    if (nextButton) {
                        nextButton.click();
                    }
                }, 1000);
            }
        }

        // Event listener untuk tombol "Continue"
        nextButton.addEventListener('click', function(event) {
            console.log("Button was clicked!");
        });

        // Fungsi Search pada bagian "New Domain"
        document.getElementById('search-btn-new').addEventListener('click', function() {
            searchDomain('new');
        });

        document.getElementById('search-btn-transfer').addEventListener('click', function() {
            searchDomain('transfer');
        });

        document.getElementById("search-btn-hosting").addEventListener("click", function() {
            searchDomain('hosting-only');
        });

        function resetTransferForm() {
            const transferForm = document.getElementById('transfer-form');
            const successMessage = document.getElementById('success-message');
            const eppInputs = document.querySelectorAll('input[placeholder="Enter your EPP code here"]');
            const h3DomainDisplay = document.getElementById('h3-domain-display-2');

            if (transferForm && successMessage && eppInputs.length > 0) {
                // Sembunyikan form transfer
                transferForm.classList.add('hidden');

                // Reset input EPP
                eppInputs.forEach(input => {
                    input.value = '';
                });

                // Sembunyikan pesan sukses
                successMessage.classList.add('hidden');

                // Reset judul
                if (h3DomainDisplay) {
                    h3DomainDisplay.textContent = 'Your domain search results';
                }
            }
        }

        // Modifikasi event listener untuk tombol "Transfer Now"
        document.addEventListener('click', function(event) {
            if (event.target && event.target.id === 'transfer-button') {
                // Reset form terlebih dahulu
                resetTransferForm();

                const domainName = event.target.getAttribute('data-domain-name');
                const transferForm = document.getElementById('transfer-form');
                const tldResults = document.getElementById('tld-results');
                const h3DomainDisplay = document.getElementById('h3-domain-display-2');

                if (transferForm && tldResults && h3DomainDisplay) {
                    // Tampilkan form transfer
                    transferForm.classList.remove('hidden');
                    tldResults.classList.remove('hidden');

                    // Update judul dengan nama domain yang akan ditransfer
                    h3DomainDisplay.textContent = `Transfer Domain: ${domainName}`;
                }
            }
        });

        // Fungsi umum untuk pencarian domain
        async function searchDomain(type) {
            resetTransferForm();
            console.log('searchDomain called with type:', type);
            const searchInput = document.getElementById(`domain-search-${type}`);
            if (!searchInput) {
                console.error(`Element with ID 'domain-search-${type}' not found.`);
                return;
            }

            const searchQuery = searchInput.value.trim();
            console.log('searchQuery:', searchQuery);
            const dropdownContainer = document.getElementById(`dropdown-container-${type}`);
            const dropdownContent = document.getElementById(`dropdown-content-${type}`);
            const h3DomainDisplay = document.getElementById("h3-domain-display");
            const pDomainDisplay = document.getElementById("p-domain-display");
            const nextButton = document.getElementById("next-button");

            // Jika tidak ada input pencarian, sembunyikan dropdown
            if (!searchQuery) {
                dropdownContainer.classList.remove('show');
                dropdownContainer.classList.add('hidden');
                return;
            }

            const domainParts = searchQuery.split('.');
            const tld = domainParts.pop() || '';
            const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');
            const baseDomain = `${mainDomainPart}.${tld}`;

            let dropdownHTML = '';

            // Cek untuk tipe 'new' (domain baru)
            if (type === 'new') {
                const apiUrl = `https://domain-availability.whoisxmlapi.com/api/v1?apiKey=at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop&domainName=${baseDomain}&outputFormat=json`;
                try {
                    const response = await fetch(apiUrl);
                    console.log('Response Status:', response.status);
                    const data = await response.json();
                    const isAvailable = data.DomainInfo && data.DomainInfo.domainAvailability === "AVAILABLE";

                    if (isAvailable) {
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong id="search-tld-name">${baseDomain}</strong> is available as a new domain
                            <br>Exclusive offer: Rp 20.000/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full buy-now-button" data-domain-name="${baseDomain}">
                            Buy Now
                        </button>
                    </div>
                </div>`;
                    } else {
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> is not available
                        </div>
                        <button class="button h-button rounded-full h-modal-trigger" data-modal="modal-whois" data-domain-name="${baseDomain}">
                            WHOIS
                        </button>
                    </div>
                </div>`;
                    }
                } catch (error) {
                    console.error('Error checking domain availability:', error);
                }
            }
            // Cek untuk tipe 'transfer'
            else if (type === 'transfer') {
                const apiKey = 'at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop';
                if (!apiKey) {
                    console.error('API Key is missing!');
                    return;
                }

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

                    // Check if domain is available (not registered)
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
                            </button>
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
                } catch (error) {
                    console.error('Error checking domain availability for transfer:', error);
                    dropdownHTML = `
                <div id="component-search">
                    <div class="message is-danger flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> Unable to check transfer availability. Please try again later.
                        </div>
                    </div>
                </div>`;
                }
            }
            // Cek untuk tipe 'hosting-only'
            else if (type === 'hosting-only') {
                const searchQuery = document.getElementById(`domain-search-${type}`).value.trim();
                const domainParts = searchQuery.split('.');

                // Pastikan query mengandung nama domain yang lengkap (harus ada sebelum TLD)
                if (domainParts.length < 2 || domainParts[0] === "") {
                    dropdownHTML = `
            <div id="component-search">
                <div class="message is-danger flex-row flex justify-between items-center">
                    <div class="message-body">
                        <strong>${searchQuery}</strong> is not a valid domain name. Please enter a valid domain.
                    </div>
                </div>
            </div>`;
                } else {
                    const baseDomain = searchQuery; // Pastikan base domain adalah query lengkap

                    const apiUrl = `https://domain-availability.whoisxmlapi.com/api/v1?apiKey=at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop&domainName=${baseDomain}&outputFormat=json`;

                    try {
                        const response = await fetch(apiUrl);
                        const data = await response.json();

                        // Pastikan data yang diterima valid dan memiliki informasi ketersediaan domain
                        if (data && data.DomainInfo) {
                            const isAvailable = data.DomainInfo.domainAvailability === "AVAILABLE";

                            if (!isAvailable) {
                                // Jika domain tidak tersedia untuk hosting
                                dropdownHTML = `
                        <div id="component-search">
                            <div class="message is-success flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong id="search-tld-name">${baseDomain}</strong> is available for Hosting Only
                                    <br>Get this domain with your hosting plan!
                                </div>
                                <button class="button h-button is-success rounded-full buy-now-button" data-domain-name="${baseDomain}">
                                    Buy Now
                                </button>
                            </div>
                        </div>`;
                            } else {
                                // Jika domain tersedia untuk dibuat atau tidak ditemukan
                                dropdownHTML = `
                        <div id="component-search">
                            <div class="message is-success flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong id="search-tld-name">${baseDomain}</strong> the domain name cannot be found
                                    <br>do you want to create a new domain?
                                </div>
                                <button class="button h-button is-success rounded-full buy-now-button" data-domain-name="${baseDomain}">
                                    create new domain
                                </button>
                            </div>
                        </div>`;
                            }
                        } else {
                            // Jika data tidak valid atau API gagal
                            dropdownHTML = `
                    <div id="component-search">
                        <div class="message is-danger flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong>${baseDomain}</strong> Invalid domain or unable to check. Please try again later.
                            </div>
                        </div>
                    </div>`;
                        }
                    } catch (error) {
                        console.error('Error checking domain availability for hosting:', error);
                        dropdownHTML = `
                <div id="component-search">
                    <div class="message is-danger flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong>${baseDomain}</strong> Unable to check domain. Please try again later.
                        </div>
                    </div>
                </div>`;
                    }
                }
            }

            dropdownContent.innerHTML = dropdownHTML;
            dropdownContainer.classList.remove('hidden');
            dropdownContainer.classList.add('show');
            setupWhoisModal();
        }

        // Tambahkan event listener untuk tombol "Transfer Now"
        document.addEventListener('click', function(event) {
            if (event.target && event.target.id === 'transfer-button') {
                const domainName = event.target.getAttribute('data-domain-name');
                const transferForm = document.getElementById('transfer-form');
                const tldResults = document.getElementById('tld-results');
                const h3DomainDisplay = document.getElementById('h3-domain-display-2');

                if (transferForm && tldResults && h3DomainDisplay) {
                    // Tampilkan form transfer
                    transferForm.classList.remove('hidden');
                    tldResults.classList.remove('hidden');

                    // Update judul dengan nama domain yang akan ditransfer
                    h3DomainDisplay.textContent = `Transfer Domain: ${domainName}`;
                }
            }
        });

        // Optional: Event listener untuk menutup pesan sukses
        const deleteMessageButton = document.getElementById('delete-message');
        if (deleteMessageButton) {
            deleteMessageButton.addEventListener('click', function() {
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    successMessage.classList.add('hidden');
                }
            });
        }

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


        function setupWhoisModal() {
            document.querySelectorAll('.h-modal-trigger').forEach(button => {
                button.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('is-active');
                    }

                    // Ambil domain yang dipilih dari elemen yang sesuai
                    const domainName = this.getAttribute('data-domain-name');
                    if (!domainName) {
                        console.error('Domain name is missing from button attribute!');
                        return; // Hentikan jika tidak ada nama domain
                    }

                    const apiKey = 'at_lhU0kk1YoN5B0JHLMsS9tTyNGPLop';
                    const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${domainName}&outputFormat=JSON`;

                    fetch(url)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            const whoisOutput = document.getElementById('whois-output');
                            console.log('WHOIS API response:', data); // Debugging response from API

                            // Pastikan data yang diterima sesuai dengan struktur yang diharapkan
                            if (data.WhoisRecord && data.WhoisRecord.domainName) {
                                // Tampilkan informasi WHOIS jika ada
                                whoisOutput.innerHTML = `
                            <p><strong>Domain name:</strong> ${data.WhoisRecord.domainName || 'Not available'}</p>
                            <p><strong>Contact email:</strong> ${data.WhoisRecord.contactEmail || 'Not available'}</p>
                            <p><strong>Registrar:</strong> ${data.WhoisRecord.registrarName || 'Not available'}</p>
                            <p><strong>Creation Date:</strong> ${data.WhoisRecord.createdDate || 'Not available'}</p>
                            <p><strong>Expiration Date:</strong> ${data.WhoisRecord.expiresDate || 'Not available'}</p>
                        `;
                            } else {
                                // Jika tidak ada data WHOIS, tampilkan pesan default
                                whoisOutput.textContent = 'WHOIS data not available for this domain.';
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching WHOIS data:', error);
                            const whoisOutput = document.getElementById('whois-output');
                            whoisOutput.textContent = 'WHOIS data not available.';
                        });
                });
            });

            // Tutup modal ketika tombol close diklik
            document.querySelectorAll('.h-modal-close').forEach(closeButton => {
                closeButton.addEventListener('click', function() {
                    this.closest('.modal').classList.remove('is-active');
                });
            });
        } // Setup CSRF token untuk AJAX (jika menggunakan jQuery)
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

    let currentStep = 0;
    let hasContinueBeenClicked = false;
    let targetTabForSwitch = null;
    let currentActiveTab = null;
    let currentActiveContent = null;

    document.addEventListener('DOMContentLoaded', function() {
        const tabItems = document.querySelectorAll('.tabs ul li:not(.tab-naver)');
        const tabContents = document.querySelectorAll('.tab-content');
        const tabNaver = document.querySelector('.tab-naver');
        const nextButton = document.getElementById('next-button');
        const existingModal = document.getElementById('demo-right-actions-modal');
        const formSections = document.querySelectorAll('.form-section');

        // Initialize active states
        currentActiveTab = document.querySelector('.tabs ul li.is-active');
        currentActiveContent = document.querySelector('.tab-content.is-active');

        function initializeTabNaver() {
            if (currentActiveTab && tabNaver) {
                const initialTabWidth = currentActiveTab.offsetWidth;
                const initialTabLeft = currentActiveTab.offsetLeft;
                // tabNaver.style.transform = `translateX(${initialTabLeft}px)`;
                // tabNaver.style.width = `${initialTabWidth}px`;
                // tabNaver.style.transition = 'transform 0.3s ease, width 0.3s ease';
            }
        }

        initializeTabNaver();

        function resetAllStepsAndForms() {
            // Reset step counter
            window.currentStep = 0;
            hasContinueBeenClicked = false;

            // Reset active state for form sections
            formSections.forEach((section, index) => {
                section.classList.toggle('is-active', index === 0);
            });

            // Reset active state for step segments
            const allSegments = document.querySelectorAll('.steps-segment, [id^="step-segment-"], [id^="mobile-step-segment-"]');
            allSegments.forEach((segment) => {
                segment.classList.remove('is-active');
            });

            const firstStepSegment = document.getElementById('step-segment-0');
            if (firstStepSegment) {
                firstStepSegment.classList.add('is-active');
            }

            // Reset next button
            if (nextButton) {
                nextButton.textContent = 'Continue';
                nextButton.classList.remove('is-loading');
            }

            // Unbind existing click handler and reinitialize
            $('#next-button').off('click');

            // Re-initialize next button handler
            if (typeof window.initializeNextButtonHandler === 'function') {
                window.initializeNextButtonHandler();
            }

            // Delay adding the is-active class to the specific mobile step segment
            setTimeout(() => {
                const mobileStepSegment0 = document.querySelector('#mobile-step-segment-0');
                console.log('Mobile Step Segment 0:', mobileStepSegment0);
                if (mobileStepSegment0) {
                    console.log('Adding is-active class');

                    // Hapus kelas yang menimbulkan konflik (jika ada)
                    mobileStepSegment0.classList.remove('conflicting-class');

                    // Tambahkan kelas is-active
                    mobileStepSegment0.classList.add('is-active');

                    // Terapkan gaya inline tambahan jika diperlukan
                    mobileStepSegment0.style.display = 'block';

                    console.log('Class list after adding:', mobileStepSegment0.classList);
                }
            }, 0);
        }

        // Fungsi updateActiveTab yang sudah Anda miliki
        function updateActiveTab(newTab) {
            if (!newTab) return;

            const tabId = newTab.getAttribute('data-tab');

            // Update tabs
            tabItems.forEach(t => t.classList.remove('is-active'));
            newTab.classList.add('is-active');
            currentActiveTab = newTab;

            // Update contents
            tabContents.forEach(content => {
                content.classList.remove('is-active');
            });

            const targetContent = document.getElementById(tabId);
            if (targetContent) {
                targetContent.classList.add('is-active');
                currentActiveContent = targetContent;
            }
        }

        // Event listener untuk tombol "New Domain"
        document.addEventListener('click', function(event) {
            // Cek apakah tombol yang diklik memiliki teks "New Domain"
            if (event.target.textContent.trim() === 'New Domain') {
                // Cari tab "New Domain"
                const newDomainTab = document.querySelector('.tabs ul li[data-tab="new-domain"]');

                if (newDomainTab) {
                    // Gunakan fungsi updateActiveTab yang sudah ada
                    updateActiveTab(newDomainTab);

                    // Ambil nama domain dari atribut data
                    const domainName = event.target.getAttribute('data-domain-name');

                    // Isi input pencarian dengan nama domain jika tersedia
                    if (domainName) {
                        const newDomainSearchInput = document.getElementById('domain-search-new');
                        if (newDomainSearchInput) {
                            newDomainSearchInput.value = domainName;
                        }
                    }
                }
            }
        });

        function showWarningModal(clickedTab) {
            targetTabForSwitch = clickedTab;

            const modalTitle = existingModal.querySelector('.modal-card-head h3');
            const modalHeader = existingModal.querySelector('.placeholder-content h3');
            const modalText = existingModal.querySelector('.placeholder-content p');

            if (modalTitle) modalTitle.textContent = 'Warning';
            if (modalHeader) modalHeader.textContent = 'Switch Tab';
            if (modalText) modalText.textContent = 'Are you sure you want to switch tabs? Your current progress will be lost.';

            existingModal.classList.add('is-active');
        }

        // Handle tab click
        tabItems.forEach(tab => {
            tab.querySelector('a').addEventListener('click', (event) => {
                event.preventDefault();
                event.stopPropagation();

                if (tab === currentActiveTab) {
                    return;
                }

                if (!hasContinueBeenClicked) {
                    updateActiveTab(tab);
                    return;
                }

                showWarningModal(tab);
            });
        });

        // Set up modal confirm button
        const confirmButton = existingModal.querySelector('.modal-card-foot .button.is-primary');
        if (confirmButton) {
            confirmButton.addEventListener('click', () => {
                if (targetTabForSwitch) {
                    resetAllStepsAndForms();
                    updateActiveTab(targetTabForSwitch);
                    targetTabForSwitch = null;
                }
                existingModal.classList.remove('is-active');
            });
        }

        // Set up modal cancel/close buttons
        const cancelButton = existingModal.querySelector('.modal-card-foot .button:not(.is-primary)');
        const closeButtons = existingModal.querySelectorAll('.h-modal-close');

        function handleModalClose() {
            targetTabForSwitch = null;
            existingModal.classList.remove('is-active');
        }

        if (cancelButton) {
            cancelButton.addEventListener('click', handleModalClose);
        }

        closeButtons.forEach(button => {
            button.addEventListener('click', handleModalClose);
        });

        // Handle next button click to update hasContinueBeenClicked
        if (nextButton) {
            nextButton.addEventListener('click', () => {
                hasContinueBeenClicked = true;
            });
        }

        // Handle window resize
        window.addEventListener('resize', initializeTabNaver);
    });
</script>











</div>
</body>

</html>