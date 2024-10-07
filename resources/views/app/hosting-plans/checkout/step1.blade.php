<div id="form-step-0" class="form-section is-active w-full" >
    <div>
        <!-- Konten Utama -->
        <div class="lex-1">
            <h2 class="text-[20px] font-[400]">
                STEP 1
            </h2>
            <h1 class="text-4xl font-bold leading-tight mb-6 text-transparent bg-clip-text w-full lg:w-full md:w-full h-[38px]" style="background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.95) 23.63%, #4A6DCB 70.69%, #64D2F7 100%); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                Domain
            </h1>

            <!-- Form Pencarian Domain -->
            <div class="tabs-wrapper is-slider">
                <div class="tabs-inner">
                    <div class="tabs" style="max-width:unset;">
                        <ul>
                            <li data-tab="team-tab" class="is-active"><a><span>New Domain</span></a></li>
                            <li data-tab="projects-tab"><a><span>Transfer Domain</span></a></li>
                            <li class="tab-naver" style="background: #4A6DCB;"></li>
                        </ul>
                    </div>
                </div>

                <div class="flex items-start space-x-4 mb-8">
                    <div class="field flex-1">
                        <div class="control">
                            <input type="text" class="input is-rounded w-full" placeholder="eg. example.com">
                        </div>
                    </div>
                    <a class="button h-button is-primary flex items-center justify-center rounded-full px-4" style="background-color: #4A6DCB;">
                        <img src="assets/img/icons/search.svg" alt="Icon" class="w-4 h-4 mr-2">
                        Search
                    </a>
                </div>

                <!-- Harga Domain -->
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


                <!-- Tabel Domain -->
                <div class="flex flex-col lg:flex-row md:flex-row border border-gray-200 rounded-lg overflow-hidden mb-4">
                    <div class="w-full lg:w-1/4 md:w-1/3 bg-blue-50 p-4">
                        <ul class="space-y-2">
                            @php
                            $filters = ['View All', 'Popular', 'Country', 'City', 'Education', 'Technology', 'Health', 'Business', 'Hobby', 'Profession', 'Company'];
                            @endphp
                            @foreach ($filters as $index => $filter)
                            <li>
                                <label class="flex items-center">
                                    <input type="radio" name="filter" class="mr-2 text-blue-600" {{ $index === 0 ? 'checked' : '' }}>
                                    <span class="text-[14px] font-medium leading-[20.3px] text-left text-[#525252]">
                                        {{ $filter }}
                                    </span>
                                </label>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="w-full lg:w-3/4 md:w-2/3 bg-white overflow-x-auto">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="bg-[#E7ECF8]">
                                    <th class="py-2 px-4 text-[18px] font-semibold leading-[23.4px] text-center text-[#4A6DCB]">TLD</th>
                                    <th class="py-2 px-4 text-[18px] font-semibold leading-[23.4px] text-center text-[#4A6DCB]">Price</th>
                                    <th class="py-2 px-4 text-[18px] font-semibold leading-[23.4px] text-center text-[#4A6DCB]">Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $domains = ['.com', '.net', '.org', '.co.id', '.ac.id'];
                                @endphp
                                @foreach ($domains as $domain)
                                <tr class="border-b border-gray-200">
                                    <td class="py-2 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">{{ $domain }}</td>
                                    <td class="py-2 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">$ 1.99</td>
                                    <td class="py-2 px-4 text-center">
                                        <a class="button h-button is-primary" style="background-color:#4A6DCB; padding:8px 12px 8px 12px; height:unset;">Order</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Pagination -->
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <div class="flex space-x-2">
                        <span class="w-[36px] h-[36px] flex items-center justify-center text-white rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center bg-[#4A6DCB] shadow-lg">1</span>
                        @foreach (range(2, 5) as $number)
                        <span class="w-[36px] h-[36px] flex items-center justify-center rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center text-[#525252] border border-[#DEDEDE] bg-[#FFFFFF]">
                            {{ $number }}
                        </span>
                        @endforeach
                    </div>

                    <div class="flex space-x-2">
                        <button class="w-[56px] h-[36px] px-[20px] py-[10px] rounded-full border border-[#DEDEDE] bg-white opacity-100 flex items-center justify-center transition duration-300 hover:bg-gray-100">
                            <img src="/assets/img/icons/arrowback.svg" alt="" class="">
                        </button>
                        <button class="w-[56px] h-[36px] px-[20px] py-[10px] rounded-full border border-[#DEDEDE] bg-white opacity-100 flex items-center justify-center transition duration-300 hover:bg-gray-100">
                            <img src="/assets/img/icons/arrowforward.svg" alt="" class="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

