<div class="section-frame padding-1 bg-gradient-custom flex flex-col justify-center items-center">
    <h2 class="title-section text-center text-white mb-4">
        Find Your Perfect Domain
    </h2>
    <p class="text-base-hero text-primary text-white text-center mb-10 lg:max-w-[800px] md:max-w-[400px]">
        Get personalized suggestions based on your preferences, explore available names, and secure the perfect match for your brand.
    </p>
    <!-- Search Input and Buttons -->
    <div class="flex flex-col flex-grow w-full">
        <div class="flex flex-col md:flex-row justify-center gap-2">
            <!-- Baris Pertama: Input Pencarian -->
            <div class="field flex-grow h-full mb-0 md:w-[360px] lg:w-[3600px]">
                <div class="control has-icon">
                    <input type="text" id="domain-search" class="input is-rounded search-input"
                        placeholder="Search...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>
            </div>

            <!-- Baris Kedua: Tombol -->
            <div class="flex flex-row w-full gap-2 md:gap-2">
                <button id="search-btn"
                    class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full w-1/2"
                    style="border: unset; padding:12px 16px;">
                    <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                        Search
                    </span>
                </button>

                <button id="search-button" class="button h-button rounded-full w-1/2"
                    style="border: unset; padding:12px 16px;">
                    <span class="material-icons mr-2" style="color:#2A4693; font-size:20px">&#xe428;</span>
                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#2A4693] text-center">
                        Transfer
                    </span>
                </button>
            </div>
        </div>

        <div id="domain-container" class="mt-6">
            @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
            <div class="domain-card card-gradient popular-domain" data-domain="{{ $domain }}">
                <div class="card-content-product">
                    <p class="domain-name">{{ $domain }}</p>
                    <div class="price-container">
                        <span class="price-currency">$</span>
                        <span class="price-number">1.99</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Search Results Dropdown -->
        <div id="dropdown-container" class="w-full mt-4 rounded-lg max-h-0 opacity-0 overflow-hidden">
            <div id="dropdown-content" class="p-2 space-y-4">
                <!-- Search results will be injected here -->
            </div>
        </div>

        <!-- Flex Table -->
        <div id="component-transfer" class="flex-table">
            <div id="tld-results" class="hidden">
                <div class="flex flex-col items-start mb-4 md:mb-0">
                    <h3 id="h3-domain-display" class="text-[23px] font-[700] leading-[29.9px] text-left text-[#fff]">Your domain search results</h3>
                </div>

                <!-- Table items hidden by default -->
                @foreach ($tlds as $tld)
                <div class="flex-table-container tld-item hidden">
                    <div class="flex-table-item mb-4 sm:mb-0">
                        <div class="flex-table-cell cell-start is-bold" data-th="TLD Name">
                            <span class="dark-text">{{ $tld->tld_name }}</span>
                        </div>
                        <div class="flex-table-cell cell-start" data-th="Category">
                            <span class="light-text">{{ $tld->category }}</span>
                        </div>
                        <div class="flex-table-cell">
                            <span class="light-text"></span>
                        </div>
                        <div class="flex-table-cell">
                            <span class="light-text"></span>
                        </div>
                        <div class="flex-table-cell" data-th="Price">
                            <span class="light-text">IDR {{ number_format($tld->tld_price, 0, ',', '.') }} / years</span>
                        </div>
                        <div class="flex-table-cell cell-end" data-th="Actions">
                            <span class="light-text">
                                <button id="transfer-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full" style="border: unset; padding:12px 16px;">
                                    <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe428;</span>
                                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                        Transfer
                                    </span>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach

                <div id="transfer-form" class="flex-table-container hidden">
                    <div class="flex-table-item flex items-center w-full" style="align-items: center;">
                        <div class="flex flex-grow cell-start is-bold" data-th="Company">
                            <div class="field w-full">
                                <div class="control">
                                    <input type="text" class="input w-full rounded-full mb-4 md:hidden" placeholder="Enter your EPP code here">
                                    <input type="text" class="hidden md:block input w-full rounded-full" placeholder="Enter your EPP code here">
                                </div>
                            </div>
                        </div>

                        <div class="flex-shrink-0 cell-end" data-th="Actions">
                            <span class="light-text">
                                <button id="continue-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full py-3 px-4 ml-2">
                                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                        Continue
                                    </span>
                                </button>
                            </span>
                        </div>
                    </div>
                    <!-- Pesan sukses -->
                    <div id="success-message" class="message is-success hidden mt-4">
                        <a class="delete" id="delete-message"></a>
                        <div class="message-body">
                            the domain has been successfully transferred
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>