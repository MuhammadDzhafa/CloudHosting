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
    @extends('layouts.template-landing-page.web.master')

    @section('cloud-hosting')
    @include('app.hosting-plans.pricing.cloud-hosting.section1')
    @include('app.hosting-plans.pricing.cloud-hosting.section2')
    @include('app.hosting-plans.pricing.cloud-hosting.section3')
    @include('app.hosting-plans.pricing.cloud-hosting.section4')
    @include('app.hosting-plans.pricing.cloud-hosting.section5')
    @include('app.hosting-plans.pricing.cloud-hosting.section6')
    @endsection
</body>

</html>

<script>
    /*
    ========================================================
                        Section1 - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
        // Elemen-elemen slider
        const storageSlider = document.getElementById('storage-slider');
        const ramSlider = document.getElementById('ram-slider');
        const cpuSlider = document.getElementById('cpu-slider');
        const totalPriceElement = document.getElementById('total-price');
        const storageValue = document.getElementById('storage-value');
        const storagePrice = document.getElementById('storage-price');
        const ramValue = document.getElementById('ram-value');
        const ramPrice = document.getElementById('ram-price');
        const cpuValue = document.getElementById('cpu-value');
        const cpuPrice = document.getElementById('cpu-price');

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

        // Fungsi untuk memperbarui total harga
        function updateTotalPrice() {
            const selectedStorage = storageOptions[storageSlider.value].price;
            const selectedRam = ramOptions[ramSlider.value].price;
            const selectedCpu = cpuOptions[cpuSlider.value].price;

            // Hitung total harga
            const totalPrice = selectedStorage + selectedRam + selectedCpu;

            // Update tampilan total harga
            totalPriceElement.textContent = `${totalPrice.toLocaleString('id-ID')}`;
        }

        // Fungsi untuk memperbarui nilai slider Storage
        function updateStorage() {
            const selectedOption = storageOptions[storageSlider.value];
            storageValue.textContent = selectedOption.value;
            storagePrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Fungsi untuk memperbarui nilai slider RAM
        function updateRam() {
            const selectedOption = ramOptions[ramSlider.value];
            ramValue.textContent = selectedOption.value;
            ramPrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Fungsi untuk memperbarui nilai slider CPU
        function updateCpu() {
            const selectedOption = cpuOptions[cpuSlider.value];
            cpuValue.textContent = selectedOption.value;
            cpuPrice.textContent = `IDR ${selectedOption.price.toLocaleString('id-ID')}/mon`;
        }

        // Set event listener untuk update harga
        storageSlider.addEventListener('input', function() {
            updateStorage();
            updateTotalPrice();
        });
        ramSlider.addEventListener('input', function() {
            updateRam();
            updateTotalPrice();
        });
        cpuSlider.addEventListener('input', function() {
            updateCpu();
            updateTotalPrice();
        });

        // Set nilai awal
        updateStorage();
        updateRam();
        updateCpu();
        updateTotalPrice();
    });


    /*
    ========================================================
                        Section5 - Javascript
    ========================================================
    */
    document.addEventListener('DOMContentLoaded', function() {
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