<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Create Plan</title>
    <link rel="icon" type="image/png" href="assets/img/logos/logo/logoo.svg" />

    <!-- Google Tag Manager -->
    <script>
        (function (w, d, s, l, i) {
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
    <link rel="stylesheet" href="../../../assets/css/app.css" />
    <link rel="stylesheet" href="../../../assets/css/main.css" />
    <link rel="stylesheet" href="../../../assets/css/styles.css" />

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

        @include('layouts.template-admin.mobile.subsidebar')

        <!-- Content Wrapper -->
        <div id="app-projects" class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu"
            data-mobile-item="#home-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered">
                        <div class="title-wrap">
                            <h1 class="title is-4">Products</h1>
                        </div>

                    </div>

                    <div class="page-content-inner">
                        <div class="form-layout" style="max-width: none;">
                            <div class="form-outer">
                                <form action="{{ route('hosting-plans.store') }}" method="POST">
                                    @csrf
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Create New Plan</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="/hosting-plans"
                                                        class="button h-button is-light is-dark-outlined">
                                                        <span class="icon" style="min-width: 0px; min-height: 0px;">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Cancel</span>
                                                    </a>
                                                    <button class="button h-button is-primary is-raised"
                                                        type="submit">Create</button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tabs-wrapper">
                                        <div class="tabs-inner">
                                            <div class="tabs is-centered" style="margin-bottom:0px">
                                                <ul>
                                                    <li data-tab="team-tab" class="is-active"><a>Product Info</a>
                                                    </li>
                                                    <li data-tab="projects-tab"><a>Pricing</a></li>
                                                    <li data-tab="tasks-tab"><a>Product Specifications</a></li>
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="form-body" style="background-color: #FAFAFA;">
                                            <div class="form-section is-grey">
                                                <div id="team-tab" class="tab-content is-active">
                                                    <div class="columns"
                                                        style="padding-left:310px; padding-right:310px">
                                                        <div class="column is-6">
                                                            <div class="column-content">
                                                                <div class="field">
                                                                    <label>Product Group</label>
                                                                    <input type="hidden" name="group_id" id="group_id">
                                                                    <div class="dropdown dropdown-trigger"
                                                                        style="width: 100%;">
                                                                        <div class="is-trigger" style="width: 100%;">
                                                                            <button class="button" type="button"
                                                                                aria-haspopup="true"
                                                                                aria-controls="group-dropdown-menu"
                                                                                style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                                                                <span id="selectedGroup">Select
                                                                                    Group</span>
                                                                                <span class="icon is-small"
                                                                                    style="min-width: 0; min-height: 0;">
                                                                                    <i class="fas fa-angle-down"
                                                                                        aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="dropdown-menu"
                                                                            id="group-dropdown-menu" role="menu">
                                                                            <div class="dropdown-content">
                                                                                <a href="#" class="dropdown-item"
                                                                                    data-value="1"
                                                                                    onclick="selectGroup(this)">Personal
                                                                                    Cloud Hosting</a>
                                                                                <a href="#" class="dropdown-item"
                                                                                    data-value="2"
                                                                                    onclick="selectGroup(this)">Corporate
                                                                                    Cloud Hosting</a>
                                                                                <a href="#" class="dropdown-item"
                                                                                    data-value="3"
                                                                                    onclick="selectGroup(this)">WordPress
                                                                                    Hosting</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Name</label>
                                                                    <input class="input" name="name"
                                                                        placeholder="E.g Basic Plan"
                                                                        style="width: 100%; padding: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column is-6">
                                                            <div class="column-content">
                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Type</label>
                                                                    <input type="hidden" name="type" id="type">
                                                                    <div class="dropdown dropdown-trigger"
                                                                        style="width: 100%;">
                                                                        <div class="is-trigger" style="width: 100%;">
                                                                            <button class="button" type="button"
                                                                                aria-haspopup="true"
                                                                                aria-controls="type-dropdown-menu"
                                                                                style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                                                                <span id="selectedType">Select
                                                                                    Type</span>
                                                                                <span class="icon is-small"
                                                                                    style="min-width: 0; min-height: 0;">
                                                                                    <i class="fas fa-angle-down"
                                                                                        aria-hidden="true"></i>
                                                                                </span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="dropdown-menu"
                                                                            id="type-dropdown-menu" role="menu">
                                                                            <div class="dropdown-content">
                                                                                <a href="#" class="dropdown-item"
                                                                                    data-value="Regular Hosting"
                                                                                    onclick="selectType(this)">Regular
                                                                                    Hosting</a>
                                                                                <a href="#" class="dropdown-item"
                                                                                    data-value="Custom Hosting"
                                                                                    onclick="selectType(this)">Custom
                                                                                    Hosting</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Description</label>
                                                                    <input class="input" name="description"
                                                                        placeholder="E.g Starter website"
                                                                        style="width: 100%; padding: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="projects-tab" class="tab-content">
                                                    <div class="table-wrapper" style="min-height:100px" data-simplebar>
                                                        <table id="users-datatable"
                                                            class="table is-datatable is-hoverable has-text-centered">
                                                            <thead>
                                                                <tr class="color-row">
                                                                    <th></th>
                                                                    <th class="has-text-centered">One
                                                                        Time/Monthly</th>
                                                                    <th class="has-text-centered">Quarterly</th>
                                                                    <th class="has-text-centered">Semi-Annually
                                                                    </th>
                                                                    <th class="has-text-centered">Annually</th>
                                                                    <th class="has-text-centered">Biennially
                                                                    </th>
                                                                    <th class="has-text-centered">Triennially
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Enable</th>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                    <td><label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox">
                                                                            <span></span>
                                                                        </label></td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Price</th>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th>Discount (%)</th>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="control">
                                                                            <input class="input has-text-centered">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <div id="tasks-tab" class="tab-content">
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
                                                                                <p class="ml-2">GB</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>CPU</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input" placeholder="0">
                                                                                <p class="ml-2">Core</p>
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
                                                                                <p class="ml-2">GB</p>
                                                                            </div>
                                                                        </div>


                                                                        <div class="field">
                                                                            <label>I/O</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input" placeholder="0">
                                                                                <p class="ml-2">KB/s</p>
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
                                                                                <input class="input"
                                                                                    placeholder="Weekly" disabled>
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
                                                                        <!-- Max Database -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Database</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_database_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_database_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" name="max_database"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Max Bandwidth -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Bandwidth</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_bandwidth_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_bandwidth_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    name="max_bandwidth"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Max Email Account -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Email Account</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_email_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_email_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" name="max_email"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Max FTP Account -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max FTP Account</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_ftp_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_ftp_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" name="max_ftp"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="column is-6" style="padding-bottom:0px;">
                                                                    <div class="column-content">
                                                                        <!-- Max Domain -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Domain</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_domain_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_domain_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" name="max_domain"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Max Addon Domain -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Addon Domain</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_addon_domain_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_addon_domain_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    name="max_addon_domain"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- Max Parked Domain -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>Max Parked Domain</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_parked_domain_radio"
                                                                                        value="Unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_parked_domain_radio"
                                                                                        value="Limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    name="max_parked_domain"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <!-- SSH -->
                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>SSH</label>
                                                                            <div class="control"
                                                                                style="display: flex; align-items: center; gap: 10px;">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio" name="ssh_radio"
                                                                                        value="No">
                                                                                    <span></span>
                                                                                    No
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio" name="ssh_radio"
                                                                                        value="Yes">
                                                                                    <span></span>
                                                                                    Yes
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Free Domain -->
                                                            <div class="field">
                                                                <label>Free Domain</label>
                                                                <div class="control is-flex is-align-items-center is-justify-content-center"
                                                                    style="gap:10px">
                                                                    <label class="radio is-outlined is-primary p-0"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain_radio"
                                                                            value="No" checked>
                                                                        <span></span>
                                                                        No
                                                                    </label>
                                                                    <label class="radio is-outlined is-primary p-0"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain_radio"
                                                                            value="Yes">
                                                                        <span></span>
                                                                        Yes
                                                                    </label>
                                                                    <input class="free-domain-input input"
                                                                        name="free_domain" placeholder=".net, .com"
                                                                        disabled>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selectGroup(element) {
            const selectedGroup = document.getElementById('selectedGroup');
            const groupId = document.getElementById('group_id');

            selectedGroup.textContent = element.textContent; // Set the visible text
            groupId.value = element.getAttribute('data-value'); // Set the hidden input value
        }

        function selectType(element) {
            const selectedType = document.getElementById('selectedType');
            const typeId = document.getElementById('type');

            selectedType.textContent = element.textContent; // Set the visible text
            typeId.value = element.getAttribute('data-value'); // Set the hidden input value
        }

    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const radios = document.querySelectorAll('input[type="radio"]');
            const inputs = document.querySelectorAll('input.input');

            // Set initial state to "Unlimited" and SSH to "No"
            const setInitialState = () => {
                radios.forEach(radio => {
                    if (radio.value === 'Unlimited') {
                        radio.checked = true; // Check the Unlimited radio button
                    }
                    handleInputState(); // Call handleInputState to disable inputs accordingly
                });

                // Set SSH to No by default
                const sshRadioNo = document.querySelector('input[name="ssh_radio"][value="No"]');
                if (sshRadioNo) {
                    sshRadioNo.checked = true; // Check the No radio button for SSH
                }
            };

            const handleInputState = () => {
                radios.forEach(radio => {
                    const parent = radio.closest('.control');
                    const input = parent ? parent.querySelector('.input') : null;

                    // Enable/disable input based on Unlimited or Limited selection
                    if (radio.checked && radio.value === 'Unlimited' && input) {
                        input.disabled = true; // Disable input if "Unlimited" is selected
                    } else if (radio.checked && radio.value === 'Limited' && input) {
                        input.disabled = false; // Enable input if "Limited" is selected
                    }
                });

                // Handle free_domain input visibility
                const freeDomainRadio = document.querySelector('input[name="free_domain_radio"]:checked');
                const freeDomainInput = document.querySelector('.free-domain-input');
                if (freeDomainRadio && freeDomainRadio.value === 'Yes') {
                    freeDomainInput.disabled = false; // Enable input if "Yes" is selected
                } else {
                    freeDomainInput.disabled = true; // Disable input otherwise
                    freeDomainInput.value = ''; // Clear the input value if not enabled
                }
            };

            // Handle form submission
            const form = document.querySelector('form'); // Ensure you have a form element to target
            form.addEventListener('submit', (event) => {
                // Prepare data to be sent
                const data = {};

                // Collect data from the relevant fields
                data.max_database = document.querySelector('input[name="max_database_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_database"]').value;

                data.max_bandwidth = document.querySelector('input[name="max_bandwidth_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_bandwidth"]').value;

                data.max_email = document.querySelector('input[name="max_email_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_email"]').value;

                data.max_ftp = document.querySelector('input[name="max_ftp_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_ftp"]').value;

                data.max_domain = document.querySelector('input[name="max_domain_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_domain"]').value;

                data.max_addon_domain = document.querySelector('input[name="max_addon_domain_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_addon_domain"]').value;

                data.max_parked_domain = document.querySelector('input[name="max_parked_domain_radio"]:checked').value === 'Unlimited'
                    ? 'Unlimited'
                    : document.querySelector('input[name="max_parked_domain"]').value;

                data.ssh = document.querySelector('input[name="ssh_radio"]:checked').value === 'Yes'
                    ? 'Yes'
                    : 'No';

                const freeDomainInput = document.querySelector('.free-domain-input');
                data.free_domain = document.querySelector('input[name="free_domain_radio"]:checked').value === 'Yes'
                    ? freeDomainInput.value
                    : 'No';

                // Use AJAX or form submission logic to send data to the server
                console.log(data); // For debugging purposes

                // Prevent default form submission if using AJAX
                event.preventDefault();
            });

            // Set initial state
            setInitialState();
            radios.forEach(radio => {
                radio.addEventListener('change', handleInputState);
            });
        });
    </script>

    <!--Huro Scripts-->
    <!--Load Mapbox-->

    <!-- Concatenated plugins -->
    <script src="../../../assets/js/app.js"></script>

    <!-- Huro js -->
    <script src="../../../assets/js/functions.js"></script>
    <script src="../../../assets/js/main.js" async></script>
    <script src="../../../assets/js/components.js" async></script>
    <script src="../../../assets/js/popover.js" async></script>
    <script src="../../../assets/js/widgets.js" async></script>


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