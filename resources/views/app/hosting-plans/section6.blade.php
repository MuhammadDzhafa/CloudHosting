<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Section</title>
    @vite('resources/css/app.css')
    @vite('resources/css/styles.css')
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <!-- <style>
        .card {
            width: 380px;
            height: 304px;
            padding: 30px 0px 0px 0px;
            gap: 15px;
            border-radius: 8px;
            border: 0.67px solid var(--Base-200, #DEDEDE);
            opacity: 1;
            transition: transform 0ms, box-shadow 0ms, border 0ms;
        }

        .card:hover {
            transform: translateY(-10px);
            border: 0.67px solid var(--Kazee-Primary-500, #4A6DCB);
            box-shadow: 0px 10px 10px -5px #00000014, 0px 20px 25px -5px #FFFFFF24;
        }

        .font-inter {
            font-family: 'Inter', sans-serif;
        }
    </style> -->
</head>
<body>
    <section class="section-frame">
        <!-- <div class="container">
            <h3 class="titlee mx-auto mb-6"
                style="max-width: 1200px; height: 43px; font-family: 'Inter', sans-serif; font-size: 36px; font-weight: 700; line-height: 43.2px; text-align: center; color: #283252;">
                Find the Perfect Solutions for You
            </h3> -->
            <h2 class="text-3xl md:text-4xl title-section">
                Find the Perfect Solutions for You
            </h2>
            <div class="flex flex-col md:flex-row gap-12 justify-center">
                <div class="card-container">
                    <div class="card">
                        <div class="card-content-product">
                            <img src="/assets/img/icons/language.svg" alt="" class="card-icon">
                            <h2 class="card-title">Domain</h2>
                            <p class="content">Find and secure the perfect web address with our easy-to-use domain registration platform.</p>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <div class="card-content-product">
                            <img src="/assets/img/icons/cloud.svg" alt="" class="card-icon">
                            <h2 class="card-title">Cloud Hosting</h2>
                            <p class="content">Unlock unparalleled flexibility and performance with our cutting-edge cloud hosting solutions.</p>
                        </div>
                    </div>
                </div>
                <div class="card-container">
                    <div class="card">
                        <div class="card-content-product">
                            <img src="/assets/img/icons/wordpress.svg" alt="" class="card-icon">
                            <h2 class="card-title">WordPress Hosting</h2>
                            <p class="content">Enhance your WordPress site with our optimized hosting services designed for speed and security.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="section">
        <div class="container mx-auto px-8 py-10" style="max-width: 1440px; height: 597px; padding: 100px 120px; gap: 50px;">
            <h3 class="titlee mx-auto mb-6"
                style="max-width: 1200px; height: 43px; font-family: 'Inter', sans-serif; font-size: 36px; font-weight: 700; line-height: 43.2px; text-align: center; color: #283252;">
                Find the Perfect Solutions for You
            </h3>
            <div class="flex flex-col md:flex-row gap-12 justify-center">
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="card flex flex-col items-center justify-center">
                        <div class="card-content flex flex-col items-center text-center break-words">
                            <img src="/assets/img/icons/language.svg" alt="" class="w-[41.67px] h-[41.67px]">
                            <h2 class="titlee text-[#3C476C] font-inter text-[23px] font-semibold leading-[29.9px] text-center w-[320px] h-[30px]">
                                Domain
                            </h2>
                            <p class="contentt text-[#3C476C] font-inter text-[18px] font-normal leading-[23.4px] text-center w-[320px] h-[69px]">
                                Find and secure the perfect web address with our easy-to-use domain registration platform.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="card flex flex-col items-center justify-center">
                        <div class="card-content flex flex-col items-center text-center break-words">
                            <img src="/assets/img/icons/cloud.svg" alt="" class="w-[41.67px] h-[41.67px]">
                            <h2 class="titlee text-[#3C476C] font-inter text-[23px] font-semibold leading-[29.9px] text-center w-[320px] h-[30px]">
                                Cloud Hosting
                            </h2>
                            <p class="contentt text-[#3C476C] font-inter text-[18px] font-normal leading-[23.4px] text-center w-[320px] h-[69px]">
                                Unlock unparalleled flexibility and performance with our cutting-edge cloud hosting solutions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/3 flex justify-center">
                    <div class="card flex flex-col items-center justify-center">
                        <div class="card-content flex flex-col items-center text-center break-words">
                            <img src="/assets/img/icons/wordpress.svg" alt="" class="w-[41.67px] h-[41.67px]">
                            <h2 class="titlee text-[#3C476C] font-inter text-[23px] font-semibold leading-[29.9px] text-center w-[320px] h-[30px]">
                                WordPress Hosting
                            </h2>
                            <p class="contentt text-[#3C476C] font-inter text-[18px] font-normal leading-[23.4px] text-center w-[320px] h-[69px]">
                                Enhance your WordPress site with our optimized hosting services designed for speed and security.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    @push('styles')
        <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    @endpush

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    @endpush
</body>
</html>
