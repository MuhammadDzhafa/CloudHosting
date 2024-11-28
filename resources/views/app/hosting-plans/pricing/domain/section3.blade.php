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
                        <input type="text" placeholder="eg. example.com" id="search-domain" class="input is-rounded search-input" oninput="searchDomains()">
                        <div class="form-icon">
                            <i data-feather="search"></i>
                        </div>
                    </div>
                </div>
                <button id="search-btn" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;" onclick="searchDomains()">
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

            <div class="flex flex-col md:flex-row w-full">
                <div class="mr-2 md:w-1/5 md:block hidden">
                    <div class="widget text-widget flex flex-col items-center p-0 bg-[#EBEFF9]">
                        <div class="px-7 py-2 w-full max-w-md">
                            <label class="radio is-outlined is-info p-0 mb-2 text-left block mb-0"
                                style="font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; line-height: 20.3px; color: #525252; text-underline-position: from-font; text-decoration-skip-ink: none;">
                                <input type="radio" name="filter" class="mr-2 text-blue-600" checked onchange="filterDomains('View All')">
                                <span></span>
                                View All
                            </label>
                            <ul class="list-none p-0 m-0">
                                @foreach ($categories as $index => $category)
                                <li>
                                    <label class="radio is-outlined is-info p-0 mb-2 text-left block"
                                        style="font-family: 'Inter', sans-serif; font-size: 14px; font-weight: 500; line-height: 20.3px; color: #525252; text-underline-position: from-font; text-decoration-skip-ink: none;">
                                        <input type="radio" name="filter" class="mr-2 text-blue-600" onchange="filterDomains('{{ $category->category }}')">
                                        <span></span>
                                        {{ $category->category }}
                                    </label>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="w-full md:w-4/5 bg-white">
                    <div class="table-wrapper" style="min-height: unset;">
                        <table id="users-datatable" class="table is-datatable is-hoverable table-is-bordered">
                            <thead>
                                <tr class="bg-[#EBEFF9]">
                                    <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 16px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
                                        TLD
                                    </th>
                                    <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 16px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
                                        Price
                                    </th>
                                    <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 16px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
                                        Order
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="domain-table-body">
                                @foreach ($tlds as $tld)
                                <tr class="border-gray-200 text-center">
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
                                            data-tld-price="{{ $tld->tld_price }}"
                                            onclick="orderTLD(this)">
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
                    <nav class="flex-pagination pagination is-rounded" aria-label="pagination" data-filter-hide>
                        <a class="pagination-previous has-chevron" onclick="handlePrevious()"><i data-feather="chevron-left"></i></a>
                        <ul class="pagination-list"></ul>
                        <a class="pagination-next has-chevron" onclick="handleNext()"><i data-feather="chevron-right"></i></a>
                    </nav>
                </div>
            </div>

            <script>
                // Simulasi data domain yang tersedia
                const domains = @json($tlds); // Menyimpan semua TLD dalam array
                const itemsPerPage = 5; // Jumlah domain per halaman
                let currentPage = 1; // Halaman saat ini

                function searchDomains() {
                    const searchInput = document.getElementById('search-domain').value.toLowerCase().trim();

                    // Filter domains berdasarkan input pencarian
                    const filteredDomains = domains.filter(domain =>
                        domain.tld_name.toLowerCase().includes(searchInput)
                    );

                    // Reset halaman ke 1 saat melakukan pencarian
                    currentPage = 1;

                    // Render ulang tabel dan pagination dengan domain yang difilter
                    renderTable(filteredDomains);
                    renderPagination(filteredDomains);
                }


                // Function untuk memfilter domain berdasarkan kategori
                function filterDomains(filter) {
                    currentPage = 1;
                    currentFilter = filter;

                    const filteredDomains = filter === 'View All' ? domains : domains.filter(domain => domain.category === filter);

                    renderTable(filteredDomains);
                    renderPagination(filteredDomains);
                }


                // Function untuk merender tabel berdasarkan filter
                function renderTable(domainsToRender) {
                    const tbody = document.getElementById('domain-table-body');
                    tbody.innerHTML = ''; // Kosongkan tabel sebelum diisi ulang

                    const startIndex = (currentPage - 1) * itemsPerPage;
                    const endIndex = startIndex + itemsPerPage;

                    domainsToRender.slice(startIndex, endIndex).forEach(domain => {
                        const row = document.createElement('tr');
                        row.className = 'border-gray-200 text-center';
                        row.innerHTML = `
            <td class="domain-tld py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">${domain.tld_name}</td>
            <td class="domain-price py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                                Rp${domain.tld_price.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}
                            </td>
            <td class="py-3 px-4 flex justify-center items-center">
                <button class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full border-none" data-tld-name="${domain.tld_name}" data-tld-price="${domain.tld_price}" onclick="orderTLD(this)">
                    <span class="text-[16px] font-['Inter'] text-[#fff] text-center">Order</span>
                </button>
            </td>
        `;
                        tbody.appendChild(row);
                    });
                }

                // Function untuk render pagination
                function renderPagination(domainsToRender) {
                    const paginationList = document.querySelector('.pagination-list');
                    paginationList.innerHTML = '';

                    const pageCount = Math.ceil(domainsToRender.length / itemsPerPage);

                    const previousButton = document.querySelector('.pagination-previous');
                    const nextButton = document.querySelector('.pagination-next');
                    const paginationContainer = document.querySelector('.flex-pagination');

                    // Selalu tampilkan pagination container
                    paginationContainer.style.display = 'flex';

                    previousButton.onclick = () => {
                        if (currentPage > 1) {
                            currentPage--;
                            renderTable(domainsToRender);
                            renderPagination(domainsToRender);
                        }
                    };

                    nextButton.onclick = () => {
                        if (currentPage < pageCount) {
                            currentPage++;
                            renderTable(domainsToRender);
                            renderPagination(domainsToRender);
                        }
                    };

                    // Nonaktifkan tombol previous/next jika hanya satu halaman
                    previousButton.classList.toggle('is-disabled', pageCount <= 1);
                    nextButton.classList.toggle('is-disabled', pageCount <= 1);

                    // Buat nomor halaman
                    for (let i = 1; i <= pageCount; i++) {
                        const pageLink = document.createElement('a');
                        pageLink.className = `pagination-link ${i === currentPage ? 'is-current' : ''}`;
                        pageLink.textContent = i;
                        pageLink.onclick = () => {
                            currentPage = i;
                            renderTable(domainsToRender);
                            renderPagination(domainsToRender);
                        };

                        const pageItem = document.createElement('li');
                        pageItem.appendChild(pageLink);
                        paginationList.appendChild(pageItem);
                    }
                }
            </script>
        </div>
    </div>
</div>