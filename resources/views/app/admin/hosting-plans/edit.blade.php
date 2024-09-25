<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Edit Plan</title>
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
                        <form action="/hosting-plans/{{ $hostingPlan->hosting_plans_id }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-layout" style="max-width: none;">
                                <div class="form-outer">
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Edit Plan</h3>
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
                                                    <button id="save-button"
                                                        class="button h-button is-primary is-raised"
                                                        type="submit">Save</button>

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

                                                                    <div class="dropdown dropdown-trigger"
                                                                        style="width: 100%;">
                                                                        <div class="is-trigger" style="width: 100%;">
                                                                            <button class="button" type="button"
                                                                                aria-haspopup="true"
                                                                                aria-controls="group-dropdown-menu"
                                                                                style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                                                                <span
                                                                                    id="selectedGroup">{{ $hostingPlan->group_id }}</span>
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
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="Personal Cloud Hosting"
                                                                                    onclick="updateGroup('Personal Cloud Hosting')">Personal
                                                                                    Cloud Hosting</a>
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="Corporate Cloud Hosting"
                                                                                    onclick="updateGroup('Corporate Cloud Hosting')">Corporate
                                                                                    Cloud Hosting</a>
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="WordPress Hosting"
                                                                                    onclick="updateGroup('WordPress Hosting')">WordPress
                                                                                    Hosting</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="group_id"
                                                                        id="group-id-hidden"
                                                                        value="{{ $hostingPlan->group_id }}">
                                                                </div>

                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Name</label>
                                                                    <input class="input" name="name"
                                                                        value="{{ $hostingPlan->name }}"
                                                                        style="width: 100%; padding: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="column is-6">
                                                            <div class="column-content">
                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Type</label>
                                                                    <div class="dropdown dropdown-trigger"
                                                                        style="width: 100%;">
                                                                        <div class="is-trigger" style="width: 100%;">
                                                                            <button class="button" type="button"
                                                                                aria-haspopup="true"
                                                                                aria-controls="type-dropdown-menu"
                                                                                style="width: 100%; display: flex; justify-content: space-between; align-items: center;">
                                                                                <span
                                                                                    id="selectedType">{{ $hostingPlan->type }}</span>
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
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="Regular Hosting"
                                                                                    onclick="updateType('Regular Hosting')">Regular
                                                                                    Hosting</a>
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="Custom Hosting"
                                                                                    onclick="updateType('Custom Hosting')">Custom
                                                                                    Hosting</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="type" id="type-hidden"
                                                                        value="{{ $hostingPlan->type }}">
                                                                </div>

                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Description</label>
                                                                    <input class="input" name="description"
                                                                        value="{{ $hostingPlan->description }}"
                                                                        style="width: 100%; padding: 10px;">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <!-- <div id="projects-tab" class="tab-content">
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
                                                </div>  --> --}}

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
                                                                                <input class="input" name="storage"
                                                                                    value="{{ old('storage', $hostingPlan->storage) }}">
                                                                                <p class=" ml-2">GB</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>CPU</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input" name="CPU"
                                                                                    value="{{ old('CPU', $hostingPlan->CPU) }}">
                                                                                <p class=" ml-2">Core</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>Entry Process</label>
                                                                            <div class="control">
                                                                                <input class="input"
                                                                                    name="entry_process"
                                                                                    value="{{ old('entry_process', $hostingPlan->entry_process) }}">
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>SSL</label>
                                                                            <div class="control">
                                                                                <input class="input" type="text"
                                                                                    value="{{ old('ssl', $hostingPlan->ssl) }}"
                                                                                    disabled>
                                                                                <input type="hidden" name="ssl"
                                                                                    value="{{ old('ssl', $hostingPlan->ssl) }}">
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
                                                                                <input class="input" name="RAM"
                                                                                    value="{{ old('RAM', $hostingPlan->RAM) }}"
                                                                                    placeholder="0">
                                                                                <p class=" ml-2">GB</p>
                                                                            </div>
                                                                        </div>


                                                                        <div class="field">
                                                                            <label>I/O</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input" name="max_io"
                                                                                    value="{{ old('max_io', $hostingPlan->max_io) }}"
                                                                                    placeholder="0">
                                                                                <p class=" ml-2">KB/s</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>NPROC</label>
                                                                            <div class="control">
                                                                                <input class="input" name="nproc"
                                                                                    value="{{ old('nproc', $hostingPlan->nproc) }}"
                                                                                    placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>Backup</label>
                                                                            <div class="control">
                                                                                <input class="input" type="text"
                                                                                    value="{{ old('backup', $hostingPlan->backup) }}"
                                                                                    disabled>
                                                                                <input type="hidden" name="backup"
                                                                                    value="{{ old('backup', $hostingPlan->backup) }}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- <div class="column is-12-mobile is-4-tablet is-8-desktop"
                                                            style="padding-left: 40px;">
                                                            <div class="columns">
                                                                <div class="column is-6" style="padding-bottom:0px;">
                                                                    <div class="column-content">
                                                                        <div class="field">
                                                                            <label>Max Database</label>
                                                                            <div class="control is-inline-flex"
                                                                                style="align-items: center; gap:10px">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_database_radio"
                                                                                        id="max_database_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span> Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_database_radio"
                                                                                        id="max_database_limited"
                                                                                        value="limited">
                                                                                    <span></span> Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

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
                                                                                        id="max_bandwidth_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_bandwidth_radio"
                                                                                        id="max_bandwidth_limited"
                                                                                        value="limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

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
                                                                                        id="max_email_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_email_radio"
                                                                                        id="max_email_limited"
                                                                                        value="limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

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
                                                                                        id="max_ftp_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_ftp_radio"
                                                                                        id="max_ftp_limited"
                                                                                        value="limited">
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
                                                                                        id="max_domain_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_domain_radio"
                                                                                        id="max_domain_limited"
                                                                                        value="limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

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
                                                                                        id="max_addon_domain_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_addon_domain_radio"
                                                                                        id="max_addon_domain_limited"
                                                                                        value="limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

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
                                                                                        id="max_parked_domain_unlimited"
                                                                                        value="unlimited">
                                                                                    <span></span>
                                                                                    Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_parked_domain_radio"
                                                                                        id="max_parked_domain_limited"
                                                                                        value="limited">
                                                                                    <span></span>
                                                                                    Limited
                                                                                </label>
                                                                                <input class="input" placeholder="0">
                                                                            </div>
                                                                        </div>

                                                                        <div class="field"
                                                                            style="margin-bottom: 0.75rem;">
                                                                            <label>SSH</label>
                                                                            <div class="control"
                                                                                style="display: flex; align-items: center; gap: 10px;">
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio" name="ssh_radio"
                                                                                        id="ssh_no" value="no">
                                                                                    <span></span>
                                                                                    No
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio" name="ssh_radio"
                                                                                        id="ssh_yes" value="yes">
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
                                                                        <input type="radio" name="free_domain_radio"
                                                                            id="free_domain_no" value="no">
                                                                        <span></span>
                                                                        No
                                                                    </label>
                                                                    <label class="radio is-outlined is-primary p-0"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain_radio"
                                                                            id="free_domain_yes" value="yes">
                                                                        <span></span>
                                                                        Yes
                                                                    </label>
                                                                    <input class="input">
                                                                </div>
                                                            </div>
                                                        </div> -->
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

    <script>
        // Data dari backend (contoh data dari Laravel Blade)
        var maxDatabase = "{{ $hostingPlan->max_database }}"; // Contoh: 'unlimited' atau 'limited'
        var maxBandwidth = "{{ $hostingPlan->max_bandwidth }}"; // Contoh: 'unlimited' atau 'limited'
        var maxEmail = "{{ $hostingPlan->max_email_account }}"; // Contoh: 'unlimited' atau 'limited'
        var maxFtp = "{{ $hostingPlan->max_ftp_account }}"; // Contoh: 'unlimited' atau 'limited'
        var maxDomain = "{{ $hostingPlan->max_domain }}"; // Contoh: 'unlimited' atau 'limited'
        var maxAddonDomain = "{{ $hostingPlan->max_addon_domain }}"; // Contoh: 'unlimited' atau 'limited'
        var maxParkedDomain = "{{ $hostingPlan->max_parked_domain }}"; // Contoh: 'unlimited' atau 'limited'
        var sshStatus = "{{ $hostingPlan->ssh }}"; // Contoh: 'yes' atau 'no'
        var freeDomain = "{{ $hostingPlan->free_domain }}"; // Contoh: 'yes' atau 'no'

        // Aktifkan radio button untuk Max Database
        if (maxDatabase === 'Unlimited') {
            document.getElementById('max_database_unlimited').checked = true;
        } else {
            document.getElementById('max_database_limited').checked = true;
        }

        // Aktifkan radio button untuk Max Bandwidth
        if (maxBandwidth === 'Unlimited') {
            document.getElementById('max_bandwidth_unlimited').checked = true;
        } else {
            document.getElementById('max_bandwidth_limited').checked = true;
        }

        // Aktifkan radio button untuk Max Email Account
        if (maxEmail === 'Unlimited') {
            document.getElementById('max_email_unlimited').checked = true;
        } else {
            document.getElementById('max_email_limited').checked = true;
        }

        // Aktifkan radio button untuk Max FTP Account
        if (maxFtp === 'Unlimited') {
            document.getElementById('max_ftp_unlimited').checked = true;
        } else {
            document.getElementById('max_ftp_limited').checked = true;
        }

        // Aktifkan radio button untuk Max Domain
        if (maxDomain === 'Unlimited') {
            document.getElementById('max_domain_unlimited').checked = true;
        } else {
            document.getElementById('max_domain_limited').checked = true;
        }

        // Aktifkan radio button untuk Max Addon Domain
        if (maxAddonDomain === 'Unlimited') {
            document.getElementById('max_addon_domain_unlimited').checked = true;
        } else {
            document.getElementById('max_addon_domain_limited').checked = true;
        }

        // Aktifkan radio button untuk Max Parked Domain
        if (maxParkedDomain === 'Unlimited') {
            document.getElementById('max_parked_domain_unlimited').checked = true;
        } else {
            document.getElementById('max_parked_domain_limited').checked = true;
        }

        // Aktifkan radio button untuk SSH
        if (sshStatus === 'No') {
            document.getElementById('ssh_no').checked = true;
        } else {
            document.getElementById('ssh_yes').checked = true;
        }

        if (sshStatus === 'No') {
            document.getElementById('free_domain_no').checked = true;
        } else {
            document.getElementById('free_domain_yes').checked = true;
        }


    </script>

    <script>
        function updateGroup(value) {
            document.getElementById('selectedGroup').innerText = value;
            document.getElementById('group-id-hidden').value = value; // Update hidden input
        }

        function updateType(value) {
            document.getElementById('selectedType').innerText = value;
            document.getElementById('type-hidden').value = value; // Update hidden input
        }
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