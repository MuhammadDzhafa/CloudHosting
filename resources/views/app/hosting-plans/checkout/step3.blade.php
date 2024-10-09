<div class="w-full">
    <h2 class="text-[20px] font-[400] text-left leading-[26px] mb-2 w-full lg:w-full md:w-full" style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
        STEP 3
    </h2>

    <h1 class="text-[32px] font-[700] leading-[38.4px] text-left mb-6 w-full lg:w-full md:w-full"
        style="height: 38px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Hosting
    </h1>

    <div class="bg-white rounded-[10px] p-4 md:p-[20px] mb-6 w-full lg:w-full md:w-full"
        style="height: auto; gap: 20px; opacity: 1; background: #FFFFFF; 
    border-radius: 10px; 
    border: 2px solid transparent; border-image: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%) 1;
    box-shadow: 0px 14px 26px -12px #4A6DCB33, 0px 4px 23px 0px #4A6DCB1F, 0px 8px 10px -5px #A377CF33;">
        <h3 class="text-[20px] font-[700] leading-[26px] text-left mb-4 w-full"
            style="height: 23px; gap: 0px; opacity: 1; font-family: 'Inter'; color: #3C476C;">
            Cloud Hosting - Alto
        </h3>

        <div class="flex flex-wrap gap-2">
            @for ($i = 0; $i < 5; $i++)
                <div class="flex items-center">
                <svg class="w-5 h-5 text-green-500 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                </svg>
                <span class="block w-[140px] h-[23px] text-[16px] font-medium leading-[23.2px] text-[#3D3D3D]">
                    2 GB SSD Storage
                </span>
        </div>
        @endfor
    </div>
</div>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
    @foreach (['Annualy', 'Biennially', 'Triennially', 'Monthly', 'Quarterly', 'Semi-annualy'] as $plan)
    <div class="w-full md:w-[280px] h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between">
        <!-- Bagian atas card -->
        <div class="flex justify-between items-center">
            <span class="text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                {{ $plan }}
            </span>
            <label class="radio is-outlined is-info flex-shrink-0">
                <input type="radio" name="outlined_radio">
                <span></span>
            </label>
        </div>
        <div class="flex items-baseline">
            <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                $
            </span>
            <span class="text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                1.99
            </span>
            <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                /mon
            </span>
        </div>
        <!-- Bagian bawah card -->
        <div class="flex justify-between items-center">
            <span class="line-through text-gray-400 text-sm">$2.99 /mon</span>
            <span class="text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                Save 30%
            </span>
        </div>
    </div>
    @endforeach
</div>
</div>