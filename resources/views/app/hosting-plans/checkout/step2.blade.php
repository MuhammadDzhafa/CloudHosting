<div class="w-full">
    <h2 class="text-[20px] font-[400]">
        STEP 2
    </h2>
    
    <h1 class="text-3xl font-bold mb-8 text-transparent bg-clip-text w-full lg:w-full md:w-full"
        style="font-size: 32px; font-weight: 700; line-height: 38.4px; text-align: left; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
        Domain Configuration
    </h1>
    
    <div class="w-full lg:w-full md:w-full p-6 md:p-8 lg:p-[30px] rounded-lg bg-white border-2 border-solid shadow-lg"
         style="border-image-source: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); border-image-slice: 1;">
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
            <div class="flex flex-col items-start mb-4 md:mb-0">
                <h3 class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C]">Example.id</h3>
                
                <div class="flex items-center mt-5">
                    <img src="/assets/img/icons/checkblack.svg" alt="Description" class="mr-2">
                    <span class="text-[16px] font-[500] leading-[23.2px] text-left text-[#3D3D3D]">2 GB SSD Storage</span>
                </div>
            </div>
            <button>
                <img src="/assets/img/icons/trash.svg" alt="" class="w-8 h-8">
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <!-- Card 1 -->
            <div class="border border-gray-200 rounded-lg p-4 w-full"
                style="border-radius: 10px; border: 0.68px solid #DEDEDE; background: #FFFFFF; box-shadow: 0px 1.75px 4px -1px #00000024;">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[18px] font-[600] leading-[23.4px] text-left text-[#3C476C]">DNS Management</span>
                    <label class="inline-flex items-center">
                        <input type="radio" name="plan" class="form-radio h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700"></span>
                    </label>
                </div>
                <div class="flex items-baseline mb-2">
                    <span class="text-[14px] font-[400] text-[#4A6DCB]">$</span>
                    <span class="text-[32px] font-[700] text-[#4A6DCB]">1.99</span>
                    <span class="text-[14px] font-[400] text-[#4A6DCB]">/mon</span>
                </div>
                <span class="text-[13px] font-[600] text-[#6C88D5]">Save 30%</span>
                <span class="text-[11px] font-[400] text-[#989EA0] line-through">$3.99 /mon</span>
            </div>
            
            <!-- Card 2 -->
            <div class="border border-gray-200 rounded-lg p-4 w-full"
                style="border-radius: 10px; border: 0.68px solid #DEDEDE; background: #FFFFFF; box-shadow: 0px 1.75px 4px -1px #00000024;">
                <div class="flex justify-between items-center mb-2">
                    <span class="text-[18px] font-[600] leading-[23.4px] text-left text-[#3C476C]">Whois Protection</span>
                    <label class="inline-flex items-center">
                        <input type="radio" name="plan" class="form-radio h-5 w-5 text-blue-600">
                        <span class="ml-2 text-gray-700"></span>
                    </label>
                </div>
                <div class="flex items-baseline mb-2">
                    <span class="text-[14px] font-[400] text-[#4A6DCB]">$</span>
                    <span class="text-[32px] font-[700] text-[#4A6DCB]">1.99</span>
                    <span class="text-[14px] font-[400] text-[#4A6DCB]">/mon</span>
                </div>
                <span class="text-[13px] font-[600] text-[#6C88D5]">Save 30%</span>
                <span class="text-[11px] font-[400] text-[#989EA0] line-through">$3.99 /mon</span>
            </div>
        </div>

        <div class="space-y-4">
            <div class="w-full h-[47px] px-5 flex items-center justify-between bg-white border border-[#DEDEDE] rounded-lg">
                <select id="occupation" name="occupation" class="w-full bg-transparent text-gray-500 focus:outline-none">
                    <option selected disabled>Select Occupation</option>
                </select>
            </div>
        
            <div>
                <p class="text-[16px] font-[400] leading-[23.2px] text-left w-full h-[23px] opacity-100 text-black font-inter">Contact Type</p>
                <div class="w-full h-[47px] px-5 flex items-center justify-between bg-white border border-[#DEDEDE] rounded-lg">
                    <select id="contact_type" name="contact_type" class="w-full bg-transparent text-gray-500 focus:outline-none">
                        <option selected disabled>Select Contact Type</option>
                    </select>
                </div>
            </div>
        
            <div>
                <p class="text-[16px] font-[400] leading-[23.2px] text-left w-full h-[23px] opacity-100 text-black font-inter">Identity Number</p>
                <div class="w-full h-[47px] px-5 flex items-center justify-between bg-white border border-[#DEDEDE] rounded-lg">
                    <input type="text" name="identity_number" id="identity_number" placeholder="Text" class="w-full bg-transparent text-gray-500 focus:outline-none">
                </div>
            </div>
        
            <div>
                <p class="text-[16px] font-[400] leading-[23.2px] text-left w-full h-[23px] opacity-100 text-black font-inter">Organization Type</p>
                <div class="w-full h-[47px] px-5 flex items-center justify-between bg-white border border-[#DEDEDE] rounded-lg">
                    <select id="organization_type" name="organization_type" class="w-full bg-transparent text-gray-500 focus:outline-none">
                        <option selected disabled>Select Organization Type</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</div>