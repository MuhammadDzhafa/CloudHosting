<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Hosting-Plans</title>
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
        @include('layouts.template-admin.web.partials.sidebar-client')
        <!--Languages panel-->
        @include('layouts.template-admin.web.partials.toolbar.language')
        <!--Activity panel-->
        @include('layouts.template-admin.web.partials.toolbar.activity')
        <!--Search panel-->
        <div id="search-panel" class="right-panel-wrapper is-search is-left">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <img class="light-image" src="../../../assets/img/logos/logo/logo.svg" alt="" />
                    <img class="dark-image" src="../../../assets/img/logos/logo/logo-light.svg" alt="" />
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
                                        data-demo-src="assets/img/avatars/photos/7.jpg" alt="" data-user-popover="0">
                                </div>
                                <div class="flex-meta">
                                    <span>Alice C.</span>
                                    <span>Software Engineer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/13.jpg" alt="" data-user-popover="6">
                                </div>
                                <div class="flex-meta">
                                    <span>Tara S.</span>
                                    <span>UI/UX Designer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150"
                                        data-demo-src="assets/img/avatars/photos/22.jpg" alt="" data-user-popover="5">
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

        @include('layouts.template-admin.mobile.subsidebar')
        <!-- Content Wrapper -->
        <div class="view-wrapper" data-naver-offset="150" data-menu-item="#home-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">

            <div class="page-content-wrapper">
                <div class="page-content is-relative">

                    <div class="page-title has-text-centered">
                        <!-- Sidebar Trigger -->


                        <div class="title-wrap">
                            <h1 class="title is-4">Dashboard</h1>
                        </div>

                        <div class="toolbar ml-auto">

                            <div class="toolbar-link">
                                <label class="dark-mode ml-auto">
                                    <input type="checkbox" checked>
                                    <span></span>
                                </label>
                            </div>

                            <a class="toolbar-link right-panel-trigger" data-panel="languages-panel">
                                <img src="assets/img/icons/flags/united-states-of-america.svg" alt="">
                            </a>

                            <div class="toolbar-notifications is-hidden-mobile">
                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger">
                                    <div class="is-trigger" aria-haspopup="true">
                                        <i data-feather="bell"></i>
                                        <span class="new-indicator pulsate"></span>
                                    </div>
                                    <div class="dropdown-menu" role="menu">
                                        <div class="dropdown-content">
                                            <div class="heading">
                                                <div class="heading-left">
                                                    <h6 class="heading-title">Notifications</h6>
                                                </div>
                                                <div class="heading-right">
                                                    <a class="notification-link" href="/admin-profile-notifications.html">See all</a>
                                                </div>
                                            </div>
                                            <ul class="notification-list">
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Alice C.</span> left a comment.</p>
                                                            <p class="time">1 hour ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/12.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Joshua S.</span> uploaded a file.</p>
                                                            <p class="time">2 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/13.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Tara S.</span> sent you a message.</p>
                                                            <p class="time">2 hours ago</p>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="notification-item">
                                                        <div class="img-left">
                                                            <img class="user-photo" alt="" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/25.jpg" />
                                                        </div>
                                                        <div class="user-content">
                                                            <p class="user-info"><span class="name">Melany W.</span> left a comment.</p>
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
                                <i data-feather="grid"></i>
                            </a>
                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Lifestyle Dashboard V4-->
                        <div class="lifestyle-dashboard lifestyle-dashboard-v4">

                            <div class="columns">

                                <div class="column is-8">

                                    <div class="columns is-multiline">
                                        <!--Header-->
                                        <div class="column is-12">
                                            <div class="illustration-header-2">
                                                <div class="header-image">
                                                    <img src="assets/img/illustrations/dashboards/lifestyle/reading.svg" alt="">
                                                </div>
                                                <div class="header-meta">
                                                    <h3>Hello, {{ Auth::user()->name }}.</h3>
                                                    <p>Have any ideas for a new article? If not, you should definitely check the
                                                        feed for some inspiration.</p>
                                                    <button class="button h-button is-light is-outlined">
                                                        <span class="icon is-small">
                                                            <i data-feather="plus"></i>
                                                        </span>
                                                        <span>New Article</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <!--Content-->
                                        <div class="column is-7">

                                            <div class="writing-stats">
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Articles</span>
                                                    <span class="dark-inverted">209</span>
                                                </div>
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Readers</span>
                                                    <span class="dark-inverted">863</span>
                                                </div>
                                                <!--Stat-->
                                                <div class="writing-stat">
                                                    <span>Comments</span>
                                                    <span class="dark-inverted">386</span>
                                                </div>
                                            </div>

                                            <div class="featured-authors">
                                                <!--Header-->
                                                <div class="featured-authors-header">
                                                    <h3 class="dark-inverted">Featured Authors</h3>
                                                    <a class="action-link">View All</a>
                                                </div>

                                                <div class="featured-authors-list">
                                                    <!--Item-->
                                                    <div class="featured-authors-item">
                                                        <div class="media-flex-center">
                                                            <div class="h-avatar">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Alice C.</span>
                                                                <span>Software Engineer</span>
                                                            </div>
                                                            <div class="flex-end">
                                                                <span class="dark-inverted">112K</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Item-->
                                                    <div class="featured-authors-item">
                                                        <div class="media-flex-center">
                                                            <div class="h-avatar">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/21.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Elizabeth F.</span>
                                                                <span>Web Developer</span>
                                                            </div>
                                                            <div class="flex-end">
                                                                <span class="dark-inverted">91K</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Item-->
                                                    <div class="featured-authors-item">
                                                        <div class="media-flex-center">
                                                            <div class="h-avatar">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/32.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Jonathan K.</span>
                                                                <span>UI/UX Designer</span>
                                                            </div>
                                                            <div class="flex-end">
                                                                <span class="dark-inverted">72K</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!--Item-->
                                                    <div class="featured-authors-item">
                                                        <div class="media-flex-center">
                                                            <div class="h-avatar">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/38.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Christie D.</span>
                                                                <span>Software Engineer</span>
                                                            </div>
                                                            <div class="flex-end">
                                                                <span class="dark-inverted">19K</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <!--Content-->
                                        <div class="column is-5">
                                            <!--Updates-->
                                            <div class="updates">
                                                <!--Header-->
                                                <div class="updates-header">
                                                    <h3 class="dark-inverted">Updates</h3>
                                                    <a class="action-link">View All</a>
                                                </div>

                                                <div class="updates-list">
                                                    <!--Update-->
                                                    <div class="update-item is-dark-bordered-12">
                                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                                        <span class="dark-inverted">Oct 23</span>
                                                    </div>
                                                    <!--Update-->
                                                    <div class="update-item is-dark-bordered-12">
                                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                                        <span class="dark-inverted">Oct 23</span>
                                                    </div>
                                                    <!--Update-->
                                                    <div class="update-item is-dark-bordered-12">
                                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                                        <span class="dark-inverted">Oct 23</span>
                                                    </div>
                                                    <!--Update-->
                                                    <div class="update-item is-dark-bordered-12">
                                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                                        <span class="dark-inverted">Oct 23</span>
                                                    </div>
                                                    <!--Update-->
                                                    <div class="update-item is-dark-bordered-12">
                                                        <p>Lorem ipsum sit dolor amet is a dummy text used by typographers.</p>
                                                        <span class="dark-inverted">Oct 23</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!--Feed-->
                                <div class="column is-4">
                                    <div class="articles-feed">
                                        <!--Header-->
                                        <div class="articles-feed-header">
                                            <h3 class="dark-inverted">New Articles</h3>
                                            <a class="action-link">View All</a>
                                        </div>
                                        <!--Subheader-->
                                        <div class="articles-feed-subheader">
                                            <div class="selector">
                                                <button class="button is-selected">Recent</button>
                                                <button class="button">Popular</button>
                                            </div>
                                        </div>
                                        <!--List-->
                                        <div class="articles-feed-list">
                                            <div class="articles-feed-list-inner">
                                                <!--Item-->
                                                <a class="articles-feed-item">
                                                    <div class="featured-image">
                                                        <img src="https://via.placeholder.com/800x600" data-demo-src="assets/img/photo/demo/38.jpg" alt="">
                                                    </div>
                                                    <div class="featured-content">
                                                        <h4 class="dark-inverted">Learning the modern novel</h4>
                                                        <p>Some article content and lorem ipsum sit dolor amet</p>

                                                        <div class="media-flex-center">
                                                            <div class="h-avatar is-small">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Alice C.</span>
                                                                <span>Software Engineer</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>
                                                <!--Item-->
                                                <a class="articles-feed-item">
                                                    <div class="featured-image">
                                                        <img src="https://via.placeholder.com/800x600" data-demo-src="assets/img/photo/demo/37.jpg" alt="">
                                                    </div>
                                                    <div class="featured-content">
                                                        <h4 class="dark-inverted">5 Writing tips for you</h4>
                                                        <p>Some article content and lorem ipsum sit dolor amet</p>

                                                        <div class="media-flex-center">
                                                            <div class="h-avatar is-small">
                                                                <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/5.jpg" alt="">
                                                            </div>
                                                            <div class="flex-meta">
                                                                <span>Mary L.</span>
                                                                <span>Project Manager</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </a>

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