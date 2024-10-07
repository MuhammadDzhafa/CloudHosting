<div class="w-full">
    <h2 class="text-[20px] font-normal leading-[26px] text-left w-full md:w-auto lg:w-full" style="background: linear-gradient(104.31deg, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 26px;">
        STEP 4
    </h2>                                        
    <h1 class="text-[32px] font-bold leading-[38.4px] text-left mt-3 mb-7 w-full md:w-auto lg:w-full" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 38px;">
        Addons
    </h1>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mb-6">
        @foreach (['Daily Backup', 'Biennially', 'Triennialy'] as $plan)
        <div class="w-full md:w-auto lg:w-[308.93px] h-auto md:h-[140px] p-5 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold text-[#3C476C]">{{ $plan }}</span>
                <input type="radio" name="plan" class="form-radio h-5 w-5 text-[#4A6DCB]">
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