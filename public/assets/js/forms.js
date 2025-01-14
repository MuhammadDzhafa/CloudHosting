"use strict";
$(document).ready(function () {
    // Setup AJAX CSRF token
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    if ($("#form-layout-5").length) {
        let currentStep = 0; // Ganti var s menjadi let i 
    
        // Event handler untuk checkbox addon
        $("#form-step-3 input[type='checkbox']").on('change', function() {
            calculateAndUpdateTotal();
        });
        

        // Setup awal fungsi saveAddon
        function saveAddon(callback) { 
            const isDailyBackupChecked = $('input[name="daily_backup"]').is(':checked');
            const isEmailProtectionChecked = $('input[name="email_protection"]').is(':checked');
        
            const data = {
                daily_backup: isDailyBackupChecked ? 1 : 0,
                email_protection: isEmailProtectionChecked ? 1 : 0,
                price: calculateAddonTotalPrice() || 0,
                domain_order_id: $('input[name="domain_order_id"]').val() || null
            };
        
            console.log('Addon Data to Send:', data);
        
            $.ajax({
                url: '/save-addons',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Content-Type': 'application/json',
                    'Accept': 'application/json'
                },
                data: JSON.stringify(data),
                dataType: 'json',
                success: function(response) {
                    console.log('Addon Save Response:', response);
                    
                    if (response.success) {
                        showNotification('Addon berhasil disimpan', 'success');
                        if (typeof callback === 'function') {
                            callback(true);
                        }
                    } else {
                        console.error('Addon save failed:', response.message);
                        showNotification(response.message || 'Gagal menyimpan addon', 'error');
                        if (typeof callback === 'function') {
                            callback(false);
                        }
                    }
                },
                error: function(xhr) {
                    console.error('Addon Save Error:', {
                        status: xhr.status,
                        responseText: xhr.responseText
                    });
                    
                    handleAjaxError(xhr);
                    
                    if (typeof callback === 'function') {
                        callback(false);
                    }
                }
            });
        }


        function saveDomainDetails(callback) {
            let orderId = $('#order_id').val();
            
            // Jika order_id kosong, generate baru
            if (!orderId) {
                orderId = 'ORD-' + Date.now();
                $('#order_id').val(orderId);
            }
        
            let basePrice = parseFloat($('#domain_price').val() || 0);
            
            // Menambahkan harga manajemen DNS jika dipilih
            if ($('input[name="dns_management"]').is(':checked')) {
                basePrice += 20000;
            }
            
            // Menambahkan harga WHOIS jika dipilih
            if ($('input[name="whois"]').is(':checked')) {
                basePrice += 20000;
            }
        
            const data = {
                order_id: orderId, 
                domain_name: $('#h3-domain-display').text().trim(),
                price: Math.round(basePrice),
                dns_management: $('input[name="dns_management"]').is(':checked') ? 1 : 0,
                whois: $('input[name="whois"]').is(':checked') ? 1 : 0,
                domain_option_id: $('#domain_option_id').val() || null
            };
        
            console.log('Data yang akan dikirim:', data);
        
            const DomainDetailsData = [data];
            localStorage.setItem('DomainDetails', JSON.stringify(DomainDetailsData));
        
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        
            $.ajax({
                url: '/save-domain-details',
                method: 'POST',
                data: data,
                success: function(response) {
                    if (response.success) {
                        if (typeof callback === 'function') {
                            callback(response.data);
                        }
                    } else {
                        console.error('Server mengembalikan error:', response);
                        alert(response.message || 'Terjadi kesalahan saat menyimpan data.');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Terjadi kesalahan:", xhr);
                    console.error("Status:", status);
                    console.error("Error:", error);
                    alert('Gagal menyimpan data domain. Silakan coba lagi.');
                }
            });
        }

// Global variables to track selections
let selectedHostingPlanId = null;
let selectedBillingPeriod = 'monthly';

const HostingHandler = {
    saveHostingDetails(callback) {
        const selectedPlanElement = document.querySelector('[data-selected="true"]');
        const selectedBillingElement = document.querySelector('input[name="billing_period"]:checked');

        if (!selectedPlanElement || !selectedBillingElement) {
            console.error('No selected plan or billing period found');
            return;
        }

        const isCustomPlan = selectedPlanElement.classList.contains('custom-plan');

        // Perbaikan: Ambil data yang lebih spesifik dari view
        const data = {
            hosting_plans_id: isCustomPlan 
                ? selectedPlanElement.getAttribute('data-id') 
                : selectedPlanElement.getAttribute('data-hosting-plan-id'),
            
            name: isCustomPlan 
                ? 'Custom Hosting Plan' 
                : selectedPlanElement.querySelector('.plan-title')?.textContent.trim(),
            
            plan_type: isCustomPlan ? 'custom' : 'regular',
            
            domain_name: document.querySelector('#domain-name')?.value || 'kazee.id',
            
            billing_period: selectedBillingElement.value,
            
            price: selectedBillingElement.getAttribute('data-price') || 
                   selectedBillingElement.dataset.price || 0,
            
            // Perbaikan ekstraksi spesifikasi
            ram: isCustomPlan 
                ? selectedPlanElement.querySelector('.spec-item:contains("RAM") span')?.textContent.split(' ')[1] 
                : selectedPlanElement.querySelector('.spec-item:nth-child(1) span')?.textContent.split(' ')[1] || 'Default',
            
            cpu: isCustomPlan 
                ? selectedPlanElement.querySelector('.spec-item:contains("CPU") span')?.textContent.split(' ')[1]
                : selectedPlanElement.querySelector('.spec-item:nth-child(2) span')?.textContent.split(' ')[1] || 'Default',
            
            storage: isCustomPlan 
                ? selectedPlanElement.querySelector('.spec-item:contains("Storage") span')?.textContent.split(' ')[1]
                : selectedPlanElement.querySelector('.spec-item:nth-child(3) span')?.textContent.split(' ')[1] || 'Default',
            
            active_date: new Date().toISOString().split('T')[0],
            expired_date: calculateExpiredDate(selectedBillingElement.value),
        };

        console.log('Data being sent to backend:', data);

        fetch('/save-hosting-details', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            },
            body: JSON.stringify(data),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(result => {
            console.log('Result from backend:', result);
            if (result.success) {
                showNotification('Hosting details saved successfully!', 'success');
                if (typeof callback === 'function') {
                    callback(result);
                }
            } else {
                showNotification(result.message || 'Failed to save hosting details', 'error');
            }
        })
        .catch(error => {
            console.error('Error saving hosting details:', error);
            showNotification('An error occurred while saving hosting details', 'error');
        });
    },

    determinePlanType() {
        const urlParams = new URLSearchParams(window.location.search);
        const planType = urlParams.get('plan');
        const orderId = urlParams.get('order_id');
        const hostingPlanId = urlParams.get('hosting_plan_id');

        // Tambahkan logging untuk debugging
        console.log('URL Parameters:', {
            planType,
            orderId,
            hostingPlanId
        });

        if (planType === 'custom') {
            return 'custom';
        } else if (hostingPlanId) {
            return 'specific';
        } else if (selectedHostingPlanId) {
            return 'regular';
        }
        return 'regular';
    }
};

function logHostingSelection() {
    const selectedPlan = document.querySelector('[data-selected="true"]');
    const selectedBilling = document.querySelector('input[name="billing_period"]:checked');

    console.log('Current Hosting Selection:', {
        plan: {
            id: selectedPlan?.getAttribute('data-hosting-plan-id') || selectedPlan?.getAttribute('data-id'),
            type: selectedPlan?.classList.contains('custom-plan') ? 'custom' : 'regular',
            name: selectedPlan?.querySelector('.plan-title')?.textContent.trim()
        },
        billing: {
            period: selectedBilling?.value,
            price: selectedBilling?.getAttribute('data-price')
        }
    });
}

function toggleDropdown(element) {
    const hostingPlanId = element.getAttribute('data-hosting-plan-id');
    const isCustomPlan = element.classList.contains('custom-plan');

    if (!hostingPlanId && !isCustomPlan) {
        console.error('Hosting plan ID not found for the clicked element.');
        return;
    }

    const dropdownContent = element.nextElementSibling;
    if (!isCustomPlan && (!dropdownContent || !dropdownContent.classList)) {
        console.warn('No dropdown available for this plan. Skipping toggle logic.');
        return;
    }

    console.log('Dropdown content valid for hosting plan:', hostingPlanId || 'Custom Plan');

    document.querySelectorAll('.regular-plan, .custom-plan').forEach(plan => {
        plan.removeAttribute('data-selected');
        plan.classList.remove('gradientstep-border');
        plan.classList.add('grey-border');
    });

    element.setAttribute('data-selected', 'true');
    selectedHostingPlanId = hostingPlanId || 'custom';
    console.log('Updated selectedHostingPlanId:', selectedHostingPlanId);

    if (!isCustomPlan) {
        const isCurrentlyOpen = dropdownContent.classList.contains('show');

        document.querySelectorAll('div[data-hosting-plan-id]').forEach(dropdown => {
            const dropdownSibling = dropdown.nextElementSibling;
            if (dropdownSibling && dropdownSibling.classList) {
                dropdownSibling.classList.remove('show');
            }
        });

        if (!isCurrentlyOpen) {
            dropdownContent.classList.add('show');
            element.classList.remove('grey-border');
            element.classList.add('gradientstep-border');
        }

        const billingPeriods = dropdownContent.querySelectorAll('input[name="billing_period"]');
        let hasSelectedPeriod = false;
        billingPeriods.forEach(input => {
            if (input.checked) hasSelectedPeriod = true;
        });

        if (!hasSelectedPeriod && billingPeriods.length > 0) {
            const monthlyOption = Array.from(billingPeriods).find(input => input.value === 'monthly');
            if (monthlyOption) {
                monthlyOption.checked = true;
                selectedBillingPeriod = monthlyOption.value;
                console.log('Default billing period set:', selectedBillingPeriod);

                // Mencoba menyimpan setelah mengatur default
                try {
                    setTimeout(() => {
                        saveHostingDetails(() => {
                            console.log('Default hosting details saved successfully');
                        });
                    }, 100);
                } catch (error) {
                    console.error('Error saving default hosting details:', error);
                }
            }
        }
    }
}

// Tambahkan di event listener DOMContentLoaded
document.addEventListener('DOMContentLoaded', function() {
    // Set default selections pada page load
    const defaultPlan = document.querySelector('.regular-plan');
    const defaultBilling = document.querySelector('input[name="billing_period"][value="monthly"]');

    if (defaultPlan) {
        defaultPlan.setAttribute('data-selected', 'true');
        defaultPlan.classList.add('gradientstep-border');
        defaultPlan.classList.remove('grey-border');
        // Trigger dropdown untuk default plan
        toggleDropdown(defaultPlan);
    }

    // Initialize hosting plan selection handlers
    document.querySelectorAll('.regular-plan, .custom-plan').forEach(plan => {
        plan.addEventListener('click', function() {
            // Remove selection from all plans
            document.querySelectorAll('.regular-plan, .custom-plan').forEach(p => {
                p.removeAttribute('data-selected');
                p.classList.remove('gradientstep-border');
                p.classList.add('grey-border');
            });

            // Set selection on clicked plan
            this.setAttribute('data-selected', 'true');
            this.classList.remove('grey-border');
            this.classList.add('gradientstep-border');

            // Show corresponding pricing options if needed
            if (this.classList.contains('regular-plan')) {
                toggleDropdown(this);
            }
        });
    });
    console.log('Hosting Plan Selection Initialized');
    logHostingSelection();

    // Initialize billing period handlers
    const checkboxes = document.querySelectorAll('input[name="billing_period"]');
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxes.forEach(cb => {
                    if (cb !== this && cb.name === 'billing_period') {
                        cb.checked = false;
                    }
                });
            }
        });
    });
});

