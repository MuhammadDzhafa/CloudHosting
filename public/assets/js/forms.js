"use strict";
$(document).ready(function () {
    // Setup AJAX CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($("#form-layout-5").length) {
        var i = 0; // Counter untuk step

        // Reset counter when switching tabs
        $('.tabs li').on('click', function () {
            i = 0; // Reset counter to 0 when switching tabs
        });

        // Handle main Continue button
        // Handle main Continue button
        $("#next-button").on("click", function () {
            // Check if we're in hosting-only tab
            if ($("#hosting-only").hasClass("is-active")) {
                // Langsung ke step 3 tanpa validasi
                i = 1; // Set counter to 2 so next step will be 3
                proceedToNextStep();
                return;
            }

            // Regular flow for other tabs
            if (i === 0) { // Jika berada di Step 1
                proceedToNextStep(); // Langsung ke Step 2
            } else if (i === 1) { // Jika berada di Step 2
                // Validate selection between "Yes, I want" or "Domain Only"
                if ($("input[name='domain-choice']:checked").length === 0) {
                    showNotification('Please choose an option', 'error');
                    return;
                }
                const selectedChoice = $("input[name='domain-choice']:checked").val();
                if (selectedChoice === "buy_with_hosting") {
                    // User chose "Yes, I want"
                    saveDomainDetails(function () {
                        proceedToNextStep(); // Ke Step 3
                    });
                } else {
                    // User chose "Domain Only"
                    saveDomainDetails(function () {
                        i = 4; // Set counter ke 4 untuk pindah ke step 5
                        proceedToNextStep(); // Ke Step 5
                    });
                }
            } else if (i === 4) { // Step 5 (Billing Address)
                saveBillingAddress(function () {
                    proceedToNextStep();
                });
            } else {
                proceedToNextStep(); // Untuk langkah lainnya
            }
        });

        // Fungsi untuk menyimpan detail domain (Step 2)
        function saveDomainDetails(callback) {
            // Calculate total price based on selections
            let basePrice = parseFloat($('#domain_price').val() || 0);

            // Add DNS management price if selected
            if ($('input[name="dns_management"]').is(':checked')) {
                basePrice += 20000;
            }

            // Add WHOIS price if selected
            if ($('input[name="whois"]').is(':checked')) {
                basePrice += 20000;
            }

            // Prepare the data
            const data = {
                order_id: $('#order_id').val(),
                domain_name: $('#h3-domain-display').text().trim(),
                price: Math.round(basePrice),
                dns_management: $('input[name="dns_management"]').is(':checked') ? 'yes' : 'no',
                whois: $('input[name="whois"]').is(':checked') ? 'yes' : 'no',
                domain_option_id: $('#domain_option_id').val() || null
            };

            // Log the data being sent
            console.log('Preparing to send domain data:', data);

            // Add CSRF token to request headers
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Send AJAX request
            $.ajax({
                url: '/save-domain-details',
                method: 'POST',
                data: data,
                success: function (response) {
                    console.log('Success response:', response);
                    if (response.success) {
                        // If callback exists, execute it
                        if (typeof callback === 'function') {
                            callback(response.data);
                        }
                    } else {
                        console.error('Server returned error:', response);
                        alert(response.message || 'Terjadi kesalahan saat menyimpan data.');
                    }
                },
                error: function (xhr, status, error) {
                    handleAjaxError(xhr, status, error);
                }
            });
        }

        // Fungsi untuk menyimpan billing address (Step 5)
function saveBillingAddress(callback) {
    // Validasi data terlebih dahulu
    const billingData = {
        street_address_1: $('input[name="street_address_1"]').val(),
        street_address_2: $('input[name="street_address_2"]').val(),
        city: $('input[name="city"]').val(),
        state: $('input[name="state"]').val(),
        country: $('select[name="country"]').val(), // Ubah ini untuk ambil nilai dari select
        company_name: $('input[name="company_name"]').val(),
        post_code: $('input[name="post_code"]').val(),
        billing_id: $('#billing_id').val() // Jika ada
    };

    console.log('Preparing to send billing data:', billingData);

    $.ajax({
        url: '/save-billing-address',
        method: 'POST',
        data: billingData,
        success: function (response) {
            console.log('Billing address response:', response);
            if (response.success) {
                if (typeof callback === 'function') {
                    callback();
                }
            } else {
                showNotification(response.message || 'Gagal menyimpan alamat penagihan', 'error');
            }
        },
        error: function (xhr, status, error) {
            console.error('Error saat menyimpan billing address:', {
                status: status,
                error: error,
                response: xhr.responseText
            });
            handleAjaxError(xhr, status, error);
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

                // Log the file and line if available
                if (response.file && response.line) {
                    console.error('Error in file:', response.file, 'line:', response.line);
                }
            } catch (e) {
                console.error('Error parsing error response:', e);
            }

            alert(errorMessage);
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

            // Validasi domain
            if (!validateDomainStep()) {
                $button.removeClass("is-loading");
                return;
            }

            saveDomainDetails(function () {
                i = 3; // Set counter ke 4 untuk pindah ke step 5
                proceedToNextStep(); // Pindah ke Step 5
            });
        });


        // Handle Buy With Hosting button
        $("#buy-with-hosting").on('click', function (e) {
            e.preventDefault();
            const $button = $("#next-button");
            $button.addClass("is-loading");

            // Validasi domain
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

        // Validasi untuk setiap step
        function validateCurrentStep() {
            switch (i) {
                case 0: // Step 1
                    // Add validation for step 1 if needed
                    return true;

                case 1: // Step 2 (Domain)
                    return validateDomainStep();

                case 2: // Step 3
                    // Add validation for step 3 if needed
                    return true;

                case 3: // Step 4
                    // Add validation for step 4 if needed
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

        // Function untuk melanjutkan ke step berikutnya
        function proceedToNextStep() {
            const $button = $("#next-button");
            $button.addClass("is-loading");

            setTimeout(function () {
                $button.removeClass("is-loading");

                // Hanya mengubah status aktif tanpa menyembunyikan step lainnya
                $(".form-step").removeClass("is-active");
                i += 1; // Increment step counter
                $("#form-step-" + i).addClass("is-active");

                // Update visual indicators
                $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
                $("#step-segment-" + i).addClass("is-active");
                $("#mobile-step-segment-" + i).addClass("is-active");

                // Scroll ke step yang aktif
                $("html, body").animate({
                    scrollTop: $("#form-step-" + i).offset().top
                }, 500);
            }, 800);

            // Update continue button text on last step
            if (i === 5) { // Assuming 5 is the last step
                $("#next-button").text("Complete Order");
            }
        }

        // Event handler untuk input fields
        $('input, select').on('input change', function () {
            $(this).removeClass('is-danger');
        });

        // Inisialisasi mask untuk input telepon
        if ($.fn.mask) {
            $('input[name="phone"]').mask('0000-0000-00000', {
                placeholder: "____-____-_____"
            });
        }
    }
});
