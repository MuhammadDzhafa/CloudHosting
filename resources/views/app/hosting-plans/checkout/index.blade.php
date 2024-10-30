<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

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
    <script src="{{ asset('https://code.jquery.com/jquery-3.6.0.min.js') }}" async></script>

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
                slider.style.left = `calc(${index * 50}% + 4px)`;
                tabContents.forEach(content => content.classList.add('hidden'));
                document.getElementById(`${tabId}-domain-content`).classList.remove('hidden');
            });
        });

        // Ambil parameter tld_name dari URL
        const urlParams = new URLSearchParams(window.location.search);
        let tldName = urlParams.get('tld_name') || sessionStorage.getItem('tld_name');

        // Update elemen <h3> dengan TLD
        const h3DomainDisplay = document.getElementById('h3-domain-display');
        if (h3DomainDisplay && tldName) {
            const tld = '.' + tldName.split('.').pop();
            h3DomainDisplay.textContent = tld;
        } else {
            console.log("TLD Name not found in URL or session storage");
        }

        // Auto-klik tombol "Continue" jika tldName tersedia
        const nextButton = document.getElementById('next-button');
        if (nextButton && tldName) {
            setTimeout(() => nextButton.click(), 100);
        }

        // Fungsi Search pada bagian "New Domain"
        document.getElementById('search-btn-new').addEventListener('click', function() {
            searchDomain('new');
        });

        // Fungsi Search pada bagian "Transfer Domain"
        document.getElementById('search-btn-transfer').addEventListener('click', function() {
            searchDomain('transfer');
        });

        // Fungsi umum untuk pencarian domain
        function searchDomain(type) {
            const searchQuery = document.getElementById(`domain-search-${type}`).value;
            const dropdownContainer = document.getElementById(`dropdown-container-${type}`);
            const dropdownContent = document.getElementById(`dropdown-content-${type}`);

            if (searchQuery) {
                let dropdownHTML = '';

                // Untuk pencarian "New Domain"
                if (type === 'new') {
                    dropdownHTML = `
                    <div id="component-search">
                        <div class="message is-success flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong id="search-tld-name">${searchQuery}</strong> is available as a new domain
                                <br>Exclusive offer: $1.50/mon for a 2-year plan
                            </div>
                            <button class="button h-button is-success rounded-full" data-domain-name="${searchQuery}">
                                Buy Now
                            </button>
                        </div>
                        <div class="message flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong>${searchQuery}</strong> is not available
                            </div>
                            <button class="button h-button rounded-full h-modal-trigger" data-modal="modal-whois">WHOIS</button>
                        </div>
                    </div>`;
                }
                // Untuk pencarian "Transfer Domain"
                else if (type === 'transfer') {
                    dropdownHTML = `
                    <div id="component-search">
                        <div class="message is-warning flex-row flex justify-between items-center">
                            <div class="message-body">
                                <strong id="search-tld-name">${searchQuery}</strong> is available for transfer
                                <br>Transfer this domain at a discount!
                            </div>
                            <button class="button h-button is-warning rounded-full" data-domain-name="${searchQuery}" id="transfer-button-${searchQuery}">
                                Transfer Now
                            </button>
                        </div>
                    </div>`;
                }

                dropdownContent.innerHTML = dropdownHTML;
                dropdownContainer.classList.remove('hidden');

                setupWhoisModal(); // Setup modal WHOIS setelah dropdown di-update

                const whoisButton = dropdownContent.querySelector('.h-modal-trigger');
                if (whoisButton) {
                    whoisButton.addEventListener('click', function() {
                        const searchQuery = document.getElementById(`domain-search-${type}`).value; // Ambil nilai dari input
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

                // Menampilkan dropdown
                dropdownContainer.classList.add('show');
                dropdownContainer.classList.remove('hidden');
            } else {
                dropdownContainer.classList.remove('show');
                dropdownContainer.classList.add('hidden');
            }
        }

        // Menambahkan event listener untuk tombol "Transfer Now"
        function setupTransferButton() {
            const transferButtons = document.querySelectorAll('[id^="transfer-button-"]');
            transferButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const transferForm = document.getElementById('transfer-form');
                    transferForm.classList.remove('hidden');
                });
            });
        }

        // Mengatur modal WHOIS
        function setupWhoisModal() {
            document.querySelectorAll('.h-modal-trigger').forEach(button => {
                button.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('is-active');
                    }
                });
            });

            document.querySelectorAll('.h-modal-close').forEach(button => {
                button.addEventListener('click', function() {
                    const modal = this.closest('.modal');
                    if (modal) {
                        modal.classList.remove('is-active');
                    }
                });
            });
        }

        // Setup AJAX CSRF token
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        // Panggil setupTransferButton untuk mengatur event listener
        setupTransferButton();
    });
</script>









</div>
</body>

</html>