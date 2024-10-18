<div class="section-frame">
    <div class="absolute "></div>
    <div class="section-frame padding-1 bg-white">
        <div class="bg-white rounded-lg">
            <h2 class="text-3xl md:text-4xl title-section text-center mb-16 ">
                Domain Price List
            </h2>
            <!-- <div class="mb-6">
                    <div class="relative">
                        <input type="text" placeholder="eg. example.com"
                            class="w-full h-[52px] px-5 py-4 border border-[#BDBDBD] rounded-full bg-white focus:outline-none focus:ring-2 focus:ring-blue-500">

                        <button
                            class="absolute right-1 top-1/2 transform -translate-y-1/2 w-[114px] h-[47px] px-4 py-3 rounded-full bg-[#4A6DCB] text-[#F3F5FC] text-center hover:bg-blue-700 transition duration-300 flex items-center justify-center gap-2">
                            <img src="assets/img/icons/search.svg" alt="Icon" class="w-4 h-4">
                            Search
                        </button>
                    </div>
                </div> -->
            <div class="flex justify-center flex-row gap-2">
                <div class="field flex-grow h-full mb-5">
                    <div class="control has-icon">
                        <input type="text" placeholder="eg. example.com" id="domain-search" class="input is-rounded search-input" placeholder="Search...">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
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
                $filters = ['View All'];
                @endphp
                @foreach ($categories as $category)
                @php
                $filters[] = $category->category;
                @endphp
                @endforeach

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
                                <div class="option-row">
                                    <input type="radio" name="filter" id="filter-all" value="View All" onchange="filterDomains('View All')">
                                    <label for="filter-all" class="option-meta">
                                        <span>View All</span>
                                    </label>
                                </div>
                                @foreach ($categories as $category)
                                <div class="option-row">
                                    <input type="radio" name="filter" id="filter-{{ $loop->index }}" value="{{ $category->category }}" onchange="filterDomains('{{ $category->category }}')">
                                    <label for="filter-{{ $loop->index }}" class="option-meta">
                                        <span>{{ $category->category }}</span>
                                    </label>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col md:flex-row border border-gray-200 rounded-lg overflow-hidden mb-4">
                <div class="w-full md:w-1/4 bg-blue-50 p-4 md:block hidden">
                    <ul class="space-y-2">
                        <!-- Radio button untuk View All -->
                        <li>
                            <label class="flex items-center">
                                <input type="radio" name="filter" class="mr-2 text-blue-600" checked onchange="filterDomains('View All')">
                                <span class="text-[14px] font-medium leading-[20.3px] text-left text-[#525252]">
                                    View All
                                </span>
                            </label>
                        </li>
                        @foreach ($categories as $index => $category)
                        <li>
                            <label class="flex items-center">
                                <input type="radio" name="filter" class="mr-2 text-blue-600" onchange="filterDomains('{{ $category->category }}')">
                                <span class="text-[14px] font-medium leading-[20.3px] text-left text-[#525252]">
                                    {{ $category->category }}
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
                                <th class="table-cell" style="text-align: center;">TLD</th>
                                <th class="table-cell" style="text-align: center;">Price</th>
                                <th class="table-cell" style="text-align: center;">Order</th>
                            </tr>
                        </thead>
                        <tbody id="domain-table-body">
                            @foreach ($tlds as $tld)
                            <tr class="border-b border-gray-200 text-center">
                                <td class="domain-tld py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                                    {{ $tld->tld_name }}
                                </td>
                                <td class="domain-price py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                                    ${{ number_format($tld->tld_price, 2) }}
                                </td>
                                <td class="py-3 px-4 flex justify-center items-center">
                                    <button
                                        class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full"
                                        style="border: unset; padding:12px 16px;"
                                        data-tld-name="{{ $tld->tld_name }}"
                                        data-tld-price="{{ $tld->tld_price }}">
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

            <script>
                // Simulasi data domain yang tersedia
                const domains = @json($tlds); // Menyimpan semua TLD dalam array
                const itemsPerPage = 5; // Jumlah domain per halaman
                let currentPage = 1; // Halaman saat ini

                // Function untuk memfilter domain berdasarkan kategori
                function filterDomains(filter) {
                    currentPage = 1; // Reset halaman ke 1 setiap kali filter diubah
                    renderTable(filter);
                    renderPagination(filter);
                }

                // Function untuk merender tabel berdasarkan filter
                function renderTable(filter) {
                    const tbody = document.getElementById('domain-table-body');
                    tbody.innerHTML = ''; // Kosongkan tabel sebelum diisi ulang

                    // Filter domain berdasarkan kategori
                    const filteredDomains = filter === 'View All' ? domains : domains.filter(domain => domain.category === filter);

                    // Menghitung mulai dan akhir untuk pagination
                    const startIndex = (currentPage - 1) * itemsPerPage;
                    const endIndex = startIndex + itemsPerPage;

                    // Mengisi tabel dengan data yang difilter
                    filteredDomains.slice(startIndex, endIndex).forEach(domain => {
                        const row = document.createElement('tr');
                        row.className = 'border-b border-gray-200 text-center';

                        row.innerHTML = `
                                <td class="domain-tld py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                                    ${domain.tld_name}
                                </td>
                                <td class="domain-price py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                                    Rp.${domain.tld_price.toFixed(2)}
                                </td>
                                <td class="py-3 px-4 flex justify-center items-center">
                                    <button 
                                        class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" 
                                        style="border: unset; padding:12px 16px;" 
                                        data-tld-name="${domain.tld_name}" 
                                        data-tld-price="${domain.tld_price}" 
                                        onclick="orderTLD(this)">
                                        <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                            Order
                                        </span>
                                    </button>
                                </td>
                            `;
                        tbody.appendChild(row);
                    });
                }

                // Function untuk render pagination
                function renderPagination(filter) {
                    const paginationList = document.querySelector('.pagination-list');
                    paginationList.innerHTML = ''; // Kosongkan pagination sebelum diisi ulang

                    // Filter domain berdasarkan kategori
                    const filteredDomains = filter === 'View All' ? domains : domains.filter(domain => domain.category === filter);

                    // Hitung jumlah halaman
                    const pageCount = Math.ceil(filteredDomains.length / itemsPerPage);

                    // Tambahkan tombol previous
                    const previousButton = document.querySelector('.pagination-previous');
                    previousButton.onclick = () => {
                        if (currentPage > 1) {
                            currentPage--;
                            renderTable(filter);
                            renderPagination(filter);
                        }
                    };

                    // Tambahkan tombol next
                    const nextButton = document.querySelector('.pagination-next');
                    nextButton.onclick = () => {
                        if (currentPage < pageCount) {
                            currentPage++;
                            renderTable(filter);
                            renderPagination(filter);
                        }
                    };

                    // Generate pagination numbers
                    for (let i = 1; i <= pageCount; i++) {
                        const pageLink = document.createElement('a');
                        pageLink.className = `pagination-link ${i === currentPage ? 'is-current' : ''}`;
                        pageLink.textContent = i;
                        pageLink.onclick = () => {
                            currentPage = i;
                            renderTable(filter);
                            renderPagination(filter);
                        };

                        const pageItem = document.createElement('li');
                        pageItem.appendChild(pageLink);
                        paginationList.appendChild(pageItem);
                    }
                }
            </script>

            <nav class="flex-pagination pagination is-rounded" aria-label="pagination" data-filter-hide>
                <a class="pagination-previous has-chevron" onclick="handlePrevious()"><i data-feather="chevron-left"></i></a>
                <a class="pagination-next has-chevron" onclick="handleNext()"><i data-feather="chevron-right"></i></a>
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