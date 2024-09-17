@extends('layouts.web.master')

<div class="bg-white">
    <div class="max-w-[1200px] mx-auto p-4 md:p-6">
        <div
            class="w-full h-auto p-6 md:p-[50px] bg-[#FFFFFF] border border-[#DEDEDE] rounded-[8px] shadow-sm mt-[120px] md:mt-[120px]">
            <div class="flex items-center text-blue-600 mb-6">
                <a href="#"
                    class="flex items-center text-center text-[14px] md:text-[16px] font-medium text-[#4A6DCB]">
                    <img src="/assets/img/icons/arrowback.svg" alt="" class="mr-2">
                    Back to Server Status
                </a>
            </div>

            <div class="flex flex-col md:flex-row justify-between items-start mb-8">
                <h1
                    class="text-[22px] md:text-[26px] font-semibold leading-[28px] md:leading-[33.8px] text-[#263E83] w-full md:w-[636px] mb-6 md:mb-0">
                    Reason For Outage (RFO) - International Downtime
                </h1>
                <div class="text-left md:text-right mb-6 md:mb-10">
                    <img src="assets/img/logos/logo/awanhosting.svg" alt="Awan Hosting Logo"
                        class="h-10 md:h-12 mb-4 md:ml-auto">
                    <p
                        class="w-full md:w-[259px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left md:text-right text-[#263E83]">
                        PT. Kazee Digital Indonesia
                    </p>
                    <p
                        class="w-full md:w-[259px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left md:text-right text-[#263E83]">
                        Jl. Setrasari Indah No.4, Sukasari,</p>
                    <p
                        class="w-full md:w-[259px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left md:text-right text-[#263E83]">
                        Kec. Sukasari, Kota Bandung,</p>
                    <p
                        class="w-full md:w-[259px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left md:text-right text-[#263E83]">
                        Jawa Barat 40152.</p>
                </div>
            </div>

            <p
                class="text-[14px] md:text-[16px] font-semibold text-left leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[242px] mb-4">
                Dear Awan Hosting Customers,
            </p>
            <p
                class="text-[14px] md:text-[16px] font-normal text-left leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[611px] mb-4">
                We would like to inform you about an outage that occurred on the following date:
            </p>

            <div class="mb-6">
                <div class="flex mb-2 items-center">
                    <p
                        class="text-left text-[14px] md:text-[16px] font-semibold leading-[20px] md:leading-[23.2px] text-[#263E83] w-[80px] md:w-[105px]">
                        Date
                    </p>
                    <p
                        class="text-left text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[300px] ml-2">
                        : Thursday, September 6, 2024
                    </p>
                </div>
                <div class="flex mb-2 items-center">
                    <p
                        class="text-left text-[14px] md:text-[16px] font-semibold leading-[20px] md:leading-[23.2px] text-[#263E83] w-[80px] md:w-[105px]">
                        Time
                    </p>
                    <p
                        class="text-left text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[226px] ml-2">
                        : 10:15 AM - 10:45 AM WIB
                    </p>
                </div>
                <div class="flex mb-2 items-center">
                    <p
                        class="text-left text-[14px] md:text-[16px] font-semibold leading-[20px] md:leading-[23.2px] text-[#263E83] w-[80px] md:w-[105px]">
                        Duration
                    </p>
                    <p
                        class="text-left text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[226px] ml-2">
                        : 30 minutes
                    </p>
                </div>
                <div class="flex items-center">
                    <p
                        class="text-left text-[14px] md:text-[16px] font-semibold leading-[20px] md:leading-[23.2px] text-[#263E83] w-[80px] md:w-[105px]">
                        Status
                    </p>
                    <p
                        class="text-left text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-[#263E83] w-full md:w-[226px] ml-2">
                        : Resolved
                    </p>
                </div>
            </div>

            <div class="border-transparent rounded-[10px] p-4 md:p-6 mb-6 w-full md:w-[1040px] border-2"
                style="border-image-source: radial-gradient(104.31% 150.2% at 0% 22.79%, rgba(100, 52, 147, 0.76) 23.63%, rgba(74, 109, 203, 0.8) 70.69%, rgba(100, 210, 247, 0.8) 100%); border-image-slice: 1;">
                <h2
                    class="text-[#3C476C] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] mb-2 w-full text-left">
                    Cause
                </h2>
                <p class="mb-4 text-[#3C476C] text-[14px] md:text-[16px] leading-[20px] md:leading-[23.2px]">The primary
                    cause of this outage was a failure in our primary international connectivity route managed by one of
                    our upstream providers. After investigation, it was determined that the issue was caused by
                    [technical description of the cause, such as hardware failure, network configuration issues, or
                    other exceptional events].</p>

                <h2
                    class="text-[#3C476C] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] mb-2 w-full text-left">
                    Impact
                </h2>
                <p class="mb-4 text-[#3C476C] text-[14px] md:text-[16px] leading-[20px] md:leading-[23.2px]">This outage
                    primarily affected customers using international networks to access our services on the
                    103.102.153.0/24 network. During the downtime, customers may have experienced difficulties accessing
                    websites, email services, and other features hosted on that network.</p>

                <h2
                    class="text-[#3C476C] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] mb-2 w-full text-left">
                    Resolution
                </h2>
                <p class="text-[#3C476C] text-[14px] md:text-[16px] leading-[20px] md:leading-[23.2px]">To resolve the
                    issue, our technical team immediately redirected traffic to our backup connectivity route, which we
                    have in place for such situations. The redirection process took 30 minutes to complete, after which
                    all services were restored and accessible from international networks.</p>
            </div>

            <p
                class="w-full md:w-[990px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left text-[#263E83] mb-4">
                We have informed all affected customers via email and posted an announcement on the service dashboard
                about this outage. If you experience any other issues or continued disruptions, please contact our
                support team via the support ticket system for further assistance.
            </p>
            <p
                class="w-full md:w-[990px] text-[14px] md:text-[16px] font-normal leading-[20px] md:leading-[23.2px] text-left text-[#263E83] mb-4">
                We sincerely apologize for any inconvenience caused by this outage. We are committed to continuously
                improving our service reliability and ensuring that similar incidents do not occur in the future. Thank
                you for your understanding and continued support as a valued Awan Hosting customer.
            </p>

            <div class="mt-8 text-left md:text-right">
                <p
                    class="w-full md:w-[1100px] text-[18px] md:text-[23px] font-bold leading-[24px] md:leading-[29.9px] text-[#263E83]">
                    Best Regards,
                </p>
                <p
                    class="w-full md:w-[1100px] text-[18px] md:text-[23px] font-bold leading-[24px] md:leading-[29.9px] text-[#263E83]">
                    Awan Hosting Network Administrator
                </p>
            </div>
        </div>
    </div>
</div>
