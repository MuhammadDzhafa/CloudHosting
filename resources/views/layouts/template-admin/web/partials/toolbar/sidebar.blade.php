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
            <img class="light-image" src="assets/img/logos/logo/logoo.svg" alt="">
            <img class="dark-image" src="assets/img/logos/logo/logoo.svg" alt="">
        </a>
    </div>
    <div class="sidebar-inner">
        <ul class="icon-menu">
            <li>
                <a href="/dashboards" id="dashboards" data-content="Dashboard" class="menu-item">
                    <i class="sidebar-svg" data-feather="home"></i>
                </a>
            </li>
            <li>
                <a href="/products" id="products" data-content="Products" class="menu-item">
                    <i class="sidebar-svg" data-feather="archive"></i>
                </a>
            </li>
            <li>
                <a href="/orders" id="orders" data-content="Orders" class="menu-item">
                    <i class="sidebar-svg" data-feather="shopping-cart"></i>
                </a>
            </li>
            <li>
                <a href="/testimonials" id="testimonials" data-content="Testimonials" class="menu-item">
                    <i class="sidebar-svg" data-feather="star"></i>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const menuItems = document.querySelectorAll('.icon-menu .menu-item');

        menuItems.forEach(item => {
            item.addEventListener('click', function(e) {
                // Remove 'is-active' class from all items
                menuItems.forEach(i => i.classList.remove('is-active'));

                // Add 'is-active' class to clicked item
                this.classList.add('is-active');

                // If you want to prevent the default link behavior (optional)
                // e.preventDefault();
            });
        });

        // Set initial active state based on current URL (optional)
        const currentPath = window.location.pathname;
        const currentItem = document.querySelector(`.icon-menu a[href="${currentPath}"]`);
        if (currentItem) {
            currentItem.classList.add('is-active');
        }
    });
</script>