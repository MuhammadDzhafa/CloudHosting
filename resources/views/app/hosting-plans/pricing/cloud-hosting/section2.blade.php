<div class="section-frame padding-1 gap-6 md:gap-12" style="background: #fff;">
    <h2 class="title-section text-center">
        Cloud Hosting Plans
    </h2>
    <div class="tabs-wrapper is-slider">
        <div class="tabs-inner">
            <div class="tabs" style="max-width: unset;">
                <ul>
                    @php
                    // Ambil dua grup hosting pertama yang memenuhi syarat
                    $filteredGroups = $hostingGroups->filter(function($group) use ($hostingPlans) {
                    return $hostingPlans->where('hosting_group_id', $group->hosting_group_id)
                    ->where('product_type', 'Cloud Hosting')
                    ->where('package_type', 'Regular')
                    ->isNotEmpty();
                    })->take(2); // Ambil hanya dua grup
                    @endphp

                    @foreach($filteredGroups as $index => $group)
                    <li
                        data-tab="{{ strtolower(str_replace(' ', '-', $group->name)) }}-tab"
                        class="{{ $index === 0 ? 'is-active' : '' }}">
                        <a><span>{{ $group->name }}</span></a>
                    </li>
                    @endforeach

                    <li class="tab-naver" style="background:#4A6DCB;"></li>
                </ul>
            </div>
        </div>


        @foreach($hostingGroups as $group)
        <div id="{{ strtolower($group->name) }}-tab" class="tab-content {{ $loop->first ? 'is-active' : '' }}">
            <div class="flex justify-center">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-[1440px]">
                    @php
                    // Filter hosting plans untuk group ini
                    $groupHostingPlans = $hostingPlans->filter(function ($hostingPlan) use ($group) {
                    return $hostingPlan->hosting_group_id === $group->hosting_group_id &&
                    $hostingPlan->product_type === 'Cloud Hosting' &&
                    $hostingPlan->package_type === 'Regular';
                    })->sortBy('name');
                    @endphp

                    @foreach ($groupHostingPlans as $hostingPlan)
                    <div class="w-[300px] h-[469px] p-[30px] pb-[40px] gap-[30px] rounded-[16px] border border-[#4A6DCB] shadow-custom opacity-100 
                {{ $hostingPlan->best_seller ? 'bg-gradient-custom text-white' : 'bg-white' }}">

                        <h5 class="text-xl font-bold mb-2 w-[240px] h-[26px] gap-0 opacity-100 font-inter text-[20px] leading-[26px] text-center 
                    {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#4A6DCB]' }}">
                            {{ $hostingPlan->name }}
                        </h5>

                        <p class="text-[14px] leading-[20.3px] font-normal text-center mb-4 
                    {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#7C7C7C]' }}">
                            {{ $hostingPlan->description }}
                        </p>

                        @foreach ($hostingPlan->prices as $price)
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
                        @break
                        @endif
                        @endforeach

                        <ul class="list-none mb-6">
                            @php
                            // Ambil spesifikasi dari CustomMainSpec
                            $spec = $regularSpec[$hostingPlan->hosting_plans_id] ?? null;
                            @endphp

                            @foreach([
                            'storage' => 'GB SSD Storage',
                            'RAM' => 'RAM',
                            'CPU' => 'Core CPU',
                            'max_domain' => 'Domain',
                            'ssl' => 'SSL'
                            ] as $key => $label)
                            <li class="flex items-center mb-2 text-[16px] font-medium leading-[23.2px] 
                            {{ $hostingPlan->best_seller ? 'text-white' : 'text-[#3D3D3D]' }}">
                                <img src="/assets/img/icons/{{ $hostingPlan->best_seller ? 'checkwhite' : 'checkblack' }}.svg"
                                    alt="" class="w-[16.67px] h-[16.67px] mr-2">

                                @switch($key)
                                @case('max_domain')
                                {{ $hostingPlan->max_domain }} {{ $label }}
                                @break
                                @case('ssl')
                                {{ $hostingPlan->ssl }} {{ $label }}
                                @break
                                @default
                                {{ $spec ? $spec->$key : '-' }} {{ $label }}
                                @endswitch
                            </li>
                            @endforeach
                        </ul>

                        <a href="{{ url('/checkout') }}?hosting_plan_id={{ $hostingPlan->hosting_plans_id }}&product_info={{ $hostingPlan->product_type }} - {{ $hostingPlan->name }}"
                            class="inline-block w-full">
                            <button class="w-[240px] h-[47px] px-[var(--Spacespace-16)] py-[var(--Spacespace-12)] gap-[var(--Spacespace-10)] rounded-full border border-[#395FC6] bg-[#FFFFFF] shadow-lg text-center flex items-center justify-center">
                                <span class="text-[18px] leading-[23.4px] text-[#395FC6]">
                                    Order Now
                                </span>
                            </button>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>

            <p class="text-center text-[16px] font-normal leading-[23.2px] text-[#7C7C7C] font-inter mt-8">
                Price does not include tax.
            </p>

            <a href="#" id="toggleDetail" class="block text-[18px] text-center text-blue-600 mt-4 flex items-center justify-center">
                More detail
                <i id="icon" data-feather="chevron-down" class="ml-2"></i>
            </a>

            <div id="detailContent" class="container mx-auto p-5 hidden">
                <div class="table-wrapper" data-simpleba style="min-height:auto">
                    <table id="hosting-plans-table" class="table is-datatable is-hoverable">
                        <thead style="background-color:#E7ECF8;">
                            <tr class="color-row">
                                <th class="title-rincian" style="color: #4A6DCB;">Rincian</th>
                                <th class="title-table" style="color: #4A6DCB;">Strato</th>
                                <th class="title-table" style="color: #4A6DCB;">Alto</th>
                                <th class="title-table" style="color: #4A6DCB;">Cirrus</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="title-detail">SSD Storage</td>
                                <td class="text-content">40 GB</td>
                                <td class="text-content">100 GB</td>
                                <td class="text-content">200 GB</td>
                            </tr>
                            <tr>
                                <td class="title-detail">RAM</td>
                                <td class="text-content">3 GB</td>
                                <td class="text-content">6 GB</td>
                                <td class="text-content">12 GB</td>
                            </tr>
                            <tr>
                                <td class="title-detail">CPU</td>
                                <td class="text-content">8 Core</td>
                                <td class="text-content">16 Core</td>
                                <td class="text-content">24 Core</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Domain</td>
                                <td class="text-content">1</td>
                                <td class="text-content">5</td>
                                <td class="text-content">10</td>
                            </tr>
                            <tr>
                                <td class="title-detail">SSL</td>
                                <td class="text-content">Free</td>
                                <td class="text-content">Free</td>
                                <td class="text-content">Free</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Email Account</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Bandwidth</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Database</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Addon/Parked</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                            <tr>
                                <td class="title-detail">FTP Account</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                            <tr>
                                <td class="title-detail">SSH</td>
                                <td class="text-content">Yes</td>
                                <td class="text-content">Yes</td>
                                <td class="text-content">Yes</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Backup</td>
                                <td class="text-content">Daily & Weekly</td>
                                <td class="text-content">Daily & Weekly</td>
                                <td class="text-content">Daily & Weekly</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Dedicated IP Address</td>
                                <td class="text-content">1</td>
                                <td class="text-content">1</td>
                                <td class="text-content">1</td>
                            </tr>
                            <tr>
                                <td class="title-detail">Entry Process</td>
                                <td class="text-content">100</td>
                                <td class="text-content">150</td>
                                <td class="text-content">200</td>
                            </tr>
                            <tr>
                                <td class="title-detail">NPROC</td>
                                <td class="text-content">160</td>
                                <td class="text-content">200</td>
                                <td class="text-content">200</td>
                            </tr>
                            <tr>
                                <td class="title-detail">I/O</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                                <td class="text-content">Unlimited</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    // Event listener untuk klik pada link More detail
    document.getElementById('toggleDetail').addEventListener('click', function(e) {
        e.preventDefault(); // Menghindari reload halaman

        // Ambil elemen icon dan container detail
        const icon = document.getElementById('icon');
        const detailContent = document.getElementById('detailContent');

        // Toggle visibility pada div
        detailContent.classList.toggle('hidden');

        // Ubah icon antara chevron-down dan chevron-right
        if (detailContent.classList.contains('hidden')) {
            icon.setAttribute('data-feather', 'chevron-down');
        } else {
            icon.setAttribute('data-feather', 'chevron-right');
        }

        // Re-render feather icons untuk memperbarui tampilan ikon
        feather.replace();
    });
</script>