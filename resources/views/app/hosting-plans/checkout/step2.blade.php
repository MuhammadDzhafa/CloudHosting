<div class="w-full">
    <!-- Header dan Judul -->
    <h2 class="text-[20px] font-[400] text-left leading-[26px] mb-2 w-full lg:w-full md:w-full"
        style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
        STEP 2
    </h2>

    <h1 class="text-3xl font-bold mb-8 text-transparent bg-clip-text w-full lg:w-full md:w-full"
        style="font-size: 32px; font-weight: 700; line-height: 38.4px; text-align: left; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Domain Configuration
    </h1>

    <!-- Main Container -->
    <div class="gradient-border w-full lg:w-full md:w-full p-6 md:p-8 lg:p-[30px] bg-white shadow-lg relative">
        <!-- Domain Display -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div class="flex flex-col items-start mb-4 md:mb-0">
                <h3 id="h3-domain-display" class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C]">
                    Example.id
                </h3>
            </div>
        </div>

        <!-- Grid untuk DNS Management dan Whois Protection -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- DNS Management Card -->
            <div class="card-gradient p-4 w-full" id="dns-whois-section">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[18px] font-[600] leading-[23.4px] text-left text-[#3C476C]">DNS Management</span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="checkbox" name="dns_management" value="1">
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

            <!-- Whois Protection Card -->
            <div class="card-gradient p-4 w-full">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[18px] font-[600] leading-[23.4px] text-left text-[#3C476C]">Whois Protection</span>
                    <label class="checkbox is-outlined is-circle is-info">
                        <input type="checkbox" name="whois" value="1">
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

        <!-- Hidden Inputs -->
        <input type="hidden" id="order_id" value="{{ $order_id ?? '' }}">
        <input type="hidden" id="domain_option_id" value="{{ $domain_option_id ?? '' }}">
        <input type="hidden" id="domain_price" value="{{ $price ?? 0 }}">
    </div>

    <!-- Notification -->
    <div id="notification" class="hidden fixed top-4 right-4 p-4 rounded-lg shadow-lg" style="z-index: 1000;">
        <div class="bg-green-500 text-white p-4 rounded">
            <span id="notification-message"></span>
        </div>
    </div>
</div>

<div class="w-full mt-8">
    <div class="gradient-border w-full lg:w-full md:w-full p-6 md:p-8 lg:p-[30px] bg-white shadow-lg relative">
        <h1 class="text-3xl font-bold mb-2 text-transparent bg-clip-text w-full lg:w-full md:w-full"
            style="font-size: 32px; font-weight: 700; line-height: 38.4px; text-align: left; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
            Do you want to buy hosting too?
        </h1>
        <h2 class="text-[20px] font-[400] text-left leading-[26px] w-full lg:w-full md:w-full mb-4"
            style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
            Enjoy quality hosting services at special prices! Only during the promo period
        </h2>
        <div class="flex gap-4">
            <button id="buy-domain-button" class="button h-button is-rounded">Buy domain only</button>
            <button id="buy-with-hosting" class="button h-button is-primary is-raised is-rounded">Yes! I want</button>
        </div>
    </div>
</div>