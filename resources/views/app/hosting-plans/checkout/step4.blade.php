<div class="w-full">
    <h2 class="text-[20px] font-normal leading-[26px] text-left w-full md:w-auto lg:w-full" style="background: linear-gradient(104.31deg, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 26px;">
        STEP 4
    </h2>
    <h1 class="text-[32px] font-bold leading-[38.4px] text-left mt-3 mb-7 w-full md:w-auto lg:w-full" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent; height: 38px;">
        Addons
    </h1>

    <form id="addonsForm" class="mb-4">
        <input type="hidden" name="order_id" value="{{ $order_id }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-4 mb-6">
            <!-- Daily Backup Card -->
            <div class="w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between card-gradient">
                <div class="flex justify-between items-center">
                    <span class="text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        Daily Backup
                    </span>
                    <label class="checkbox is-outlined is-circle is-info flex-shrink-0">
                        <input type="checkbox"
                            name="daily_backup"
                            value="1"
                            class="addon-checkbox"
                            data-price="20000">
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        Rp
                    </span>
                    <span class="text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        20.000
                    </span>
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /mon
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="line-through text-gray-400 text-sm">Rp 28.000 /mon</span>
                    <span class="text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                        Save 30%
                    </span>
                </div>
            </div>

            <!-- Email Protection Card -->
            <div class="w-full h-[140px] p-4 rounded-[10px] border border-[#DEDEDE] bg-[#FFFFFF] shadow-[0px_1.75px_4px_-1px_#00000024] flex flex-col justify-between card-gradient">
                <div class="flex justify-between items-center">
                    <span class="text-[18px] font-semibold leading-[23.4px] text-[#3C476C] truncate max-w-[200px]">
                        Email Protection
                    </span>
                    <label class="checkbox is-outlined is-circle is-info flex-shrink-0">
                        <input type="checkbox"
                            name="email_protection"
                            value="1"
                            class="addon-checkbox"
                            data-price="20000">
                        <span></span>
                    </label>
                </div>
                <div class="flex items-baseline">
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        Rp
                    </span>
                    <span class="text-[32px] font-bold leading-[38.4px] text-[#4A6DCB]">
                        20.000
                    </span>
                    <span class="text-[14px] font-normal leading-[20.3px] text-[#4A6DCB]">
                        /mon
                    </span>
                </div>
                <div class="flex justify-between items-center">
                    <span class="line-through text-gray-400 text-sm">Rp 28.000 /mon</span>
                    <span class="text-[13px] font-semibold leading-[18.85px] text-[#6C88D5] bg-[#F5F7FF] px-2 py-1 rounded">
                        Save 30%
                    </span>
                </div>
            </div>
        </div>
    </form>
</div>