function saveHostingDetails(callback) {
    const activePlan = document.querySelector('[data-selected="true"]');
    const selectedCheckbox = document.querySelector('input[name="billing_period"]:checked');

    if (!activePlan || !selectedCheckbox) {
        showNotification('Please select a hosting plan and billing period.', 'error');
        return;
    }

    const extractSpecValue = (specText) => {
        const specItems = activePlan.querySelectorAll('.spec-item');
        for (let item of specItems) {
            if (item.textContent.toLowerCase().includes(specText.toLowerCase())) {
                const spanElement = item.querySelector('span');
                if (spanElement) {
                    const match = spanElement.textContent.match(/(\d+)\s*(GB|Core)/);
                    return match ? match[1] : 'Default';
                }
            }
        }
        console.warn(`Spec "${specText}" not found.`);
        return 'Default';
    };

    const calculateExpiredDate = (billingPeriod) => {
        const periods = {
            monthly: 1,
            quarterly: 3,
            semi_annually: 6,
            annually: 12,
            biennially: 24,
        };
        const monthsToAdd = periods[billingPeriod.toLowerCase()] || 1;
        const date = new Date();
        date.setMonth(date.getMonth() + monthsToAdd);
        return date.toISOString().split('T')[0];
    };

    const nameElement = activePlan.querySelector('h3');
    const name = nameElement 
        ? nameElement.textContent.trim() 
        : (activePlan.classList.contains('custom-plan') 
            ? 'Custom Hosting Plan' 
            : 'Default Hosting Plan');

    const hostingData = {
        hosting_plans_id: activePlan.getAttribute('data-hosting-plan-id'), 
        name: name,
        domain_name: 'kazee.id',
        product_type: activePlan.classList.contains('custom-plan') ? 'Custom Cloud Hosting' : 'Cloud Hosting',
        plan_type: activePlan.classList.contains('custom-plan') ? 'custom' : 'regular',
        billing_period: selectedCheckbox.value,
        ram: extractSpecValue('RAM') + ' GB',
        cpu: extractSpecValue('CPU') + ' Core',
        storage: extractSpecValue('Storage') + ' GB',
        max_io: activePlan.getAttribute('data-max-io') || 'Unlimited',
        nproc: activePlan.getAttribute('data-nproc') || '1',
        entry_process: activePlan.getAttribute('data-entry-process') || '5',
        ssl: activePlan.getAttribute('data-ssl') || 'Yes',
        backup: activePlan.getAttribute('data-backup') || 'Yes',
        max_database: activePlan.getAttribute('data-max-database') || 'Unlimited',
        max_bandwidth: activePlan.getAttribute('data-max-bandwidth') || 'Unlimited',
        max_email_account: activePlan.getAttribute('data-max-email-account') || 'Unlimited',
        max_domain: activePlan.getAttribute('data-max-domain') || 'Unlimited',
        max_addon_domain: activePlan.getAttribute('data-max-addon-domain') || '0',
        max_parked_domain: activePlan.getAttribute('data-max-parked-domain') || '0',
        price: selectedCheckbox.dataset.price || 0,
        active_date: new Date().toISOString().split('T')[0],
        expired_date: calculateExpiredDate(selectedCheckbox.value),
    };

    console.log('Payload yang dikirim:', hostingData);

    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    if (!csrfToken) {
        showNotification('CSRF token not found. Please refresh the page.', 'error');
        return;
    }

    fetch('/save-hosting-details', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json',
        },
        body: JSON.stringify(hostingData),
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => {
                console.error('Server Error:', err);
                throw new Error(err.message || 'Server Error');
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('Parsed Response:', data);
        if (data.success) {
            showNotification('Hosting details saved successfully!', 'success');
            if (typeof callback === 'function') {
                callback();
            }
        } else {
            showNotification(data.message || 'An error occurred.', 'error');
        }
    })
    .catch(error => {
        console.error('Error saving hosting details:', error);
        showNotification(error.message || 'An unexpected error occurred.', 'error');
    });
}


