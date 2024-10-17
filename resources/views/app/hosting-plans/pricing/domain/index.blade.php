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
</body>

</html>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        /*
        ========================================================
                            Section1 - Javascript
        ========================================================
        */
        const searchButton = document.getElementById('search-button');
        const transferButtons = document.querySelectorAll('.transfer-button');
        const continueButton = document.getElementById('continue-button');
        const deleteMessageButton = document.getElementById('delete-message');
        const viewPriceListLink = document.getElementById('view-price-list');
        const priceListSection = document.getElementById('price-list-section');

        if (searchButton) {
            searchButton.addEventListener('click', function() {
                const searchQuery = document.getElementById('domain-search').value.toLowerCase();
                const tldItems = document.querySelectorAll('.tld-item');
                const tldResults = document.getElementById('tld-results');
                let hasResults = false;

                if (searchQuery === "") {
                    tldResults.classList.add('hidden');
                    return;
                }

                tldItems.forEach(function(item) {
                    const tldName = item.querySelector('.dark-text').textContent.toLowerCase();
                    if (tldName.includes(searchQuery)) {
                        item.classList.remove('hidden');
                        hasResults = true;
                    } else {
                        item.classList.add('hidden');
                    }
                });

                if (hasResults) {
                    tldResults.classList.remove('hidden');
                } else {
                    tldResults.classList.add('hidden');
                }

                // Pindah ke komponen transfer
                renderComponent('component-transfer');
            });
        }

        if (transferButtons.length > 0) {
            transferButtons.forEach(button => {
                button.addEventListener('click', function() {
                    document.getElementById('epp-input-container').classList.remove('hidden');
                });
            });
        }

        if (continueButton) {
            continueButton.addEventListener('click', function() {
                document.getElementById('success-message').classList.remove('hidden');
            });
        }

        if (deleteMessageButton) {
            deleteMessageButton.addEventListener('click', function() {
                document.getElementById('success-message').classList.add('hidden');
            });
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
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');
        const componentTransfer = document.getElementById('component-transfer');

        if (searchBtn) {
            searchBtn.addEventListener('click', function() {
                const searchQuery = document.getElementById('domain-search').value;

                if (searchQuery) {
                    dropdownContent.innerHTML = `
                        <div id="component-search">
                            <div class="message is-success flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong> ${searchQuery}</strong> is available
                                    <br>Exclusive offer: $ 1.50/mon for a 2-year plan
                                </div>
                                <button class="button h-button is-success rounded-full" onclick="redirectToCheckout()">
                                    Buy Now
                                </button>
                            </div>

                            <div class="message flex-row flex justify-between items-center">
                                <div class="message-body">
                                    <strong> ${searchQuery}</strong> is not available
                                </div>
                                <button class="button h-button rounded-full">WHOIS</button>
                            </div>

                            <div>
                                <p class="text-[#FFFFFF] font-semibold mb-2 text-xl">AI Recommendations ✨</p>
                                <p class="text-[#FFFFFF] mb-4">Here are some domain name recommendations:</p>
                                <div class="message is-primary flex-row flex justify-between items-center">
                                    <div class="message-body">
                                        <strong> ${searchQuery}.edu</strong> is available
                                        <br>Exclusive offer: $ 1.50/mon for a 2-year plan
                                    </div>
                                    <button class="button h-button is-primary rounded-full">Add to Cart</button>
                                </div>
                            </div>
                        </div>
                    `;

                    dropdownContainer.classList.add('show');
                    componentTransfer.classList.add('hidden');
                } else {
                    dropdownContainer.classList.remove('show');
                }
            });
        }

        // Replace TLD Logic
        const searchInput = document.getElementById('domain-search');
        const domainContainer = document.getElementById('domain-container');

        if (domainContainer) {
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
        }

        function replaceTLD(domainName, newTLD) {
            return domainName.replace(/(\.[a-z]{2,63}\.[a-z]{2,63}|(\.[a-z]{2,63})){1}$/, newTLD);
        }

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
</script>