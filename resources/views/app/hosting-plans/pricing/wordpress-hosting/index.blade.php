<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Wordpress-Hosting</title>
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

    @section('wordpress-hosting')
    @include('app.hosting-plans.pricing.wordpress-hosting.section1')
    <div id="section2">
        @include('app.hosting-plans.pricing.wordpress-hosting.section2')
    </div>
    @include('app.hosting-plans.pricing.wordpress-hosting.section3')
    @include('app.hosting-plans.pricing.wordpress-hosting.section4')
    @include('app.hosting-plans.pricing.wordpress-hosting.section5')
    @include('app.hosting-plans.pricing.wordpress-hosting.section6')
    @endsection
</body>

</html>


<script>
    /*
    ========================================================
                        Section1 - Javascript
    ========================================================
    */
    function scrollToSection() {
        const section = document.getElementById('section2');
        section.scrollIntoView({
            behavior: 'smooth'
        });
    }

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