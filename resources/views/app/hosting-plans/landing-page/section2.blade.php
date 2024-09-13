{{-- <div class="section-frame padding-6 bg-gradient-custom flex lg:flex-row gap-[30px]">

    <!-- Text Container -->
    <div class="text-container gap-2">
        <p class="text-base-hero mb-0 text-white">Popular Domain</p>
        <h2 class="title-section text-white">Search Your <br />Domain Name</h2>
    </div>

    <!-- Search Input and Buttons -->
    <div class="flex flex-col flex-grow gap-4">
        <div class="flex justify-center flex-row gap-2">
            <div class="field flex-grow h-full mb-0">
                <div class="control has-icon">
                    <input type="text" id="domain-search" class="input is-rounded search-input" placeholder="Search...">
                    <div class="form-icon">
                        <i data-feather="search"></i>
                    </div>
                </div>
            </div>

            <button id="search-btn"
                class="ml-4 h-[47px] w-[114px] flex items-center justify-center gap-2 rounded-full bg-[#4A6DCB] text-white hover:bg-[#4A6DCB] transition duration-300">
                Search
            </button>
            <button
                class="h-[47px] w-[124px] flex items-center justify-center gap-2 rounded-full bg-[#F3F5FC] text-[#2A4693] hover:bg-[#E2E5E9] transition duration-300">
                <img src="/assets/img/icons/crop.svg" alt="Icon" class="w-6 h-6">
                Transfer
            </button>
        </div>

        <!-- Search Results Dropdown -->
        <div id="dropdown-container" class="w-full mt-4 rounded-lg max-h-0 opacity-0 overflow-hidden">
            <div id="dropdown-content" class="p-2 space-y-4">
                <!-- Search results will be injected here -->
            </div>
        </div>

        <!-- Popular Domains -->
        <div class="flex inline-flex justify-center items-center gap-[5px]">
            @foreach(['.com', '.net', '.org', '.co.id', '.ac.id'] as $domain)
                <div class="card p-[20px]">
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
    </div>
</div>

<script>
    document.getElementById('search-btn').addEventListener('click', function () {
        const searchQuery = document.getElementById('domain-search').value;
        const dropdownContainer = document.getElementById('dropdown-container');
        const dropdownContent = document.getElementById('dropdown-content');

        if (searchQuery) {
            // Simulating search results - replace with actual data
            dropdownContent.innerHTML = `
            <div class="message is-success message-body">
                <div class="flex flex-row">
                    <p>
                        <span class="font-bold">${searchQuery}.com</span>
                        <span>is available</span>
                    <p>
                </div>
            </div>
            <div class="message message-body">
                <p>${searchQuery}.ac.id is not available<p>
            </div>
            <div>
                <p class="text-[#FFFFFF] font-semibold mb-2 text-xl">AI Recommendations ✨</p>
                <p class="text-[#FFFFFF] mb-4">For Polban, which is a vocational institution in
                Indonesia, here are some domain name recommendations with education-related
                TLD:</p>
                <div class="message is-primary message-body">
                <div class="flex flex-row">
                    <p>
                        <span class="font-bold">${searchQuery}.edu</span>
                        <span>is available</span>
                    <p>
                </div>
            </div>
            
        `;

            // Apply animation class to show the dropdown
            dropdownContainer.classList.add('show');
        } else {
            // Hide the container if there's no search
            dropdownContainer.classList.remove('show');
        }
    });

</script>










<!-- 
        <div class="">
            <p class="text-[#FFFFFF] font-semibold mb-2 text-xl">AI Recommendations ✨</p>
            <p class="text-[#FFFFFF] mb-4">For Polban, which is a vocational institution in
                Indonesia, here are some domain name recommendations with education-related
                TLD:</p>
            <div class="space-y-2">

                <div class="flex justify-between items-center p-4 bg-[#F2F7FE] rounded-lg shadow-sm">
                    <div>
                        <p class="text-[#2A4693] font-semibold text-lg">polban.edu</p>
                        <p class="text-[#2A4693]">Exclusive offer: $1.50/mon for a 2-year
                            plan</p>
                    </div>
                    <button class="bg-[#2A4693] text-white px-4 py-2 rounded-full">Add to
                        Cart</button>
                </div>


                <div class="flex justify-between items-center p-4 bg-[#F2F7FE] rounded-lg shadow-sm">
                    <div>
                        <p class="text-[#2A4693] font-semibold text-lg">pol-ban.ac.id</p>
                        <p class="text-[#2A4693]">Exclusive offer: $1.50/mon for a 2-year
                            plan</p>
                    </div>
                    <button class="bg-[#2A4693] text-white px-4 py-2 rounded-full">Add to
                        Cart</button>
                </div>
            </div>
        </div>


        <div class="flex justify-between items-start">
            <div class="relative max-w-[300px]">

                <h2
                    class="text-[36px] w-[300px] font-bold leading-[43.2px] text-[#FFFFFF] font-inter absolute top-[-40px]">
                    Search Your Domain Name
                </h2>
            </div>


        </div>

        <div class="text-right shift-down">
            <a href="#" id="view-price-list"
                class="text-[#FFFFFF] font-inter text-[18px] font-semibold leading-[23.4px]">
                View Price List
                <svg class="w-4 h-4 inline ml-1 transform transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
                    </path>
                </svg>
            </a>
        </div>

        <div class="left-20 bottom-[-57px] opacity-100">
            <img src="/assets/img/bg/globewhite.svg" alt="">
            <img id="globe-gradient" src="/assets/img/bg/globewhite.svg" alt=""
                class="absolute left-[43px] -top-20 hidden">
        </div>



    </div>
</div> -->







<!-- 


    <style>
        .container-fluid {
            width: 100%;
            margin-right: auto;
            margin-left: auto;
        }

        @media (max-width: 1440px) {
            .container-fluid>div {
                padding-left: 2rem;
                padding-right: 2rem;
            }
        }

        @media (max-width: 768px) {
            .container-fluid>div {
                padding-left: 1rem;
                padding-right: 1rem;
            }
        }

        #dropdown-container {
            max-height: 300px;
            /* Ubah sesuai dengan tinggi yang Anda inginkan */
            overflow-y: auto;
        }


        /* Mengatur jarak tombol-tombol kontrol dari tepi container */
        #dropdown-container .flex {
            margin-right: 0.5rem;
        }

        #expandable-div {
            transition: height 0.5s ease-in-out;
        }

        #globe-gradient {
            position: absolute;
            top: 108px;
            /* Sesuaikan dengan nilai yang Anda inginkan */
            left: 0;
            /* Sesuaikan dengan nilai yang Anda inginkan */
            width: 100%;
            /* Atur lebar sesuai kebutuhan */
            height: auto;
            /* Atur tinggi sesuai kebutuhan */
            opacity: 0;
            transition: opacity 0.5s ease-in-out;
            transform: rotate(180deg);
        }

        .shift-down {
            transform: translateY(400px);
            transition: transform 0.3s ease-in-out;
        }

        .text-right {
            position: relative;
            top: 0;
            /* Atur posisi awal sesuai kebutuhan */
            transition: top 0.3s ease-in-out;
        }
    </style> -->
