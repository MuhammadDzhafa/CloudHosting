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
                            <div class="modal-card-foot is-centered">
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
                slider.style.left = `calc(${index * 50}% + 4px)`;
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

        // Fungsi umum untuk pencarian domain
        function searchDomain(type) {
            console.log('searchDomain called with type:', type);
            const searchInput = document.getElementById(`domain-search-${type}`);
            if (searchInput) {
                const searchQuery = searchInput.value;
                console.log('searchQuery:', searchQuery);
                const dropdownContainer = document.getElementById(`dropdown-container-${type}`);
                const dropdownContent = document.getElementById(`dropdown-content-${type}`);
                const h3DomainDisplay = document.getElementById("h3-domain-display");
                const pDomainDisplay = document.getElementById("p-domain-display");
                const nextButton = document.getElementById("next-button");

                if (searchQuery) {
                    let dropdownHTML = '';
                    const domainParts = searchQuery.split('.');
                    const tld = domainParts.pop();
                    const mainDomainPart = domainParts.filter(part => part.toLowerCase() !== 'www').join('.');
                    const baseDomain = `${mainDomainPart}.${tld}`;

                    // Untuk pencarian "New Domain"
                    if (type === 'new') {
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
                            <div class="message flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong>${baseDomain}</strong> is not available
                                </div>
                                <button class="button h-button rounded-full h-modal-trigger" data-modal="modal-whois">WHOIS</button>
                            </div>
                        </div>`;
                    }
                    // Untuk pencarian "Transfer Domain"
                    else if (type === 'transfer') {
                        dropdownHTML = `
                        <div id="component-search">
                            <div class="message is-success flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong id="search-tld-name">${baseDomain}</strong> is available for transfer
                                    <br>Transfer this domain at a discount!
                                </div>
                                <button class="button h-button is-success rounded-full" id="transfer-button" data-domain-name="${baseDomain}">
        Transfer Now
    </button>
                            </div>
                        </div>`;
                    }
                    // Untuk pencarian "Hosting Only"
                    else if (type === 'hosting-only') {
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
                    }

                    dropdownContent.innerHTML = dropdownHTML;
                    dropdownContainer.classList.remove('hidden');

                    const buyNowButtons = document.querySelectorAll('.buy-now-button');
                    buyNowButtons.forEach(button => {
                        button.addEventListener('click', function() {
                            const domainName = this.getAttribute('data-domain-name');
                            h3DomainDisplay.textContent = domainName;
                            pDomainDisplay.textContent = domainName;

                            if (nextButton) {
                                nextButton.click();
                            }

                            sessionStorage.setItem('selected_domain', domainName);
                        });
                    });

                    setupWhoisModal();
                    setupTransferButton();
                    dropdownContainer.classList.add('show');
                    dropdownContainer.classList.remove('hidden');
                } else {
                    dropdownContainer.classList.remove('show');
                    dropdownContainer.classList.add('hidden');
                }
            } else {
                console.error(`Element with ID 'domain-search-${type}' not found.`);
            }
        }

        function setupTransferButton() {
            const transferButtons = document.querySelectorAll('.button.h-button.is-success');
            const transferForm = document.getElementById('transfer-form');
            const continueButton = document.querySelector('#continue-button');
            const successMessage = document.querySelector('#success-message');
            const deleteMessage = document.querySelector('#delete-message');
            const eppInputs = document.querySelectorAll('input[type="text"]');

            transferButtons.forEach(button => {
                button.addEventListener('click', function() {
                    console.log('Transfer button clicked');

                    if (transferForm) {
                        console.log('Showing transfer form');
                        transferForm.classList.remove('hidden');

                        // Fokus ke input EPP yang sesuai berdasarkan viewport
                        const visibleInput = window.innerWidth < 768 ?
                            eppInputs[0] : eppInputs[1];
                        visibleInput.focus();
                    } else {
                        console.error('Transfer form not found');
                    }
                });
            });

            // Sinkronkan nilai input mobile dan desktop
            if (eppInputs.length > 0) {
                eppInputs.forEach(input => {
                    input.addEventListener('input', function(e) {
                        eppInputs.forEach(otherInput => {
                            if (otherInput !== e.target) {
                                otherInput.value = e.target.value;
                            }
                        });
                    });
                });
            }

            // Handle continue button
            if (continueButton) {
                continueButton.addEventListener('click', function() {
                    const eppCode = eppInputs[0].value.trim();

                    if (eppCode === '') {
                        alert('Please enter your EPP code');
                        return;
                    }

                    // Di sini Anda bisa menambahkan validasi EPP code
                    // dan logika untuk memproses transfer domain

                    // Tampilkan pesan sukses
                    if (successMessage) {
                        successMessage.classList.remove('hidden');
                    }

                    // Reset form
                    eppInputs.forEach(input => {
                        input.value = '';
                    });
                });
            }

            // Handle close message button
            if (deleteMessage) {
                deleteMessage.addEventListener('click', function() {
                    successMessage.classList.add('hidden');
                });
            }
        }

        function setupWhoisModal() {
            document.querySelectorAll('.h-modal-trigger').forEach(button => {
                button.addEventListener('click', function() {
                    const modalId = this.getAttribute('data-modal');
                    const modal = document.getElementById(modalId);
                    if (modal) {
                        modal.classList.add('is-active');
                    }
                    const componentSearch = this.closest('#component-search');
                    const domainElement = componentSearch.querySelector('#search-tld-name');
                    const searchQuery = domainElement ? domainElement.textContent : '';

                    const apiKey = 'at_qAvnE2wQKsqDR6aLMgThLwluvbewU';
                    const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${searchQuery}&outputFormat=JSON`;

                    fetch(url)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            const whoisOutput = document.getElementById('whois-output');

                            if (data.WhoisRecord) {
                                whoisOutput.innerHTML = `
                            <p><strong>Domain name:</strong> ${data.WhoisRecord.domainName || 'Not available'}</p>
                            <p><strong>Contact email:</strong> ${data.WhoisRecord.contactEmail || 'Not available'}</p>
                            <p><strong>Registrar:</strong> ${data.WhoisRecord.registrarName || 'Not available'}</p>
                            <p><strong>Creation Date:</strong> ${data.WhoisRecord.createdDate || 'Not available'}</p>
                            <p><strong>Expiration Date:</strong> ${data.WhoisRecord.expiresDate || 'Not available'}</p>`;
                            } else {
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

            document.querySelectorAll('.h-modal-close').forEach(closeButton => {
                closeButton.addEventListener('click', function() {
                    this.closest('.modal').classList.remove('is-active');
                });
            });
        }

        // Setup CSRF token untuk AJAX (jika menggunakan jQuery)
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

        // Initialize active states
        currentActiveTab = document.querySelector('.tabs ul li.is-active');
        currentActiveContent = document.querySelector('.tab-content.is-active');

        // Initialize tab naver position
        function initializeTabNaver() {
            if (currentActiveTab && tabNaver) {
                const initialTabWidth = currentActiveTab.offsetWidth;
                const initialTabLeft = currentActiveTab.offsetLeft;
                tabNaver.style.transform = `translateX(${initialTabLeft}px)`;
                tabNaver.style.width = `${initialTabWidth}px`;
                tabNaver.style.transition = 'transform 0.3s ease, width 0.3s ease';
            }
        }

        initializeTabNaver();

        function resetAllStepsExceptFirst() {
            currentStep = 0;

            // Reset form sections
            const formSections = document.querySelectorAll('.form-section');
            formSections.forEach((section, index) => {
                section.classList.remove('is-active');
                if (index === 0) section.classList.add('is-active');
            });

            // Reset step segments
            const allSegments = document.querySelectorAll('.steps-segment, [id^="step-segment-"], [id^="mobile-step-segment-"]');
            allSegments.forEach((segment, index) => {
                segment.classList.toggle('is-active', index === 0);
            });

            // Reset inputs
            document.querySelectorAll('input').forEach(input => {
                input.value = '';
            });

            // Reset next button
            if (nextButton) {
                nextButton.textContent = 'Continue';
            }

            hasContinueBeenClicked = false;
        }

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

                // Don't do anything if clicking the current active tab
                if (tab === currentActiveTab) {
                    return;
                }

                // If next button hasn't been clicked, allow direct tab switch
                if (!hasContinueBeenClicked) {
                    updateActiveTab(tab);
                    return;
                }

                // If next button has been clicked, show warning modal
                showWarningModal(tab);
            });
        });

        // Set up modal confirm button
        const confirmButton = existingModal.querySelector('.modal-card-foot .button.is-primary');
        if (confirmButton) {
            confirmButton.addEventListener('click', () => {
                if (targetTabForSwitch) {
                    resetAllStepsExceptFirst();
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

        // Set up next button listener
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