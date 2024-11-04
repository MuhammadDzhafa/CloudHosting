<div class="section-frame padding-6 bg-gradient-custom flex lg:flex-row gap-[30px] relative">

    <div class="columns w-full">
        <div class="column is-4">
            <!-- Text Container -->
            <div class="text-container gap-2">
                <p class="text-base-hero mb-0 text-white">Popular Domain</p>
                <h2 class="title-section text-white">Search Your <br />Domain Name</h2>
            </div>
        </div>

        <div class="column is-8" style="padding: 12px 0 12px 20px;">
            <!-- Search Input and Buttons -->
            <div class="flex flex-col flex-grow gap-4">
                <div class="flex flex-col md:flex-row justify-center gap-2">
                    <!-- Baris Pertama: Input Pencarian -->
                    <div class="field flex-grow h-full mb-0 md:w-[360px] lg:w-[1400px]">
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

                <!-- Search Results Dropdown -->
                <div id="dropdown-container" class="w-full mt-4 rounded-lg max-h-0 opacity-0 overflow-hidden">
                    <div id="dropdown-content" class="p-2 space-y-4">
                        <!-- Search results will be injected here -->
                    </div>
                </div>

                <div id="component-transfer" class="flex-table">
                    <div id="tld-results" class="hidden"> <!-- Tambahkan kelas hidden -->
                        <div class="flex flex-col items-center mb-4 md:mb-0 md:items-start">
                            <h3 id="h3-domain-display-1" class="text-[23px] font-[700] leading-[29.9px] text-center md:text-left text-[#fff]">Your domain search results</h3>
                        </div>
                    </div>

                    <div class="flex-table-container hidden" id="epp-input-container">
                        <div class="flex-table-item flex items-center w-full" style="align-items: center;">
                            <div class="flex flex-grow cell-start is-bold" data-th="Company">
                                <div class="field w-full">
                                    <div class="control">
                                        <input type="text" class="input w-full rounded-full" placeholder="Enter your EPP code here">
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
                                The domain has been successfully transferred
                            </div>
                        </div>
                    </div>
                </div>


                <div id="domain-container">
                    @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
                    <div class="domain-card card-gradient popular-domain" data-domain="{{ $domain }}">
                        <div class="card-content-product">
                            <p class="domain-name">{{ $domain }}</p>
                            <div class="price-container">
                                <span class="price-currency">Rp</span>
                                <span class="price-number">20</span>
                                <span class="price-currency">K</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="w-full flex justify-center lg:justify-end">
                    <a href="#" id="view-price-list"
                        class="text-[#FFFFFF] font-inter text-[18px] font-semibold no-hover inline-flex items-center">
                        View Price List
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg"
                            class="transform transition-transform duration-300 ml-1">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.07219 7.94719C5.44645 7.57294 6.05323 7.57294 6.42748 7.94719L11.4998 13.0195L16.5722 7.94719C16.9464 7.57294 17.5532 7.57294 17.9275 7.94719C18.3017 8.32145 18.3017 8.92823 17.9275 9.30248L12.1775 15.0525C11.8032 15.4267 11.1964 15.4267 10.8222 15.0525L5.07219 9.30248C4.69794 8.92823 4.69794 8.32145 5.07219 7.94719Z"
                                fill="white" />
                        </svg>
                    </a>
                </div>
            </div>
        </div>
        <div id="demo-right-actions-modal" class="modal h-modal">
            <div class="modal-background  h-modal-close"></div>
            <div class="modal-content">
                <div class="modal-card">
                    <header class="modal-card-head">
                        <h3>WHOIS Search Result</h3>
                        <button class="h-modal-close ml-auto" aria-label="close">
                            <i data-feather="x"></i>
                        </button>
                    </header>
                    <div class="modal-card-body">
                        <div class="inner-content">
                            <div id="whois-output"></div>
                        </div>
                    </div>
                    <div class="modal-card-foot is-centered">
                        <a class="button h-button is-primary is-raised is-rounded h-modal-close">OK</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SVG positioned in the bottom left corner -->
    <div class="absolute left-[139.5px] bottom-[-2px] hidden lg:block">
        <img src="/assets/img/bg/globewhite.svg" alt="" class="w-auto h-auto">
    </div>

</div>