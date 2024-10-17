<section class="section-frame padding-1 gap-6 md:gap-12" style="background: #fff;">

    <!-- Background Image Container -->
    <div class="absolute -mx-[10%] bg-cover bg-center" style="height: 500px; width: calc(100% + 20%);">
        <div class="absolute inset-0 bg-cover bg-center"
            style="background-image: url('/assets/img/bg/bg-pattern2.svg'); height: 500px; width: calc(100% + 20%); opacity: 0.2;">
        </div>
    </div>

    <h2 class="title-section text-center">
        Our Products
    </h2>
    <div class="flex flex-col md:flex-row gap-12 justify-center">
        <div class="card-container">
            <a href="/domain" class="card"> <!-- Membungkus card dengan <a> dan menambahkan rute -->
                <div class="card-content-product">
                    <img src="/assets/img/icons/language.svg" alt="" class="card-icon">
                    <h2 class="card-title">Domain</h2>
                    <p class="content">Find and secure the perfect web address with our easy-to-use domain registration platform.</p>
                </div>
            </a>
        </div>
        <div class="card-container">
            <a href="/cloud-hosting" class="card">
                <div class="card-content-product">
                    <img src="/assets/img/icons/cloud.svg" alt="" class="card-icon">
                    <h2 class="card-title">Cloud Hosting</h2>
                    <p class="content">Unlock unparalleled flexibility and performance with our cutting-edge cloud hosting solutions.</p>
                </div>
            </a>
        </div>
        <div class="card-container">
            <a href="/wordpress-hosting" class="card">
                <div class="card-content-product">
                    <img src="/assets/img/icons/wordpress.svg" alt="" class="card-icon">
                    <h2 class="card-title">WordPress Hosting</h2>
                    <p class="content">Enhance your WordPress site with our optimized hosting services designed for speed and security.</p>
                </div>
            </a>
        </div>
    </div>
</section>
@push('styles')
<link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
@endpush