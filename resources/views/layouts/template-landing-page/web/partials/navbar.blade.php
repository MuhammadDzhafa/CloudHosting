<header class="bg-white shadow-sm lg:w-fixed lg:h-auto lg:opacity-1">
    <div class="webapp-navbar w-full" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px)">
        <div class="webapp-navbar-inner flex items-center justify-between h-16" style="padding: 0px 120px;">
            <div class="left flex items-center flex-shrink-0 relative">
                <a href="/" class="brand relative block">
                    <img class="light-image w-full h-full" src="{{ asset('assets/img/logos/logo/awanhosting.svg') }}" alt="Awan Hosting" />
                </a>
            </div>
            <div class="center flex-grow flex justify-center hide-on-mobile">
                <div id="webapp-navbar-menu" class="centered-drops flex justify-end items-center space-x-10 lg:space-x-12" style="max-width: unset;">
                    <a href="/domain" class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">Domain</a>
                    <a href="/wordpress-hosting" class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">WordPress</a>
                    <a href="/cloud-hosting" class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">Cloud</a>
                    <a href="/faq" class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">FAQ</a>
                    @guest
                    <a id="guest-login-button" href="/login" class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-[#F3F5FC] hover:text-[#F3F5FC] active:text-[#F3F5FC] text-[16px] leading-[23.2px] font-['Inter'] font-medium text-center" style="border: unset;">
                        Login
                        <span class="material-icons" style="color:#F3F5FC; font-size:20px">&#xea77;</span>
                    </a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</header>