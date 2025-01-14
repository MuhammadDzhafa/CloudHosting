<div class="section-frame padding-1 gap-6" style="background: #fff;">
    <h2 class="title-section text-center">
        WordPress Hosting Plans
    </h2>

    <div class="flex justify-center z-10">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl pt-10">
            @foreach ($hostingGroups as $group)
            @foreach ($hostingPlans as $hostingPlan)
            @if($hostingPlan->product_type === 'Wordpress Hosting') <!-- Check product_type for each plan -->
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
                    @foreach([
                    'storage' => ['source' => 'specs', 'label' => 'GB SSD Storage'],
                    'RAM' => ['source' => 'specs', 'label' => 'RAM'],
                    'CPU' => ['source' => 'specs', 'label' => 'Core CPU'],
                    'max_domain' => ['source' => 'plan', 'label' => 'Domain'],
                    'ssl' => ['source' => 'plan', 'label' => 'SSL']
                    ] as $key => $value)
                    <li class="flex items-center mb-2 w-[210px] h-[23px] gap-0 opacity-100 font-inter text-[16px] font-[500] leading-[23.2px] text-left {{ $hostingPlan->best_seller ? 'text-white' : 'text-[color:var(--Base-900,#3D3D3D)]' }}">
                        <img src="/assets/img/icons/{{ $hostingPlan->best_seller ? 'checkwhite' : 'checkblack' }}.svg"
                            alt="" class="w-[16.67px] h-[16.67px] relative top-[1.67px] left-[1.67px] opacity-100 mr-2">
                        @if($value['source'] === 'specs')
                        {{ $regularSpec[$hostingPlan->hosting_plans_id]->$key ?? '' }} {{ $value['label'] }}
                        @else
                        @if($key === 'max_domain')
                        {{ $hostingPlan->max_domain }} {{ $value['label'] }}
                        @elseif($key === 'ssl')
                        {{ $hostingPlan->ssl }} {{ $value['label'] }}
                        @endif
                        @endif
                    </li>
                    @endforeach
                </ul>
                <div class="button-container">
                    <a href="{{ route('checkout', ['hosting_plan_id' => $hostingPlan->hosting_plans_id]) }}"
                        class="button h-button is-outlined bg-[#FFF] hover:bg-[#4A6DCB] text-[#4A6DCB] active:bg-[#4A6DCB] rounded-full border-1 border-[#395FC6] hover:text-[#FFF] hover:border-[#4A6DCB] active:text-[#4A6DCB] active:border-[#4A6DCB] px-4 py-3"
                        style="font-family: unset; width:100%">
                        <span class="btn-text explore-button">Order Now</span>
                    </a>
                </div>
            </div>
            @endif
            @endif
            @endforeach
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
            icon.setAttribute('data-feather', 'chevron-right'); // Tampilkan chevron-right jika detail tersembunyi
        } else {
            icon.setAttribute('data-feather', 'chevron-down'); // Tampilkan chevron-down jika detail terlihat
        }

        // Re-render feather icons untuk memperbarui tampilan ikon
        feather.replace();
    });
</script>