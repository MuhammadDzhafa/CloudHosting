<div class="section-frame padding-1 bg-gradient-custom flex flex-col justify-center items-center">
    <h2 class="title-section text-center text-white mb-4">
        Find Your Perfect Domain
    </h2>
    <p class="text-base-hero text-primary text-white text-center mb-10 lg:max-w-[800px] md:max-w-[400px]">
        Get personalized suggestions based on your preferences, explore available names, and secure the perfect match for your brand.
    </p>
    <!-- Search Input and Buttons -->
    <div class="flex flex-col flex-grow w-full">
        <div class="flex flex-col md:flex-row justify-center gap-2">
            <!-- Baris Pertama: Input Pencarian -->
            <div class="field flex-grow h-full mb-0 md:w-[360px] lg:w-[3600px]">
                <div class="control has-icon">
                    <input type="text" id="domain-search" class="input is-rounded search-input"
                        placeholder="Search...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>
            </div>

            <!-- Baris Kedua: Tombol -->
            <div class="flex flex-row w-full gap-2 md:gap-2">
                <button id="search-btn"
                    class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white rounded-full w-1/2"
                    style="border: unset; padding:12px 16px;">
                    <span class="material-icons mr-2" style="color:#fff; font-size:20px">&#xe8b6;</span>
                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#fff] text-center">
                        Search
                    </span>
                </button>

                <button id="search-button" class="button h-button rounded-full w-1/2"
                    style="border: unset; padding:12px 16px;">
                    <span class="material-icons mr-2" style="color:#2A4693; font-size:20px">&#xe428;</span>
                    <span class="text-[16px] leading-[23.2px] font-['Inter'] font-medium text-[#2A4693] text-center">
                        Transfer
                    </span>
                </button>
            </div>
        </div>

        <div id="domain-container" class="mt-6">
            @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
            <div class="domain-card card-gradient popular-domain" data-domain="{{ $domain }}">
                <div class="card-content-product">
                    <p class="domain-name">{{ $domain }}</p>
                    <div class="price-container">
                        <span class="price-currency">Rp</span>
                        <span class="price-number">20K</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Search Results Dropdown -->
        <div id="dropdown-container" class="w-full mt-4 rounded-lg max-h-0 opacity-0 overflow-hidden">
            <div id="dropdown-content" class="p-2 space-y-4">
                <!-- Search results will be injected here -->
            </div>
        </div>

        <!-- Flex Table -->
        <div id="component-transfer" class="flex-table">
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
    </div>
</div>

<!-- section1.blade.php -->
<div id="modal-whois" class="modal h-modal">
    <div class="modal-background h-modal-close"></div>
    <div class="modal-content">
        <div class="modal-card">
            <header class="modal-card-head">
                <h3>WHOIS Information</h3>
                <button class="h-modal-close ml-auto" aria-label="close">
                    <i data-feather="x"></i>
                </button>
            </header>
            <div class="modal-card-body">
                <div id="whois-output">
                    <!-- Konten WHOIS akan dimasukkan di sini secara dinamis -->
                </div>
            </div>
            <div class="modal-card-foot is-end">
                <a class="button h-button is-rounded h-modal-close">Close</a>
            </div>
        </div>
    </div>
</div>


