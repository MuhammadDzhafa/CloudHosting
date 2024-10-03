@extends('layouts.web.master')

@include('app.hosting-plans.pricing.section1')
@include('app.hosting-plans.pricing.section2.card')
@include('app.hosting-plans.pricing.section2.detail')
@include('app.hosting-plans.pricing.section3')
@include('app.hosting-plans.pricing.section4')
@include('app.hosting-plans.pricing.section5')

@section('scripts')
<script>
    /* Section 5 JavaScripts */
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

    /* Section 2 JavaScripts */
    function toggleDetails() {
        var table = document.getElementById('detailTable');
        var btns = document.querySelectorAll('#showDetailsBtn1, #showDetailsBtn2, #showDetailsBtn3');

        if (table.classList.contains('hidden')) {
            table.classList.remove('hidden');
            btns.forEach(function(btn) {
                btn.innerText = 'Hide detail →';
            });
        } else {
            table.classList.add('hidden');
            btns.forEach(function(btn) {
                btn.innerText = 'More detail →';
            });
        }
    }

    // Tambahkan event listener untuk kedua tombol <a>
    document.getElementById('showDetailsBtn1').addEventListener('click', function(event) {
        event.preventDefault(); // Mencegah pengalihan halaman saat <a> diklik
        toggleDetails();
    });

    document.getElementById('showDetailsBtn2').addEventListener('click', function(event) {
        event.preventDefault();
        toggleDetails();
    });

    document.getElementById('showDetailsBtn3').addEventListener('click', function(event) {
        event.preventDefault();
        toggleDetails();
    });
</script>
@endsection