function calculateExpiredDate(billingPeriod) {
    const currentDate = new Date();
    let expirationDate = new Date(currentDate);

    switch (billingPeriod) {
        case 'monthly':
            expirationDate.setMonth(currentDate.getMonth() + 1);
            break;
        case 'quarterly':
            expirationDate.setMonth(currentDate.getMonth() + 3);
            break;
        case 'semi-annually':
            expirationDate.setMonth(currentDate.getMonth() + 6);
            break;
        case 'annually':
            expirationDate.setFullYear(currentDate.getFullYear() + 1);
            break;
        case 'biennially':
            expirationDate.setFullYear(currentDate.getFullYear() + 2);
            break;
        default:
            break;
    }

    return expirationDate.toISOString().split('T')[0];
}

// Function to handle the different conditions
function handleConditions() {
    const allPlans = document.querySelectorAll('.regular-plan, .custom-plan');
    allPlans.forEach(plan => {
        plan.addEventListener('click', function() {
            const planType = this.classList.contains('custom-plan') ? 'custom' : 'regular';
            console.log('Plan Type:', planType);
            // Additional logic based on plan type can be added here
        });
    });
}

// Call the function to handle conditions
handleConditions();





        
        
        
        
        
        
        
        
        
        
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.classList.add('notification', `notification-${type}`);
            notification.style.position = 'fixed';
            notification.style.top = '20px';
            notification.style.right = '20px';
            notification.style.padding = '15px 25px';
            notification.style.borderRadius = '5px';
            notification.style.backgroundColor = type === 'success' ? '#4CAF50' : '#f44336';
            notification.style.color = 'white';
            notification.style.zIndex = '1000';
            notification.textContent = message;
        
            document.body.appendChild(notification);
        
            setTimeout(() => {
                notification.remove();
            }, 5000);
        }
        
        
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
        
            const ArrayBillingAddressData = [billingData];
            localStorage.setItem('BillingAddress', JSON.stringify(ArrayBillingAddressData));
        
            $.ajax({
                url: '/save-billing-address',
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    'Accept': 'application/json'
                },
                data: billingData,
                dataType: 'json',
                success: function(response) {
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
    
        // Fungsi untuk menyelesaikan order
        function completeOrder() {
            console.log("Order completed!");
            // Logika untuk menyelesaikan pesanan
        }
        // Buat variabel global
window.currentStep = 0;

// Definisikan proceedToNextStep sebagai fungsi global
window.proceedToNextStep = function() {
    const $button = $("#next-button");
    $button.addClass("is-loading");

    setTimeout(function() {
        $button.removeClass("is-loading");

        window.currentStep += 1;
        // Hanya menambahkan class is-active ke step berikutnya
        $("#form-step-" + window.currentStep).addClass("is-active");

        $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
        $("#step-segment-" + window.currentStep).addClass("is-active");
        $("#mobile-step-segment-" + window.currentStep).addClass("is-active");

        $("html, body").animate({
            scrollTop: $("#form-step-" + window.currentStep).offset().top
        }, 500);

        // Logika untuk menampilkan/menyembunyikan tombol Continue
        if (window.currentStep <= 1) {
            // Sembunyikan tombol di step 0 dan 1
            $("#next-button").hide();
        } else {
            // Tampilkan tombol di step 2 dan seterusnya
            $("#next-button").show();
        }

        if (window.currentStep === 5) {
            $("#next-button").text("Complete Order");
        }
    }, 800);
};

// Tambahkan inisialisasi awal untuk menyembunyikan tombol
$(document).ready(function() {
    // Sembunyikan tombol di step awal (0 dan 1)
    if (window.currentStep <= 1) {
        $("#next-button").hide();
    }
});

window.initializeNextButtonHandler = function() {
    console.log('Next button clicked. Current Step:', window.currentStep);
    $("#next-button").off('click').on("click", function() {
        const $button = $(this);
        $button.addClass("is-loading");

        const activeTab = $('.tabs ul li.is-active').data('tab');

        if (activeTab === 'hosting-only') {
            if (window.currentStep === 0) {
                window.currentStep = 1; // Mulai dari step 1 untuk hosting-only
                window.proceedToNextStep();
            } else if (window.currentStep === 1) {
                window.proceedToNextStep();
            } else if (window.currentStep === 2) {
                window.proceedToNextStep();
            } else if (window.currentStep === 3) {
                window.proceedToNextStep();
            } else if (window.currentStep === 4) {
                window.proceedToNextStep();
            } else {
                window.proceedToNextStep();
            }
        } else {
            switch(window.currentStep) {
                case 0:
                    window.proceedToNextStep();
                    break;
                case 1:
                    if ($("input[name='domain-choice']:checked").length === 0) {
                        showNotification('Please choose an option', 'error');
                        $button.removeClass("is-loading");
                        return;
                    }
                    window.proceedToNextStep(); 
                    break;
                case 2:
                    window.proceedToNextStep();
                    break;
                case 3:
                    window.proceedToNextStep();
                    break;
                case 4:
                    window.proceedToNextStep();
                    break;
                case 5:
                    completeOrder();
                    break;
            }
        }
        $button.removeClass("is-loading");
    });
};



$('#confirm-modal').on('click', '.confirm-button', function() {
    
    // Reset currentStep ke 0
    window.currentStep = 0;

    // Hapus class is-active dari semua form-section
    $(".form-section").removeClass("is-active");

    // Tambahkan class is-active ke step pertama
    $("#form-step-0").addClass("is-active");

    // Tampilkan kembali elemen-elemen yang relevan
    $(".stepper-form .steps-segment, .mobile-steps .steps-segment").removeClass("is-active");
    $("#step-segment-0").addClass("is-active");
    $("#mobile-step-segment-0").addClass("is-active");
    $("#next-button").text("Next");


    // Sembunyikan tombol Continue pada reset
    $("#next-button").hide();

    // Inisialisasi handler tombol next
    window.initializeNextButtonHandler();
});

// Initialize ketika document ready
$(document).ready(function() {
    window.initializeNextButtonHandler();
});



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

       // Handle Buy Domain Only button
$("#buy-domain-button").on('click', function (e) {
    e.preventDefault();
    if (buyDomainOnlyClicked || buyWithHostingClicked) return;  // Cek apakah tombol sudah diklik

    // Disable tombol lainnya
    $("#buy-with-hosting").prop("disabled", true);
    $(this).addClass("is-loading"); // Menambahkan efek loading di tombol "Buy Domain Only"
    buyDomainOnlyClicked = true;  // Tandai tombol ini telah diklik

    const $button = $("#next-button");
    $button.addClass("is-loading");

    if (!validateDomainStep()) {
        $button.removeClass("is-loading");
        $(this).removeClass("is-loading");
        return;
    }

    window.proceedToNextStep();
});

// Handle Buy With Hosting button
$("#buy-with-hosting").on('click', function (e) {
    e.preventDefault();
    if (buyWithHostingClicked || buyDomainOnlyClicked) return;  // Cek apakah tombol sudah diklik

    // Disable tombol lainnya
    $("#buy-domain-button").prop("disabled", true);
    $(this).addClass("is-loading"); // Menambahkan efek loading di tombol "Buy with Hosting"
    buyWithHostingClicked = true;  // Tandai tombol ini telah diklik

    const $button = $("#next-button");
    $button.addClass("is-loading");

    if (!validateDomainStep()) {
        $button.removeClass("is-loading");
        $(this).removeClass("is-loading");
        return;
    }

    window.proceedToNextStep();
});

window.handleCheckoutButtonClick = function() {
    const $button = $(".checkout-button");
    $button.addClass("is-loading");

    // Pastikan proses berjalan berurutan
    saveDomainDetails(function() {
        saveHostingDetails(function() {
            // Simpan addon saat tombol checkout diklik
            saveAddon(function(addonSaved) {
                if (!addonSaved) {
                    showNotification('Gagal menyimpan addon', 'error');
                    $button.removeClass("is-loading");
                    return;
                }

                saveBillingAddress(function() {
                    completeOrder(function() {
                        // Pastikan button loading dilepas di sini
                        $button.removeClass("is-loading");
                    });
                });
            });
        });
    });
};


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
        
        // Reset counter saat ganti tab
        $('.tabs li').on('click', function() {
            currentStep = 0; // Ganti i menjadi currentStep
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

