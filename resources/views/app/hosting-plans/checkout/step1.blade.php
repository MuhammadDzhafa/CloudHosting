<div id="form-step-0" class="form-section is-active w-950px]">
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
            <div class="tabs-wrapper is-triple-slider">
                <div class="tabs-inner">
                    <div class="tabs" style="max-width: unset; background:unset; border:1px solid #DEDEDE;">
                        <ul>
                            <li data-tab="new-domain" class="is-active"><a><span>New Domain</span></a></li>
                            <li data-tab="transfer-domain"><a><span>Transfer Domain</span></a></li>
                            <li data-tab="hosting-only"><a><span>Hosting Only</span></a></li>
                            <li class="tab-naver" style="background: #4A6DCB;"></li>
                        </ul>
                    </div>
                </div>

                <div id="new-domain" class="tab-content is-active">
                    <div class="flex items-start space-x-4 mb-8">
                        <div class="field flex-1">
                            <div class="control">
                                <input type="text" id="domain-search-new" class="input is-rounded w-full" placeholder="eg. example.com">
                            </div>
                        </div>
                        <button id="search-btn-new" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                            <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                Search
                            </span>
                        </button>
                    </div>
                    <div id="dropdown-container-new" class="hidden mb-4">
                        <div id="dropdown-content-new"></div>
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

                    <div id="modal-whois" class="modal h-modal">
                        <div class="modal-background h-modal-close"></div>
                        <div class="modal-content">
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <h3>WHOIS Search Result</h3>
                                    <button class="h-modal-close ml-auto" aria-label="close">
                                        <i data-feather="x"></i>
                                    </button>
                                </header>
                                <div class="modal-card-body">
                                    <div class="inner-content">
                                        <div id="whois-output"></div>
                                    </div>
                                </div>
                                <div class="modal-card-foot is-centered">
                                    <a class="button h-button is-primary is-raised is-rounded h-modal-close">OK</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Harga Domain -->
                    <div class="flex flex-col md:flex-row w-full">
                        <div class="w-full bg-white">
                            <div class="table-wrapper" style="min-height: unset;">
                                <table id="users-datatable" class="table is-datatable is-hoverable table-is-bordered">
                                    <thead>
                                        <tr class="bg-[#EBEFF9]">
                                            <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
                                                TLD
                                            </th>
                                            <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
                                                Price
                                            </th>
                                            <th style="border: unset; text-align: center; font-family: 'Inter', sans-serif; font-size: 18px; font-weight: 600; line-height: 23.4px; text-underline-position: from-font; text-decoration-skip-ink: none; color: #4A6DCB;">
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
                </div>

                <div id="transfer-domain" class="tab-content">
                    <h3 class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C] mb-5">Easily transfer your domain to Awan Hosting</h3>
                    <div class="flex items-start space-x-4 mb-8">
                        <div class="field flex-1">
                            <div class="control">
                                <input type="text" id="domain-search-transfer" class="input is-rounded w-full" placeholder="Type in your domain name">
                            </div>
                        </div>
                        <button id="search-btn-transfer" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                            <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                Search
                            </span>
                        </button>
                    </div>
                    <div id="dropdown-container-transfer" class="hidden mb-4">
                        <div id="dropdown-content-transfer"></div>
                    </div>

                    <!-- Flex Table -->
                    <div class="flex-table">
                        <div id="tld-results" class="hidden">
                            <div class="flex flex-col items-start mb-5 md:mb-0">
                                <h3 id="h3-domain-display-2" class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C]">Your domain search results</h3>
                            </div>
                        </div>

                        <!-- Table items hidden by default -->
                        <div id="transfer-form" class="flex-table-container hidden">
                            <div class="flex-table-item flex items-center w-full gap-2 md:gap-0" style="align-items: center;">
                                <div class="flex flex-grow cell-start is-bold" data-th="Company">
                                    <div class="field w-full">
                                        <div class="control">
                                            <!-- <input id="epp-code-input" type="text" class="input w-full rounded-full mb-4 md:hidden" placeholder="Enter your EPP code here"> -->
                                            <input id="epp-code-input" type="text" class="flex flex-col md:flex-row input md:w-full rounded-full" placeholder="Enter your EPP code here">
                                        </div>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 cell-end" data-th="Actions">
                                    <span class="light-text">
                                        <button id="continue-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full py-3 px-4 ml-2">
                                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                                Continue
                                            </span>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div id="success-message" class="message is-success hidden mt-4">
                                <a class="delete" id="delete-message"></a>
                                <div class="message-body">
                                    The domain has been successfully transferred.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="navigation-buttons">
                        <div class="buttons is-right">
                            <button id="next-button-helper" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white" style="min-height: unset; min-width: unset;">
                                Next Step
                            </button>
                        </div>
                    </div>
                </div>

                <div id="hosting-only" class="tab-content">
                    <h3 class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C] mb-5">
                        Get your domain with Hosting Only
                    </h3>
                    <div class="flex items-start space-x-4 mb-8">
                        <div class="field flex-1">
                            <div class="control">
                                <input type="text" id="domain-search-hosting-only" class="input is-rounded w-full" placeholder="Type in your domain name">
                            </div>
                        </div>
                        <button id="search-btn-hosting" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full" style="border: unset; padding:12px 16px;">
                            <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                            <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                Search
                            </span>
                        </button>
                    </div>
                    <div id="dropdown-container-hosting-only" class="hidden mb-4">
                        <div id="dropdown-content-hosting-only"></div>
                    </div>

                    <!-- Flex Table -->
                    <div class="flex-table">
                        <div id="tld-results" class="hidden">
                            <div class="flex flex-col items-start mb-5 md:mb-0">
                                <h3 id="h3-domain-display-2" class="text-[23px] font-[700] leading-[29.9px] text-left text-[#3C476C]">Your domain search results</h3>
                            </div>

                            <!-- Table items hidden by default -->
                            @foreach ($tlds as $tld)
                            <div class="flex-table-container tld-item">
                                <div class="flex-table-item mb-4 sm:mb-0">
                                    <div class="flex-table-cell cell-start is-bold" data-th="TLD Name">
                                        <span class="dark-text">{{ $tld->tld_name }}</span>
                                    </div>
                                    <div class="flex-table-cell cell-start" data-th="Category">
                                        <span class="light-text">{{ $tld->category }}</span>
                                    </div>
                                    <div class="flex-table-cell">
                                        <span class="light-text"></span>
                                    </div>
                                    <div class="flex-table-cell">
                                        <span class="light-text"></span>
                                    </div>
                                    <div class="flex-table-cell" data-th="Price">
                                        <span class="light-text">IDR {{ number_format($tld->tld_price, 0, ',', '.') }} / years</span>
                                    </div>
                                    <div class="flex-table-cell cell-end" data-th="Actions">
                                        <span class="light-text">
                                            <button id="transfer-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full" style="border: unset; padding:12px 16px;">
                                                <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe428;</span>
                                                <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                                    Transfer
                                                </span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                            <div id="transfer-form" class="flex-table-container hidden">
                                <div class="flex-table-item flex items-center w-full" style="align-items: center;">
                                    <div class="flex flex-grow cell-start is-bold" data-th="Company">
                                        <div class="field w-full">
                                            <div class="control">
                                                <input type="text" class="input w-full rounded-full mb-4 md:hidden" placeholder="Enter your EPP code here">
                                                <input type="text" class="hidden md:block input w-full rounded-full" placeholder="Enter your EPP code here">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="flex-shrink-0 cell-end" data-th="Actions">
                                        <span class="light-text">
                                            <button id="continue-button" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white rounded-full py-3 px-4 ml-2">
                                                <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                                                    Continue
                                                </span>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                <div id="success-message" class="message is-success hidden mt-4">
                                    <a class="delete" id="delete-message"></a>
                                    <div class="message-body">
                                        The domain has been successfully transferred.
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
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
                                Rp${domain.tld_price.toLocaleString('id-ID', {minimumFractionDigits: 0, maximumFractionDigits: 0})}
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

        // Panggil function filterDomains dengan default "View All" saat halaman pertama kali dimuat
        document.addEventListener('DOMContentLoaded', () => {
            filterDomains('View All');
        });

        function orderTLD(button) {
            if (!button) {
                console.error('Button element is null or not passed correctly.');
                return; // Berhenti jika button tidak ada
            }

            const tldName = button.getAttribute('data-tld-name');
            const tldPrice = button.getAttribute('data-tld-price');

            // Cek apakah atribut ada
            if (!tldName || !tldPrice) {
                console.error('Missing data attributes:', {
                    tldName,
                    tldPrice
                });
                return; // Berhenti jika atribut hilang
            }

            console.log('TLD Name:', tldName);
            console.log('TLD Price:', tldPrice);

            // Kirim data ke backend jika atribut lengkap
            fetch('/order-tld', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    },
                    body: JSON.stringify({
                        tld_name: tldName,
                        tld_price: tldPrice
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('TLD successfully ordered!');
                    } else {
                        alert('Error ordering TLD!');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Fungsi untuk mengatur pencarian TLD
            function setupTldSearch(containerId) {
                const container = document.getElementById(containerId);
                const domainSearch = container.querySelector('#domain-search');
                const tldResults = container.querySelector('#tld-results');
            }

            // Fungsi untuk mengatur tombol transfer dan form
            function setupTransferButtons(containerId) {
                const container = document.getElementById(containerId);
                const transferButtons = container.querySelectorAll('#transfer-button');
                const transferForm = container.querySelector('#transfer-form');
                const continueButton = container.querySelector('#continue-button');
                const successMessage = container.querySelector('#success-message');
                const deleteMessage = container.querySelector('#delete-message');
                const nextButton = container.querySelector('#next-button-helper');

                // Fungsi untuk mengatur tombol Next Step
                function toggleNextButton() {
                    if (successMessage.classList.contains('hidden')) {
                        nextButton.style.display = 'none'; // Hide Next Step button
                    } else {
                        nextButton.style.display = 'block'; // Show Next Step button
                    }
                }

                // Event listener untuk tombol transfer
                transferButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        transferForm.classList.toggle('hidden');
                    });
                });

                // Event listener untuk tombol continue
                continueButton.addEventListener('click', function() {
                    successMessage.classList.remove('hidden');
                    toggleNextButton(); // Update the visibility of Next Step button
                });

                // Event listener untuk tombol delete message
                deleteMessage.addEventListener('click', function() {
                    successMessage.classList.add('hidden');
                    toggleNextButton(); // Update the visibility of Next Step button
                });

                // Initial state: Hide the Next Step button until success message appears
                toggleNextButton();
            }

            // Mengatur fungsi untuk kedua bagian
            setupTldSearch('transfer-domain');
            setupTldSearch('hosting-only');
            setupTransferButtons('transfer-domain');
            setupTransferButtons('hosting-only');
        });
    </script>