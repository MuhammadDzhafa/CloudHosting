<div class="flex flex-col lg:flex-row bg-gradient-custom section-frame md:px-6 lg:px-[120px] lg:pt-[100px] md:pt-0" style="padding-bottom: unset;">
    <!-- Left Section -->
    <div class="w-full lg:w-1/2 lg:pr-8 mb-8 lg:mb-0">
        <h1 class="text-[32px] lg:text-[50px] font-bold leading-[40px] lg:leading-[60px] text-left text-white font-inter mb-4 md:text-center lg:text-left">
            Cloud Hosting
        </h1>

        <p class="mb-4 text-[16px] lg:text-[18px] font-normal leading-[20px] lg:leading-[23.4px] text-left text-white font-inter md:text-center lg:text-left">
            Adjust your resources on demand and scale effortlessly as your business evolves. Pay only for what you need, ensuring optimal efficiency and cost-effectiveness.
        </p>

        <img src="{{ asset('assets/img/cloudhosting/people.png') }}" alt="" class="w-[250px] lg:w-[421.31px] h-auto hidden md:block md:mx-auto lg:mx-0">
    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 h-auto bg-white text-gray-800 rounded-t-xl mt-8 lg:mt-0 p-5 lg:p-12 overflow-hidden">
    <h4 class="custom-title mt-1 text-center lg:text-left">Fulfill your needs with our</h4>
    <div class="custom-text-gradient mt-1 text-center lg:text-left">Customized Plan</div>

    <div class="custom-bg">
        <div class="flex flex-wrap w-full">
            <div class="custom-col w-full">
                <ul class="mb-4">
                    <li class="flex items-center mb-2 mt-5 text-left text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#465387] font-inter">
                        <img src="assets/img/icons/checklist.svg" alt="" class="mr-2">
                        Unlimited Domains, Bandwidth, Emails, Inodes
                    </li>
                </ul>
            </div>

            <div class="custom-col custom-col-2 w-full">
                <!-- RAM Slider -->
                <div class="custom-slider-section px-2 lg:px-0">
                    <div class="flex justify-between items-center mb-2">
                        <label class="font-bold text-gray-800">RAM</label>
                        <div id="ram-price" class="custom-price">Rp{{ number_format($specs->price_RAM) }}/mon</div>
                    </div>
                    <div class="flex items-center">
                        <div id="ram-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_RAM }} GB</div>
                        <input id="ram-slider" type="range"
                            min="{{ $specs->min_RAM }}"
                            max="{{ $specs->max_RAM }}"
                            step="1"
                            value="{{ $specs->min_RAM }}"
                            class="custom-slider flex-grow max-w-full">
                    </div>
                </div>

                <!-- CPU Slider -->
                <div class="custom-slider-section px-2 lg:px-0">
                    <div class="flex justify-between items-center mb-2">
                        <label class="font-bold text-gray-800">CPU</label>
                        <div id="cpu-price" class="custom-price">Rp{{ number_format($specs->price_CPU) }}/mon</div>
                    </div>
                    <div class="flex items-center">
                        <div id="cpu-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_CPU }} Core</div>
                        <input id="cpu-slider" type="range"
                            min="{{ $specs->min_CPU }}"
                            max="{{ $specs->max_CPU }}"
                            step="1"
                            value="{{ $specs->min_CPU }}"
                            class="custom-slider flex-grow max-w-full">
                    </div>
                </div>

                <!-- Storage Slider -->
                <div class="custom-slider-section px-2 lg:px-0">
                    <div class="flex justify-between items-center mb-2">
                        <label class="font-bold text-gray-800">Storage</label>
                        <div id="storage-price" class="custom-price">Rp{{ number_format($specs->price_storage) }}/mon</div>
                    </div>
                    <div class="flex items-center">
                        <div id="storage-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_storage }} GB</div>
                        <input id="storage-slider" type="range"
                            min="{{ $specs->min_storage }}"
                            max="{{ $specs->max_storage }}"
                            step="{{ $specs->step_storage }}"
                            value="{{ $specs->min_storage }}"
                            class="custom-slider flex-grow max-w-full">
                    </div>
                </div>
            </div>
        </div>

        <div class="flex flex-col md:flex-row justify-between items-center mb-4 w-full">
            <div class="text-2xl font-bold md:w-auto text-center md:text-left">
                <span class="flex items-center justify-center md:justify-start mt-5">
                    <span class="h-[20px] text-[14px] font-normal text-[color:var(--Kazee-Primary-500,#4A6DCB)]">Rp</span>
                    <span id="total-price" class="h-[38px] mt-3 text-[32px] font-bold text-[color:var(--Kazee-Primary-500,#4A6DCB)]">
                        {{ number_format($specs->price_RAM + $specs->price_CPU + $specs->price_storage) }}
                    </span>
                    <span class="h-[20px] text-[14px] font-normal text-[color:var(--Kazee-Primary-500,#4A6DCB)]">/mon</span>
                </span>
            </div>

            <a href="{{ url('/checkout') }}?hosting_plan_id={{ $hostingPlans->first()->hosting_plans_id }}&product_info={{ $hostingPlans->first()->product_type }} - {{ $hostingPlans->first()->name }}" class="md:w-auto mt-4 md:mt-0">
                <button class="custom-order-button w-full md:w-auto">
                    <span class="custom-order-text">Order Now</span>
                </button>
            </a>
        </div>

        <div class="flex justify-center items-center w-full mx-auto mt-8">
            <p class="text-center text-[16px] font-normal leading-[23.2px] text-[#7C7C7C] font-inter">
                Price does not include tax.
            </p>
        </div>
    </div>
