{{-- <div id="price-list" class="section-frame">
    <div id="price-list-section"
        class="price-list-section max-h-0 overflow-hidden transition-all duration-500 ease-in-out relative w-full bg-gray-100">
        <div class="absolute "></div>
        <div class="section-frame padding-1 bg-white">
            <div class="bg-white rounded-lg">
                <div class="relative flex items-center mb-16 text-center">
                    <img src="/assets/img/bg/globegradient.svg" alt="" class="absolute left-[20px] top-[-100px]">
                </div>
                <h2 class="text-3xl md:text-4xl title-section text-center">
                    Domain Price List
                </h2>
                <div class="mb-6">
                    <div class="relative">
                        <input type="text" placeholder="eg. example.com"
                            class="w-full h-[52px] px-5 py-4 border border-[#BDBDBD] rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <button
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 w-[114px] h-[47px] px-4 py-3 rounded-full bg-[#4A6DCB] text-[#F3F5FC] text-center hover:bg-blue-700 transition duration-300 flex items-center justify-center gap-2">
                            <img src="assets/img/icons/search.svg" alt="Icon" class="w-4 h-4">
                            Search
                        </button>
                    </div>
                </div>
                
                <div class="field dropdown-filter">
                    @php
                        $filters = ['View All', 'Popular', 'Country', 'City', 'Education', 'Technology', 'Health', 'Business', 'Hobby', 'Profession', 'Company'];
                    @endphp
                        <div class="control">
                            <div class="h-select">
                                <div class="select-box">
                                    <span>Select Filter</span>
                                </div>
                                <div class="select-icon">
                                    <i data-feather="chevron-down"></i>
                                </div>
                                <div class="select-drop has-slimscroll-sm">
                                    <div class="drop-inner">
                                        @foreach ($filters as $filter)
                                            <div class="option-row">
                                                <input type="radio" name="filter" id="filter-{{ $loop->index }}" value="{{ $filter }}">
                                                <label for="filter-{{ $loop->index }}" class="option-meta">
                                                    <span>{{ $filter }}</span>
                                                </label>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="flex flex-col md:flex-row border border-gray-200 rounded-lg overflow-hidden mb-4">
                    <!-- Dropdown for small screens -->
                    <div class="w-full md:w-1/4 bg-blue-50 p-4 md:block hidden">
                        <ul class="space-y-2">
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
                    
                    <div class="w-full md:w-3/4 bg-white">
                        <table class="table-auto w-full border-collapse">
                            <thead>
                                <tr class="table-header">
                                    <th class="table-cell">TLD</th>
                                    <th class="table-cell">Price</th>
                                    <th class="table-cell">Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $domains = ['.com', '.net', '.org', '.co.id', '.ac.id'];
                                @endphp
                                @foreach ($domains as $domain)
                                    <tr class="border-b border-gray-200">
                                        <td
                                            class="py-2 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">
                                            {{ $domain }}
                                        </td>
                                        <td
                                            class="py-2 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">
                                            $ 1.99
                                        </td>
                                        <td class="py-2 px-4 flex justify-center items-center">
                                            <button
                                                class="w-[63px] h-[36px] px-3 py-2 gap-[4px] rounded-full bg-[#4A6DCB] text-white hover:bg-blue-700 transition duration-300">
                                                <span class="text-[14px] font-medium leading-[20.3px]">Order</span>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                


                <div class="flex justify-between items-center">
                    <div class="flex space-x-2">
                        <span
                            class="w-[36px] h-[36px] flex items-center justify-center text-white rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center"
                            style="
                            background: var(--Brand-Primary-500, #4A6DCB);
                            box-shadow: 
                                0px 14px 26px -12px #4A6DCB6B,
                                0px 4px 23px 0px #0000001F,
                                0px 8px 10px -5px #4A6DCB33;
                        ">
                            1
                        </span>
                        <span
                            class="w-[36px] h-[36px] flex items-center justify-center rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center text-[#525252] border border-[#DEDEDE] bg-[#FFFFFF]">
                            2
                        </span>
                        <span
                            class="w-[36px] h-[36px] flex items-center justify-center rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center text-[#525252] border border-[#DEDEDE] bg-[#FFFFFF]">
                            3
                        </span>
                        <span
                            class="w-[36px] h-[36px] flex items-center justify-center rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center text-[#525252] border border-[#DEDEDE] bg-[#FFFFFF]">
                            4
                        </span>
                        <span
                            class="w-[36px] h-[36px] flex items-center justify-center rounded-full font-inter text-[14px] font-regular leading-[20.3px] text-center text-[#525252] border border-[#DEDEDE] bg-[#FFFFFF]">
                            5
                        </span>
                    </div>

                    <div class="flex space-x-2">
                        <button
                            class="w-[56px] h-[36px] px-[20px] py-[10px] gap-0 rounded-full border border-[#DEDEDE] bg-white opacity-100 flex items-center justify-center transition duration-300 hover:bg-gray-100">
                            <img src="/assets/img/icons/arrowback.svg" alt="" class="">
                        </button>
                        <button
                            class="w-[56px] h-[36px] px-[20px] py-[10px] gap-0 rounded-full border border-[#DEDEDE] bg-white opacity-100 flex items-center justify-center transition duration-300 hover:bg-gray-100">
                            <img src="/assets/img/icons/arrowforward.svg" alt="" class="">
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
