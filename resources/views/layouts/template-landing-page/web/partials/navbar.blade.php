<header class="bg-white shadow-sm lg:w-fixed lg:h-auto lg:opacity-1">
    <div class="webapp-navbar w-full" style="background: rgba(255, 255, 255, 0.7); backdrop-filter: blur(20px)">
        <div class="webapp-navbar-inner flex items-center justify-between h-16" style="padding: 0px 120px;">
            <div class="left flex items-center flex-shrink-0 relative">
                <a href="/" class="brand relative block lg:w-[204px] lg:h-[34px] md:w-[120px] md:h-[30px]">
                    <img class="light-image w-full h-full" src="assets/img/logos/logo/awanhosting.svg"
                        alt="Awan Hosting" />
                </a>
            </div>
            <div class="center flex-grow flex justify-center hide-on-mobile">
                <div id="webapp-navbar-menu" class="centered-drops flex justify-end items-center space-x-10 lg:space-x-12" style="max-width: unset;">
                    <a href="#"
                        class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">Home</a>

                    <!-- Mulai Dropdown -->
                    <div class="dropdown is-hoverable">
                        <div class="dropdown-trigger flex items-center">
                            <a href="#"
                                class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left"
                                aria-haspopup="true" aria-controls="dropdown-menu">
                                Products
                            </a>
                            <svg class="fill-current h-5 w-5 ml-1" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20">
                                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                            </svg>
                        </div>
                        <div class="dropdown-menu" id="dropdown-menu" role="menu">
                            <div class="dropdown-content">
                                <a href="#" class="dropdown-item">
                                    Domain
                                </a>
                                <a href="#" class="dropdown-item">
                                    Cloud Hosting
                                </a>
                                <a href="#" class="dropdown-item">
                                    WordPress Hosting
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- Akhir Dropdown -->

                    <a href="#"
                        class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">Articles</a>
                    <a href="#"
                        class="text-[#515658] font-medium lg:text-lg md:text-base leading-[23.2px] text-left">FAQ</a>
                    <div class="relative flex items-center">
                        <div class="language-dropdown relative">
                            <button id="langDropdown"
                                class="flex items-center text-[#515658] font-medium focus:outline-none">
                                <img id="selectedFlag"
                                    src="https://kazee.id/public/img/components/language-icon/emojione_flag-for-united-kingdom.svg"
                                    alt="Selected Language Flag" class="lg:w-6 lg:h-6 md:w-5 md:h-5 mr-2">
                                <span id="selectedLang"
                                    class="mr-1 lg:text-lg md:text-base font-medium text-[#515658]">EN</span>
                                <svg class="fill-current h-5 w-5 ml-1" xmlns="http://www.w3.org/2000/svg"
                                    viewBox="0 0 20 20">
                                    <path
                                        d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
                                </svg>
                            </button>
                            <div id="langMenu" class="absolute right-0 mt-2 w-40 bg-white rounded-md shadow-lg hidden">
                                <a href="#"
                                    class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 flex items-center"
                                    data-lang="id">
                                    <img src="https://kazee.id/public/img/components/language-icon/emojione_flag-for-indonesia.svg"
                                        alt="Indonesia Flag" class="lg:w-6 lg:h-6 md:w-5 md:h-5 mr-2">
                                    <span class="text-base font-medium text-[#515658]">Indonesia</span>
                                </a>
                                <a href="#"
                                    class="block px-4 py-3 text-base text-gray-700 hover:bg-gray-100 flex items-center"
                                    data-lang="en">
                                    <img src="https://kazee.id/public/img/components/language-icon/emojione_flag-for-united-kingdom.svg"
                                        alt="English Flag" class="lg:w-6 lg:h-6 md:w-5 md:h-5 mr-2">
                                    <span class="text-base font-medium text-[#515658]">English</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <img src="assets/img/icons/shop.svg" alt="Shop Icon"
                        class="lg:w-[18px] lg:h-[18px] md:w-[16px] md:h-[16px]">
                    <a href="/login"
                        class="text-[#45494A] flex items-center whitespace-nowrap lg:w-auto lg:h-auto md:h-auto gap-0 opacity-1 font-inter font-medium lg:text-lg md:text-base text-center" style="line-height: unset;">
                        Login
                        <img src="assets/img/icons/login.svg" alt="Login Icon"
                            class="ml-2 lg:w-[18px] lg:h-[18px] md:w-[16px] md:h-[16px] relative lg:top-[1.67px] md:top-[0px] lg:left-[1.67px] gap-0 opacity-1">
                    </a>
                    <a class="button h-button bg-[#4A6DCB] hover:bg-[#395FC6] active:bg-[#3253AE] text-white hover:text-white active:text-white">Contact Us</a>
                </div>


                <div class="brand-start">
                    <div class="navbar-burger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
</header>