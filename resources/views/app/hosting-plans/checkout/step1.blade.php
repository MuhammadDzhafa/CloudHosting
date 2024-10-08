<div id="form-step-0" class="form-section is-active w-[800px]">
    <div>
        <!-- Konten Utama -->
        <div class="lex-1 w-full">
            <h2 class="text-[20px] font-[400] text-left leading-[26px] mb-2 w-full lg:w-full md:w-full" style="height: 26px; gap: 0px; opacity: 1; font-family: 'Inter'; background: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); -webkit-background-clip: text; color: transparent;">
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
                <div id="domain-container" class="flex justify-center items-stretch space-x-[10px] w-full mb-5">
                    @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
                    <div class="card-domain popular-domain w-[196.56px] p-[20px_0_0_0] rounded-[16px] border border-[#DEDEDE] bg-white shadow-[0_1px_3px_rgba(0,0,0,0.1)]" data-domain="{{ $domain }}">
                        <div class="card-content-product">
                            <p class="text-[18px] text-[#643493] text-center">{{ $domain }}</p>
                            <p class="text-center flex items-center justify-center">
                                <span class="price-currency text-[20px] font-semibold">$</span>
                                <span class="price-number ml-0 text-[26px] font-bold">1.99</span>
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>

                <div class="field dropdown-filter">
                    @php
                    $filters = ['View All', 'Popular', 'Country', 'City', 'Education', 'Technology', 'Health', 'Business', 'Hobby', 'Profession', 'Company'];
                    @endphp
                    @php
                    $domains = [
                    // Popular
                    ['tld' => '.com', 'price' => 1.99, 'category' => 'Popular'],
                    ['tld' => '.net', 'price' => 2.99, 'category' => 'Popular'],
                    ['tld' => '.xyz', 'price' => 0.99, 'category' => 'Popular'],
                    ['tld' => '.io', 'price' => 3.99, 'category' => 'Popular'],
                    ['tld' => '.co', 'price' => 5.99, 'category' => 'Popular'],

                    // Country
                    ['tld' => '.co.id', 'price' => 5.99, 'category' => 'Country'],
                    ['tld' => '.id', 'price' => 3.99, 'category' => 'Country'],
                    ['tld' => '.us', 'price' => 2.99, 'category' => 'Country'],
                    ['tld' => '.uk', 'price' => 3.50, 'category' => 'Country'],
                    ['tld' => '.au', 'price' => 4.50, 'category' => 'Country'],

                    // City
                    ['tld' => '.nyc', 'price' => 9.99, 'category' => 'City'],
                    ['tld' => '.london', 'price' => 8.99, 'category' => 'City'],
                    ['tld' => '.paris', 'price' => 7.99, 'category' => 'City'],
                    ['tld' => '.tokyo', 'price' => 6.99, 'category' => 'City'],
                    ['tld' => '.berlin', 'price' => 5.99, 'category' => 'City'],

                    // Education
                    ['tld' => '.edu', 'price' => 12.99, 'category' => 'Education'],
                    ['tld' => '.ac.id', 'price' => 6.99, 'category' => 'Education'],
                    ['tld' => '.school', 'price' => 4.99, 'category' => 'Education'],
                    ['tld' => '.academy', 'price' => 3.99, 'category' => 'Education'],
                    ['tld' => '.college', 'price' => 8.50, 'category' => 'Education'],

                    // Technology
                    ['tld' => '.tech', 'price' => 6.50, 'category' => 'Technology'],
                    ['tld' => '.ai', 'price' => 10.99, 'category' => 'Technology'],
                    ['tld' => '.dev', 'price' => 7.99, 'category' => 'Technology'],
                    ['tld' => '.io', 'price' => 9.99, 'category' => 'Technology'],
                    ['tld' => '.cloud', 'price' => 4.99, 'category' => 'Technology'],

                    // Health
                    ['tld' => '.health', 'price' => 11.99, 'category' => 'Health'],
                    ['tld' => '.clinic', 'price' => 7.99, 'category' => 'Health'],
                    ['tld' => '.doctor', 'price' => 8.99, 'category' => 'Health'],
                    ['tld' => '.hospital', 'price' => 6.99, 'category' => 'Health'],
                    ['tld' => '.care', 'price' => 5.50, 'category' => 'Health'],

                    // Business
                    ['tld' => '.biz', 'price' => 1.50, 'category' => 'Business'],
                    ['tld' => '.company', 'price' => 3.50, 'category' => 'Business'],
                    ['tld' => '.enterprise', 'price' => 4.50, 'category' => 'Business'],
                    ['tld' => '.solutions', 'price' => 2.99, 'category' => 'Business'],
                    ['tld' => '.consulting', 'price' => 3.99, 'category' => 'Business'],

                    // Hobby
                    ['tld' => '.photography', 'price' => 5.99, 'category' => 'Hobby'],
                    ['tld' => '.bike', 'price' => 3.99, 'category' => 'Hobby'],
                    ['tld' => '.travel', 'price' => 4.50, 'category' => 'Hobby'],
                    ['tld' => '.garden', 'price' => 3.50, 'category' => 'Hobby'],
                    ['tld' => '.cooking', 'price' => 6.50, 'category' => 'Hobby'],

                    // Profession
                    ['tld' => '.lawyer', 'price' => 9.50, 'category' => 'Profession'],
                    ['tld' => '.engineer', 'price' => 8.50, 'category' => 'Profession'],
                    ['tld' => '.accountant', 'price' => 7.50, 'category' => 'Profession'],
                    ['tld' => '.teacher', 'price' => 6.99, 'category' => 'Profession'],
                    ['tld' => '.nurse', 'price' => 5.99, 'category' => 'Profession'],

                    // Company
                    ['tld' => '.company', 'price' => 3.50, 'category' => 'Company'],
                    ['tld' => '.corp', 'price' => 4.99, 'category' => 'Company'],
                    ['tld' => '.ltd', 'price' => 2.99, 'category' => 'Company'],
                    ['tld' => '.inc', 'price' => 6.50, 'category' => 'Company'],
                    ['tld' => '.group', 'price' => 5.99, 'category' => 'Company'],
                    ];
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
                                        <input type="radio" name="filter" id="filter-{{ $loop->index }}" value="{{ $filter }}" onchange="filterDomains('{{ $filter }}')">
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
                    <div class="w-full md:w-1/4 bg-blue-50 p-4 md:block hidden">
                        <ul class="space-y-2">
                            @foreach ($filters as $index => $filter)
                            <li>
                                <label class="flex items-center">
                                    <input type="radio" name="filter" class="mr-2 text-blue-600" {{ $index === 0 ? 'checked' : '' }} onchange="filterDomains('{{ $filter }}')">
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
                                    <th class="table-cell" style="text-align: center;">TLD</th>
                                    <th class="table-cell" style="text-align: center;">Price</th>
                                    <th class="table-cell" style="text-align: center;">Order</th>
                                </tr>
                            </thead>
                            <tbody id="domain-table-body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Data domain yang tersedia
        domains = @json($domains);
        const itemsPerPage = 5; // Jumlah domain per halaman
        let currentPage = 1; // Halaman saat ini

        // Function untuk memfilter domain berdasarkan kategori
        function filterDomains(filter) {
            currentPage = 1; // Reset halaman ke 1 setiap kali filter diubah
            renderTable(filter);
            renderPagination(filter);
        }

        // Function untuk render tabel berdasarkan filter dan halaman
        function renderTable(filter) {
            const tableBody = document.getElementById('domain-table-body');
            tableBody.innerHTML = ''; // Kosongkan tabel sebelum diisi ulang

            // Filter domain berdasarkan kategori
            const filteredDomains = filter === 'View All' ? domains : domains.filter(domain => domain.category === filter);

            // Hitung index domain yang akan ditampilkan pada halaman saat ini
            const startIndex = (currentPage - 1) * itemsPerPage;
            const endIndex = startIndex + itemsPerPage;
            const paginatedDomains = filteredDomains.slice(startIndex, endIndex);

            // Generate rows baru untuk tabel
            paginatedDomains.forEach(domain => {
                const row = `
                <tr class="border-b border-gray-200 text-center">
                    <td class="domain-tld py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                        ${domain.tld}
                    </td>
                    <td class="domain-price py-4 px-4 font-normal leading-[23.4px] justify-center items-center text-center text-[#999999]">
                        $ ${domain.price}
                    </td>
                    <td class="py-3 px-4 flex justify-center items-center">
                        <button class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                Order
                            </span>
                        </button>
                    </td>
                </tr>
            `;
                tableBody.innerHTML += row; // Tambahkan row ke tabel
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
            previousButton.disabled = currentPage === 1; // Nonaktifkan jika di halaman pertama
            previousButton.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(filter);
                    renderPagination(filter);
                }
            };

            // Tambahkan tombol next
            const nextButton = document.querySelector('.pagination-next');
            nextButton.disabled = currentPage === pageCount; // Nonaktifkan jika di halaman terakhir
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

        // Panggil function filterDomains dengan default "View All" saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', () => {
            filterDomains('View All');
        });
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