<div class="w-full" id="step-3-container">
    <h2 id="step-title" class="text-[20px] font-[400] text-left leading-[26px] mb-2 w-full lg:w-full md:w-full"
        style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
        STEP 3
    </h2>

    <h1 id="step-heading" class="text-[32px] font-[700] leading-[38.4px] text-left mb-6 w-full lg:w-full md:w-full"
        style="height: 38px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Hosting
    </h1>

    @php
    $planType = request()->query('plan');
    $orderId = request()->query('order_id');
    @endphp

    @if ($isCustomOrder)
    @foreach ($customPlans as $id)
    <div class="custom-plan gradient-border grey-border p-4"
        data-hosting-plan-id="{{ $id }}"
        id="custom-plan-{{ $id }}"
        onclick="toggleDropdown(this)">
        <h3 id="custom-plan-title-{{ $id }}" class="plan-title text-[20px] font-[700] leading-[26px] text-left mb-4 w-full"
            style="height: 23px; gap: 0px; opacity: 1; font-family: 'Inter'; color: #3C476C;">
            Custom Hosting Plan
        </h3>

        <div class="plan-specs mt-2 text-sm" id="custom-plan-specs-{{ $id }}">
            <div class="specs-list flex flex-wrap justify-start">
                <div class="spec-item text-left text-[14px] md:text-[16px] font-medium leading-[23.2px] text-[#3D3D3D] mr-4 mb-2">
                    <span>RAM {{ $customSpecs->current_RAM ?? $customSpecs->min_RAM ?? 'Default RAM' }} GB</span>
                </div>
                <div class="spec-item text-left text-[14px] md:text-[16px] font-medium leading-[23.2px] text-[#3D3D3D] mr-4 mb-2">
                    <span>CPU {{ $customSpecs->current_CPU ?? $customSpecs->min_CPU ?? 'Default CPU' }} Core</span>
                </div>
                <div class="spec-item text-left text-[14px] md:text-[16px] font-medium leading-[23.2px] text-[#3D3D3D] mr-4 mb-2">
                    <span>Storage {{ $customSpecs->current_storage ?? $customSpecs->min_storage ?? 'Default Storage' }} GB</span>
                </div>
            </div>
        </div>
    </div>

    <div class="pricing-section mt-4" id="pricing-section-custom-{{ $id }}">
        <div class="pricing-grid grid grid-cols-1 gap-4 mb-6" id="pricing-grid-{{ $id }}">
            @if (isset($customSpecs->total_price))
            @php
            $monthlyPrice = $customSpecs->total_price;
            $durations = [
            'Monthly' => 1,
            'Quarterly' => 3,
            'Semi-Annually' => 6,
            'Annually' => 12,
            'Biennially' => 24,
            ];
            $pricing = [];
            foreach ($durations as $duration => $multiplier) {
            $pricing[$duration] = $monthlyPrice * $multiplier;
            }
            @endphp

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                @foreach ($pricing as $duration => $price)
                @if ($loop->index < 3)
                    <div class="pricing-card card-gradient w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between"
                    id="pricing-card-{{ strtolower($duration) }}">
                    <div class="pricing-info flex justify-between items-center">
                        <span class="pricing-duration text-[14px] md:text-[16px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                            {{ $duration }}
                        </span>
                        <label class="checkbox is-outlined is-circle is-info">
                            <input type="checkbox" name="billing_period" data-id="{{ $id }}" data-custom="true"
                                data-price="{{ $price }}" value="{{ strtolower($duration) }}"
                                {{ $duration === 'Monthly' ? 'checked' : '' }}>
                            <span></span>
                        </label>
                    </div>
                    <div class="pricing-amount flex items-baseline">
                        <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">Rp</span>
                        <span class="amount text-[24px] md:text-[28px] font-bold leading-[38.4px] text-[#4A6DCB]">
                            {{ number_format($price, 0, ',', '.') }}
                        </span>
                        <span class="duration-label text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">
                            @if ($duration == 'Monthly') /monthly
                            @elseif ($duration == 'Quarterly') /quarterly
                            @elseif ($duration == 'Semi-Annually') /semi-annually
                            @elseif ($duration == 'Annually') /annually
                            @elseif ($duration == 'Biennially') /biennially
                            @endif
                        </span>
                    </div>
            </div>
            @endif
            @endforeach
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mx-auto w-full md:w-[600px]">
            @foreach ($pricing as $duration => $price)
            @if ($loop->index >= 3)
            <div class="card-gradient w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <span class="text-[14px] md:text-[16px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ $duration }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="checkbox"
                            name="billing_period"
                            data-id="{{ $id }}"
                            data-custom="true"
                            data-price="{{ $price }}"
                            value="{{ strtolower($duration) }}"
                            {{ $duration === 'Monthly' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">Rp</span>
                    <span class="text-[24px] md:text-[28px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($price, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        @if ($duration == 'Monthly') /monthly
                        @elseif ($duration == 'Quarterly') /quarterly
                        @elseif ($duration == 'Semi-Annually') /semi-annually
                        @elseif ($duration == 'Annually') /annually
                        @elseif ($duration == 'Biennially') /biennially
                        @endif
                    </span>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        @endif
    </div>
</div>
@endforeach
@else

@foreach ($hostingPlans as $plan)
@php
$isMatchingPlan = !request()->query('hosting_plan_id') ||
$plan->hosting_plans_id == request()->query('hosting_plan_id');
@endphp

@if (isset($specs[$plan->hosting_plans_id]) && $isMatchingPlan)
<div class="@if (!$loop->first) regular-plan grey-border @else regular-plan grey-border @endif rounded-[10px] p-10 md:p-6 mb-6 w-full lg:w-full md:w-full bg-white relative cursor-pointer"
    onclick="toggleDropdown(this)"
    data-hosting-plan-id="{{ $plan->hosting_plans_id }}">
    <h3 class="text-[20px] font-[700] leading-[26px] text-left mb-4 w-full"
        style="height: 23px; gap: 0px; opacity: 1; font-family: 'Inter'; color: #3C476C;">
        {{ $plan->product_type }} - {{ $specs[$plan->hosting_plans_id]['name'] }}
    </h3>

    <div class="mt-2 text-sm">
        <div class="flex flex-wrap justify-start">
            @foreach($specs[$plan->hosting_plans_id]['specifications'] as $spec)
            <div class="spec-item text-left text-[14px] md:text-[16px] font-medium leading-[23.2px] text-[#3D3D3D] mr-4 mb-2">
                <span>{{ $spec }}</span>
            </div>
            @endforeach
        </div>
    </div>
</div>

<!-- Dropdown untuk harga -->
<div class="dropdown-transition mt-4 @if ($loop->first) hidden @endif" data-hosting-plan-id="{{ $plan->hosting_plans_id }}">
    <div class="grid grid-cols-1 gap-4 mb-6">
        @php
        $planPriceChunks = $prices->where('hosting_plans_id', $plan->hosting_plans_id)->chunk(3);
        @endphp

        @foreach ($planPriceChunks as $chunkIndex => $chunk)
        @if ($chunk->count() === 2 && $chunkIndex === $planPriceChunks->count() - 1)
        <!-- Baris dengan 2 kartu di tengah -->
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mx-auto w-full md:w-[600px]">
            @foreach ($chunk as $price)
            <div class="card-gradient w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <span class="text-[14px] md:text-[16px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ ucfirst(str_replace('_', ' ', $price->duration)) }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="checkbox"
                            name="billing_period"
                            value="{{ $price->duration }}"
                            data-price="{{ $price->price_after }}"
                            data-hosting-plan-id="{{ $price->hosting_plans_id }}"
                            data-original-price="{{ $price->price }}"
                            data-discount="{{ $price->discount }}"
                            {{ $price->duration === 'monthly' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">Rp</span>
                    <span class="text-[24px] md:text-[28px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($price->price_after, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /{{ str_replace('_', ' ', $price->duration) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @else
        <!-- Baris dengan 1 atau 3 kartu -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            @foreach ($chunk as $price)
            <div class="card-gradient w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between">
                <div class="flex justify-between items-center">
                    <span class="text-[14px] md:text-[16px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ ucfirst(str_replace('_', ' ', $price->duration)) }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="checkbox"
                            name="billing_period"
                            value="{{ $price->duration }}"
                            data-price="{{ $price->price_after }}"
                            data-hosting-plan-id="{{ $price->hosting_plans_id }}"
                            data-original-price="{{ $price->price }}"
                            data-discount="{{ $price->discount }}"
                            {{ $price->duration === 'monthly' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">Rp</span>
                    <span class="text-[24px] md:text-[28px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($price->price_after, 0, ',', '.') }}
                    </span>
                    <span class="text-[10px] md:text-[12px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /{{ str_replace('_', ' ', $price->duration) }}
                    </span>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        @endforeach
    </div>
</div>
@endif
@endforeach
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Cek apakah ini custom order
        const isCustomOrder = @json($isCustomOrder ? true : false);

        // if (isCustomOrder) {
        //     // Jika custom order, nonaktifkan elemen-elemen tertentu
        //     const billingElements = document.querySelectorAll('input[name="billing_period"]');
        //     billingElements.forEach(el => {
        //         el.disabled = true;
        //     });
        // }
    });
</script>

</div>


<script>
    function toggleDropdown(element) {
        const hostingPlanId = element.getAttribute('data-hosting-plan-id');
        const isCustomPlan = element.classList.contains('custom-plan');

        if (!hostingPlanId && !isCustomPlan) {
            console.error('Hosting plan ID not found for the clicked element.');
            return;
        }

        // Periksa konten dropdown
        const dropdownContent = isCustomPlan ?
            document.querySelector(`#pricing-section-custom-${hostingPlanId}`) :
            document.querySelector(`.dropdown-transition[data-hosting-plan-id="${hostingPlanId}"]`);

        if (!dropdownContent || !dropdownContent.classList) {
            console.warn('No dropdown available for this plan. Skipping toggle logic.');
            return;
        }

        console.log('Dropdown content valid for hosting plan:', hostingPlanId || 'Custom Plan');

        // Reset semua elemen plan
        document.querySelectorAll('.regular-plan, .custom-plan').forEach(plan => {
            plan.removeAttribute('data-selected');
            plan.classList.remove('gradientstep-border');
            plan.classList.add('grey-border');
        });

        // Tandai elemen yang dipilih
        element.setAttribute('data-selected', 'true');
        element.classList.remove('grey-border');
        element.classList.add('gradientstep-border');
        selectedHostingPlanId = hostingPlanId || 'custom';
        console.log('Updated selectedHostingPlanId:', selectedHostingPlanId);

        // Tutup semua dropdown lain
        document.querySelectorAll('.dropdown-transition').forEach(section => {
            if (section !== dropdownContent) {
                section.classList.remove('show');
                section.classList.add('hidden');
            }
        });

        // Toggle dropdown untuk elemen yang diklik
        dropdownContent.classList.toggle('show');
        dropdownContent.classList.remove('hidden');

        // Handle untuk plan yang bukan custom
        if (!isCustomPlan) {
            const billingPeriods = dropdownContent.querySelectorAll('input[name="billing_period"]');
            let hasSelectedPeriod = false;

            // Periksa apakah salah satu opsi sudah dipilih
            billingPeriods.forEach(input => {
                if (input.checked) hasSelectedPeriod = true;
            });

            // Pilih opsi default jika belum ada yang dipilih
            if (!hasSelectedPeriod && billingPeriods.length > 0) {
                const monthlyOption = Array.from(billingPeriods).find(input => input.value === 'monthly');
                if (monthlyOption) {
                    monthlyOption.checked = true;
                    selectedBillingPeriod = monthlyOption.value;
                    console.log('Default billing period set:', selectedBillingPeriod);

                    // Simpan detail hosting
                    try {
                        saveHostingDetails();
                    } catch (error) {
                        console.error('Error saving default hosting details:', error);
                    }
                }
            }
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Pastikan semua dropdown selain yang aktif disembunyikan saat memuat halaman
        document.querySelectorAll('.dropdown-transition').forEach(dropdown => {
            if (!dropdown.classList.contains('show')) {
                dropdown.classList.add('hidden');
            }
        });

        // Auto-select card pertama
        const firstCard = document.querySelector('.regular-plan, .custom-plan');
        if (firstCard) {
            console.log('Auto-selecting the first card.');
            toggleDropdown(firstCard); // Panggil fungsi toggleDropdown untuk kartu pertama
        }
    });
</script>

<script>
    window.addEventListener('DOMContentLoaded', (event) => {
        // Pilih checkbox yang diinginkan, misalnya 'monthly'
        const monthlyCheckbox = document.querySelector('input[name="billing_period"][value="monthly"]');

        // Pastikan checkbox monthly tetap tercentang saat halaman dimuat
        if (monthlyCheckbox) {
            monthlyCheckbox.checked = true;
        }

        // Menambahkan event listener untuk memastikan hanya satu checkbox yang dipilih
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
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const parsedData = JSON.parse(localStorage.getItem("HostingDetails"));
        if (parsedData?.[0]) {
            // Mengatur elemen berdasarkan data yang ada di localStorage
            const hostingData = parsedData[0];

            document.getElementById('domain-name').value = hostingData.domain_name || '';  // Set domain name
            document.getElementById('billing-period').value = hostingData.billing_period || '';  // Set billing period
            document.getElementById('price').textContent = hostingData.price || '';  // Set price info

            // Menambahkan kondisi jika ada data spesifik lainnya
            if (hostingData.ram) {
                document.getElementById('ram').textContent = hostingData.ram;
            }
            if (hostingData.cpu) {
                document.getElementById('cpu').textContent = hostingData.cpu;
            }
            if (hostingData.storage) {
                document.getElementById('storage').textContent = hostingData.storage;
            }
        }
    });
</script>
