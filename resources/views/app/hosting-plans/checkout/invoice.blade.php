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

    <div class="bg-white font-sans">
        <div class="container section-frame padding-1" style="padding: 100px 20px;">
            <div class="max-w-[1200px] w-full h-auto px-8 md:px-4 lg:px-12 pt-8 lg:pt-12 pb-8 lg:pb-12 gap-6 lg:gap-10 bg-white border border-gray-300 rounded-md opacity-100 shadow-lg">
                <div class="flex flex-col md:flex-row justify-between items-start mb-8">
                    <div class="mb-6 md:mb-0">
                        <h1 class="text-2xl lg:text-3xl font-semibold text-[#263E83] mb-10 lg:mb-20">Invoice</h1>
                    </div>
                    <div class="text-left md:text-right mb-6 md:mb-10">
                        <img src="assets/img/logos/logo/awanhosting.svg" alt="Awan Hosting Logo" class="h-10 lg:h-12 mb-4 md:ml-auto">
                        <p class="w-full md:w-[259px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-left md:text-right text-[#263E83]">
                            PT. Kazee Digital Indonesia
                        </p>
                        <p class="w-full md:w-[259px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-left md:text-right text-[#263E83]">Jl. Setrasari Indah No.4, Sukasari,</p>
                        <p class="w-full md:w-[259px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-left md:text-right text-[#263E83]"> Kec. Sukasari, Kota Bandung,</p>
                        <p class="w-full md:w-[259px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-left md:text-right text-[#263E83]"> Jawa Barat 40152.</p>
                    </div>
                </div>

                <div class="flex flex-col md:flex-row justify-between mb-6">
                    <div class="mb-6 md:mb-0">
                        <p class="mb-3 lg:mb-5 w-full md:w-[285px] text-[16px] lg:text-[18px] font-semibold leading-[20px] lg:leading-[23.4px] text-[#263E83] text-left">
                            Invoiced to
                        </p>
                        <p class="w-full md:w-[285px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                            Yadi Sentosa
                        </p>
                        <p class="w-full md:w-[285px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">Jl. Contoh No. 123</p>
                        <p class="w-full md:w-[285px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">Kota Jakarta, Indonesia</p>
                        <p class="w-full md:w-[285px] text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">Email: mas.samsul@example.com</p>
                    </div>
                    <div class="text-left md:text-right">
                        <p class="flex justify-between items-center space-x-2 mb-3">
                            <span class="w-[114px] h-[23px] text-[14px] lg:text-[16px] text-left font-semibold leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                Invoice No :
                            </span>
                            <span class="h-[23px] text-[14px] lg:text-[16px] text-right font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                #A246281
                            </span>
                        </p>

                        <p class="flex justify-between items-center space-x-2 mb-3">
                            <span class="w-[114px] h-[23px] text-[14px] lg:text-[16px] text-left font-semibold leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                Invoice Date :
                            </span>
                            <span class="h-[23px] text-[14px] lg:text-[16px] text-right font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                24/08/24
                            </span>
                        </p>

                        <p class="flex justify-between items-center space-x-2">
                            <span class="w-[114px] h-[23px] text-[14px] lg:text-[16px] text-left font-semibold leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                Due Date :
                            </span>
                            <span class="h-[23px] text-[14px] lg:text-[16px] text-right font-normal leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                                24/08/24
                            </span>
                        </p>
                    </div>
                </div>

                <div class="text-center mb-8">
                    <p class="flex flex-col md:flex-row justify-center items-center space-y-2 md:space-y-0 md:space-x-4">
                        <span class="text-[18px] lg:text-[20px] font-bold leading-[24px] lg:leading-[26px] text-[#3C476C]">
                            Payment Due
                        </span>
                        <span id="payment-due-time" class="text-[18px] lg:text-[20px] font-bold leading-[24px] lg:leading-[26px] text-[#3C476C]">
                            Loading...
                        </span>
                    </p>
                </div>


                <div class="flex flex-col md:flex-row justify-between mb-8">
                    <div class="w-full md:w-1/2 mb-6 md:mb-0">
                        <div class="relative bg-white border border-transparent rounded-lg overflow-hidden h-full">
                            <div class="absolute inset-0 border-2 border-transparent rounded-lg pointer-events-none gradient-border"></div>
                            <div class="px-5 py-4" style="z-index: 100; position: relative;">
                                <h2 class="text-lg lg:text-xl font-bold leading-6 lg:leading-7 text-[#3C476C]">
                                    How to Pay Using Virtual Account (VA)
                                </h2>
                            </div>
                            <div class="px-6" style="z-index: 100; position: relative;">
                                <ol class="list-decimal pl-5 space-y-3 lg:space-y-4 text-sm lg:text-base font-normal leading-5 lg:leading-6 text-[#3C476C]">
                                    <li>
                                        <p class="text-base font-normal leading-6 text-[#3C476C]">
                                            Payment via ATM
                                        </p>
                                        <p class="mb-2 text-base font-normal leading-6 text-[#3C476C]">Steps:</p>
                                        <ul class="list-disc pl-5 space-y-1">
                                            <li>Insert your ATM card and enter your PIN.</li>
                                            <li>Select "Other Transactions" > "Payment" > "Others" > "Virtual Account".</li>
                                            <li>Enter the following Virtual Account number:</li>
                                            <li>Virtual Account Number: 12345 67890 1122334455</li>
                                            <li>Amount: $106.70 (As per your invoice amount)</li>
                                            <li>Verify that the recipient's name is Awan Hosting and the amount is correct.</li>
                                            <li>Confirm the payment.</li>
                                            <li>Keep the receipt as proof of payment.</li>
                                        </ul>
                                    </li>
                                    <li>
                                        <p class="mb-2 text-base font-semibold leading-6 text-[#3C476C]">Payment via Mobile Banking</p>
                                        <p class="mb-2 text-base font-normal leading-6 text-[#3C476C]">Steps:</p>
                                        <ul class="list-disc pl-5 space-y-1 mb-5">
                                            <li>Open your mobile banking application.</li>
                                            <li>Select "Payment" > "Virtual Account".</li>
                                            <li>Enter the following Virtual Account number:</li>
                                            <li>Virtual Account Number: 12345 67890 1122334455</li>
                                            <li>Amount: $106.70</li>
                                            <li>Review the payment details displayed.</li>
                                            <li>Confirm the payment and enter your PIN or security code.</li>
                                            <li>Save the payment confirmation received from the app.</li>
                                        </ul>
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>


                    <div class="w-full md:w-[48%]">
                        <div class="w-full px-5 py-5 rounded-t-lg rounded-b-none opacity-100 bg-[radial-gradient(104.31%_150.2%_at_0%_22.79%,rgba(100,52,147,0.95)_23.63%,#4A6DCB_70.69%,#64D2F7_100%)] text-white">
                            <div class="flex justify-between items-center">
                                <h3 class="text-[20px] sm:text-[22px] lg:text-[23px] font-semibold leading-[26px] lg:leading-[29.9px] text-left text-[#FFFFFF]">Order Summary</h3>
                                <span class="px-2 py-1 text-[10px] sm:text-[11px] font-normal leading-[14px] lg:leading-[15.4px] rounded-full bg-[#DEDEDE] text-center text-[#525252]">
                                    1 Item
                                </span>
                            </div>
                        </div>
                        <div class="bg-white rounded-b-lg shadow-lg p-5 lg:p-6">
                            <div class="flex justify-between items-center mb-4">
                                <div>
                                    <h4 class="w-[285.4px] h-[23px] mb-3 gap-0 opacity-100 font-inter text-[16px] font-medium leading-[23.2px] text-left text-[#283252]">
                                        Cloud Hosting - Strato
                                    </h4>
                                    <p class="w-[285.4px] h-[23px] mb-1 gap-0 opacity-100 font-inter text-[16px] font-normal leading-[23.2px] text-left text-[#283252]">
                                        Example.id
                                    </p>
                                </div>
                            </div>
                            <div class="border-t pt-4">
                                <div class="flex justify-between mb-2">
                                    <span class="w-[64px] h-[23px] text-[16px] font-normal leading-[23.2px] text-center text-[#000000]">
                                        Subtotal
                                    </span>
                                    <span class="w-[52px] h-[23px] text-[16px] font-normal leading-[23.2px] text-center text-[#000000]">
                                        $14.99
                                    </span>
                                </div>
                                <div class="flex justify-between mb-2">
                                    <span class="w-[120px] h-[23px] text-[16px] font-normal leading-[23.2px] text-left text-[#000000]">
                                        VAT @ 11%
                                    </span>
                                    <span class="w-[41px] h-[23px] text-[16px] font-normal leading-[23.2px] text-center text-[#000000]">
                                        $1.65
                                    </span>
                                </div>

                                <hr class="my-4 border-gray-300">

                                <div class="flex justify-between items-center font-bold text-lg mt-4">
                                    <span class="w-[44px] h-[23px] text-[18px] font-bold leading-[23.4px] text-center text-[#000000]">
                                        Total
                                    </span>
                                    <span class="text-blue-600 flex items-center">
                                        <span class="w-[9px] h-[20px] text-[14px] font-normal leading-[20.3px] text-center text-[#4A6DCB]">
                                            $
                                        </span>
                                        <span class="w-[88px] h-[38px] text-[32px] font-bold leading-[38.4px] text-center text-[#4A6DCB]">
                                            16.64
                                        </span>
                                    </span>
                                </div>
                            </div>
                            <button class="mt-6 w-full h-[47px] px-[var(--Spacespace-16)] py-[var(--Spacespace-12)] gap-[var(--Spacespace-8)] bg-[#4A6DCB] text-[#F3F5FC] rounded-[8px] flex items-center justify-center opacity-100">
                                <span class="text-[16px] font-medium leading-[23.2px] text-center">
                                    Pay Now
                                </span>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-8 text-sm text-gray-600">
                    <p class="font-semibold list-decimal pl-4 w-full text-[14px] lg:text-[16px] leading-[20px] lg:leading-[23.2px] text-[#263E83] -ml-5">Notes :</p>
                    <ol class="list-decimal pl-4 w-full text-[14px] lg:text-[16px] leading-[20px] lg:leading-[23.2px] text-[#263E83]">
                        <li>Please make the payment by the due date to avoid any service interruptions.</li>
                        <li>If you have any questions about this invoice, please contact us at billing@awanhosting.com or call +62 21 1234 5678.</li>
                    </ol>
                </div>

                <div class="mt-8 text-center md:text-right">
                    <p class="w-full text-[20px] lg:text-[23px] font-bold leading-[26px] lg:leading-[29.9px] text-[#263E83]">
                        Thank you for your business!
                    </p>
                    <p class="w-full text-[20px] lg:text-[23px] font-bold leading-[26px] lg:leading-[29.9px] text-[#263E83]">
                        Awan Hosting
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<script>
    function updatePaymentDueTime() {
        const paymentDueElement = document.getElementById('payment-due-time');
        const options = {
            year: 'numeric',
            month: 'long',
            day: 'numeric',
            hour: '2-digit',
            minute: '2-digit',
            timeZoneName: 'short'
        };
        const now = new Date();

        // Format waktu ke zona waktu UTC+7
        const timeZoneOffset = 7 * 60 * 60 * 1000; // 7 jam dalam milidetik
        const localTime = new Date(now.getTime() + timeZoneOffset);
        paymentDueElement.textContent = localTime.toLocaleDateString('en-US', options);
    }

    // Panggil fungsi saat halaman dimuat
    document.addEventListener('DOMContentLoaded', updatePaymentDueTime);
</script>