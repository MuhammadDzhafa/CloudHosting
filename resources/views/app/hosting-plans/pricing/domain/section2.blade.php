<div class="section-frame padding-6 bg-gradient-custom flex lg:flex-row gap-[30px] relative">
    <!-- Text Container -->
    <div class="text-container gap-2">
        <p class="text-base-hero mb-0 text-white">Popular Domain</p>
        <h2 class="title-section text-white">Search Your <br />Domain Name</h2>
    </div>

    <!-- Search Input and Buttons -->
    <div class="flex flex-col flex-grow gap-4">
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

        <div id="domain-container" class="flex flex-wrap justify-center items-center w-full ">
            @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
            <div class="card-domain popular-domain mx-auto" data-domain="{{ $domain }}">
                <div class="card-content-product">
                    <p class="text-normal text-[18px] text-[#643493]">{{ $domain }}</p>
                    <p class="text-center flex items-center">
                        <span class="price-currency text-[20px] font-semibold">$</span>
                        <span class="price-number ml-0 text-[26px] font-bold">1.99</span>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>

    <!-- SVG positioned in the bottom left corner -->
    <div class="absolute left-[139.5px] bottom-[-3px] hidden lg:block">
        <img src="/assets/img/bg/globewhite.svg" alt="" class="w-auto h-auto">
    </div>

</div>