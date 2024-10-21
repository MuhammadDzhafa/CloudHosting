<section class="section-frame padding-1 gap-6 md:gap-12" id="target-section">
    <h2 class="title-section text-center">
        Cloud Hosting
    </h2>
    <div class="container-project z-10">
        <div class="tabs-wrapper  is-triple-slider">
            <div class="tabs-inner">
                <div class="tabs" style="max-width: unset;">
                    <ul>
                        <li data-tab="custom-tab" class="is-active"><a><span>Custom</span></a></li>
                        @foreach($hostingGroups as $group)
                        @if(
                        $hostingPlans->where('hosting_group_id', $group->hosting_group_id)
                        ->where('product_type', 'Cloud Hosting')
                        ->where('package_type', 'Regular') // Tambahkan kondisi untuk tipe paket
                        ->isNotEmpty()
                        )
                        <li data-tab="{{ strtolower(str_replace(' ', '-', $group->name)) }}-tab">
                            <a><span>{{ $group->name }}</span></a>
                        </li>
                        @endif
                        @endforeach
                        <!-- @foreach($hostingGroups as $group)
                            <li data-tab="{{strtolower(str_replace(' ', '-', $group->name))}}-tab">
                                <a><span>{{$group->name}}</span></a>
                            </li>
                        @endforeach -->
                        <li class="tab-naver" style="background:#4A6DCB;"></li>
                    </ul>
                </div>
            </div>
            <div id="custom-tab" class="tab-content is-active">
                <h4 class="custom-title mt-5">
                    Fulfill your needs with our
                </h4>
                <div class="custom-text-gradient mt-4">
                    Customized Plan
                </div>

                <div class="custom-bg">
                    <div class="flex flex-wrap w-full">
                        <div class="custom-col">
                            <ul class="list-none p-0">
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    Unlimited Domains
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    Unlimited Bandwidth
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    Unlimited Emails
                                </li>
                                <li class="custom-text-style mt-5">
                                    <img src="/assets/img/icons/checklist.svg" alt="" class="custom-icon" />
                                    Unlimited Inodes
                                </li>
                            </ul>
                        </div>
                        <div class="custom-col custom-col-2">
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">RAM</label>
                                    <div id="ram-price" class="custom-price">Rp5000/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="ram-value" class="custom-slider-value text-center" style="width: 75px;">4
                                        GB</div>
                                    <input id="ram-slider" type="range" min="0" max="4" step="1" value="0"
                                        class="custom-slider">
                                </div>
                            </div>
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">CPU</label>
                                    <div id="cpu-price" class="custom-price">Rp5000/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="cpu-value" class="custom-slider-value text-center" style="width: 75px;">4
                                        Core</div>
                                    <input id="cpu-slider" type="range" min="0" max="4" step="1" value="0"
                                        class="custom-slider">
                                </div>
                            </div>
                            <div class="custom-slider-section">
                                <div class="flex justify-between items-center mb-2">
                                    <label class="font-bold text-gray-800">Storage</label>
                                    <div id="storage-price" class="custom-price">Rp5000/mon</div>
                                </div>
                                <div class="flex items-center">
                                    <div id="storage-value" class="custom-slider-value text-center"
                                        style="width: 75px;">120 GB</div>
                                    <input id="storage-slider" type="range" min="0" max="4" step="1" value="0"
                                        class="custom-slider">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row items-center w-full">
                        <!-- flex-col untuk mobile, flex-row untuk desktop -->
                        <div class="custom-total-price">
                            <span class="custom-dollar-sign">IDR</span>
                            <span id="total-price" class="custom-total-amount"></span>
                            <span class="custom-monthly">/mon</span>
                        </div>
                        <a href="/checkout" class="custom-order-button mt-4 md:mt-0">
                            <!-- Tambahkan mt-4 untuk margin-top di mobile -->
                            <span class="custom-order-text">
                                Order Now
                            </span>
                        </a>
                    </div>

                    <p class="custom-note">
                        Price does not include tax.
                    </p>
                </div>
            </div>


            @foreach ($hostingGroups as $group)
            <div id="{{ strtolower($group->name) }}-tab" class="tab-content">
                <div class="flex justify-center">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl">
                        @foreach ($hostingPlans as $hostingPlan)
                        @if($hostingPlan->product_type === 'Cloud Hosting') <!-- Check product_type for each plan -->
                        @if($hostingPlan->hosting_group_id === $group->hosting_group_id && $hostingPlan->package_type === 'Regular')
                        <div
                            class="w-[300px] h-[469px] p-[30px] pb-[40px] gap-[30px] rounded-[16px] border border-[#4A6DCB] shadow-custom opacity-100 
                                                                                        {{ $hostingPlan->best_seller ? 'bg-gradient-custom text-white' : 'bg-white' }}">
                            <h5
                                class="text-xl font-bold mb-1 w-[240px] h-[26px] opacity-100 font-inter text-[20px] font-[700] leading-[26px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#4A6DCB]' }}">
                                {{ $hostingPlan->name }}
                            </h5>
                            <p
                                class="mb-2 w-[240px] h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-500,#7C7C7C)]' }}">
                                {{ $hostingPlan->description }}
                            </p>
                            @foreach($hostingPlan->prices as $price)
                            @if($price->duration === 'monthly')
                            <div class="price-container text-center">
                                <span class="flex items-center justify-center">
                                    <span
                                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">Rp</span>
                                    <span
                                        class="h-[38px] gap-0 opacity-100 font-inter text-[32px] font-[700] leading-[38.4px] text-center mx-2 {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">{{ number_format($price->price_after, 0, ',', '.') }}</span>
                                    <span
                                        class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">/mon</span>
                                </span>
                            </div>
                            <div class="mb-4 text-center">
                                <span
                                    class="w-[65px] h-[16px] gap-0 opacity-100 font-inter text-[11px] font-[400] leading-[15.95px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Grey-400,#989EA0)]' }} line-through">Rp
                                    {{ number_format($price->price, 0, ',', '.') }} /mon</span>
                                <span
                                    class="w-[51px] h-[15px] gap-0 opacity-100 font-inter text-[11px] font-[600] leading-[15.4px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-400,#6C88D5)]' }} ml-2">Save
                                    {{$price->discount}}%</span>
                            </div>
                            @endif
                            @endforeach
                            <ul class="list-none mb-6">
                                @php
                                // Cek apakah ada RegularMainSpec untuk hosting plan ini
                                $regularSpec = $regularSpec->get($hostingPlan->hosting_plans_id);
                                @endphp

                                @foreach(['storage' => 'GB SSD Storage', 'RAM' => 'RAM', 'CPU' => 'Core CPU', 'max_domain' => 'Domain', 'ssl' => 'SSL'] as $key => $label)
                                <li
                                    class="flex items-center mb-2 w-[210px] h-[23px] gap-0 opacity-100 font-inter text-[16px] font-[500] leading-[23.2px] text-left {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-900,#3D3D3D)]' }}">
                                    <img src="/assets/img/icons/{{ $hostingPlan->best_seller ? 'checkwhite' : 'checkblack' }}.svg"
                                        alt=""
                                        class="w-[16.67px] h-[16.67px] relative top-[1.67px] left-[1.67px] opacity-100 mr-2">
                                    {{ ($key === 'storage' || $key === 'RAM' || $key === 'CPU') && $regularSpec ? $regularSpec->$key : $hostingPlan->$key }} {{ $label }}
                                </li>
                                @endforeach
                            </ul>
                            <div class="button-container">
                                <a class="button h-button is-outlined bg-[#FFF] hover:bg-[#4A6DCB] text-[#4A6DCB] active:bg-[#4A6DCB] rounded-full border-1 border-[#395FC6] hover:text-[#FFF] hover:border-[#4A6DCB] active:text-[#4A6DCB] active:border-[#4A6DCB] px-4 py-3"
                                    style="font-family: unset; width:100%">
                                    <span class="btn-text explore-button">Order Now</span>
                                </a>
                            </div>
                            <a href="/cloud-hosting"
                                class="block text-center {{ $hostingPlan->best_seller ? 'text-white hover:text-white' : 'text-[#4A6DCB] hover:text-[#4A6DCB]'  }} text-opacity-85 mt-4">
                                More detail →</a>
                        </div>
                        @endif
                        @endif
                        @endforeach
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>