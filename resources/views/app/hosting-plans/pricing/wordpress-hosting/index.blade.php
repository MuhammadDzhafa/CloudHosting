@extends('layouts.template-landing-page.web.master')

@section('wordpress-hosting')
@include('app.hosting-plans.pricing.wordpress-hosting.section1')
@include('app.hosting-plans.pricing.wordpress-hosting.section2')
@include('app.hosting-plans.pricing.wordpress-hosting.section3')
@include('app.hosting-plans.pricing.wordpress-hosting.section4')
@include('app.hosting-plans.pricing.wordpress-hosting.section5')
@include('app.hosting-plans.pricing.wordpress-hosting.section6')
@endsection

<script>
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