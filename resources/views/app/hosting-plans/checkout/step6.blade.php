<div class="w-full">
    <h2 class="w-full md:w-auto lg:w-full h-[26px] text-[20px] font-[400] leading-[26px] text-left mb-2" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        STEP 6
    </h2>
    <h1 class="w-full md:w-auto lg:w-full h-[38px] text-[32px] font-[700] leading-[38.4px] text-left mb-8" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Payment
    </h1>


    <div class="flex flex-col lg:flex-row lg:space-x-8">
        <div class="w-full lg:w-1/2 mb-8 lg:mb-0">
            <div class="page-content-inner">
                <div class="flex-list-wrapper">
                    <!-- Header -->
                    <div class="flex-table-header">
                        <div class="container">
                            <h3 class="w-full md:w-auto h-[30px] text-[23px] font-[600] leading-[29.9px] text-left mb-4" style="color: #000000;">
                                Choose Payment Method
                            </h3>
                        </div>
                    </div>

                    @php
                    $instantPaymentLogos = [
                    'Paypal' => asset('assets/img/paymentlogo/paypal.svg'),
                    'Gopay' => asset('assets/img/paymentlogo/gopay.svg'),
                    'DANA' => asset('assets/img/paymentlogo/dana.svg'),
                    'ShopeePay' => asset('assets/img/paymentlogo/shopeepay.svg'),
                    'QRIS' => asset('assets/img/paymentlogo/qris.svg'),
                    'OVO' => asset('assets/img/paymentlogo/ovo.svg'),
                    ];

                    $bankLogos = [
                    'Mandiri' => asset('assets/img/paymentlogo/mandiri.svg'),
                    'BRI' => asset('assets/img/paymentlogo/bri.svg'),
                    'BNI' => asset('assets/img/paymentlogo/bni.svg'),
                    'BCA' => asset('assets/img/paymentlogo/bca.svg'),
                    'Permata' => asset('assets/img/paymentlogo/permata.svg'),
                    'BSI' => asset('assets/img/paymentlogo/bsi.svg'),
                    ];

                    $cardLogos = [
                    'Visa' => asset('assets/img/paymentlogo/visa.svg'),
                    'MasterCard' => asset('assets/img/paymentlogo/mastercard.svg'),
                    'JCB' => asset('assets/img/paymentlogo/jcb.svg'),
                    'American Express' => asset('assets/img/paymentlogo/americanexpress.svg'),
                    ];
                    @endphp

                    <div class="page-content-inner">
                        <div class="card-gradient p-5">
                            <div class="card-body">

                                <!-- Instant Payment Section -->
                                <div class="mb-6">
                                    <div class="mb-3">
                                        <h3 class="title is-6 dark-inverted flex items-center">
                                            <i class="iconify me-2" data-icon="ph:wallet-duotone"></i>
                                            Instant Payment
                                        </h3>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($instantPaymentLogos as $method => $logo)
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="payment_method" value="{{ strtolower($method) }}" class="sr-only peer">
                                            <div class="flex flex-col items-center p-4 bg-white border border-gray-200 rounded-lg transition-all duration-200 hover:border-blue-500 peer-checked:bg-blue-50 peer-checked:border-blue-500">
                                                <div class="h-12 w-32 mb-2 flex items-center justify-center">
                                                    <img src="{{ $logo }}" alt="{{ $method }}" class="h-8 object-contain">
                                                </div>
                                                <span class="font-medium text-center text-gray-800">{{ $method }}</span>
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Virtual Account Section -->
                                <div class="mb-6">
                                    <div class="mb-3">
                                        <h3 class="title is-6 dark-inverted flex items-center">
                                            <i class="iconify me-2" data-icon="ph:bank-duotone"></i>
                                            Virtual Account
                                        </h3>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($bankLogos as $bank => $logo)
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="payment_method" value="{{ strtolower($bank) }}_va" class="sr-only peer">
                                            <div class="flex flex-col items-center p-4 bg-white border border-gray-200 rounded-lg transition-all duration-200 hover:border-blue-500 peer-checked:bg-blue-50 peer-checked:border-blue-500">
                                                <div class="h-12 w-32 mb-2 flex items-center justify-center">
                                                    <img src="{{ $logo }}" alt="{{ $bank }}" class="h-8 object-contain">
                                                </div>
                                                <span class="font-medium text-center text-gray-800">{{ $bank }}</span>
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>

                                <!-- Credit Card Section -->
                                <div class="mb-6">
                                    <div class="mb-3">
                                        <h3 class="title is-6 dark-inverted flex items-center">
                                            <i class="iconify me-2" data-icon="ph:credit-card-duotone"></i>
                                            Credit Card
                                        </h3>
                                    </div>
                                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                                        @foreach($cardLogos as $card => $logo)
                                        <label class="relative cursor-pointer group">
                                            <input type="radio" name="payment_method" value="{{ strtolower(str_replace(' ', '_', $card)) }}" class="sr-only peer">
                                            <div class="flex flex-col items-center p-4 bg-white border border-gray-200 rounded-lg transition-all duration-200 hover:border-blue-500 peer-checked:bg-blue-50 peer-checked:border-blue-500">
                                                <div class="h-12 w-32 mb-2 flex items-center justify-center">
                                                    <img src="{{ $logo }}" alt="{{ $card }}" class="h-8 object-contain">
                                                </div>
                                                <span class="font-medium text-center text-gray-800">{{ $card }}</span>
                                            </div>
                                        </label>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

        <div class="w-full lg:w-1/2 lg:mt-[90px]">
            <div class="w-full h-[70px] p-[30px] pt-[0px] pb-[0px] gap-[10px] rounded-t-lg rounded-b-none opacity-100 bg-[radial-gradient(104.31%_150.2%_at_0%_22.79%,rgba(100,52,147,0.95)_23.63%,#4A6DCB_70.69%,#64D2F7_100%)] text-white">
                <div class="flex justify-between items-center">
                    <h3 class="mt-5 w-[176px] h-[30px] opacity-100 font-inter text-[23px] font-semibold leading-[29.9px] text-left text-[#FFFFFF]">Order Summary</h3>
                    <span class="mt-4 w-[70px] h-[15px] px-[15px] gap-[7px] rounded-full opacity-100 bg-[#DEDEDE] text-center font-inter text-[11px] font-normal leading-[15.4px] text-[#525252]">
                        1 Item
                    </span>
                </div>
            </div>
            <div class="bg-white rounded-b-lg shadow-lg p-6">
                <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-4">
                    <div>
                        <h4 class="w-full sm:w-[285.4px] h-[23px] mb-3 gap-0 opacity-100 font-inter text-[16px] font-medium leading-[23.2px] text-left text-[#283252]">
                            {{ $product_info }}
                        </h4>
                        <p id="p-domain-display" class="w-full sm:w-[285.4px] h-[23px] mb-1 gap-0 opacity-100 font-inter text-[16px] font-normal leading-[23.2px] text-left text-[#283252]">
                            Example.id
                        </p>
                    </div>
                </div>
                <div class="border-t pt-4">
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">Subtotal</span>
                        <span class="text-gray-700">Rp 10.000</span>
                    </div>
                    <div class="flex justify-between mb-2">
                        <span class="text-gray-700">VAT @ 11%</span>
                        <span class="text-gray-700">Rp 5.000</span>
                    </div>
                    <div class="flex justify-between items-center text-lg font-bold mt-4">
                        <span>Total</span>
                        <span class="flex items-center text-blue-600">
                            <span class="text-base">Rp.</span>
                            <span class="text-2xl ml-1">15.000</span>
                        </span>
                    </div>
                </div>
                <button
                    class="button h-button mt-5 w-full h-[47px] px-[16px] py-[12px] gap-[8px] bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-[#F3F5FC] hover:text-[#F3F5FC] active:text-[#F3F5FC] text-[16px] leading-[23.2px] font-['Inter'] font-medium text-center flex items-center justify-center opacity-100"
                    style="border: unset;">
                    <span class="text-[16px] font-medium leading-[23.2px] text-center">
                        Checkout
                    </span>
                    <svg class="w-5 h-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                </button>

            </div>
        </div>
    </div>
