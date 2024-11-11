"use strict";
$(document).ready(function () {
    // Setup AJAX CSRF token
    console.log('Order ID:', $('input[name="order_id"]').val());
    console.log('CSRF token:', $('meta[name="csrf-token"]').attr('content'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($("#form-layout-5").length) {
        let i = 0; // Ganti var s menjadi let i 
    
        // Event handler untuk checkbox addon
    $("#form-step-3 input[type='checkbox']").on('change', function() {
        console.log('Addon checkbox changed:', $(this).attr('name'), $(this).is(':checked'));
        calculateAndUpdateTotal();

        if ($("#form-step-3").hasClass("is-active")) {
            console.log("Step 3 is active, saving addons...");
            saveAddon(function() {
                console.log("Addon saved successfully");
            });
        }
    });

        // Setup awal fungsi saveAddon
        function saveAddon(callback) {
            // Konversi nilai checkbox ke boolean yang eksplisit
            const data = {
                order_id: $('input[name="order_id"]').val(),
                daily_backup: $('input[name="daily_backup"]').is(':checked') ? 1 : 0, // Konversi ke 1/0
                email_protection: $('input[name="email_protection"]').is(':checked') ? 1 : 0, // Konversi ke 1/0
                price: calculateAddonTotalPrice(),
                domain_order_id: $('input[name="domain_order_id"]').val() || null // Handle undefined
            };            
        
            console.log('Data yang akan dikirim:', data);
        
            $.ajax({
                url: '/save-addons',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json' // Tambahkan header ini
                },
                data: data,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        showNotification('Addon berhasil disimpan', 'success');
                        if (typeof callback === 'function') {
                            callback();
                        }
                    } else {
                        showNotification(response.message || 'Gagal menyimpan addon', 'error');
                    }
                },
                error: function(xhr) {
                    console.error('Error detail:', {
                        status: xhr.status,
                        statusText: xhr.statusText,
                        responseText: xhr.responseText
                    });
                    
                    // Tambahkan penanganan error yang lebih spesifik
                    if (xhr.status === 422) {
                        try {
                            const errors = JSON.parse(xhr.responseText);
                            let errorMessage = 'Validation error: ';
                            if (errors.errors) {
                                errorMessage += Object.values(errors.errors).flat().join(', ');
                            }
                            showNotification(errorMessage, 'error');
                        } catch (e) {
                            handleAjaxError(xhr);
                        }
                    } else {
                        handleAjaxError(xhr);
                    }
                }
            });
        }
        
        
    
        // Handle tombol continue
        $("#next-button").on("click", function() {
            const $button = $(this);
            $button.addClass("is-loading");
        
            const activeTab = $('.tabs ul li.is-active').data('tab');
        
            if (activeTab === 'hosting-only') {
                // Alur untuk hosting-only
                if (currentStep === 0) {
                    currentStep = 1; // Mulai dari step 1 untuk hosting-only
                    proceedToNextStep();
                } else if (currentStep === 1) {
                    // Simpan data hosting default
                    saveDefaultHostingDetails(function() {
                        proceedToNextStep();
                    });
                } else if (currentStep === 2) {
                    // Simpan detail hosting
                    saveHostingDetails(function() {
                        proceedToNextStep();
                    });
                } else if (currentStep === 3) {
                    // Simpan addon
                    saveAddon(function() {
                        proceedToNextStep();
                    });
                } else if (currentStep === 4) {
                    // Simpan billing address
                    saveBillingAddress(function() {
                        proceedToNextStep();
                    });
                } else {
                    // Untuk step selanjutnya, lanjutkan seperti biasa
                    proceedToNextStep();
                }
            } else {
                // Alur regular (new domain & transfer domain)
                switch(currentStep) {
                    case 0:
                        proceedToNextStep();
                        break;
                    case 1:
                        if ($("input[name='domain-choice']:checked").length === 0) {
                            showNotification('Please choose an option', 'error');
                            $button.removeClass("is-loading");
                            return;
                        }
                        saveDomainDetails(function() {
                            proceedToNextStep();
                        });
                        break;
                    case 2:
                        saveHostingDetails(function() {
                            proceedToNextStep();
                        });
                        break;
                    case 3:
                        saveAddon(function() {
                            proceedToNextStep();
                        });
                        break;
                    case 4:
                        saveBillingAddress(function() {
                            proceedToNextStep();
                        });
                        break;
                    case 5:
                        completeOrder();
                        break;
                }
            }
            $button.removeClass("is-loading");
        });

        // Fungsi untuk menyimpan detail domain (Step 2)
        function saveDomainDetails(callback) {
            let basePrice = parseFloat($('#domain_price').val() || 0);
        
            // Menambahkan harga manajemen DNS jika dipilih
            if ($('input[name="dns_management"]').is(':checked')) {
                basePrice += 20000;
            }
        
            // Menambahkan harga WHOIS jika dipilih
            if ($('input[name="whois"]').is(':checked')) {
                basePrice += 20000;
            }
        
            // Menyiapkan data
            const data = {
                order_id: $('#order_id').val(),
                domain_name: $('#h3-domain-display').text().trim(),
                price: Math.round(basePrice),
                dns_management: $('input[name="dns_management"]').is(':checked') ? 1 : 0,
                whois: $('input[name="whois"]').is(':checked') ? 1 : 0,
                domain_option_id: $('#domain_option_id').val() || null
            };
        
            console.log('Preparing to send domain data:', data); // Debug log
        
            $.ajax({
                url: '/save-domain-details',
                method: 'POST',
                data: data,
                success: function (response) {
                    console.log('Success response:', response);
                    if (response.success) {
                        console.log("Callback is being called."); 
                        if (typeof callback === 'function') {
                            callback(response.data);
                        }
                    } else {
                        console.error('Server returned error:', response);
                        alert(response.message || 'Terjadi kesalahan saat menyimpan data.');
                    }
                },
                error: function (xhr, status, error) {
                    console.error("Error occurred:", xhr);
                    handleAjaxError(xhr, status, error);
                }
            });
        }
        
        function saveHostingDetails(callback) {
            const specsElement = document.getElementById('hosting-specs');
            let specs = [];
        
            try {
                if (specsElement && specsElement.dataset.specs) {
                    specs = JSON.parse(specsElement.dataset.specs);
                }
            } catch (e) {
                console.error('Error parsing specs:', e);
            }
        
            // Ambil nilai name dari elemen <td> dengan id "hosting-plan-name"
            const name = document.getElementById('hosting-plan-name').dataset.name;
        
            // Collect domain name
            let domainName = $('#h3-domain-display').text().trim() || $('#domain_name').val().trim() || $('input[name="domain_name"]').val().trim();
            console.log('Domain Name:', domainName);
        
            let ram = 0, cpu = 0, storage = 0;
            specs.forEach(spec => {
                const value = spec.value;
                if (value.includes('GB RAM')) {
                    ram = parseInt(value);
                } else if (value.includes('Core CPU')) {
                    cpu = parseInt(value);
                } else if (value.includes('GB SSD Storage')) {
                    storage = parseInt(value);
                }
            });
        
            const selectedHostingPlanId = $('input[name="hosting_plan_id"]').val();
            const activeDate = getCurrentDate();
        
            const billingPeriod = $('input[name="billing_period"]:checked').val();
            console.log('Selected Billing Period:', billingPeriod);
        
            if (!billingPeriod) {
                showNotification('Billing period is required', 'error');
                $("#next-button").removeClass("is-loading");
                return;
            }
        
            const expiredDate = calculateExpiredDate(activeDate, billingPeriod);
            const periode = getPeriodeFromBillingPeriod(billingPeriod);
        
            if (!expiredDate || !periode) {
                showNotification('Invalid period or failed to calculate expiration date', 'error');
                $("#next-button").removeClass("is-loading");
                return;
            }
        
            if (!domainName || !selectedHostingPlanId) {
                showNotification('Domain name and hosting plan ID are required', 'error');
                $("#next-button").removeClass("is-loading");
                return;
            }
        
            const price = getPriceForSelectedPeriod();
            if (!price) {
                showNotification('Please select a billing period', 'error');
                $("#next-button").removeClass("is-loading");
                return;
            }
        
            // Ambil nilai product_type dari input hidden
            const productType = $('#type-hidden').val();
        
            const hostingData = {
                order_id: $('input[name="order_id"]').val(),
                hosting_plans_id: selectedHostingPlanId,
                domain_name: domainName,
                ram: ram,
                cpu: cpu,
                storage: storage,
                active_date: activeDate,
                expired_date: expiredDate,
                period: periode,
                price: price,
                product_type: productType,
                package_type: 'Regular',
                max_io: '0',
                nproc: '0',
                entry_process: '0',
                ssl: 'No',
                backup: 'No',
                max_database: '0',
                max_bandwidth: '0',
                max_email_account: '0',
                max_domain: '0',
                max_addon_domain: '0',
                max_parked_domain: '0',
                ssh: 'No',
                free_domain: 'No',
                name: name,
                _token: $('meta[name="csrf-token"]').attr('content')
            };
        
            console.log('Hosting Data:', hostingData);
        
            $.ajax({
                url: "/store-order-hosting-detail",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: hostingData,
                beforeSend: function() {
                    $("#next-button").addClass("is-loading");
                },
                success: function(response) {
                    console.log("Hosting save response:", response);
                    showNotification(response.message || 'Data hosting berhasil disimpan', 'success');
                    if (typeof callback === 'function') {
                        callback();
                    }
                },
                error: function(xhr) {
                    console.error("Hosting save error:", xhr);
                    const errorMsg = xhr.responseJSON?.message || xhr.responseJSON?.errors?.domain_name?.[0] || 'Gagal menyimpan data hosting';
                    showNotification(errorMsg, 'error');
                    $("#next-button").removeClass("is-loading");
                }
            });
        }
        
        // Helper functions
        function getCurrentDate() {
            return new Date().toISOString().split('T')[0];
        }
        
        function calculateExpiredDate(activeDate, billingPeriod) {
            const date = new Date(activeDate);
            const monthsMap = {
                'monthly': 1,
                'quarterly': 3,
                'semi_annually': 6,
                'annually': 12,
                'biennially': 24
            };
            const months = monthsMap[billingPeriod] || 0;
            date.setMonth(date.getMonth() + months);
            return date.toISOString().split('T')[0];
        }
        
        function getPeriodeFromBillingPeriod(billingPeriod) {
            const periodeMap = {
                'monthly': 'monthly',
                'quarterly': 'quarterly',
                'semi_annually': 'semi_annually',
                'annually': 'annually',
                'biennially': 'biennially'
            };
            return periodeMap[billingPeriod] || '';
        }
        
        function getPriceForSelectedPeriod() {
            try {
                const selectedPeriod = $('input[name="billing_period"]:checked');
                if (!selectedPeriod.length) {
                    console.log('No billing period selected');
                    return 0;
                }
        
                const cardElement = selectedPeriod.closest('.card-gradient');
                if (!cardElement.length) {
                    console.log('Card element not found');
                    return 0;
                }
        
                // Try to get price from data attribute
                let price = parseInt(cardElement.data('price'));
                if (price) {
                    console.log('Price from data attribute:', price);
                    return price;
                }
        
                // Try to find price in span elements
                const priceSpans = cardElement.find('span').filter(function() {
                    return $(this).text().includes('Rp');
                });
        
                if (priceSpans.length > 0) {
                    const mainPriceSpan = priceSpans.filter(function() {
                        return !$(this).hasClass('line-through') && 
                               !$(this).parent().hasClass('line-through');
                    }).first();
        
                    if (mainPriceSpan.length) {
                        const priceText = mainPriceSpan.text();
                        price = parseInt(priceText.replace(/[^\d]/g, ''));
                        if (price) {
                            console.log('Extracted price:', price);
                            return price;
                        }
                    }
                }
        
                // If still no price, try to find in text nodes
                cardElement.contents().each(function() {
                    if (this.nodeType === 3) { // Text node
                        const text = $(this).text();
                        if (text.includes('Rp')) {
                            const extracted = parseInt(text.replace(/[^\d]/g, ''));
                            if (extracted) {
                                price = extracted;
                                return false; // break loop
                            }
                        }
                    }
                });
        
                if (price) {
                    console.log('Final price found:', price);
                    return price;
                }
        
                // Last resort: try regex on all text
                const allText = cardElement.text();
                const priceMatch = allText.match(/Rp[.\s]*([0-9.,]+)/);
                if (priceMatch) {
                    price = parseInt(priceMatch[1].replace(/[.,]/g, ''));
                    console.log('Price from regex:', price);
                    return price;
                }
        
                console.log('No price found using any method');
                return 0;
        
            } catch (error) {
                console.error('Error getting price:', error);
                return 0;
            }
        }
        
        // Tambahkan event listener untuk radio button
        $('input[name="billing_period"]').on('change', function() {
            console.log('Radio button changed:', $(this).val());
            const price = getPriceForSelectedPeriod();
            console.log('Price after selection:', price);
        });
        
        // Debug function untuk memeriksa struktur card
        function debugPriceStructure() {
            $('.card-gradient').each(function(index) {
                console.log(`Card ${index + 1}:`);
                console.log('HTML:', $(this).html());
                console.log('Text content:', $(this).text());
                console.log('Radio button value:', $(this).find('input[name="billing_period"]').val());
                $(this).find('span').each(function(i) {
                    console.log(`Span ${i + 1}:`, {
                        text: $(this).text(),
                        classes: $(this).attr('class'),
                        hasPrice: $(this).text().includes('Rp')
                    });
                });
            });
        }
        
        // Panggil debug function saat dokumen ready
        $(document).ready(function() {
            debugPriceStructure();
            
            // Log radio button state
            console.log('Initial radio button state:', {
                total: $('input [name="billing_period"]').length,
                checked: $('input[name="billing_period"]:checked').length,
                values: $('input[name="billing_period"]').map(function() {
                    return {
                        value: $(this).val(),
                        checked: $(this).is(':checked')
                    };
                }).get()
            });
        });
        
        // Fungsi untuk menyimpan billing address (Step 5)
        function saveBillingAddress(callback) {
            const billingData = {
                street_address_1: $('input[name="street_address_1"]').val(),
                street_address_2: $('input[name="street_address_2"]').val(),
                city: $('input[name="city"]').val(),
                state: $('input[name="state"]').val(),
                country: $('input[name="country"]:checked').val(),
                company_name: $('input[name="company_name"]').val(),
                post_code: $('input[name="post_code"]').val()
            };
        
            if (!billingData.street_address_1) {
                showNotification('Alamat harus diisi', 'error');
                return;
            }
        
            console.log('Preparing to send billing data:', billingData);
        
            $.ajax({
                url: '/save-billing-address',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                data: billingData, // Send only the necessary billing data
                dataType: 'json',
                success: function(response) {
                    console.log('Billing address response:', response);
                    if (response.success) {
                        showNotification('Alamat penagihan berhasil disimpan', 'success');
                        if (typeof callback === 'function') {
                            callback();
                        }
                    } else {
                        showNotification(response.message || 'Gagal menyimpan alamat penagihan', 'error');
                    }
                },
                error: function(xhr, status, error) {
                    if (xhr.status === 422) {
                        const response = JSON.parse(xhr.responseText);
                        const messages = Object.values(response.errors).flat();
                        showNotification(messages.join('\n'), 'error');
                    } else {
                        handleAjaxError(xhr, status, error);
                    }
                }
            });
        }
        

        // Helper function untuk handle error
        function handleAjaxError(xhr, status, error) {
            console.error('Error details:', {
                status: status,
                error: error,
                xhr: xhr
            });

            let errorMessage = 'Terjadi kesalahan saat menyimpan data.';

            try {
                const response = JSON.parse(xhr.responseText);
                if (response.message) {
                    errorMessage = response.message;
                }

                if (response.errors) {
                    errorMessage += '\n' + Object.values(response.errors).join('\n');
                }

                if (response.file && response.line) {
                    console.error('Error in file:', response.file, 'line:', response.line);
                }
            } catch (e) {
                console.error('Error parsing error response:', e);
            }

            showNotification(errorMessage, 'error');
        }

        // Function untuk menampilkan notifikasi
        function showNotification(message, type = 'success') {
            const notification = $('#notification');
            const notificationMessage = $('#notification-message');

            notificationMessage.text(message);
            notification.removeClass('hidden');

            if (type === 'success') {
                notification.find('div').removeClass('bg-red-500').addClass('bg-green-500');
            } else {
                notification.find('div').removeClass('bg-green-500').addClass('bg-red-500');
            }

            setTimeout(() => {
                notification.addClass('hidden');
            }, 3000);
        }

        // Handle Buy Domain Only button
        $("#buy-domain-button").on('click', function (e) {
            e.preventDefault();
            const $button = $("#next-button");
            $button.addClass("is-loading");

            if (!validateDomainStep()) {
                $button.removeClass("is-loading");
                return;
            }

            saveDomainDetails(function () {
                i = 3;
                proceedToNextStep();
            });
        });

        // Handle Buy With Hosting button
        $("#buy-with-hosting").on('click', function (e) {
            e.preventDefault();
            const $button = $("#next-button");
            $button.addClass("is-loading");

            if (!validateDomainStep()) {
                $button.removeClass("is-loading");
                return;
            }

            saveDomainDetails(function () {
                proceedToNextStep();
            });
        });

        // Validasi untuk step domain
        function validateDomainStep() {
            const domainName = $('#h3-domain-display').text().trim();
            if (!domainName) {
                showNotification('Domain name is required', 'error');
                return false;
            }
            return true;
        }

        // Validasi untuk step addon
        function validateAddonStep() {
            // Optional: uncomment if you want to make addon selection mandatory
            /*
            const hasSelectedAddons = $("#form-step-3 input[type='checkbox']:checked").length > 0;
            if (!hasSelectedAddons) {
                showNotification('Please select at least one addon', 'error');
                return false;
            }
            */
            return true;
        }

        // Validasi untuk setiap step
        function validateCurrentStep() {
            switch (i) {
                case 0: // Step 1
                    return true;
                case 1: // Step 2 (Domain)
                    return validateDomainStep();
                case 2: // Step 3 (Addon)
                    return validateAddonStep();
                case 3: // Step 4
                    return true;
                case 4: // Step 5 (Billing)
                    return validateBillingStep();
                default:
                    return true;
            }
        }

        // Validasi untuk step billing
        function validateBillingStep() {
            const requiredFields = [
                'street_address_1',
                'city',
                'state',
                'country',
                'post_code'
            ];

            let isValid = true;
            let firstInvalidField = null;

            requiredFields.forEach(field => {
                let $field;
                if (field === 'country') {
                    $field = $(`select[name="${field}"]`);
                } else {
                    $field = $(`input[name="${field}"]`);
                }

                if (!$field.val()?.trim()) {
                    isValid = false;
                    $field.addClass('is-danger');
                    if (!firstInvalidField) {
                        firstInvalidField = $field;
                    }
                } else {
                    $field.removeClass('is-danger');
                }
            });

            if (!isValid) {
                showNotification('Please fill in all required fields', 'error');
                if (firstInvalidField) {
                    firstInvalidField.focus();
                }
                return false;
            }

            return true;
        }

        let currentStep = 0; // Gunakan variabel ini sebagai pengganti i
        
        function proceedToNextStep() {
            const $button = $("#next-button");
            $button.addClass("is-loading");

            setTimeout(function() {
                $button.removeClass("is-loading");

                $(".form-step").removeClass("is-active");
                currentStep += 1;
                $("#form-step-" + currentStep).addClass("is-active");

                $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
                $("#step-segment-" + currentStep).addClass("is-active");
                $("#mobile-step-segment-" + currentStep).addClass("is-active");

                $("html, body").animate({
                    scrollTop: $("#form-step-" + currentStep).offset().top
                }, 500);

                if (currentStep === 5) {
                    $("#next-button").text("Complete Order");
                }
            }, 800);
        }
        
        // Reset counter saat ganti tab
        $('.tabs li').on('click', function() {
            i = 0;
        });

        // Event handler untuk input fields
        $('input, select').on('input change', function () {
            $(this).removeClass('is-danger');
        });

        // Event handler untuk checkbox addon
        $("#form-step-3 input[type='checkbox']").on('change', function() {
            calculateAndUpdateTotal();
        });

        // Function untuk menghitung dan update total
        function calculateAndUpdateTotal() {
            let total = 0;
            $("#form-step-3 input[type='checkbox']:checked").each(function() {
                total += parseFloat($(this).data('price') || 0);
            });
            
            // Update display total jika ada elemen dengan id total-price
            if ($('#total-price').length) {
                $('#total-price').text(formatPrice(total));
            }
        }

        // Helper function untuk format harga
        function formatPrice(price) {
            return new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR'
            }).format(price);
        }

        // Inisialisasi mask untuk input telepon
        if ($.fn.mask) {
            $('input[name="phone"]').mask('0000-0000-00000', {
                placeholder: "____-____-_____"
            });
        }
    }
    
    // Helper function untuk menghitung total harga addon
    function calculateAddonTotalPrice() {
        let total = 0;
        if ($('#form-step-3 input[name="daily_backup"]').is(':checked')) {
            total += 20000;
        }
        if ($('#form-step-3 input[name="email_protection"]').is(':checked')) {
            total += 20000;
        }
        return total;
    }
});

