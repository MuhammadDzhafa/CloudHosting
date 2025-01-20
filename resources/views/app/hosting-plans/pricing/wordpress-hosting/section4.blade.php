<div class="font-inter" style="background: #fff;">
    <section class="section-frame padding-1">
        <div class="container mx-auto px-4 py-10">
            <h2 class="title-section text-center mb-6">
                Our Technology Stack
            </h2>
            <div class="grid grid-cols-2 lg:grid-cols-6 gap-12 justify-items-center">
                <!-- Card 1 -->
                <div id="hover-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="litespeed-img" src="/assets/img/icons/section4 price/litespeed-logo-square.png" alt="litespeed" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">LiteSpeed</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        High performance, web server, caching, scalable.
                    </p>
                </div>
                <!-- Card 2 -->
                <div id="imunify-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="imunify-img" src="/assets/img/icons/section4 price/imunify360.png" alt="imunify360" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">Imunify 360</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        Security, malware protection, firewall, proactive.
                    </p>
                </div>
                <!-- Card 3 -->
                <div id="cloudlinux-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="cloudlinux-img" src="/assets/img/icons/section4 price/cloudlinux 1.png" alt="cloud linux" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">Cloud Linux</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        Isolation, resource limits, stability, multitenant.
                    </p>
                </div>
                <!-- Card 4 -->
                <div id="cpanel-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="cpanel-img" src="/assets/img/icons/section4 price/cpanel.png" alt="cpanel" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">CPanel</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        Control panel, user-friendly, hosting management.
                    </p>
                </div>
                <!-- Card 5 -->
                <div id="whm-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="whm-img" src="/assets/img/icons/section4 price/whm.png" alt="whm" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">WHM</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        Server management, root access, hosting control.
                    </p>
                </div>
                <!-- Card 6 -->
                <div id="softaculous-container" class="flex flex-col items-center px-[10px] py-[30px] gap-[10px] border border-gray-200 shadow-sm rounded-[50px] bg-[#EBEFF9]">
                    <img id="softaculous-img" src="/assets/img/icons/section4 price/softaculous.png" alt="softaculous" class="w-[60px] mb-4 transition-all duration-300 ease-in-out">
                    <h2 class="text-gray-800 text-xl font-semibold mb-2" style="margin-top: -10px;">Softaculous</h2>
                    <p class="text-center" style="margin-top: -10px; width: 143.33px; height: 60px; font-weight: 400; font-size: 14px; line-height: 20.3px; color: #283252;">
                        Auto-installer, scripts, one-click install, CMS.
                    </p>
                </div>
            </div>
        </div>
    </section>
</div>


<script>
    const imageElement = document.getElementById('litespeed-img');
    const hoverContainer = document.getElementById('hover-container');
    const imunifyImageElement = document.getElementById('imunify-img');
    const imunifyContainer = document.getElementById('imunify-container');
    const cloudlinuxImageElement = document.getElementById('cloudlinux-img');
    const cloudlinuxContainer = document.getElementById('cloudlinux-container');
    const cpanelImageElement = document.getElementById('cpanel-img');
    const cpanelContainer = document.getElementById('cpanel-container');
    const whmImageElement = document.getElementById('whm-img');
    const whmContainer = document.getElementById('whm-container');
    const softaculousImageElement = document.getElementById('softaculous-img');
    const softaculousContainer = document.getElementById('softaculous-container');

    hoverContainer.addEventListener('mouseover', function() {
        imageElement.src = '/assets/img/cloudhosting/litespeed.svg';
    });

    hoverContainer.addEventListener('mouseout', function() {
        imageElement.src = '/assets/img/icons/section4 price/litespeed-logo-square.png';
    });

    imunifyContainer.addEventListener('mouseover', function() {
        imunifyImageElement.src = '/assets/img/cloudhosting/imunify.svg';
    });

    imunifyContainer.addEventListener('mouseout', function() {
        imunifyImageElement.src = '/assets/img/icons/section4 price/imunify360.png';
    });

    cloudlinuxContainer.addEventListener('mouseover', function() {
        cloudlinuxImageElement.src = '/assets/img/cloudhosting/cloudlinux.svg';
    });

    cloudlinuxContainer.addEventListener('mouseout', function() {
        cloudlinuxImageElement.src = '/assets/img/icons/section4 price/cloudlinux 1.png';
    });

    cpanelContainer.addEventListener('mouseover', function() {
        cpanelImageElement.src = '/assets/img/cloudhosting/cpanel.svg';
    });

    cpanelContainer.addEventListener('mouseout', function() {
        cpanelImageElement.src = '/assets/img/icons/section4 price/cpanel.png';
    });

    whmContainer.addEventListener('mouseover', function() {
        whmImageElement.src = '/assets/img/cloudhosting/whm.svg';
    });

    whmContainer.addEventListener('mouseout', function() {
        whmImageElement.src = '/assets/img/icons/section4 price/whm.png';
    });

    softaculousContainer.addEventListener('mouseover', function() {
        softaculousImageElement.src = '/assets/img/cloudhosting/softaculous.svg';
    });

    softaculousContainer.addEventListener('mouseout', function() {
        softaculousImageElement.src = '/assets/img/icons/section4 price/softaculous.png';
    });
</script>