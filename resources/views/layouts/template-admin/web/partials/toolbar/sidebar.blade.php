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
        <a href="/">
            <img class="light-image" src="../../../assets/img/logos/logo/logoo.svg" alt="">
            <img class="dark-image" src="../../../assets/img/logos/logo/logoo.svg" alt="">
        </a>
    </div>
    <div class="sidebar-inner">
        <ul class="icon-menu">
            <li>
                <a href="/admin-dashboard" id="dashboards" data-content="Dashboard" class="menu-item">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="/admin/hosting-plans" id="hosting-plans" data-content="Hosting Plans" class="menu-item">
                    <i class="sidebar-svg" data-feather="archive"></i>
                </a>
            </li>
            <li>
                <a href="/admin/orders" id="orders" data-content="Orders" class="menu-item">
                    <i class="sidebar-svg" data-feather="shopping-cart"></i>
                </a>
            </li>
            <li>
                <a href="/admin/testimonials" id="testimonials" data-content="Testimonials" class="menu-item">
                    <i class="sidebar-svg" data-feather="star"></i>
                </a>
            </li>
            <li>
                <a href="/admin/articles" id="articles" data-content="Articles" class="menu-item">
                    <i class="sidebar-svg" data-feather="book"></i>
                </a>
            </li>
            <li>
                <a href="/admin/tlds" id="tlds" data-content="Tlds" class="menu-item">
                    <i class="sidebar-svg" data-feather="globe"></i>
                </a>
            </li>
            <li>
                <a href="/admin/faqs" id="faqs" data-content="faqs" class="menu-item">
                    <i class="sidebar-svg" data-feather="message-circle"></i>
                </a>
            </li>
            <li>
                <a href="/admin/contact-us" id="contact-us" data-content="contact-us" class="menu-item">
                    <i class="sidebar-svg" data-feather="mail"></i>
                </a>
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