<script>
    function setupWhoisModal() {
        console.log('Setting up WHOIS Modal'); // Tambahkan log untuk debugging

        document.querySelectorAll('.h-modal-trigger').forEach(button => {
            button.addEventListener('click', function(event) {
                event.preventDefault(); // Cegah default behavior
                console.log('WHOIS Modal Trigger Clicked'); // Log untuk debugging

                const modalId = this.getAttribute('data-modal');
                const modal = document.getElementById(modalId);
                const whoisOutput = modal ? modal.querySelector('#whois-output') : null;

                console.log('Modal ID:', modalId);
                console.log('Modal Element:', modal);

                if (modal) {
                    // Pastikan modal ditampilkan
                    modal.classList.add('is-active');

                    // Reset output sebelum mengisi data baru
                    if (whoisOutput) {
                        whoisOutput.innerHTML = '<p>Fetching WHOIS data...</p>';
                    }

                    // Ambil domain yang dipilih
                    const domainName = this.getAttribute('data-domain-name');
                    if (!domainName) {
                        console.error('Domain name is missing from button attribute!');
                        if (whoisOutput) {
                            whoisOutput.innerHTML = '<p>Domain name not specified.</p>';
                        }
                        return;
                    }

                    // Fetch WHOIS data
                    const apiKey = 'at_50ndnvrxO5vW0BVGxlhraK54ndQJp';
                    const url = `https://www.whoisxmlapi.com/whoisserver/WhoisService?apiKey=${apiKey}&domainName=${domainName}&outputFormat=JSON`;

                    fetch(url)
                        .then(response => {
                            if (!response.ok) throw new Error('Network response was not ok');
                            return response.json();
                        })
                        .then(data => {
                            console.log('WHOIS API response:', data);

                            if (whoisOutput) {
                                if (data.WhoisRecord && data.WhoisRecord.domainName) {
                                    // Format tanggal dengan lebih baik
                                    const formatDate = (dateString) => {
                                        if (!dateString) return 'Not available';
                                        try {
                                            return new Date(dateString).toLocaleDateString('en-US', {
                                                year: 'numeric',
                                                month: 'long',
                                                day: 'numeric'
                                            });
                                        } catch {
                                            return dateString;
                                        }
                                    };

                                    whoisOutput.innerHTML = `
                                    <div class="whois-details">
                                        <h3>WHOIS Information for ${domainName}</h3>
                                        <table class="table is-fullwidth">
                                            <tr>
                                                <td><strong>Domain Name:</strong></td>
                                                <td>${data.WhoisRecord.domainName || 'Not available'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Registrar:</strong></td>
                                                <td>${data.WhoisRecord.registrarName || 'Not available'}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Creation Date:</strong></td>
                                                <td>${formatDate(data.WhoisRecord.createdDate)}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Expiration Date:</strong></td>
                                                <td>${formatDate(data.WhoisRecord.expiresDate)}</td>
                                            </tr>
                                            <tr>
                                                <td><strong>Contact Email:</strong></td>
                                                <td>${data.WhoisRecord.contactEmail || 'Not available'}</td>
                                            </tr>
                                        </table>
                                    </div>
                                `;
                                } else {
                                    whoisOutput.innerHTML = `
                                    <div class="notification is-warning">
                                        WHOIS data not available for ${domainName}.
                                    </div>
                                `;
                                }
                            }
                        })
                        .catch(error => {
                            console.error('Error fetching WHOIS data:', error);
                            if (whoisOutput) {
                                whoisOutput.innerHTML = `
                                <div class="notification is-danger">
                                    Unable to retrieve WHOIS information. Please try again later.
                                </div>
                            `;
                            }
                        });
                } else {
                    console.error('Modal not found:', modalId);
                }
            });
        });

        // Tutup modal ketika tombol close diklik
        document.querySelectorAll('.h-modal-close').forEach(closeButton => {
            closeButton.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.classList.remove('is-active');
                    modal.style.display = 'none'; // Sembunyikan modal
                }
            });
        });

        // Tutup modal ketika area background diklik
        document.querySelectorAll('.modal-background').forEach(background => {
            background.addEventListener('click', function() {
                const modal = this.closest('.modal');
                if (modal) {
                    modal.classList.remove('is-active');
                    modal.style.display = 'none'; // Sembunyikan modal
                }
            });
        });
    }

    // Pastikan setupWhoisModal dipanggil setelah DOM fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        setupWhoisModal();
    });

    document.addEventListener('DOMContentLoaded', function() {
        // Ambil semua card domain
        const domainCards = document.querySelectorAll('.domain-card');
        const domainSearchInput = document.getElementById('domain-search');

        // Fungsi untuk smooth scroll
        function smoothScrollToElement(elementId) {
            const element = document.getElementById(elementId);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'center',
                    inline: 'nearest'
                });
            }
        }

        // Tambahkan event listener ke setiap card domain
        domainCards.forEach(card => {
            card.addEventListener('click', function() {
                // Ambil nama domain dari atribut data-domain
                const domainName = this.getAttribute('data-domain');

                // Pastikan input pencarian ada
                if (domainSearchInput) {
                    // Set value input dengan nama domain
                    domainSearchInput.value = domainName;

                    // Focus ke input
                    domainSearchInput.focus();

                    // Scroll smooth ke input
                    smoothScrollToElement('domain-search');
                } else {
                    console.error('Input pencarian domain tidak ditemukan');
                }
            });
        });
    });
</script>