<div class="section-frame padding-1 gap-6 md:gap-12">
    <h2 class="title-section text-center">
        Wordpress Hosting
    </h2>

    <div class="flex justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl">
            @foreach ($hostingGroups as $group)
                @foreach ($hostingPlans as $hostingPlan)
                    @if($hostingPlan->product_type === 'Wordpress Hosting') <!-- Check product_type for each plan -->
                        @if($hostingPlan->hosting_group_id === $group->hosting_group_id && $hostingPlan->package_type === 'Regular')
                            <div
                                class="w-[300px] h-[469px] p-[30px] pb-[40px] gap-[30px] rounded-[16px] border border-[#4A6DCB] shadow-custom opacity-100 
                                                                                                                                                    {{ $hostingPlan->best_seller ? 'bg-gradient-custom text-white' : 'bg-white' }}">
                                <h5
                                    class="text-xl font-bold mb-2 w-[240px] h-[26px] gap-0 opacity-100 font-inter text-[20px] font-[700] leading-[26px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#4A6DCB]' }}">
                                    {{ $hostingPlan->name }}
                                </h5>
                                <p
                                    class="mb-2 w-[240px] h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-500,#7C7C7C)]' }}">
                                    {{ $hostingPlan->description }}
                                </p>
                                @foreach($hostingPlan->prices as $price)
                                    @if($price->duration === 'monthly')
                                        <div class="price-container text-center mb-4">
                                            <span class="flex items-center justify-center">
                                                <span
                                                    class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">Rp</span>
                                                <span
                                                    class="h-[38px] gap-0 opacity-100 font-inter text-[32px] font-[700] leading-[38.4px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">{{ number_format($price->price_after, 0, ',', '.') }}</span>
                                                <span
                                                    class="h-[20px] gap-0 opacity-100 font-inter text-[14px] font-[400] leading-[20.3px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-500,#4A6DCB)]' }}">/mon</span>
                                            </span>
                                            <div class="mt-2">
                                                <span
                                                    class="w-[65px] h-[16px] gap-0 opacity-100 font-inter text-[11px] font-[400] leading-[15.95px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Grey-400,#989EA0)]' }} line-through">Rp
                                                    {{ number_format($price->price, 0, ',', '.') }} /mon</span>
                                                <span
                                                    class="w-[51px] h-[15px] gap-0 opacity-100 font-inter text-[11px] font-[600] leading-[15.4px] text-center {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Kazee-Primary-400,#6C88D5)]' }} ml-2">Save
                                                    {{$price->discount}}%</span>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <ul class="list-none mb-6">
                                    @foreach(['storage' => 'GB SSD Storage', 'RAM' => 'RAM', 'CPU' => 'Core CPU', 'max_domain' => 'Domain', 'ssl' => 'SSL'] as $key => $label)
                                        <li
                                            class="flex items-center mb-2 w-[210px] h-[23px] gap-0 opacity-100 font-inter text-[16px] font-[500] leading-[23.2px] text-left {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-900,#3D3D3D)]' }}">
                                            <img src="/assets/img/icons/{{ $hostingPlan->best_seller ? 'checkwhite' : 'checkblack' }}.svg"
                                                alt="" class="w-[16.67px] h-[16.67px] relative top-[1.67px] left-[1.67px] opacity-100 mr-2">
                                            {{ $hostingPlan->$key }} {{ $label }}
                                        </li>
                                    @endforeach
                                </ul>
                                <div class="button-container">
                                    <a class="button h-button is-outlined bg-[#FFF] hover:bg-[#4A6DCB] text-[#4A6DCB] active:bg-[#4A6DCB] rounded-full border-1 border-[#395FC6] hover:text-[#FFF] hover:border-[#4A6DCB] active:text-[#4A6DCB] active:border-[#4A6DCB] px-4 py-3"
                                        style="font-family: unset; width:100%">
                                        <span class="btn-text explore-button">Order Now</span>
                                    </a>
                                </div>
                                <a href="#"
                                    class="block text-center {{ $hostingPlan->best_seller ? 'text-white hover:text-white' : 'text-[#4A6DCB] hover:text-[#4A6DCB]'  }} text-opacity-85 mt-4">More
                                    detail →</a>
                            </div>
                        @endif
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>

</div>