<!-- <div class="main-sidebar">
    <div class="sidebar-brand">
        <a href="/">
            <img class="light-image" src="assets/img/logos/logo/logoo.svg" alt="">
            <img class="dark-image" src="assets/img/logos/logo/logoo.svg" alt="">
        </a>
    </div>
    <div class="sidebar-inner">

        {{-- <div class="naver"></div> --}}

        <ul class="icon-menu">
            
            <li class="right-panel-trigger" data-panel="search-panel">
                <a href="javascript:void(0);" id="open-search" data-content="Search"><i class="sidebar-svg" data-feather="home"></i></a>
                <a href="javascript:void(0);" id="close-search" class="is-hidden is-inactive"><i class="sidebar-svg" data-feather="home"></i></a>
            </li> 

            <li>
                <a href="elements-hub.html" id="elements-sidebar-menu" data-content="Elements">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li> 

            
            <li>
                <a href="elements-hub.html" id="elements-sidebar-menu" data-content="Elements">
                    <i class="fa fa-shopping-bag"></i>
                </a>
            </li>
        </ul>
    </div>
</div> -->

<div class="main-sidebar has-labels has-hover-labels">
    <div class="sidebar-brand">
        <a href="/landing-page">
            <img class="light-image" src="../../../assets/img/logos/logo/logoo.svg" alt="">
            <img class="dark-image" src="../../../assets/img/logos/logo/logoo.svg" alt="">
        </a>
    </div>
    <div class="sidebar-inner">
        <ul class="icon-menu">
            <li>
                <a href="/client-dashboard" id="dashboards" data-content="Dashboard" class="menu-item">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="#" id="hosting-plans" data-content="Hosting" class="menu-item">
                    <i class="sidebar-svg" data-feather="upload-cloud"></i>
                </a>
            </li>
            <li>
                <a href="#" id="orders" data-content="Domain" class="menu-item">
                    <i class="sidebar-svg" data-feather="globe"></i>
                </a>
            </li>
            <li>
                <a href="#" id="testimonials" data-content="Support" class="menu-item">
                    <i class="sidebar-svg" data-feather="headphones"></i>
                </a>
            </li>
            <li>
                <a href="#" id="articles" data-content="Billing" class="menu-item">
                    <i class="sidebar-svg" data-feather="feather"></i>
                </a>
            </li>
            <li>
                <a href="#" id="tlds" data-content="Programs" class="menu-item">
                    <i class="sidebar-svg" data-feather="users"></i>
                </a>
            </li>
        </ul>
        <ul class="bottom-menu">
            <li id="user-menu">
                <div id="profile-menu" class="dropdown profile-dropdown dropdown-trigger is-spaced is-up">
                    <img src="{{ Auth::user()->google_profile_image }}" alt="Profile Image" onerror="this.onerror=null; this.src='https://via.placeholder.com/150x150';">
                    <span class="status-indicator"></span>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-head">
                                <div class="meta">
                                    <span>{{ Auth::user()->name }}</span>
                                    <span style="text-transform:unset;">{{ Auth::user()->email }}</span>
                                </div>
                            </div>
                            <div class="dropdown-item is-button">
                                <form action="{{ route('logout') }}" method="POST" id="logout-form" style="display: none;">
                                    @csrf
                                </form>
                                <button type="button" class="button h-button is-primary is-raised is-fullwidth logout-button" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <span class="icon is-small" style="min-width:unset; min-height:unset;">
                                        <i data-feather="log-out"></i>
                                    </span>
                                    <span>Logout</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.icon-menu .menu-item');
        const currentPath = window.location.pathname;

        menuItems.forEach(item => {
            const defaultHref = item.getAttribute('href');
            if (currentPath.startsWith(defaultHref)) {
                item.href = currentPath;
                item.classList.add('is-active');
            }
            item.addEventListener('click', function(event) {
                event.preventDefault();
                window.location.href = defaultHref;
            });
        });
    });
</script>