</div>

<script>
    /* ========================================================= */
    /*                      Perhitungan                          */
    /* ========================================================= */

    document.addEventListener('DOMContentLoaded', function() {
        // Get price data from session storage or initialize new empty object
        let orderData = {
            addons: {
                daily_backup: false,
                email_protection: false
            }
        };

        // Try to get existing data from session storage
        const existingData = sessionStorage.getItem('orderData');
        if (existingData) {
            const parsedData = JSON.parse(existingData);
            // Ensure addons object exists with default false values
            orderData = {
                ...parsedData,
                addons: {
                    daily_backup: false,
                    email_protection: false,
                    ...parsedData.addons
                }
            };
        }

        // Constants for prices - setiap opsi Rp 20.000
        const PRICE_CONFIG = {
            dns_management: 20000,
            whois: 20000,
            daily_backup: 20000,
            email_protection: 20000
        };

        const VAT_RATE = 0.11;

        // Reset all checkboxes to unchecked state initially
        function resetCheckboxes() {
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(checkbox => {
                checkbox.checked = false;
            });

            // Reset orderData
            orderData = {
                ...orderData,
                dns_management: false,
                whois: false,
                addons: {
                    daily_backup: false,
                    email_protection: false
                }
            };

            // Update session storage
            sessionStorage.setItem('orderData', JSON.stringify(orderData));
        }

        function hasSelectedOptions() {
            return orderData.dns_management ||
                orderData.whois ||
                orderData.addons?.daily_backup ||
                orderData.addons?.email_protection;
        }

        function calculateTotalPrice() {
            let subtotal = 0;
            let selectedOptions = [];

            if (orderData.dns_management) {
                subtotal += PRICE_CONFIG.dns_management;
                selectedOptions.push('DNS Management');
            }
            if (orderData.whois) {
                subtotal += PRICE_CONFIG.whois;
                selectedOptions.push('WHOIS Protection');
            }
            if (orderData.addons?.daily_backup) {
                subtotal += PRICE_CONFIG.daily_backup;
                selectedOptions.push('Daily Backup');
            }
            if (orderData.addons?.email_protection) {
                subtotal += PRICE_CONFIG.email_protection;
                selectedOptions.push('Email Protection');
            }

            console.log('Selected Options:', selectedOptions);
            console.log('Price Breakdown:', {
                dns_management: orderData.dns_management ? PRICE_CONFIG.dns_management : 0,
                whois: orderData.whois ? PRICE_CONFIG.whois : 0,
                daily_backup: orderData.addons?.daily_backup ? PRICE_CONFIG.daily_backup : 0,
                email_protection: orderData.addons?.email_protection ? PRICE_CONFIG.email_protection : 0,
                total_selected_options: selectedOptions.length,
                subtotal: subtotal
            });

            return subtotal;
        }

        function updateOrderSummary() {
            const subtotal = calculateTotalPrice();
            const vat = Math.round(subtotal * VAT_RATE);
            const total = subtotal + vat;

            const formatter = new Intl.NumberFormat('id-ID', {
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            const subtotalElement = document.querySelector('.flex.justify-between.mb-2:first-child .text-gray-700:last-child');
            const vatElement = document.querySelector('.flex.justify-between.mb-2:nth-child(2) .text-gray-700:last-child');
            const totalAmountElement = document.querySelector('.text-blue-600 .text-2xl');

            if (hasSelectedOptions()) {
                if (subtotalElement) {
                    subtotalElement.textContent = `Rp ${formatter.format(subtotal)}`;
                }
                if (vatElement) {
                    vatElement.textContent = `Rp ${formatter.format(vat)}`;
                }
                if (totalAmountElement) {
                    totalAmountElement.textContent = formatter.format(total);
                }
            } else {
                if (subtotalElement) {
                    subtotalElement.textContent = 'Rp 0';
                }
                if (vatElement) {
                    vatElement.textContent = 'Rp 0';
                }
                if (totalAmountElement) {
                    totalAmountElement.textContent = '0';
                }
            }
        }

        function handleCheckboxChange() {
            // Domain option checkboxes
            const dnsCheckbox = document.querySelector('input[name="dns_management"]');
            const whoisCheckbox = document.querySelector('input[name="whois"]');

            if (dnsCheckbox) {
                dnsCheckbox.addEventListener('change', function() {
                    orderData.dns_management = this.checked;
                    sessionStorage.setItem('orderData', JSON.stringify(orderData));
                    updateOrderSummary();
                });
            }

            if (whoisCheckbox) {
                whoisCheckbox.addEventListener('change', function() {
                    orderData.whois = this.checked;
                    sessionStorage.setItem('orderData', JSON.stringify(orderData));
                    updateOrderSummary();
                });
            }

            // Addon checkboxes
            const backupCheckbox = document.querySelector('input[name="daily_backup"]');
            const emailProtectionCheckbox = document.querySelector('input[name="email_protection"]');

            if (backupCheckbox) {
                backupCheckbox.addEventListener('change', function() {
                    orderData.addons = orderData.addons || {};
                    orderData.addons.daily_backup = this.checked;
                    sessionStorage.setItem('orderData', JSON.stringify(orderData));
                    updateOrderSummary();
                });
            }

            if (emailProtectionCheckbox) {
                emailProtectionCheckbox.addEventListener('change', function() {
                    orderData.addons = orderData.addons || {};
                    orderData.addons.email_protection = this.checked;
                    sessionStorage.setItem('orderData', JSON.stringify(orderData));
                    updateOrderSummary();
                });
            }
        }

        // Initialize
        resetCheckboxes(); // Reset semua checkbox saat halaman dimuat
        handleCheckboxChange();
        updateOrderSummary();
    });
</script>