</div>
</div>

<script>
    // Ambil nilai dari database dengan fallback values yang aman
    window.specs = {
    // RAM specs
    min_RAM: {{ $specs->min_RAM ?? 4 }},
    max_RAM: {{ $specs->max_RAM ?? 32 }},
    // Set multiplier dari database dengan fallback ke 2
    multiplier_RAM: {{ $specs->multiplier_RAM ?? 2 }},
    price_RAM: {{ $specs->price_RAM ?? 0 }},

    // CPU specs
    min_CPU: {{ $specs->min_CPU ?? 1 }},
    max_CPU: {{ $specs->max_CPU ?? 8 }},
    // Set multiplier dari database dengan fallback ke 2
    multiplier_CPU: {{ $specs->multiplier_CPU ?? 2 }},
    price_CPU: {{ $specs->price_CPU ?? 0 }},

    // Storage specs
    min_storage: {{ $specs->min_storage ?? 10 }},
    max_storage: {{ $specs->max_storage ?? 100 }},
    // Set step dari database dengan fallback ke 10
    step_storage: {{ $specs->step_storage ?? 10 }},
    price_storage: {{ $specs->price_storage ?? 0 }},
};


    // Debug: Log semua specs di awal
    console.log('Initial specs:', JSON.parse(JSON.stringify(window.specs)));

    function formatPrice(price) {
        return price.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    function generateMultiplierValues(min, max, multiplier) {
        // Convert string values to numbers
        min = parseFloat(min);
        max = parseFloat(max);
        multiplier = parseFloat(multiplier);

        console.log(`Generating multiplier values: min=${min}, max=${max}, multiplier=${multiplier}`);

        const values = [];
        let current = min;

        // Ensure we have at least min and max values
        values.push(min);

        // Generate values using multiplier
        while (current < max) {
            current *= multiplier;
            if (current <= max) {
                values.push(Math.round(current));
            }
        }

        // Ensure max is included if not already
        if (values[values.length - 1] !== max) {
            values.push(max);
        }

        // Remove duplicates and sort
        const uniqueValues = [...new Set(values)].sort((a, b) => a - b);
        console.log('Generated values:', uniqueValues);
        return uniqueValues;
    }

    function generateStepValues(min, max, step) {
        // Convert string values to numbers
        min = parseFloat(min);
        max = parseFloat(max);
        step = parseFloat(step);

        console.log(`Generating step values: min=${min}, max=${max}, step=${step}`);

        const values = [];
        for (let i = min; i <= max; i += step) {
            values.push(Math.round(i));
        }

        // Ensure max is included if not already
        if (values[values.length - 1] !== max) {
            values.push(max);
        }

        console.log('Generated values:', values);
        return values;
    }

    function getClosestValue(value, validValues) {
        // Ensure we're working with numbers
        value = parseFloat(value);
        return validValues.reduce((prev, curr) => {
            return Math.abs(curr - value) < Math.abs(prev - value) ? curr : prev;
        });
    }

    function calculatePrice(value, pricePerUnit, validValues) {
        const index = validValues.indexOf(parseInt(value));
        return index !== -1 ? pricePerUnit * (index + 1) : 0;
    }

    let ramValues, cpuValues, storageValues;

    function updateSliderValue(slider, validValues, unit) {
        if (!slider || !validValues || !validValues.length) return null;

        const value = parseFloat(slider.value);
        const closestValue = getClosestValue(value, validValues);

        // Update slider position
        slider.value = closestValue;

        // Update display value
        const valueElement = document.getElementById(slider.id.replace('-slider', '-value'));
        if (valueElement) {
            valueElement.textContent = `${closestValue} ${unit}`;
        }

        return closestValue;
    }

    function updateTotalPrice() {
        const ramSlider = document.getElementById('ram-slider');
        const cpuSlider = document.getElementById('cpu-slider');
        const storageSlider = document.getElementById('storage-slider');

        // Update each component
        const ramValue = updateSliderValue(ramSlider, ramValues, 'GB');
        const cpuValue = updateSliderValue(cpuSlider, cpuValues, 'Core');
        const storageValue = updateSliderValue(storageSlider, storageValues, 'GB');

        // Calculate prices
        const ramPrice = calculatePrice(ramValue, window.specs.price_RAM, ramValues);
        const cpuPrice = calculatePrice(cpuValue, window.specs.price_CPU, cpuValues);
        const storagePrice = calculatePrice(storageValue, window.specs.price_storage, storageValues);

        // Update price displays
        document.getElementById('ram-price').textContent = `Rp${formatPrice(ramPrice)}/mon`;
        document.getElementById('cpu-price').textContent = `Rp${formatPrice(cpuPrice)}/mon`;
        document.getElementById('storage-price').textContent = `Rp${formatPrice(storagePrice)}/mon`;

        // Update total price
        const totalPrice = ramPrice + cpuPrice + storagePrice;
        document.getElementById('total-price').textContent = formatPrice(totalPrice);
    }

    function initializeSlider(slider, validValues) {
        if (!slider || !validValues || !validValues.length) return;

        console.log(`Initializing ${slider.id} with values:`, validValues);

        // Configure slider
        slider.min = Math.min(...validValues);
        slider.max = Math.max(...validValues);
        slider.value = validValues[0];
        slider.step = 1; // Use 1 for smooth sliding

        // Remove existing listeners and add new one
        const newSlider = slider.cloneNode(true);
        slider.parentNode.replaceChild(newSlider, slider);
        newSlider.addEventListener('input', updateTotalPrice);

        // Log initialization
        console.log(`${slider.id} initialized with:`, {
            min: newSlider.min,
            max: newSlider.max,
            initial: newSlider.value,
            validValues: validValues
        });
    }

    function initializeSliders() {
        // Generate valid values
        ramValues = generateMultiplierValues(
            window.specs.min_RAM,
            window.specs.max_RAM,
            window.specs.multiplier_RAM
        );

        cpuValues = generateMultiplierValues(
            window.specs.min_CPU,
            window.specs.max_CPU,
            window.specs.multiplier_CPU
        );

        storageValues = generateStepValues(
            window.specs.min_storage,
            window.specs.max_storage,
            window.specs.step_storage
        );

        // Initialize sliders
        initializeSlider(document.getElementById('ram-slider'), ramValues);
        initializeSlider(document.getElementById('cpu-slider'), cpuValues);
        initializeSlider(document.getElementById('storage-slider'), storageValues);

        // Set initial prices
        updateTotalPrice();
    }

    // Initialize when DOM is ready
    if (document.readyState === "loading") {
        document.addEventListener("DOMContentLoaded", initializeSliders);
    } else {
        initializeSliders();
    }

    // Update the event listener for custom-order-btn
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('custom-order-btn').addEventListener('click', function(e) {
        e.preventDefault();

        // Get current slider values
        const ramValue = document.getElementById('ram-value').textContent.split(' ')[0];
        const cpuValue = document.getElementById('cpu-value').textContent.split(' ')[0];
        const storageValue = document.getElementById('storage-value').textContent.split(' ')[0];

        // Get price values (remove 'Rp' and '/mon', then parse)
        const ramPrice = parseInt(document.getElementById('ram-price').textContent.replace('Rp', '').replace(',', '').replace('/mon', ''));
        const cpuPrice = parseInt(document.getElementById('cpu-price').textContent.replace('Rp', '').replace(',', '').replace('/mon', ''));
        const storagePrice = parseInt(document.getElementById('storage-price').textContent.replace('Rp', '').replace(',', '').replace('/mon', ''));
        const totalPrice = parseInt(document.getElementById('total-price').textContent.replace(',', ''));

        // Setup AJAX request
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/save-custom-plan', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));

        // Prepare data payload
        const data = {
            type: 'custom',
            specs: {
                ram: parseInt(ramValue),
                cpu: parseInt(cpuValue),
                storage: parseInt(storageValue),
                details: {
                    ram_price: ramPrice,
                    cpu_price: cpuPrice,
                    storage_price: storagePrice
                }
            },
            total_price: totalPrice
        };

        xhr.onload = function() {
            if (xhr.status === 200) {
                const response = JSON.parse(xhr.responseText);
                if (response.success) {
                    // Redirect to checkout page with custom plan data
                    window.location.href = response.data.redirect_url;
                } else {
                    alert('Failed to process order. Please try again.');
                }
            } else {
                console.error('Error:', xhr.responseText);
                alert('An error occurred. Please try again.');
            }
        };

        xhr.onerror = function() {
            console.error('Request failed');
            alert('Network error occurred. Please try again.');
        };

        // Send the data
        xhr.send(JSON.stringify(data));
    });
});
</script>