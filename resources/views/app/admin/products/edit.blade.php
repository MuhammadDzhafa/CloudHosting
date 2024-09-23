<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Products</title>
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
        @include('layouts.template-admin.mobile.navbar')
        <!--Mobile sidebar-->
        @include('layouts.template-admin.mobile.sidebar')
        <!--Circular menu-->
        <div id="circular-menu" class="circular-menu">

            @include('layouts.template-admin.web.floatingbtn')

            @include('layouts.template-admin.web.partials.toolbar')

        </div>
        <!--Sidebar-->
        @include('layouts.template-admin.web.partials.toolbar.sidebar')
        <!--Languages panel-->
        @include('layouts.template-admin.web.partials.toolbar.language')
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
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg" alt="">
                                    <img class="badge" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
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
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
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
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
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
                                        data-demo-src="assets/img/icons/flags/united-states-of-america.svg" alt="">
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
                                    <progress class="progress is-primary is-tiny" value="31" max="100">31%</progress>
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
                                    <progress class="progress is-primary is-tiny" value="84" max="100">84%</progress>
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
                                    <progress class="progress is-primary is-tiny" value="60" max="100">60%</progress>
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
                        <div class="control">
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
        <!--Page body-->

        {{-- <div id="layouts-sidebar" class="sidebar-panel is-generic">
            <div class="subpanel-header">

                <div class="dropdown project-dropdown dropdown-trigger is-spaced">
                    <div class="h-avatar is-small">
                        <span class="avatar is-fake is-h-green">
                          <span>H</span>
                        </span>
                    </div>
                    <span class="status-indicator"></span>

                    <div class="dropdown-menu" role="menu">
                        <div class="dropdown-content">
                            <div class="dropdown-block">
                                <div class="h-avatar is-small">
                                    <span class="avatar is-fake is-warning">
                                      <span>D</span>
                                    </span>
                                </div>
                                <div class="meta">
                                    <span class="dark-inverted">Delivery App Project</span>
                                    <span>Food For Good</span>
                                </div>
                            </div>
                            <div class="dropdown-block">
                                <div class="h-avatar is-small">
                                    <span class="avatar is-fake is-h-green">
                                      <span>H</span>
                                    </span>
                                </div>
                                <div class="meta">
                                    <span class="dark-inverted">Health and Fitness Dashboard</span>
                                    <span>Fit'n'Dance</span>
                                </div>
                            </div>
                            <div class="dropdown-block">
                                <div class="h-avatar is-small">
                                    <span class="avatar is-fake is-info">
                                      <span>L</span>
                                    </span>
                                </div>
                                <div class="meta">
                                    <span class="dark-inverted">Learning Tracker Dashboard</span>
                                    <span>Fit'n'Dance</span>
                                </div>
                            </div>
                            <div class="dropdown-block">
                                <div class="h-avatar is-small">
                                    <span class="avatar is-fake is-h-purple">
                                      <span>B</span>
                                    </span>
                                </div>
                                <div class="meta">
                                    <span class="dark-inverted">Banking and Finance Dashboard</span>
                                    <span>H Bank</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="no-mb">Layouts</h3>
                <div class="panel-close">
                    <i data-feather="x"></i>
                </div>
            </div>
            <div class="inner" data-simplebar>
                <ul>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Lists <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Flex Lists <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Datatable <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Placeload <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Card Grid <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Tile Grid <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">User Grid <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Personal <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Pages <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Subpages <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Projects <i data-feather="chevron-right"></i></a>
                        </div>
                        <ul>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V1</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects-2.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V2</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-projects-3.html">
                                    <i class="lnil lnil-grid-alt"></i>
                                    <span>Projects V3</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-projects-project.html">
                                    <i class="lnil lnil-layout"></i>
                                    <span>Project Details</span>
                                </a>
                            </li>
                            <li>
                                <a class="is-submenu" href="/admin-kanban-board.html">
                                    <i class="lnil lnil-layout-alt-1"></i>
                                    <span>Kanban Board</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="divider"></li>
                    <li class="has-children">
                        <div class="collapse-wrap">
                            <a href="javascript:void(0);" class="parent-link">Utility <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Onboarding <i data-feather="chevron-right"></i></a>
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
                            <a href="javascript:void(0);" class="parent-link">Error Pages <i data-feather="chevron-right"></i></a>
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
        </div> --}}
        @include('layouts.template-admin.mobile.subsidebar')

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
                            <h1 class="title is-4">Products</h1>
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

                            @include("layouts.template-admin.web.partials.toolbar.notification")

                            @include("layouts.template-admin.web.partials.toolbar.activity-panel")
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <div class="form-layout" style="max-width: none;">
                            <div class="form-outer">
                                <div class="form-header stuck-header">
                                    <div class="form-header-inner">
                                        <div class="left">
                                            <h3>Products</h3>
                                        </div>
                                        <div class="right">
                                            <div class="buttons">
                                                <a href="/products" class="button h-button is-light is-dark-outlined">
                                                    <!-- <span class="icon">
                                                        <i class="lnir lnir-arrow-left rem-100"></i>
                                                    </span> -->
                                                    <span>Cancel</span>
                                                </a>
                                                <button id="save-button"
                                                    class="button h-button is-primary is-raised">Save</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="tabs-wrapper">
                                    <div class="tabs-inner">
                                        <div class="tabs is-centered" style="margin-bottom:0px">
                                            <ul>
                                                <li data-tab="team-tab" class="is-active"><a>Product Info</a></li>
                                                <li data-tab="projects-tab"><a>Product Specifications</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="form-body">
                                        <div class="form-section is-grey">
                                            <div id="team-tab" class="tab-content is-active">

                                                <div class="column" style="padding-left:310px; padding-right:310px">
                                                    <div class="is-flex" style="gap:30px;">
                                                        <div class="field" style="flex-grow: 1;">
                                                            <label>Product Group</label>
                                                            <div class="dropdown dropdown-trigger" style="width: 100%;">
                                                                <div class="is-trigger" style="width: 100%;">
                                                                    <button class="button" aria-haspopup="true"
                                                                        aria-controls="dropdown-menu"
                                                                        style="width: 100%;">
                                                                        <span>Select Group</span>
                                                                        <span class="icon is-small" style="min-width:0px; min-height:0px;">
                                                                            <i class="fas fa-angle-down"
                                                                                aria-hidden="true"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>

                                                                <div class="dropdown-menu" id="dropdown-menu"
                                                                    role="menu">
                                                                    <div class="dropdown-content">
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">Personal
                                                                            Cloud Hosting</a>
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">Corporate
                                                                            Cloud Hosting</a>
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">WordPress
                                                                            Hosting</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="field" style="flex-grow: 1;">
                                                            <label>Product Type</label>
                                                            <div class="dropdown dropdown-trigger" style="width: 100%;">
                                                                <div class="is-trigger" style="width: 100%;">
                                                                    <button class="button" aria-haspopup="true"
                                                                        aria-controls="dropdown-menu"
                                                                        style="width: 100%;">
                                                                        <span>Select Type</span>
                                                                        <span class="icon is-small" style="min-width:0px; min-height:0px;">
                                                                            <i class="fas fa-angle-down"
                                                                                aria-hidden="true"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>

                                                                <div class="dropdown-menu" id="dropdown-menu"
                                                                    role="menu">
                                                                    <div class="dropdown-content">
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">Personal
                                                                            Cloud Hosting</a>
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">Corporate
                                                                            Cloud Hosting</a>
                                                                        <a href="#"
                                                                            class="dropdown-item font-size-base">WordPress
                                                                            Hosting</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                    <div class="is-flex is-inline-flex" style="gap:30px;">
                                                        <div class="field">
                                                            <label>Product Name</label>
                                                            <input class="input" placeholder="E.g Basic Plan">
                                                        </div>
                                                        <div class="field">
                                                            <label>Product Description</label>
                                                            <input class="input" placeholder="E.g Starter website">
                                                        </div>
                                                    </div>

                                                    <div class="field">
                                                        <label>Pricing Monthly (IDR)</label>
                                                        <input class="input" placeholder="0">
                                                    </div>

                                                    <div class="field">
                                                        <label class="checkbox is-outlined is-primary p-0">
                                                            <input type="checkbox">
                                                            <span></span>
                                                            Discount
                                                        </label>
                                                    </div>

                                                    <div class="is-flex is-inline-flex" style="gap:30px;">
                                                        <div class="field">
                                                            <label>Discount (%)</label>
                                                            <input class="input disabled" placeholder="0">
                                                        </div>
                                                        <div class="field">
                                                            <label>Price After Discount</label>
                                                            <input class="input disables" placeholder="0">
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>

                                        <div id="projects-tab" class="tab-content">
                                            <div class="columns is-justify-content-center">
                                                <div class="column is-12-mobile is-4-tablet is-4-desktop"
                                                    style="border-right:1px solid #e5e5e5; padding-right:40px">
                                                    <div class="columns">
                                                        <!-- Tambahkan wrapper untuk membuat dua kolom -->
                                                        <div class="column is-6"> <!-- Kolom pertama -->
                                                            <div class="column-content">
                                                                <div class="field">
                                                                    <label>SSD Storage</label>
                                                                    <div
                                                                        class="control is-inline-flex is-align-items-center">
                                                                        <input class="input" placeholder="0">
                                                                        <!-- <label class="ml-2">GB</label> -->
                                                                    </div>
                                                                </div>

                                                                <div class="field">
                                                                    <label>CPU</label>
                                                                    <div
                                                                        class="control is-inline-flex is-align-items-center">
                                                                        <input class="input" placeholder="0">
                                                                        <!-- <label class=" ml-2">Core</label> -->
                                                                    </div>
                                                                </div>

                                                                <div class="field">
                                                                    <label>Entry Process</label>
                                                                    <div class="control">
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field">
                                                                    <label>SSL</label>
                                                                    <div class="control">
                                                                        <input class="input" placeholder="Free"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column is-6"> <!-- Kolom kedua -->
                                                            <div class="column-content">

                                                                <div class="field">
                                                                    <label>RAM</label>
                                                                    <div
                                                                        class="control is-inline-flex is-align-items-center">
                                                                        <input class="input" placeholder="0">
                                                                        <!-- <label class=" ml-2">Core</label> -->
                                                                    </div>
                                                                </div>


                                                                <div class="field">
                                                                    <label>I/O</label>
                                                                    <div
                                                                        class="control is-inline-flex is-align-items-center">
                                                                        <input class="input" placeholder="0">
                                                                        <!-- <label class=" ml-2">KB/s</label> -->
                                                                    </div>
                                                                </div>

                                                                <div class="field">
                                                                    <label>NPROC</label>
                                                                    <div class="control">
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field">
                                                                    <label>Backup</label>
                                                                    <div class="control">
                                                                        <input class="input" placeholder="Weekly"
                                                                            disabled>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="column is-12-mobile is-4-tablet is-8-desktop"
                                                    style="padding-left: 40px;">
                                                    <div class="columns">
                                                        <div class="column is-6" style="padding-bottom:0px;">
                                                            <div class="column-content">
                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Database</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_database_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_database_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Bandwidth</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_bandwidth_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_bandwidth_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Email Account</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_email_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_email_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max FTP Account</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_ftp_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_ftp_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column is-6" style="padding-bottom:0px;">
                                                            <div class="column-content">
                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Domain</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_domain_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="max_domain_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Addon Domain</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_addon_domain_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_addon_domain_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>Max Parked Domain</label>
                                                                    <div class="control is-inline-flex"
                                                                        style="align-items: center; gap:10px">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_parked_domain_radio">
                                                                            <span></span>
                                                                            Unlimited
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio"
                                                                                name="max_parked_domain_radio">
                                                                            <span></span>
                                                                            Limited
                                                                        </label>
                                                                        <input class="input" placeholder="0">
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="margin-bottom: 0.75rem;">
                                                                    <label>SSH</label>
                                                                    <div class="control"
                                                                        style="display: flex; align-items: center; gap: 10px;">
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="ssh_radio">
                                                                            <span></span>
                                                                            No
                                                                        </label>
                                                                        <label class="radio is-outlined is-primary p-0"
                                                                            style="display: flex; align-items: center;">
                                                                            <input type="radio" name="ssh_radio">
                                                                            <span></span>
                                                                            Yes
                                                                        </label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="field">
                                                        <label>Free Domain</label>
                                                        <div class="control is-flex is-align-items-center is-justify-content-center"
                                                            style="gap:10px">
                                                            <label class="radio is-outlined is-primary p-0"
                                                                style="display: flex; align-items: center;">
                                                                <input type="radio" name="max_domain_radio">
                                                                <span></span>
                                                                No
                                                            </label>
                                                            <label class="radio is-outlined is-primary p-0"
                                                                style="display: flex; align-items: center;">
                                                                <input type="radio" name="max_domain_radio">
                                                                <span></span>
                                                                Yes
                                                            </label>
                                                            <input class="input" placeholder=".net, .com">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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

    <!-- Landing page js -->

    <!-- Dashboards js -->

    <!-- Charts js -->

    <!--Forms-->

    <!--Wizard-->

    <!-- Layouts js -->


    <script src="assets/js/syntax.js" async></script>
    </div>
</body>

</html>