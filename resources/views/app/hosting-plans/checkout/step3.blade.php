<div class="w-full">
    <h2 class="text-[20px] font-[400] text-left leading-[26px] mb-2 w-full lg:w-full md:w-full" style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
        STEP 3
    </h2>

    <h1 class="text-[32px] font-[700] leading-[38.4px] text-left mb-6 w-full lg:w-full md:w-full"
        style="height: 38px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Hosting
    </h1>

    <div class="gradient-border rounded-[10px] p-4 md:p-[20px] mb-6 w-full lg:w-full md:w-full bg-white relative">
        <h3 class="text-[20px] font-[700] leading-[26px] text-left mb-4 w-full"
            style="height: 23px; gap: 0px; opacity: 1; font-family: 'Inter'; color: #3C476C;">
            {{ $product_info }}
        </h3>
        <div class="flex flex-wrap gap-2">
            @foreach ($specs as $spec)
            <div class="flex items-center">
                <img src="{{ asset('assets/img/icons/checklist.svg') }}"
                    alt="Checklist Icon"
                    class="lg:mr-2 md:mr-0">
                <span class="block text-[16px] font-medium leading-[23.2px] text-[#3D3D3D] lg:mr-4 md:mr-0">
                    {{ $spec['value'] }}
                </span>
            </div>
            @endforeach
        </div>
    </div>

    {{-- Container utama --}}
    <div class="container mx-auto px-4">
        {{-- Baris atas - 3 cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
            @foreach($prices->take(3) as $price)
            <div class="w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between card-gradient">
                <!-- Bagian atas card -->
                <div class="flex justify-between items-center">
                    <span class="text-[16px] sm:text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ ucfirst(str_replace('_', ' ', $price->duration)) }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="radio"
                            name="billing_period"
                            value="{{ $price->duration }}"
                            data-price="{{ $price->price_after }}"
                            {{ $price->duration === 'monthly' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[12px] sm:text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        Rp
                    </span>
                    <span class="text-[28px] sm:text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($price->price_after, 0, ',', '.') }}
                    </span>
                    <span class="text-[12px] sm:text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /{{ str_replace('_', ' ', $price->duration) }}
                    </span>
                </div>
                <!-- Bagian bawah card -->
                <div class="flex justify-between items-center">
                    <span class="line-through text-gray-400 text-[12px] sm:text-sm">
                        Rp {{ number_format($price->price, 0, ',', '.') }} /{{ $price->duration }}
                    </span>
                    <span class="text-[11px] sm:text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                        Save {{ $price->discount }}%
                    </span>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Baris bawah - 2 cards (centered) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 max-w-[600px] mx-auto">
            @foreach($prices->skip(3)->take(2) as $price)
            <div class="w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between card-gradient">
                <!-- Bagian atas card -->
                <div class="flex justify-between items-center">
                    <span class="text-[16px] sm:text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        {{ ucfirst(str_replace('_', ' ', $price->duration)) }}
                    </span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="radio"
                            name="billing_period"
                            value="{{ $price->duration }}"
                            data-price="{{ $price->price_after }}"
                            {{ $price->duration === 'monthly' ? 'checked' : '' }}>
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[12px] sm:text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        Rp
                    </span>
                    <span class="text-[28px] sm:text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        {{ number_format($price->price_after, 0, ',', '.') }}
                    </span>
                    <span class="text-[12px] sm:text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /{{ str_replace('_', ' ', $price->duration) }}
                    </span>
                </div>
                <!-- Bagian bawah card -->
                <div class="flex justify-between items-center">
                    <span class="line-through text-gray-400 text-[12px] sm:text-sm">
                        Rp {{ number_format($price->price, 0, ',', '.') }} /{{ $price->duration }}
                    </span>
                    <span class="text-[11px] sm:text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                        Save {{ $price->discount }}%
                    </span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

{{-- Hidden inputs for hosting plan data --}}
@if($hostingPlan)
<input type="hidden" name="hosting_plan_id" value="{{ $hostingPlan->hosting_plans_id }}">
<input type="hidden" id="hosting_product_type" value="{{ $hostingPlan->product_type }}">
<input type="hidden" id="hosting_package_type" value="{{ $hostingPlan->package_type }}">
<input type="hidden" id="hosting_max_io" value="{{ $hostingPlan->max_io }}">
<input type="hidden" id="hosting_nproc" value="{{ $hostingPlan->nproc }}">
<input type="hidden" id="hosting_entry_process" value="{{ $hostingPlan->entry_process }}">
<input type="hidden" id="hosting_ssl" value="{{ $hostingPlan->ssl }}">
<input type="hidden" id="hosting_backup" value="{{ $hostingPlan->backup }}">
<input type="hidden" id="hosting_max_database" value="{{ $hostingPlan->max_database }}">
<input type="hidden" id="hosting_max_bandwidth" value="{{ $hostingPlan->max_bandwidth }}">
<input type="hidden" id="hosting_max_email_account" value="{{ $hostingPlan->max_email_account }}">
<input type="hidden" id="hosting_max_domain" value="{{ $hostingPlan->max_domain }}">
<input type="hidden" id="hosting_max_addon_domain" value="{{ $hostingPlan->max_addon_domain }}">
<input type="hidden" id="hosting-specs" data-specs='@json($specs)'>
@endif