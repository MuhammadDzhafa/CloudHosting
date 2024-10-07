<div id="price-list" class="section-frame">
    <div id="price-list-section"
        class="price-list-section max-h-0 overflow-hidden transition-all duration-500 ease-in-out relative w-full bg-gray-100">
        <div class="absolute "></div>
        <div class="section-frame padding-1 bg-white">
            <div class="bg-white rounded-lg">
                <div class="relative flex items-center mb-16 text-center hidden lg:block">
                    <img src="/assets/img/bg/globegradient.svg" alt="" class="absolute left-[20px] top-[-100px]">
                </div>
                <h2 class="title-section text-center mb-[50px]">
                    Domain Price List
                </h2>
                <div class="flex items-start space-x-4 mb-8">
                    <div class="field flex-1">
                        <div class="control">
                            <input type="text" class="input is-rounded w-full" placeholder="eg. example.com">
                        </div>
                    </div>
                    <button id="search-btn" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                        <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                        <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                            Search
                        </span>
                    </button>
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
                                    <th class="table-cell" style="text-align: center;">Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $domains = ['.com', '.net', '.org', '.co.id', '.ac.id'];
                                @endphp
                                @foreach ($domains as $domain)
                                <tr class="border-b border-gray-200">
                                    <td
                                        class="py-3 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">
                                        {{ $domain }}
                                    </td>
                                    <td
                                        class="py-3 px-4 text-[18px] font-normal leading-[23.4px] text-center text-[#999999]">
                                        $ 1.99
                                    </td>
                                    <td class="py-3 px-4 flex justify-center items-center">
                                        <button id="search-btn" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                                Order
                                            </span>
                                        </button>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <nav class="flex-pagination pagination is-rounded" aria-label="pagination" data-filter-hide>
                    <a class="pagination-previous has-chevron"><i data-feather="chevron-left"></i></a>
                    <a class="pagination-next has-chevron"><i data-feather="chevron-right"></i></a>
                    <ul class="pagination-list">
                        <li><a class="pagination-link" aria-label="Goto page 1">1</a></li>
                        <li><span class="pagination-ellipsis">…</span></li>
                        <li><a class="pagination-link" aria-label="Goto page 45">45</a></li>
                        <li><a class="pagination-link is-current" aria-label="Page 46" aria-current="page">46</a></li>
                        <li><a class="pagination-link" aria-label="Goto page 47">47</a></li>
                        <li><span class="pagination-ellipsis">…</span></li>
                        <li><a class="pagination-link" aria-label="Goto page 86">86</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>