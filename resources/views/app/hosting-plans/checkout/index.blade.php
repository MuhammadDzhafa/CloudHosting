<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

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
                                <div class="navigation-buttons">
                                    <div class="buttons is-right">
                                        <button id="next-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white" style="min-height: unset; min-width:unset;">
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
</body>

</html>

<!--Wizard-->

<!-- Layouts js -->

<script src="assets/js/syntax.js" async></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Tab handling
        const tabs = document.querySelectorAll('.tab');
        const tabContents = document.querySelectorAll('.tab-content');
        const slider = document.querySelector('.slider');

        // Tab handling
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
        let tldName = urlParams.get('tld_name');

        // Jika tld_name tidak ada di URL, ambil dari sessionStorage
        if (!tldName) {
            tldName = sessionStorage.getItem('tld_name');
        }

        // Update elemen <h3> dengan nilai TLD
        const h3DomainDisplay = document.getElementById('h3-domain-display');
        if (h3DomainDisplay && tldName) {
            // Ambil TLD dari tldName
            const parts = tldName.split('.');
            const tld = parts.length > 1 ? '.' + parts.pop() : '';

            h3DomainDisplay.textContent = tld; // Set hanya TLD di elemen h3
        } else {
            console.log("TLD Name not found in URL or session storage");
        }

        const nextButton = document.getElementById('next-button');
        if (nextButton && tldName) {
            setTimeout(() => {
                nextButton.click();
            }, 100); // Delay 100 ms
        }

        // Event listener untuk tombol Search
        const searchButton = document.getElementById('search-btn');
        const domainSearch = document.getElementById('domain-search');
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');

        searchButton.addEventListener('click', function() {
            const searchQuery = domainSearch.value;

            if (searchQuery) {
                dropdownContent.innerHTML = `
                <div id="component-search">
                    <div class="message is-success flex-row flex justify-between items-center">
                        <div class="message-body">
                            <strong id="search-tld-name">${searchQuery}</strong> is available
                            <br>Exclusive offer: $1.50/mon for a 2-year plan
                        </div>
                        <button class="button h-button is-success rounded-full" onclick="handleBuyNow('${searchQuery}')">
                            Buy Now
                        </button>
                    </div>
                </div>
                `;

                // Tampilkan dropdown
                dropdownContainer.classList.add('show');
                dropdownContainer.classList.remove('hidden');
            } else {
                dropdownContainer.classList.remove('show');
                dropdownContainer.classList.add('hidden');
            }
        });
    });

    function orderTLD(button) {
        var tldName = button.getAttribute('data-tld-name');
        var tldPrice = button.getAttribute('data-tld-price');

        console.log("TLD Name:", tldName);
        console.log("TLD Price:", tldPrice);

        // Masukkan nilai tld_name ke dalam input field
        var inputField = document.querySelector('.input');
        if (inputField) {
            inputField.value = tldName;
            console.log("TLD Name set in input field:", inputField.value);
        }

        // Kirim data ke backend
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
    }

    // Fungsi handleBuyNow yang hanya mengurus "Buy Now"
    function handleBuyNow(fullDomainName) {
        // Ambil TLD dari fullDomainName
        const parts = fullDomainName.split('.');
        const tld = parts.length > 1 ? '.' + parts.pop() : '';

        // Set nilai TLD name ke elemen h3
        var h3DomainDisplay = document.getElementById('h3-domain-display');
        h3DomainDisplay.textContent = tld; // Hanya menampilkan TLD

        // Klik tombol "Continue" satu kali
        var nextButton = document.getElementById('next-button');
        nextButton.click();
    }
</script>







</div>
</body>

</html>