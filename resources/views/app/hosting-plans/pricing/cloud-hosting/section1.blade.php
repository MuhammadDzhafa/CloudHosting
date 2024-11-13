<div class="flex flex-col lg:flex-row bg-gradient-custom section-frame" style="padding: 100px 120px 0 120px;">
    <div class="w-full lg:w-1/2 pr-8 section-frame">
        <h1 class="text-[50px] font-bold leading-[60px] text-left text-white font-inter mb-4">
            Cloud Hosting
        </h1>

        <p class="mb-4 text-[18px] font-normal leading-[23.4px] text-left text-white font-inter">
            Adjust your resources on demand and scale effortlessly as your business evolves. Pay only for what you need, ensuring optimal efficiency and cost-effectiveness.
        </p>

        <img src="{{ asset('assets/img/cloudhosting/people.png') }}" alt="" class="w-[421.31px] h-[455px]">
    </div>

    <div class="w-full lg:w-1/2 h-[614px] bg-white text-gray-800 rounded-t-xl" style="padding: 30px 50px;">
        <h4 class="custom-title mt-1">Fulfill your needs with our</h4>
        <div class="custom-text-gradient mt-1">Customized Plan</div>

        <div class="custom-bg">
            <div class="flex flex-wrap w-full">
                <div class="custom-col">
                    <ul class="list-none p-0 flex flex-row space-x-4">
                        <li class="custom-text-style flex items-center">
                            <img src="{{ asset('assets/img/icons/checklist.svg') }}" alt="" class="custom-icon mr-2" />
                            Unlimited Domains, Unlimited Bandwidth, Unlimited Emails, Unlimited Inodes
                        </li>
                    </ul>
                </div>


                <div class="custom-col custom-col-2">
                    <!-- RAM Slider -->
                    <div class="custom-slider-section">
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
                                class="custom-slider">
                        </div>
                    </div>

                    <!-- CPU Slider -->
                    <div class="custom-slider-section">
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
                                class="custom-slider">
                        </div>
                    </div>

                    <!-- Storage Slider -->
                    <div class="custom-slider-section">
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
                                class="custom-slider">
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex justify-between items-center mb-4">
                <div class="text-2xl font-bold">
                    <span class="flex items-center justify-center">
                        <span class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">Rp</span>
                        <span id="total-price" class="h-[38px] gap-0 opacity-100 font-inter text-[32px] font-[700] leading-[38.4px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">{{ number_format($specs->price_RAM + $specs->price_CPU + $specs->price_storage) }}</span>
                        <span class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center text-[color:var(--Kazee-Primary-500,#4A6DCB)]">/mon</span>
                    </span>
                </div>
                <a href="/checkout">
                    <button class="custom-order-button mt-4 md:mt-0">
                        <span class="custom-order-text">Order Now</span>
                    </button>
                </a>
            </div>
            <p class="custom-note" style="margin-left: 30%;">
                Price does not include tax.
            </p>
        </div>
    </div>
</div>