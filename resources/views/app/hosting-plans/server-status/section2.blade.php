<div class="bg-white">
    <div class="section-frame padding-1 bg-[#FFFFFF]">
        <div class="max-w-full mx-auto">
            <div class="w-full rounded-lg border border-[#7C7C7C] overflow-hidden">
                <!-- Isi konten tetap sama seperti sebelumnya -->
                <div class="p-4 md:p-6 border-b border-[#DEDEDE]">
                    <div class="flex items-center">
                        <div class="w-3 h-3 bg-[#11CB9B] rounded-full mr-4"></div>
                        <h1 class="text-xl md:text-2xl lg:text-[23px] font-semibold leading-tight md:leading-[29.9px] text-[#4A6DCB]">
                            All Systems Operational
                        </h1>
                    </div>
                    <p class="text-sm md:text-base lg:text-[16px] font-normal leading-normal md:leading-[23.2px] text-[#6C88D5] ml-7 mt-1">
                        As of August 13, 2024 at 11:00 PM UTC+7
                    </p>
                </div>

                <!-- Content -->
                <div class="p-4 md:p-6">
                    <!-- Header Columns -->
                    <div class="flex mb-4 border-b border-[#DEDEDE] pb-2">
                        <h2 class="w-1/2 text-sm md:text-base lg:text-[16px] font-medium leading-normal md:leading-[23.2px] text-[#000000]">
                            Services
                        </h2>
                        <h2 class="w-full text-sm md:text-base lg:text-[16px] text-left font-normal leading-normal md:leading-[23.2px] text-[#000000]">
                            Uptime of the past 90 days
                        </h2>
                    </div>

                    <!-- Services List -->
                    <div class="space-y-6">
                        <!-- Cloud Hosting Server -->
                        <div class="border-b border-[#DEDEDE] pb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm md:text-base lg:text-[16px] font-semibold leading-normal md:leading-[23.2px] text-[#4A6DCB]">
                                    Cloud Hosting Server
                                </span>
                                <span class="bg-[#11CB9B] text-[#EBEFF9] text-xs md:text-sm lg:text-[13px] font-medium leading-tight md:leading-[18.85px] px-[10px] py-[4px] rounded-full">Operational</span>
                            </div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[#000000] text-xs md:text-sm lg:text-[14px] font-medium leading-normal md:leading-[20.3px]">Uptime</span>
                                <span class="text-[#000000] text-xs md:text-sm lg:text-[14px] font-normal leading-normal md:leading-[20.3px]">100% - No Current Issue</span>
                            </div>
                            <div class="flex overflow-x-auto space-x-1 md:space-x-1.5 lg:space-x-2 scrollbar-hide">
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        block   // Default mobile
        md:hidden  // Sembunyikan di medium
    "></div>
                                ', 38) !!}

                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        hidden  // Sembunyikan default
        md:block  // Tampilkan di medium
    "></div>
                                ', 64) !!}
                            </div>
                        </div>

                        <!-- WordPress Hosting -->
                        <div class="border-b border-[#DEDEDE] pb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-[#4A6DCB] text-sm md:text-base lg:text-[16px] font-semibold leading-normal md:leading-[23.2px]">WordPress Hosting</span>
                                <span class="bg-[#ECB74B] text-[#FFFFFF] text-xs md:text-sm lg:text-[13px] font-medium leading-tight md:leading-[18.85px] px-[10px] py-[4px] rounded-full">Incident</span>
                            </div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[#000000] text-xs md:text-sm lg:text-[14px] font-medium leading-normal md:leading-[20.3px]">Uptime</span>
                                <span class="text-[#E59A34] text-xs md:text-sm lg:text-[14px] font-normal leading-normal md:leading-[20.3px]">75% - Current Issue ▼</span>
                            </div>
                            <div class="flex overflow-x-auto space-x-1 md:space-x-1.5 lg:space-x-2 scrollbar-hide">
                                {{-- Hijau Mobile --}}
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        block md:hidden
    "></div>
                                ', 37) !!}

                                {{-- Hijau Desktop --}}
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        hidden md:block
    "></div>
                                ', 63) !!}

                                {{-- Merah Mobile --}}
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-red-500 flex-shrink-0 
        block md:hidden
    "></div>
                                ', 1) !!}

                                {{-- Merah Desktop --}}
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-red-500 flex-shrink-0 
        hidden md:block
    "></div>
                                ', 1) !!}
                            </div>
                        </div>

                        <!-- CPanel -->
                        <div class="border-b border-[#DEDEDE] pb-6">
                            <div class="flex justify-between items-center mb-2">
                                <span class="text-sm md:text-base lg:text-[16px] font-semibold leading-normal md:leading-[23.2px] text-[#4A6DCB]">
                                    CPanel
                                </span>
                                <span class="bg-[#11CB9B] text-[#EBEFF9] text-xs md:text-sm lg:text-[13px] font-medium leading-tight md:leading-[18.85px] px-[10px] py-[4px] rounded-full">Operational</span>
                            </div>
                            <div class="flex justify-between items-center mb-1">
                                <span class="text-[#000000] text-xs md:text-sm lg:text-[14px] font-medium leading-normal md:leading-[20.3px]">Uptime</span>
                                <span class="text-[#000000] text-xs md:text-sm lg:text-[14px] font-normal leading-normal md:leading-[20.3px]">100% - No Current Issue</span>
                            </div>
                            <div class="flex overflow-x-auto space-x-1 md:space-x-1.5 lg:space-x-2 scrollbar-hide">
                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        block   // Default mobile
        md:hidden  // Sembunyikan di medium
    "></div>
                                ', 38) !!}

                                {!! str_repeat('
                                <div class="w-2 md:w-1.5 lg:w-2.5 h-6 md:h-7 lg:h-8 rounded-md bg-[#11CB9B] flex-shrink-0 
        hidden  // Sembunyikan default
        md:block  // Tampilkan di medium
    "></div>
                                ', 64) !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>