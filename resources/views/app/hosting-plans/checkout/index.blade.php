<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Checkout</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />

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
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <!-- Content Wrapper -->
        <div id="form-layout-5" class="view-wrapper is-webapp" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile" style="margin-left:unset; width:100%;">

            <div class="">
                @include("layouts.template-landing-page.web.partials.navbar")
                <div class="">
                    <div class="w-full mx-auto">
                        <div class="section-frame padding-1 " style="width:unset; width:100%;">
                            <!-- Mobile Steps -->
                            <div class="mobile-steps flex-1">
                                <ul class="steps has-content-centered is-thin is-vertical">
                                    <li id="mobile-step-segment-0" class="steps-segment is-active mb-4">
                                        <span class="steps-marker w-8 h-8 rounded-full bg-blue-600 flex items-center justify-center text-white">1</span>
                                        <div class="steps-content ml-4">
                                            <p class="step-number text-sm font-medium">Step 1</p>
                                            <p class="text-purple-700 font-semibold">Domain</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-1" class="steps-segment mb-4">
                                        <span class="steps-marker w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">2</span>
                                        <div class="steps-content ml-4">
                                            <p class="step-number text-sm font-medium">Step 2</p>
                                            <p class="text-gray-500">Domain Configuration</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-2" class="steps-segment mb-4">
                                        <span class="steps-marker w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">3</span>
                                        <div class="steps-content ml-4">
                                            <p class="step-number text-sm font-medium">Step 3</p>
                                            <p class="text-gray-500">Hosting</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-3" class="steps-segment mb-4">
                                        <span class="steps-marker w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">4</span>
                                        <div class="steps-content ml-4">
                                            <p class="step-number text-sm font-medium">Step 4</p>
                                            <p class="text-gray-500">Addons</p>
                                        </div>
                                    </li>
                                    <li id="mobile-step-segment-4" class="steps-segment">
                                        <span class="steps-marker w-8 h-8 rounded-full bg-gray-300 flex items-center justify-center text-gray-600">5</span>
                                        <div class="steps-content ml-4">
                                            <p class="step-number text-sm font-medium">Step 5</p>
                                            <p class="text-gray-500">Billing Address</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>

                            <!-- Form Layout 5 -->
                            <div class="flex min-w-full mx-auto">
                                <div
                                    class="stepper-form mx-10 space-x-5"
                                    style="max-width: unset; margin: unset; padding-top: unset;">
                                    <div class="form-sections w-full" style="max-width:unset; padding-right:2rem;">
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
                                            <a
                                                id="next-button"
                                                class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white">
                                                Continue
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-stepper mx-24">
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
                                                <p class="step-info">Billing Adress</p>
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
    </div>

    <!--Huro Scripts-->
    <!--Load Mapbox-->

    <!-- Concatenated plugins -->
    <script src="assets/js/app.js"></script>

    <!-- Huro js -->
    <script src="assets/js/functions.js"></script>
    <script src="assets/js/main.js" async></script>
    <script src="assets/js/components.js" async></script>
    <script src="assets/js/popover.js" async></script>
    <script src="assets/js/widgets.js" async></script>


    <!-- Additional Features -->
    <script src="assets/js/touch.js" async></script>

    <!-- Landing page js -->

    <!-- Dashboards js -->


    <!-- Charts js -->



    <!--Forms-->
    <script src="assets/js/forms.js" async></script>

    <!--Wizard-->

    <!-- Layouts js -->

    <script src="assets/js/syntax.js" async></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tabs = document.querySelectorAll('.tab');
            const tabContents = document.querySelectorAll('.tab-content');
            const slider = document.querySelector('.slider');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const tabId = tab.getAttribute('data-tab');

                    // Update tabs
                    tabs.forEach(t => {
                        t.classList.remove('active');
                        t.classList.remove('text-white');
                        t.classList.add('text-gray-600');
                    });
                    tab.classList.add('active');
                    tab.classList.add('text-white');
                    tab.classList.remove('text-gray-600');

                    // Move the slider
                    const index = Array.from(tabs).indexOf(tab);
                    slider.style.left = `calc(${index * 50}% + 4px)`;

                    // Show the correct content
                    tabContents.forEach(content => content.classList.add('hidden'));
                    document.getElementById(`${tabId}-domain-content`).classList.remove('hidden');
                });
            });
        });
    </script>
    </div>
</body>

</html>