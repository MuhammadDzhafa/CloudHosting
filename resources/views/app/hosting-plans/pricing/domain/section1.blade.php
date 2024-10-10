<div class="section-frame padding-1 bg-gradient-custom flex flex-col justify-center items-center">
    <h2 class="title-section text-center text-white mb-4">
        Find Your Perfect Domain
    </h2>
    <p class="text-base-hero text-primary w-[800px] text-white text-center mb-10" style="max-width: 800px;">
        Get personalized suggestions based on your preferences, explore available names, and secure the perfect match for your brand.
    </p>
    <!-- Search Input and Buttons -->
    <div class="flex flex-col flex-grow gap-4 w-full">
        <div class="flex justify-center flex-row gap-2">
            <div class="field flex-grow h-full mb-0">
                <div class="control has-icon">
                    <input type="text" id="domain-search" class="input is-rounded search-input" placeholder="Search...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>
            </div>
            <button id="search-btn" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                    Search
                </span>
            </button>
            <button class="button h-button rounded-full" style="border: unset; padding:12px 16px;">
                <span class="material-icons mr-2" style="color:#2A4693; font-size:20px">&#xe428;</span>
                <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#2A4693] text-center">
                    Transfer
                </span>

            </button>
        </div>

        <!-- Search Results Dropdown -->
        <div id="dropdown-container" class="w-full mt-4 rounded-lg max-h-0 opacity-0 overflow-hidden">
            <div id="dropdown-content" class="p-2 space-y-4">
                <!-- Search results will be injected here -->
            </div>
        </div>

        <div id="domain-container" class="flex justify-center items-stretch space-x-[10px] w-full mb-5">
            @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
            <div class="card-gradient popular-domain w-full p-[20px_0_0_0] rounded-[16px] border border-[#DEDEDE] bg-white shadow-[0_1px_3px_rgba(0,0,0,0.1)]" data-domain="{{ $domain }}">
                <div class="card-content-product">
                    <p class="text-[18px] text-[#643493] text-center">{{ $domain }}</p>
                    <p class="text-center flex items-center justify-center">
                        <span class="price-currency text-[20px] font-semibold">$</span>
                        <span class="price-number ml-0 text-[26px] font-bold">1.99</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>