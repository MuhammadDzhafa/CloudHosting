<div class="flex flex-col lg:flex-row bg-gradient-custom section-frame md:px-6 lg:px-[120px] lg:pt-[100px] md:pt-0" style="padding-bottom: unset;">
    <!-- Left Section -->
    <div class="w-full lg:w-1/2 lg:pr-8 mb-8 lg:mb-0">
        <h1 class="text-[32px] lg:text-[50px] font-bold leading-[40px] lg:leading-[60px] text-left text-white font-inter mb-4 md:text-center lg:text-left">
            Cloud Hosting
        </h1>

        <p class="mb-4 text-[16px] lg:text-[18px] font-normal leading-[20px] lg:leading-[23.4px] text-left text-white font-inter md:text-center lg:text-left">
            Adjust your resources on demand and scale effortlessly as your business evolves. Pay only for what you need, ensuring optimal efficiency and cost-effectiveness.
        </p>

        <img src="{{ asset('assets/img/cloudhosting/people.png') }}" alt="" class="w-[250px] lg:w-[421.31px] h-auto hidden md:block md:mx-auto lg:mx-0">
    </div>

    <!-- Right Section -->
    <div class="w-full lg:w-1/2 h-auto bg-white text-gray-800 rounded-t-xl mt-8 lg:mt-0 p-6 lg:p-12 overflow-hidden">
        <h4 class="custom-title mt-1 text-center lg:text-left">Fulfill your needs with our</h4>
        <div class="custom-text-gradient mt-1 text-center lg:text-left">Customized Plan</div>

        <div class="custom-bg">
            <div class="flex flex-wrap w-full">
                <div class="custom-col w-full">
                    <ul class="mb-4">
                        <li class="flex items-center mb-2 mt-5 text-left text-[14px] lg:text-[16px] font-normal leading-[20px] lg:leading-[23.2px] text-[#465387] font-inter">
                            <img src="assets/img/icons/checklist.svg" alt="" class="mr-2">
                            Unlimited Domains, Bandwidth, Emails, Inodes
                        </li>
                    </ul>
                </div>

                <div class="custom-col custom-col-2 w-full">
                    <!-- RAM Slider -->
                    <div class="custom-slider-section px-2 lg:px-0">
                        <div class="flex justify-between items-center mb-2">
                            <label class="font-bold text-gray-800">RAM</label>
                            <div id="ram-price" class="custom-price">Rp{{ number_format($specs->price_RAM) }}/mon</div>
                        </div>
                        <div class="flex items-center">
                            <div id="ram-value" class="custom-slider-value text-center" style="width: 75px;">{{ $specs->min_RAM }} GB</div>
                            <input id="ram-slider" type="range"
                                min="{{ $specs->min_RAM }}"
                                max="{{ $specs->max_RAM }}"
                                step="1"
                                value="{{ $specs->min_RAM }}"
                                class="custom-slider flex-grow max-w-full">
                        </div>
                    </div>

                    <!-- CPU Slider -->
                    <div class="custom-slider-section px-2 lg:px-0">
                        <div class="flex justify-between items-center mb-2">
                            <label class="font-bold text-gray-800">CPU</label>
                            <div id="cpu-price" class="custom-price">Rp{{ number_format($specs->price_CPU) }}/mon</div>
                        </div>
                        <div class="flex items-center">
                            <div id="cpu-value" class="custom-slider-value text-center" style="width: 75px;">{{ $specs->min_CPU }} Core</div>
                            <input id="cpu-slider" type="range"
                                min="{{ $specs->min_CPU }}"
                                max="{{ $specs->max_CPU }}"
                                step="1"
                                value="{{ $specs->min_CPU }}"
                                class="custom-slider flex-grow max-w-full">
                        </div>
                    </div>

                    <!-- Storage Slider -->
                    <div class="custom-slider-section px-2 lg:px-0">
                        <div class="flex justify-between items-center mb-2">
                            <label class="font-bold text-gray-800">Storage</label>
                            <div id="storage-price" class="custom-price">Rp{{ number_format($specs->price_storage) }}/mon</div>
                        </div>
                        <div class="flex items-center">
                            <div id="storage-value" class="custom-slider-value text-center" style="width: 75px;">{{ $specs->min_storage }} GB</div>
                            <input id="storage-slider" type="range"
                                min="{{ $specs->min_storage }}"
                                max="{{ $specs->max_storage }}"
                                step="{{ $specs->step_storage }}"
                                value="{{ $specs->min_storage }}"
                                class="custom-slider flex-grow max-w-full">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-center mb-4 w-full">
                <!-- Harga di paling kiri -->
                <div class="text-2xl font-bold md:w-auto text-center md:text-left">
                    <span class="flex items-center justify-center md:justify-start mt-5"> <!-- Tambahkan mt-2 di sini -->
                        <span class="h-[20px] text-[14px] font-normal text-[color:var(--Kazee-Primary-500,#4A6DCB)]">Rp</span>
                        <span id="total-price" class="h-[38px] mt-3 text-[32px] font-bold text-[color:var(--Kazee-Primary-500,#4A6DCB)]">
                            {{ number_format($specs->price_RAM + $specs->price_CPU + $specs->price_storage) }}
                        </span>
                        <span class="h-[20px] text-[14px] font-normal text-[color:var(--Kazee-Primary-500,#4A6DCB)]">/mon</span>
                    </span>
                </div>

                <!-- Tombol Order di paling kanan -->
                <a href="/checkout" class="md:w-auto mt-4 md:mt-0">
                    <button class="custom-order-button w-full md:w-auto">
                        <span class="custom-order-text">Order Now</span>
                    </button>
                </a>
            </div>

            <!-- Versi untuk md -->
            <p class="custom-note text-center mt-4 ml-[25%] lg:hidden">
                Price does not include tax.
            </p>

            <!-- Versi untuk lg -->
            <p class="custom-note text-left mt-0 ml-[30%] hidden lg:block">
                Price does not include tax.
            </p>
        </div>
    </div>
</div>