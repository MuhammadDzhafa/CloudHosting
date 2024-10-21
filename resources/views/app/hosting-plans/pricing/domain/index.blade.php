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
        const tldItems = document.querySelectorAll('.tld-item');
        const tldResults = document.getElementById('tld-results');
        const searchInput = document.getElementById('domain-search');

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
                </div>
            `;

                    dropdownContainer.classList.add('show');
                    componentTransfer.classList.add('hidden');
                } else {
                    dropdownContainer.classList.remove('show');
                }
            });
        }

        if (searchButton) {
            searchButton.addEventListener('click', function() {
                const searchQuery = searchInput.value.toLowerCase();
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

        // Handle Continue Button and Success Message
        document.getElementById('continue-button').addEventListener('click', function() {
            document.getElementById('success-message').classList.remove('hidden');
        });

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