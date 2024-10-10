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
        @include('layouts.template-admin.web.partials.toolbar.sidebar')
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

                        <!--Finance Dashboard V1-->
                        <div class="finance-dashboard analytics-dashboard">

                            <div class="columns">

                                <div class="column is-9">

                                    <div class="columns is-multiline">
                                        <!--Dashboard Tile-->
                                        <div class="column is-4">
                                            <div class="dashboard-tile">
                                                <div class="tile-head">
                                                    <h3 class="dark-inverted">Transactions</h3>
                                                    <div class="h-icon is-primary is-rounded is-small">
                                                        <i aria-hidden="true" class="fas fa-gem"></i>
                                                    </div>
                                                </div>
                                                <div class="tile-body">
                                                    <span class="dark-inverted">8,637</span>
                                                </div>
                                                <div class="tile-foot">
                                                    <span class="text-h-green">+6.4% <i data-feather="trending-up"></i></span>
                                                    <span>since last month</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Dashboard Tile-->
                                        <div class="column is-4">
                                            <div class="dashboard-tile">
                                                <div class="tile-head">
                                                    <h3 class="dark-inverted">Subscriptions</h3>
                                                    <div class="h-icon is-orange is-rounded is-small">
                                                        <i aria-hidden="true" class="fas fa-user-plus"></i>
                                                    </div>
                                                </div>
                                                <div class="tile-body">
                                                    <span class="dark-inverted">1,378</span>
                                                </div>
                                                <div class="tile-foot">
                                                    <span class="text-h-red">-2.1% <i data-feather="trending-down"></i></span>
                                                    <span>going down</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Dashboard Tile-->
                                        <div class="column is-4">
                                            <div class="dashboard-tile">
                                                <div class="tile-head">
                                                    <h3 class="dark-inverted">Referals</h3>
                                                    <div class="h-icon is-green is-rounded is-small">
                                                        <i aria-hidden="true" class="fas fa-bullhorn"></i>
                                                    </div>
                                                </div>
                                                <div class="tile-body">
                                                    <span class="dark-inverted">1,911</span>
                                                </div>
                                                <div class="tile-foot">
                                                    <span class="text-h-green">+4.2% <i data-feather="trending-up"></i></span>
                                                    <span>going up</span>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Dashboard Card-->
                                        <div class="column is-8">
                                            <div class="dashboard-card">
                                                <div class="card-head">
                                                    <h3 class="dark-inverted">Revenue</h3>
                                                </div>
                                                <div class="revenue-stats">
                                                    <div class="revenue-stat">
                                                        <span>This Month</span>
                                                        <span class="current">$75,648.43</span>
                                                    </div>
                                                    <div class="revenue-stat">
                                                        <span>Last Month</span>
                                                        <span class="dark-inverted">$91,512.18</span>
                                                    </div>
                                                </div>
                                                <div id="revenue-chart"></div>
                                            </div>
                                        </div>
                                        <!--Dashboard Card-->
                                        <div class="column is-4">
                                            <div class="dashboard-card">
                                                <div class="card-head">
                                                    <h3 class="dark-inverted">Goal Overview</h3>
                                                </div>

                                                <div class="radial-wrap">
                                                    <div id="goal-gauge"></div>
                                                    <div class="radial-stats is-dark-bordered-12">
                                                        <div class="radial-stat is-dark-bordered-12">
                                                            <span>Completed</span>
                                                            <span class="dark-inverted">1,223</span>
                                                        </div>
                                                        <div class="radial-stat">
                                                            <span>In Progress</span>
                                                            <span class="dark-inverted">467</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Dashboard Card-->
                                        <div class="column is-4">
                                            <div class="dashboard-card">
                                                <div class="card-head">
                                                    <h3 class="dark-inverted">Sales</h3>
                                                </div>

                                                <div class="progress-block">
                                                    <div class="value">
                                                        <span class="dark-inverted">78%</span>
                                                    </div>
                                                    <progress class="progress is-primary is-tiny" value="78" max="100">78%</progress>
                                                    <div class="progress-foot">
                                                        <span class="text-h-green">+6.4% <i data-feather="trending-up"></i></span>
                                                        <span>since last month</span>
                                                    </div>

                                                    <div class="circle-chart-wrapper" id="radial-circle"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--Dashboard Card-->
                                        <div class="column is-8">
                                            <div class="dashboard-card">
                                                <div class="card-head">
                                                    <h3 class="dark-inverted">Profit</h3>
                                                </div>
                                                <div id="profit-chart"></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="column is-3">
                                    <!--Widget-->
                                    <div class="widget contact-widget is-reversed is-straight">
                                        <div class="widget-content">
                                            <div class="left">
                                                <div class="h-avatar is-medium">
                                                    <img class="avatar is-squared" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="" data-user-popover="3">
                                                </div>
                                            </div>
                                            <div class="right">
                                                <h3>Erik K.</h3>
                                                <div class="company">
                                                    <span>Huro Ltd.</span>
                                                    <p>Product Manager</p>
                                                </div>
                                                <div class="contact-info">
                                                    <span>
                                                        <i data-feather="map-pin"></i>
                                                        <span>Los Angeles, CA</span>
                                                    </span>
                                                    <span>
                                                        <i data-feather="phone"></i>
                                                        <span>+1 444-5156</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="email">erikkovalsky@huro.io</p>
                                    </div>
                                    <!--Widget-->
                                    <div class="widget picker-widget is-straight">
                                        <div class="widget-toolbar">
                                            <div class="left">
                                                <a class="action-icon">
                                                    <i data-feather="chevron-left"></i>
                                                </a>
                                            </div>
                                            <div class="center">
                                                <h3>October 2020</h3>
                                            </div>
                                            <div class="right">
                                                <a class="action-icon">
                                                    <i data-feather="chevron-right"></i>
                                                </a>
                                            </div>
                                        </div>
                                        <table class="calendar">

                                            <thead>

                                                <tr>

                                                    <td>Mon</td>
                                                    <td>Tue</td>
                                                    <td>Wed</td>
                                                    <td>Thu</td>
                                                    <td>Fri</td>
                                                    <td>Sat</td>
                                                    <td>Sun</td>

                                                </tr>

                                            </thead>

                                            <tbody>

                                                <tr>
                                                    <td class="prev-month">29</td>
                                                    <td class="prev-month">30</td>
                                                    <td class="prev-month">31</td>
                                                    <td>1</td>
                                                    <td>2</td>
                                                    <td>3</td>
                                                    <td>4</td>
                                                </tr>

                                                <tr>
                                                    <td>5</td>
                                                    <td>6</td>
                                                    <td>7</td>
                                                    <td>8</td>
                                                    <td>9</td>
                                                    <td>10</td>
                                                    <td>11</td>
                                                </tr>

                                                <tr>
                                                    <td>12</td>
                                                    <td>13</td>
                                                    <td>14</td>
                                                    <td>15</td>
                                                    <td>16</td>
                                                    <td>17</td>
                                                    <td class="current-day">18</td>
                                                </tr>

                                                <tr>
                                                    <td>19</td>
                                                    <td>20</td>
                                                    <td>21</td>
                                                    <td>22</td>
                                                    <td>23</td>
                                                    <td>24</td>
                                                    <td>25</td>
                                                </tr>

                                                <tr>
                                                    <td>26</td>
                                                    <td>27</td>
                                                    <td>28</td>
                                                    <td>29</td>
                                                    <td>30</td>
                                                    <td>31</td>
                                                    <td class="next-month">1</td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>

                                    <!--Widget-->
                                    <div class="widget text-widget is-straight">
                                        <div class="widget-toolbar">
                                            <div class="left">
                                                <h3>New Followers</h3>
                                            </div>
                                            <div class="right">
                                                <div class="avatar-stack">
                                                    <div class="h-avatar is-small">
                                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/7.jpg" alt="">
                                                    </div>
                                                    <div class="h-avatar is-small">
                                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                                    </div>
                                                    <div class="h-avatar is-small">
                                                        <img class="avatar" src="https://via.placeholder.com/150x150" data-demo-src="assets/img/avatars/photos/5.jpg" alt="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">
                                            <p>Great News! <span>Alice</span>, <span>Erik</span> and <span>Mary</span> are now
                                                following you. Take some time to look at their profile.</p>
                                        </div>
                                    </div>

                                    <!--Widget-->
                                    <div class="widget list-widget is-straight">
                                        <div class="widget-toolbar">
                                            <div class="left">
                                                <h3>Notifications</h3>
                                            </div>
                                            <div class="right">
                                                <div class="dropdown is-spaced is-dots is-right dropdown-trigger is-pushed-mobile">
                                                    <div class="is-trigger" aria-haspopup="true">
                                                        <i data-feather="more-vertical"></i>
                                                    </div>
                                                    <div class="dropdown-menu" role="menu">
                                                        <div class="dropdown-content">
                                                            <a href="#" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-reload"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Reload</span>
                                                                    <span>Reload Widget</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-cogs"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Configure</span>
                                                                    <span>Configure widget</span>
                                                                </div>
                                                            </a>
                                                            <a href="#" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-cog"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Settings</span>
                                                                    <span>Widget Settings</span>
                                                                </div>
                                                            </a>
                                                            <hr class="dropdown-divider">
                                                            <a href="#" class="dropdown-item is-media">
                                                                <div class="icon">
                                                                    <i class="lnil lnil-trash-can-alt"></i>
                                                                </div>
                                                                <div class="meta">
                                                                    <span>Remove</span>
                                                                    <span>Remove from view</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="widget-content">
                                            <ul>
                                                <li>
                                                    <a>
                                                        <span>Personal</span>
                                                        <span class="tag is-rounded">4</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <span>Business</span>
                                                        <span class="tag is-rounded">9</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <span>Family</span>
                                                        <span class="tag is-rounded">2</span>
                                                    </a>
                                                </li>
                                            </ul>
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







        <script src="assets/js/finance-1.js" async></script>










        <!-- Charts js -->



        <!--Forms-->

        <!--Wizard-->

        <!-- Layouts js -->











        <script src="assets/js/syntax.js" async></script>
    </div>
</body>

</html>