<section class="section-frame padding-1 gap-6 md:gap-12" id="target-section">
    <h2 class="title-section text-center">
        Cloud Hosting
    </h2>
    <div class="container-project z-10">
        <div class="tabs-wrapper  is-triple-slider">
            <div class="tabs-inner">
                <div class="tabs" style="max-width: unset; background:unset; border:1px solid #DEDEDE;">
                    <ul>
                        <li data-tab="custom-tab" class="is-active"><a><span>Custom</span></a></li>
                        @foreach($hostingGroups as $group)
                        @if(
                        $hostingPlans->where('hosting_group_id', $group->hosting_group_id)
                        ->where('product_type', 'Cloud Hosting')
                        ->where('package_type', 'Regular') // Tambahkan kondisi untuk tipe paket
                        ->isNotEmpty()
                        )
                        <li data-tab="{{ strtolower(str_replace(' ', '-', $group->name)) }}-tab">
                            <a><span>{{ $group->name }}</span></a>
                        </li>
                        @endif
                        @endforeach
                        <!-- @foreach($hostingGroups as $group)
                            <li data-tab="{{strtolower(str_replace(' ', '-', $group->name))}}-tab">
                                <a><span>{{$group->name}}</span></a>
                            </li>
                        @endforeach -->
                        <li class="tab-naver" style="background:#4A6DCB;"></li>
                    </ul>
                </div>
            </div>
            <div id="custom-tab" class="tab-content is-active">
                <h4 class="custom-title text-center md:text-left mt-0 md:mt-5">
                    Fulfill your needs with our
                </h4>
                <div class="custom-text-gradient mt-0 lg:!mt-4">
                    Customized Plan
                </div>

                <div class="custom-bg">
                    <div class="flex flex-wrap w-full">
                        <div class="custom-col min-w-auto text-center lg:text-left mb-8 lg:mb-0">
                            <ul class="list-none p-0">
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    Unlimited Domains
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    <span class="hidden md:inline">Unlimited </span>Bandwidth
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    <span class="hidden md:inline">Unlimited </span>Emails
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    <span class="hidden md:inline">Unlimited </span>Inodes
                                </li>
                            </ul>
                        </div>

                        <!-- Slider section for Hosting Plan Customization -->
                        <div class="custom-col custom-col-2">
                            <!-- RAM Slider -->
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">RAM</label>
                                    <div id="ram-price" class="custom-price">Rp{{ number_format($specs->price_RAM) }}/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="ram-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_RAM }} GB</div>
                                    <input id="ram-slider" type="range" min="{{ $specs->min_RAM }}" max="{{ $specs->max_RAM }}" step="1" value="{{ $specs->min_RAM }}" class="custom-slider">
                                </div>
                            </div>

                            <!-- CPU Slider -->
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">CPU</label>
                                    <div id="cpu-price" class="custom-price">Rp{{ number_format($specs->price_CPU) }}/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="cpu-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_CPU }} Core</div>
                                    <input id="cpu-slider" type="range" min="{{ $specs->min_CPU }}" max="{{ $specs->max_CPU }}" step="1" value="{{ $specs->min_CPU }}" class="custom-slider">
                                </div>
                            </div>

                            <!-- Storage Slider -->
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">Storage</label>
                                    <div id="storage-price" class="custom-price">Rp{{ number_format($specs->price_storage) }}/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="storage-value" class="custom-slider-value text-center" style="width: 85px;">{{ $specs->min_storage }} GB</div>
                                    <input id="storage-slider" type="range" min="{{ $specs->min_storage }}" max="{{ $specs->max_storage }}" step="{{ $specs->step_storage }}" value="{{ $specs->min_storage }}" class="custom-slider">
                                </div>
                            </div>
                            <div class="flex flex-row items-center justify-between w-full">
                                <div class="custom-total-price">
                                    <span class="custom-dollar-sign">IDR</span>
                                    <span id="total-price" class="custom-total-amount"></span>
                                    <span class="custom-monthly">/mon</span>
                                </div>
                                <button type="button" id="custom-order-btn" class="custom-order-button">
                                    <span class="custom-order-text">
                                        Order Now
                                    </span>
                                </button>
                            </div>
                            <p class="custom-note mt-6">
                                Price does not include tax.
                            </p>
                        </div>
                    </div>
                </div>

            </div>


            @foreach ($hostingGroups as $group)
            <div id="{{ strtolower($group->name) }}-tab" class="tab-content">
                <div class="flex justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl">
                        @foreach ($hostingPlans->sortBy('hosting_plans_id') as $hostingPlan)
                        @if($hostingPlan->product_type === 'Cloud Hosting') <!-- Check product_type for each plan -->
                        @if($hostingPlan->hosting_group_id === $group->hosting_group_id && $hostingPlan->package_type === 'Regular')
                        <div
                            class="w-[300px] h-[469px] p-[30px] pb-[40px] gap-[30px] rounded-[16px] border border-[#4A6DCB] shadow-custom opacity-100 
                                                                                        {{ $hostingPlan->best_seller ? 'bg-gradient-custom text-white' : 'bg-white' }}">
                            <h5
                                class="text-xl font-bold mb-1 w-[240px] h-[26px] opacity-100 font-inter text-[20px] font-[700] leading-[26px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#4A6DCB]' }}">
                                {{ $hostingPlan->name }}
                            </h5>
                            <p
                                class="mb-2 w-[240px] h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-500,#7C7C7C)]' }}">
                                {{ $hostingPlan->description }}
                            </p>
                            @foreach($hostingPlan->prices as $price)
                            @if($price->duration === 'monthly')
                            <div class="price-container text-center">
                                <span class="flex items-center justify-center">
                                    <span
                                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">Rp</span>
                                    <span
                                        class="h-[38px] gap-0 opacity-100 font-inter text-[32px] font-[700] leading-[38.4px] text-center mx-2 {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">{{ number_format($price->price_after, 0, ',', '.') }}</span>
                                    <span
                                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">/mon</span>
                                </span>
                            </div>
                            <div class="mb-4 text-center">
                                <span
                                    class="w-[65px] h-[16px] gap-0 opacity-100 font-inter text-[11px] font-[400] leading-[15.95px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Grey-400,#989EA0)]' }} line-through">Rp
                                    {{ number_format($price->price, 0, ',', '.') }} /mon</span>
                                <span
                                    class="w-[51px] h-[15px] gap-0 opacity-100 font-inter text-[11px] font-[600] leading-[15.4px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-400,#6C88D5)]' }} ml-2">Save
                                    {{$price->discount}}%</span>
                            </div>
                            @endif
                            @endforeach
                            <ul class="list-none mb-6">
                                @foreach(['storage' => 'GB SSD Storage', 'RAM' => 'RAM', 'CPU' => 'Core CPU', 'max_domain' => 'Domain', 'ssl' => 'SSL'] as $key => $label)
                                <li class="flex items-center mb-2 w-[210px] h-[23px] gap-0 opacity-100 font-inter text-[16px] font-[500] leading-[23.2px] text-left {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-900,#3D3D3D)]' }}">
                                    <img src="/assets/img/icons/{{ $hostingPlan->best_seller ? 'checkwhite' : 'checkblack' }}.svg" alt="" class="w-[16.67px] h-[16.67px] relative top-[1.67px] left-[1.67px] opacity-100 mr-2">
                                    @if($key === 'max_domain')
                                    {{ $hostingPlan->max_domain }} {{ $label }}
                                    @elseif($key === 'ssl')
                                    {{ $hostingPlan->ssl }} {{ $label }}
                                    @else
                                    {{ isset($regularSpec[$hostingPlan->hosting_plans_id]) ? $regularSpec[$hostingPlan->hosting_plans_id]->$key : '' }} {{ $label }}
                                    @endif
                                </li>
                                @endforeach
                            </ul>
                            <div class="button-container">
                                <a href="{{ url('/checkout') }}?hosting_plan_id={{ $hostingPlan->hosting_plans_id }}&product_info={{ $hostingPlan->product_type }} - {{ $hostingPlan->name }}"
                                    class="button h-button is-outlined bg-[#FFF] hover:bg-[#4A6DCB] text-[#4A6DCB] active:bg-[#4A6DCB] rounded-full border-1 border-[#395FC6] hover:text-[#FFF] hover:border-[#4A6DCB] active:text-[#4A6DCB] active:border-[#4A6DCB] px-4 py-3"
                                    style="font-family: unset; width:100%">
                                    <span class="btn-text explore-button">Order Now</span>
                                </a>
                            </div>
                            <a href="/cloud-hosting"
                                class="block text-center {{ $hostingPlan->best_seller ? 'text-white hover:text-white' : 'text-[#4A6DCB] hover:text-[#4A6DCB]'  }} text-opacity-85 mt-4">
                                More detail →</a>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>

<script>
    window.specs = {
    // RAM specs
    min_RAM: {{ $specs->min_RAM ?? 4 }},
    max_RAM: {{ $specs->max_RAM ?? 32 }},
    multiplier_RAM: {{ $specs->multiplier_RAM ?? 2 }},
    price_RAM: {{ $specs->price_RAM ?? 0 }},

    // CPU specs
    min_CPU: {{ $specs->min_CPU ?? 1 }},
    max_CPU: {{ $specs->max_CPU ?? 8 }},
    multiplier_CPU: {{ $specs->multiplier_CPU ?? 2 }},
    price_CPU: {{ $specs->price_CPU ?? 0 }},

    // Storage specs
    min_storage: {{ $specs->min_storage ?? 10 }},
    max_storage: {{ $specs->max_storage ?? 100 }},
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