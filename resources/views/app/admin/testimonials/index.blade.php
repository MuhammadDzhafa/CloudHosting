<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testimonials</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1>Testimonials</h1>
        <a href="{{ route('testimonials.create') }}" class="btn btn-primary mb-3">Add Testimonial</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Domain Web</th>
                    <th>Testimonial Text</th>
                    <th>Picture</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($testimonials as $testimonial)
                <tr>
                    <td>{{ $testimonial->id }}</td>
                    <td>{{ $testimonial->domain_web }}</td>
                    <td>{{ $testimonial->testimonial_text }}</td>
                    <td>
                        @if ($testimonial->picture)
                            <img src="{{ asset('storage/' . $testimonial->picture) }}" alt="Picture" style="width: 100px;">
                        @else
                            No Image
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('testimonials.edit', $testimonial->testimonial_id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('testimonials.destroy', $testimonial->testimonial_id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Testimonials</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />

    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N8ZNRQ9');
    </script>
    <!-- End Google Tag Manager -->

    <!--Core CSS -->
    <link rel="stylesheet" href="assets/css/app.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
    <link rel="stylesheet" href="assets/css/styles.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <!--Mobile navbar-->
        <nav class="navbar mobile-navbar no-shadow is-hidden-desktop is-hidden-tablet" aria-label="main navigation">
            <div class="container">
                <!-- Brand -->
                <div class="navbar-brand">
                    <!-- Mobile menu toggler icon -->
                    <div class="brand-start">
                        <div class="navbar-burger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                    </div>

                    <a class="navbar-item is-brand" href="index.html">
                        <img class="light-image" src="assets/img/logos/logo/logo.svg" alt="">
                        <img class="dark-image" src="assets/img/logos/logo/logo-light.svg" alt="">
                    </a>

                    <div class="brand-end">
                        <div class="navbar-item has-dropdown is-notification is-hidden-tablet is-hidden-desktop">
                            <a class="navbar-link is-arrowless" href="javascript:void(0);">
                                <i data-feather="bell"></i>
                                <span class="new-indicator pulsate"></span>
                            </a>
                            <div class="navbar-dropdown is-boxed is-right">
                                <div class="heading">
                                    <div class="heading-left">
                                        <h6 class="heading-title">Notifications</h6>
                                    </div>
                                    <div class="heading-right">
                                        <a class="notification-link" href="#">See all</a>
                                    </div>
                                </div>
                                <div class="inner has-slimscroll">

                                    <ul class="notification-list">
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="assets/img/avatars/photos/7.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Alice C.</span> left a
                                                        comment.</p>
                                                    <p class="time">1 hour ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="assets/img/avatars/photos/12.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Joshua S.</span> uploaded
                                                        a file.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="assets/img/avatars/photos/13.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Tara S.</span> sent you a
                                                        message.</p>
                                                    <p class="time">2 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                        <li>
                                            <a class="notification-item">
                                                <div class="img-left">
                                                    <img class="user-photo" alt=""
                                                        src="https://via.placeholder.com/150x150"
                                                        data-demo-src="assets/img/avatars/photos/25.jpg" />
                                                </div>
                                                <div class="user-content">
                                                    <p class="user-info"><span class="name">Melany W.</span> left a
                                                        comment.</p>
                                                    <p class="time">3 hours ago</p>
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown is-right is-spaced dropdown-trigger user-dropdown">
                            <div class="is-trigger" aria-haspopup="true">
                                <div class="profile-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                </div>
                            </div>
                            <div class="dropdown-menu" role="menu">
                                <div class="dropdown-content">
                                    <div class="dropdown-head">
                                        <div class="h-avatar is-large">
                                            <img class="avatar" src="https://via.placeholder.com/150x150"
                                                data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                        </div>
                                        <div class="meta">
                                            <span>Erik Kovalsky</span>
                                            <span>Product Manager</span>
                                        </div>
                                    </div>
                                    <a href="#" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-user-alt"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Profile</span>
                                            <span>View your profile</span>
                                        </div>
                                    </a>
                                    <a class="dropdown-item is-media layout-switcher">
                                        <div class="icon">
                                            <i class="lnil lnil-layout"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Layout</span>
                                            <span>Switch to admin/webapp</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-briefcase"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Projects</span>
                                            <span>All my projects</span>
                                        </div>
                                    </a>
                                    <a href="#" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-users-alt"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Team</span>
                                            <span>Manage your team</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <a href="#" class="dropdown-item is-media">
                                        <div class="icon">
                                            <i class="lnil lnil-cog"></i>
                                        </div>
                                        <div class="meta">
                                            <span>Settings</span>
                                            <span>Account settings</span>
                                        </div>
                                    </a>
                                    <hr class="dropdown-divider">
                                    <div class="dropdown-item is-button">
                                        <button
                                            class="button h-button is-primary is-raised is-fullwidth logout-button">
                                            <span class="icon is-small">
                                                <i data-feather="log-out"></i>
                                            </span>
                                            <span>Logout</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </nav>
        <!--Mobile sidebar-->
        <div class="mobile-main-sidebar">
            <div class="inner">
                <ul class="icon-side-menu">
                    <li>
                        <a href="/admin-dashboards-personal-1.html" id="home-sidebar-menu-mobile">
                            <i data-feather="activity"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/admin-grid-users-1.html" id="layouts-sidebar-menu-mobile">
                            <i data-feather="grid"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/elements-hub.html" id="elements-sidebar-menu-mobile">
                            <i data-feather="box"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/components-hub.html" id="components-sidebar-menu-mobile">
                            <i data-feather="cpu"></i>
                        </a>
                    </li>
                    <li>
                        <a href="/messaging-chat.html" id="open-messages-mobile">
                            <i data-feather="message-circle"></i>
                        </a>
                    </li>
                </ul>

                <ul class="bottom-icon-side-menu">
                    <li>
                        <a href="javascript:" class="right-panel-trigger" data-panel="search-panel">
                            <i data-feather="search"></i>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i data-feather="settings"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Circular menu-->
        <div id="circular-menu" class="circular-menu">

            <a class="floating-btn" onclick="document.getElementById('circular-menu').classList.toggle('active');">
                <i aria-hidden="true" class="fas fa-bars"></i>
                <i aria-hidden="true" class="fas fa-times"></i>
            </a>

            <div class="items-wrapper">
                <div class="menu-item is-flex">
                    <label class="dark-mode">
                        <input type="checkbox" checked>
                        <span></span>
                    </label>
                </div>
                <a class="menu-item is-flex right-panel-trigger" data-panel="languages-panel">
                    <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                </a>
                <a href="/admin-profile-notifications.html" class="menu-item is-flex">
                    <i data-feather="bell"></i>
                </a>
                <a class="menu-item is-flex right-panel-trigger" data-panel="activity-panel">
                    <i data-feather="grid"></i>
                </a>
            </div>

        </div>
        <!--Sidebar-->
        <div class="main-sidebar">
            <div class="sidebar-brand">
                <a href="/">
                    <img class="light-image" src="assets/img/logos/logo/logoo.svg" alt="">
                    <img class="dark-image" src="assets/img/logos/logo/logoo.svg" alt="">
                </a>
            </div>
            <div class="sidebar-inner">

                {{-- <div class="naver"></div> --}}

                <ul class="icon-menu">
                    <!-- Activity -->
                    <li>
                        <a href="/admin-dashboards-personal-1.html" class="menu-item">
                            <img src="/assets/img/product/homelogo.svg" alt="Logo Home">
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <!-- Layouts -->
                    <li>
                        <a href="/admin-grid-users-1.html" id="layouts-sidebar-menu" data-content="Layouts">
                            <img src="/assets/img/product/inventory-2.svg" alt="">
                        </a>
                    </li> <!-- Bounties -->
                    <li>
                        <a href="elements-hub.html" id="elements-sidebar-menu" data-content="Elements">
                            <img src="/assets/img/product/shoopingbag.svg" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <!--Languages panel-->
        <div id="languages-panel" class="right-panel-wrapper is-languages">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Select Language</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="languages-boxes">
                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection" checked>
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/france.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/spain.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/germany.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/mexico.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="language-box">
                            <div class="language-option">
                                <input type="radio" name="language_selection">
                                <div class="language-option-inner">
                                    <img src="assets/img/icons/flags/china.svg" alt="">
                                    <div class="indicator">
                                        <i data-feather="check"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="img-wrap has-text-centered">
                        <img class="light-image" src="assets/img/illustrations/right-panel/languages.svg"
                            alt="">
                        <img class="dark-image" src="assets/img/illustrations/right-panel/languages-dark.svg"
                            alt="">
                    </div>
                </div>
            </div>
        </div>
        <!--Activity panel-->
        <div id="activity-panel" class="right-panel-wrapper is-activity">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <h3>Activity</h3>
                    <a class="close-panel">
                        <i data-feather="chevron-right"></i>
                    </a>
                </div>
                <div class="tabs-wrapper is-triple-slider is-squared">
                    <div class="tabs-inner">
                        <div class="tabs">
                            <ul>
                                <li data-tab="team-side-tab" class="is-active"><a><span>Team</span></a></li>
                                <li data-tab="projects-side-tab"><a><span>Projects</span></a></li>
                                <li data-tab="schedule-side-tab"><a><span>Schedule</span></a></li>
                                <li class="tab-naver"></li>
                            </ul>
                        </div>
                    </div>

                    <div class="right-panel-body">
                        <div id="team-side-tab" class="tab-content is-active">
                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/12.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Joshua S.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        Las Vegas, NV
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/25.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Melany W.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        San Jose, CA
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/18.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Esteban C.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        Miami, FL
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>

                            <!--Team Member-->
                            <div class="team-card">
                                <div class="h-avatar">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/13.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg"
                                        alt="">
                                </div>
                                <div class="meta">
                                    <span>Tara S.</span>
                                    <span>
                                        <i data-feather="map-pin"></i>
                                        New York, NY
                                    </span>
                                </div>
                                <a class="link">
                                    <i data-feather="arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <div id="projects-side-tab" class="tab-content">
                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/logos/slicer.svg" alt="">
                                    <div class="meta">
                                        <span>The slicer project</span>
                                        <span>getslicer.io</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="31"
                                        max="100">31%</progress>
                                    <div class="foot-stats">
                                        <span>5 / 24</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/5.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/logos/metamovies.svg" alt="">
                                    <div class="meta">
                                        <span>Metamovies reworked</span>
                                        <span>metamovies.co</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="84"
                                        max="100">84%</progress>
                                    <div class="foot-stats">
                                        <span>28 / 31</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/13.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/18.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!--Project-->
                            <div class="project-card">
                                <div class="project-inner">
                                    <img class="project-avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/icons/logos/fastpizza.svg" alt="">
                                    <div class="meta">
                                        <span>Fast Pizza redesign</span>
                                        <span>fastpizza.com</span>
                                    </div>
                                    <a class="link">
                                        <i data-feather="arrow-right"></i>
                                    </a>
                                </div>
                                <div class="project-foot">
                                    <progress class="progress is-primary is-tiny" value="60"
                                        max="100">60%</progress>
                                    <div class="foot-stats">
                                        <span>25 / 39</span>

                                        <div class="avatar-stack">
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                            </div>
                                            <div class="h-avatar is-small">
                                                <img class="avatar" src="https://via.placeholder.com/150x150"
                                                    data-demo-src="assets/img/avatars/photos/25.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div id="schedule-side-tab" class="tab-content">
                            <!--Timeline-->
                            <div class="icon-timeline">
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Call Danny at Colby's</p>
                                        <span>Today - 11:30am</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <img class="avatar" src="https://via.placeholder.com/150x150"
                                            data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                    </div>
                                    <div class="timeline-content">
                                        <p>Meeting with Alice</p>
                                        <span>Today - 01:00pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="message-circle"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Answer Annie's message</p>
                                        <span>Today - 01:45pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="mail"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Send new campaign</p>
                                        <span>Today - 02:30pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="smile"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Project review</p>
                                        <span>Today - 03:30pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="phone-call"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Call Trisha Jackson</p>
                                        <span>Today - 05:00pm</span>
                                    </div>
                                </div>
                                <!--Timeline item-->
                                <div class="timeline-item">
                                    <div class="timeline-icon">
                                        <i data-feather="feather"></i>
                                    </div>
                                    <div class="timeline-content">
                                        <p>Write proposal for Don</p>
                                        <span>Today - 06:00pm</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>


            </div>

        </div>
        <!--Search panel-->
        <div id="search-panel" class="right-panel-wrapper is-search is-left">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <img class="light-image" src="assets/img/logos/logo/logo.svg" alt="" />
                    <img class="dark-image" src="assets/img/logos/logo/logo-light.svg" alt="" />
                    <a class="close-panel">
                        <i data-feather="chevron-left"></i>
                    </a>
                </div>
                <div class="right-panel-body has-slimscroll">
                    <div class="field">
                        <div class="control has-icon">
                            <input type="text" class="input is-rounded search-input" placeholder="Search...">
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                            <div class="search-results has-slimscroll"></div>
                        </div>
                    </div>

                    <div class="recent">
                        <h4>Recently viewed</h4>
                        <div class="recent-block">
                            <a class="media-flex-center">
                                <div class="h-icon is-info is-rounded is-small">
                                    <i data-feather="chrome"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Browser Support</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-icon is-orange is-rounded is-small">
                                    <i data-feather="tv"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Twitch API</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-icon is-green is-rounded is-small">
                                    <i data-feather="twitter"></i>
                                </div>
                                <div class="flex-meta">
                                    <span>Twitter Auth</span>
                                    <span>Blog post</span>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="recent">
                        <h4>Recent Members</h4>
                        <div class="recent-block">
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/7.jpg" alt=""
                                        data-user-popover="0">
                                </div>
                                <div class="flex-meta">
                                    <span>Alice C.</span>
                                    <span>Software Engineer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/13.jpg" alt=""
                                        data-user-popover="6">
                                </div>
                                <div class="flex-meta">
                                    <span>Tara S.</span>
                                    <span>UI/UX Designer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/22.jpg" alt=""
                                        data-user-popover="5">
                                </div>
                                <div class="flex-meta">
                                    <span>Jimmy H.</span>
                                    <span>Project Manager</span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="mobile-subsidebar">
            <div class="inner">
                <div class="sidebar-title">
                    <h3>Layouts</h3>
                </div>

                <ul class="submenu">
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Lists <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-list-view-1.html">
                                    <i class="lnil lnil-list-alt"></i>
                                    <span>List View V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-view-2.html">
                                    <i class="lnil lnil-list-alt"></i>
                                    <span>List View V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-view-3.html">
                                    <i class="lnil lnil-list-alt"></i>
                                    <span>List View V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-view-4.html">
                                    <i class="lnil lnil-list-alt"></i>
                                    <span>List View V4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Flex Lists <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-list-flex-1.html">
                                    <i class="lnil lnil-list-alt-1"></i>
                                    <span>Flex List V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-flex-2.html">
                                    <i class="lnil lnil-list-alt-1"></i>
                                    <span>Flex List V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-flex-3.html">
                                    <i class="lnil lnil-list-alt-1"></i>
                                    <span>Flex List V3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Datatable <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-list-datatable-1.html">
                                    <i class="lnil lnil-layout-alt"></i>
                                    <span>Datatable V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-datatable-2.html">
                                    <i class="lnil lnil-layout-alt"></i>
                                    <span>Datatable V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-datatable-3.html">
                                    <i class="lnil lnil-layout-alt"></i>
                                    <span>Datatable V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-list-datatable-4.html">
                                    <i class="lnil lnil-layout-alt"></i>
                                    <span>Datatable V4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Placeload <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-placeload-1.html">
                                    <i class="lnil lnil-reload"></i>
                                    <span>Placeload V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-placeload-2.html">
                                    <i class="lnil lnil-reload"></i>
                                    <span>Placeload V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-placeload-3.html">
                                    <i class="lnil lnil-reload"></i>
                                    <span>Placeload V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-placeload-4.html">
                                    <i class="lnil lnil-reload"></i>
                                    <span>Placeload V4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Card Grid <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-grid-cards-1.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Card Grid V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-cards-2.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Card Grid V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-cards-3.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Card Grid V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-cards-4.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Card Grid V4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Tile Grid <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-grid-tiles-1.html">
                                    <i class="lnil lnil-layout-alt-2"></i>
                                    <span>Tile Grid V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-tiles-2.html">
                                    <i class="lnil lnil-layout-alt-2"></i>
                                    <span>Tile Grid V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-tiles-3.html">
                                    <i class="lnil lnil-layout-alt-2"></i>
                                    <span>Tile Grid V3</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">User Grid <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-grid-users-1.html">
                                    <i class="lnil lnil-users-alt"></i>
                                    <span>User Grid V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-users-2.html">
                                    <i class="lnil lnil-users-alt"></i>
                                    <span>User Grid V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-users-3.html">
                                    <i class="lnil lnil-users-alt"></i>
                                    <span>User Grid V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-grid-users-4.html">
                                    <i class="lnil lnil-users-alt"></i>
                                    <span>User Grid V4</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Personal <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-profile-view.html">
                                    <i class="lnil lnil-user-alt"></i>
                                    <span>Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-profile-edit-1.html">
                                    <i class="lnil lnil-pencil"></i>
                                    <span>Edit Profile</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-profile-notifications.html">
                                    <i class="lnil lnil-notification"></i>
                                    <span>Notifications</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-profile-settings.html">
                                    <i class="lnil lnil-cog"></i>
                                    <span>Settings</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Pages <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/auth-login-1.html">
                                    <i class="lnil lnil-pointer-right"></i>
                                    <span>Login v1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/auth-login-2.html">
                                    <i class="lnil lnil-pointer-right"></i>
                                    <span>Login v2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/auth-login-3.html">
                                    <i class="lnil lnil-pointer-right"></i>
                                    <span>Login v3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/auth-signup-2.html">
                                    <i class="lnil lnil-crown"></i>
                                    <span>Signup v1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/auth-signup-3.html">
                                    <i class="lnil lnil-crown"></i>
                                    <span>Signup v2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/auth-signup-1.html">
                                    <i class="lnil lnil-crown"></i>
                                    <span>Signup Flow</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-search-results.html">
                                    <i class="lnil lnil-search-alt"></i>
                                    <span>Search Results</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-search-empty.html">
                                    <i class="lnil lnil-search-alt"></i>
                                    <span>Empty Search</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Subpages <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-saas-billing.html">
                                    <i class="lnil lnil-credit-card"></i>
                                    <span>SaaS Billing</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-welcome.html">
                                    <i class="lnil lnil-door-alt"></i>
                                    <span>Welcome</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-action-page-1.html">
                                    <i class="lnil lnil-thunderbolt"></i>
                                    <span>Action Page V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-action-page-2.html">
                                    <i class="lnil lnil-thunderbolt"></i>
                                    <span>Action Page V2</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Projects <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V1</span>
                                    <i class="is-auto" data-feather="map-pin"></i>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects-2.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V2</span>
                                    <i class="is-auto" data-feather="map-pin"></i>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects-3.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V3</span>
                                    <i class="is-auto" data-feather="map-pin"></i>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-project.html">
                                    <i class="lnil lnil-layout"></i>
                                    <span>Project Details</span>
                                    <i class="is-auto" data-feather="map-pin"></i>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-kanban-board.html">
                                    <i class="lnil lnil-layout-alt-1"></i>
                                    <span>Kanban Board</span>
                                    <i class="is-auto" data-feather="map-pin"></i>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Utility <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-utility-account-confirm.html">
                                    <i class="lnil lnil-thunderbolt"></i>
                                    <span>Confirm Account</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-utility-promotion.html">
                                    <i class="lnil lnil-magnet"></i>
                                    <span>Promotion Page</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-utility-invoice.html">
                                    <i class="lnil lnil-calculator-alt"></i>
                                    <span>Invoice</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-utility-status.html">
                                    <i class="lnil lnil-checkmark-circle"></i>
                                    <span>App Status</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Onboarding <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-onboarding-page-1.html">
                                    <i class="lnil lnil-train"></i>
                                    <span>Onboarding V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-onboarding-page-2.html">
                                    <i class="lnil lnil-train-alt"></i>
                                    <span>Onboarding V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-onboarding-page-3.html">
                                    <i class="lnil lnil-car"></i>
                                    <span>Onboarding V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-onboarding-page-4.html">
                                    <i class="lnil lnil-car-alt"></i>
                                    <span>Onboarding V4</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-onboarding-page-5.html">
                                    <i class="lnil lnil-train"></i>
                                    <span>Onboarding V5</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Error Pages <i
                                    data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/error-page-1.html">
                                    <i class="lnil lnil-cross-circle"></i>
                                    <span>Error 404 V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/error-page-2.html">
                                    <i class="lnil lnil-cross-circle"></i>
                                    <span>Error 404 V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/error-page-3.html">
                                    <i class="lnil lnil-cross-circle"></i>
                                    <span>Error 404 V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/error-page-4.html">
                                    <i class="lnil lnil-cross-circle"></i>
                                    <span>Error 404 V4</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/error-page-5.html">
                                    <i class="lnil lnil-cross-circle"></i>
                                    <span>Error 500 V1</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>

            </div>
        </div>

        <!-- Content Wrapper -->
        <div id="app-projects" class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu"
            data-mobile-item="#home-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->
                        {{-- <div class="huro-hamburger nav-trigger push-resize" data-sidebar="layouts-sidebar">
                            <span class="menu-toggle has-chevron">
                  <span class="icon-box-toggle">
                    <span class="rotate">
                      <i class="icon-line-top"></i>
                      <i class="icon-line-center"></i>
                      <i class="icon-line-bottom"></i>
                    </span>
                            </span>
                            </span>
                        </div> --}}

                        <div class="title-wrap">
                            <h1 class="title is-4">Testimonials</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            {{-- <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                                <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </a> --}}

                            <div class="toolbar-notifications is-hidden-mobile">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <img src="/assets/img/product/bell.svg" alt="">
                                        <span class="new-indicator pulsate"></span>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="heading">
                                                <div class="heading-left">
                                                    <h6 class="heading-title">Notifications</h6>
                                                </div>
                                                <div class="heading-right">
                                                    <a class="notification-link"
                                                        href="/admin-profile-notifications.html">See all</a>
                                                </div>
                                            </div>
                                            <ul class="notification-list">
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/7.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Alice C.</span>
                                                                left a comment.</p>
                                                            <p class="time">1 hour ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/12.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Joshua S.</span>
                                                                uploaded a file.</p>
                                                            <p class="time">2 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/13.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Tara S.</span>
                                                                sent you a message.</p>
                                                            <p class="time">2 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt=""
                                                                src="https://via.placeholder.com/150x150"
                                                                data-demo-src="assets/img/avatars/photos/25.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Melany W.</span>
                                                                left a comment.</p>
                                                            <p class="time">3 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <a class="toolbar-link right-panel-trigger" data-panel="activity-panel">
                                <img src="/assets/img/product/account.svg" alt="">
                            </a>
                        </div>
                    </div>

                    <div class="list-flex-toolbar">
                        <div class="control has-icon">
                            <input class="input" placeholder="Search..." />
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button h-button is-primary is-elevated h-modal-trigger addData" data-modal="addandedit">
                                <span class="icon" style="min-width: unset">
                                    <i aria-hidden="true" class="fas fa-plus"></i>
                                </span>
                                <span>Add New</span>
                            </button>
                        </div>


                    </div>

                    {{-- Modals --}}
                    <div id="addandedit" class="modal h-modal">
                        <div class="modal-background h-modal-close"></div>
                        <div class="modal-content">
                            <div class="modal-card">
                                <header class="modal-card-head">
                                    <h3 id="modal-title">Add Testimonial</h3>
                                    <button class="h-modal-close ml-auto" aria-label="close">
                                        <i data-feather="x"></i>
                                    </button>
                                </header>
                                <div class="modal-card-body">
                                    <div class="inner-content">
                                        <form id="testimonial-form" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="field">
                                                <label class="label" for="domain_web">Domain Web</label>
                                                <div class="control">
                                                    <input type="text" class="input" id="domain_web" name="domain_web" required>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label class="label" for="testimonial_text">Testimonial Text</label>
                                                <div class="control">
                                                    <textarea class="textarea" id="testimonial_text" name="testimonial_text" rows="3" required></textarea>
                                                </div>
                                            </div>

                                            <div class="field">
                                                <div class="control">
                                                    <div class="file has-name is-fullwidth">
                                                        <label class="file-label" for="picture">
                                                            <input class="file-input" type="file" id="picture" name="picture">
                                                            <span class="file-cta">
                                                                <span class="file-icon">
                                                                    <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                                                </span>
                                                                <span class="file-label" id="picture" name="picture">
                                                                    Chosee a file..
                                                                </span>
                                                            </span>
                                                            <span class="file-name light-text" id="picture-name">
                                                            </span>
                                                        </label>
                                                    </div>
                                                    <img id="picture-preview" src="" style="max-width: 100px; margin-top: 10px;">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label class="label" for="occupation">Occupation</label>
                                                <div class="control">
                                                    <input type="text" class="input" id="occupation" name="occupation">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label class="label" for="facebook">Facebook Profile (Optional)</label>
                                                <div class="control">
                                                    <input type="text" class="input" id="facebook" name="facebook">
                                                </div>
                                            </div>

                                            <div class="field">
                                                <label class="label" for="instagram">Instagram Profile (Optional)</label>
                                                <div class="control">
                                                    <input type="text" class="input" id="instagram" name="instagram">
                                                </div>
                                            </div>

                                            <div class="modal-card-foot is-end">
                                                <a class="button h-button is-rounded h-modal-close">Cancel</a>
                                                <button type="submit" class="button h-button is-primary is-raised is-rounded">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener('DOMContentLoaded', () => {
                        const editLinks = document.querySelectorAll('.edit-link');
                        const addNewButton = document.querySelector('.addData'); // Tombol "Add New"
                        const form = document.querySelector('#testimonial-form');
                        const fileInput = document.querySelector('#picture');
                        const fileNameDisplay = document.querySelector('#picture-name');
                        const picturePreview = document.querySelector('#picture-preview');

                        fileInput.addEventListener('change', (event) => {
                            const file = event.target.files[0]; // Ambil file yang dipilih
                            if (file) {
                                fileNameDisplay.textContent = file.name; // Ubah teks menjadi nama file
                                const reader = new FileReader();
                                reader.onload = function(e) {
                                    picturePreview.src = e.target.result; // Tampilkan preview gambar yang diupload
                                };
                                reader.readAsDataURL(file);
                            } else {
                                fileNameDisplay.textContent = 'Choose a file...'; // Jika tidak ada file yang dipilih
                                picturePreview.src = ''; // Hapus preview gambar
                            }
                        });

                        // Fungsi untuk membuka modal dan mereset isinya
                        function openModal(isEdit = false) {
                            if (isEdit) {
                                document.querySelector('#modal-title').textContent = 'Edit Testimonial';
                            } else {
                                resetForm();
                                document.querySelector('#modal-title').textContent = 'Add Testimonial';
                            }
                            document.querySelector('#addandedit').classList.add('is-active');
                        }

                        // Handle add button click
                        addNewButton.addEventListener('click', () => {
                            resetForm(); // Reset the form for adding new testimonial
                            document.querySelector('#modal-title').textContent = 'Add Testimonial'; // Set modal title
                            form.action = "{{ route('testimonials.store') }}"; // Set action for adding
                            form.method = 'POST'; // Set method to POST
                            document.querySelector('#demo-right-actions-modal').classList.add('is-active'); // Open modal
                        });

                        // Handle edit button clicks
                        editLinks.forEach(link => {
                            link.addEventListener('click', () => {
                                const id = link.getAttribute('data-id');
                                const domain = link.getAttribute('data-domain');
                                const text = link.getAttribute('data-text');
                                const picture = link.getAttribute('data-picture');
                                const occupation = link.getAttribute('data-occupation');
                                const facebook = link.getAttribute('data-facebook');
                                const instagram = link.getAttribute('data-instagram');

                                // Set modal action for editing
                                form.action = `/testimonials/${id}`; // Set action for PUT
                                form.method = 'POST'; // Set method to POST

                                // Populate form fields
                                document.querySelector('#domain_web').value = domain;
                                document.querySelector('#testimonial_text').value = text;
                                document.querySelector('#occupation').value = occupation;
                                document.querySelector('#facebook').value = facebook;
                                document.querySelector('#instagram').value = instagram;
                                document.querySelector('#picture-preview').src = picture ? `/storage/${picture}` : '';
                                document.querySelector('#picture-name').textContent = picture ? picture.split('/').pop() : 'Choose a file…';

                                // Ensure PUT method hidden input is there
                                let methodField = form.querySelector('input[name="_method"]');
                                if (!methodField) {
                                    methodField = document.createElement('input');
                                    methodField.type = 'hidden';
                                    methodField.name = '_method';
                                    methodField.value = 'PUT';
                                    form.appendChild(methodField);
                                }

                                // Open modal
                                openModal(true);
                            });
                        });

                        // Modal close handling
                        modal.addEventListener('click', (event) => {
                            if (event.target === modal || event.target.classList.contains('h-modal-close')) {
                                resetForm(); // Reset form when modal is closed
                                modal.classList.remove('is-active'); // Close modal
                            }
                        });
                        

                        // Function to reset the form
                        function resetForm() {
                            form.reset(); // Clear all fields
                            document.querySelector('#picture-preview').src = ''; // Clear picture preview
                            document.querySelector('#picture-name').textContent = 'Choose a file…'; // Reset file name display

                            // Remove hidden input for PUT method if it exists
                            const methodField = form.querySelector('input[name="_method"]');
                            if (methodField) {
                                methodField.remove();
                            }
                        }
                    });

                    </script>

                    <div class="page-content-inner">
                        <div class="table-wrapper" data-simplebar>
                            <table id="users-datatable" class="table is-datatable is-hoverable">
                                <thead>
                                    <tr class="color-row">
                                        <th>DOMAIN NAME</th>
                                        <th style="max-width: 200px;">TESTIMONIAL</th>
                                        <th>PICTURE</th>
                                        <th>OCCUPATION</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($testimonials as $testimonial)
                                        <tr>
                                            <td>{{ $testimonial->domain_web }}</td>
                                            <td style="max-width: 200px;">{{ $testimonial->testimonial_text }}</td>
                                            <td>
                                                @if ($testimonial->picture)
                                                    <img src="{{ asset('storage/' . $testimonial->picture) }}" alt="Picture" style="width: 100px;">
                                                @else
                                                    No Image
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->occupation }}</td>
                                            <td>
                                            <a href="javascript:void(0);" class="edit-link" data-id="{{ $testimonial->testimonial_id }}" data-domain="{{ $testimonial->domain_web }}" data-text="{{ $testimonial->testimonial_text }}" data-picture="{{ $testimonial->picture }}" data-occupation="{{ $testimonial->occupation }}" data-facebook="{{ $testimonial->facebook }}" data-instagram="{{ $testimonial->instagram }}">
                                                <img src="assets/img/product/edit.svg" alt="" class="mr-6">
                                            </a>

                                                <form action="{{ route('testimonials.destroy', $testimonial->testimonial_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
                                                        <img src="assets/img/product/trash.svg" alt="Delete">
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div id="paging-first-datatable" class="pagination datatable-pagination">
                            <div class="datatable-info">
                                <span></span>
                            </div>
                        </div>
                    </div>



        <!--Huro Scripts-->
        <!--Load Mapbox-->


        <!-- Concatenated plugins -->
        <script src="assets/js/app.js"></script>

        <!-- Huro js -->
        <script src="assets/js/functions.js"></script>
        <script src="assets/js/main.js" async></script>
        <script src="assets/js/components.js" async></script>
        <script src="assets/js/popover.js" async></script>
        <script src="assets/js/widgets.js" async></script>


        <!-- Additional Features -->
        <script src="assets/js/touch.js" async></script>

        <script src="assets/js/syntax.js" async></script>
    </div>
</body>

</html>

