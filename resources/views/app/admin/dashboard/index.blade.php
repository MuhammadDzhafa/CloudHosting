<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Dashboard</title>
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

                        </div>
                    </div>

                    <div class="page-content-inner">

                        <!--Finance Dashboard V1-->
                        <div class="finance-dashboard analytics-dashboard">

                            <div class="columns">

                                <div class="column is-9">

                                    <div class="columns is-multiline">
                                        <!--Dashboard Tile-->
                                        <div class="column is-6">
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
                                        <div class="column is-6">
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
                                        <!--Dashboard Card-->
                                        <!-- <div class="column is-full">
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
                                        </div> -->
                                        <!--Dashboard Card-->
                                        <div class="column is-full">
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
                                            <div class="right">
                                                <h3>Hello, {{ Auth::user()->name ?? 'Guest' }}.</h3>
                                                <div class="company">
                                                    <span>Management</span>
                                                    <p>AwanHosting</p>
                                                </div>
                                                <div class="contact-info">
                                                    <span>
                                                        <i data-feather="map-pin"></i>
                                                        <span>Indonesia</span>
                                                    </span>
                                                    <span>
                                                        <i data-feather="phone"></i>
                                                        <span>+1 234-567-8910</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="left">
                                                <div class="h-avatar is-medium">
                                                    <img class="avatar" src="{{ Auth::user()->google_profile_image ?? 'https://via.placeholder.com/150x150' }}" data-demo-src="assets/img/avatars/photos/8.jpg" alt="">
                                                </div>
                                            </div>
                                        </div>

                                        <p class="email">{{ Auth::user()->email ?? 'No Email' }}</p>
                                    </div>
                                    <!--Widget-->
                                    <!-- <div class="widget picker-widget is-straight">
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
                                    </div> -->

                                    <!--Widget-->
                                    <div class="is-full" style="height: 60%;">
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