<!-- 

<script>
    document.getElementById('search-btn').addEventListener('click', function () {
        const searchQuery = document.getElementById('domain-search').value.trim();
        const expandableDiv = document.getElementById('expandable-div');
        const globeGradient = document.getElementById('globe-gradient');
        const viewPriceList = document.getElementById('view-price-list');

        if (searchQuery === 'polban.ac.id') {
            // Show dropdown
            document.getElementById('dropdown-container').classList.remove('hidden');

            // Show globe gradient with fade-in effect
            globeGradient.classList.remove('hidden');
            setTimeout(() => {
                globeGradient.style.opacity = 1;
            }, 10); // Use a short timeout to ensure transition works

            // Apply shift-down class
            viewPriceList.classList.add('shift-down');
        } else {
            // Hide dropdown if the search query does not match
            document.getElementById('dropdown-container').classList.add('hidden');

            // Hide globe gradient
            globeGradient.style.opacity = 0;
            setTimeout(() => {
                globeGradient.classList.add('hidden');
            }, 500); // Match this duration with your transition time

            // Remove shift-down class
            viewPriceList.classList.remove('shift-down');
        }

        if (expandableDiv.style.height === '440px' || expandableDiv.style.height === '') {
            expandableDiv.style.height = '750px'; // Set height ke nilai akhir yang diinginkan
        } else {
            expandableDiv.style.height = '440px'; // Kembali ke height awal jika sudah terbuka
        }
    });

    asdfasdf
</script>
<script>
    document.querySelector('button.ml-4').addEventListener('click', function () {
        const domainBoxes = document.querySelectorAll('.grid.grid-cols-5 div');
        domainBoxes.forEach(box => {
            box.classList.toggle('shift-down');
        });

        // Tambahkan class expanded ke div absolute yang diinginkan
        const absoluteDiv = document.querySelector('.relative .absolute');
        absoluteDiv.classList.toggle('expanded');
    });


</script> --> --}}