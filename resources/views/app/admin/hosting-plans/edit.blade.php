<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Edit Plan</title>
    <link rel="icon" type="image/png" href="../../../assets/img/logos/logo/logoo.svg" />

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
                                                        <span>Back to Hosting Plans</span>
                                                    </a>
                                                    <a class="button h-button is-primary is-raised h-modal-trigger"
                                                        id="open-modal">Save Changes</a>

                                                    <!-- Modal Pertanyaan -->
                                                    <div id="question-modal" class="modal h-modal">
                                                        <div class="modal-background h-modal-close"></div>
                                                        <div class="modal-content">
                                                            <div class="modal-card">
                                                                <div class="modal-card-body"
                                                                    style="border-radius: 6px 6px 0 0;">
                                                                    <div class="inner-content">
                                                                        <div class="section-placeholder">
                                                                            <div class="placeholder-content">
                                                                                <i
                                                                                    class="fas fa-question-circle fa-3x mb-4"></i>
                                                                                <h3 class="dark-inverted">Do you want to
                                                                                    save the changes?</h3>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-card-foot is-centered">
                                                                    <button
                                                                        class="button h-button is-primary is-raised is-rounded"
                                                                        id="confirm-save">Save</button>
                                                                    <button
                                                                        class="button h-button is-rounded h-modal-close">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <!-- Modal "Saved!" -->
                                                    <div id="saved-modal" class="modal h-modal">
                                                        <div class="modal-background h-modal-close"></div>
                                                        <div class="modal-content">
                                                            <div class="modal-card">
                                                                <div class="modal-card-body"
                                                                    style="border-radius: 6px 6px 0 0;">
                                                                    <div class="inner-content">
                                                                        <div class="section-placeholder">
                                                                            <div class="placeholder-content">
                                                                                <i
                                                                                    class="fas fa-check-circle fa-3x"></i>
                                                                                <h3 class="dark-inverted">Saved!</h3>
                                                                                <p>Your changes have been saved.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-card-foot is-centered">
                                                                    <button
                                                                        class="button h-button is-primary is-raised is-rounded h-modal-close">OK</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tabs-wrapper">
                                        <div class="tabs-inner">
                                            <div class="tabs is-centered" style="margin-bottom:0px">
                                                <ul>
                                                    @if ($hostingPlan->package_type === 'Custom')
                                                        <li data-tab="product-info-tab" class="is-active"><a>Product Info</a></li>
                                                        <li data-tab="custom-pricing-tab"><a>Pricing</a></li>
                                                        <li data-tab="custom-spec-tab"><a>Product Specifications</a></li>
                                                    @else
                                                        <li data-tab="product-info-tab" class="is-active"><a>Product Info</a></li>
                                                        <!-- <li data-tab="regular-pricing-tab"><a>Pricing</a></li>
                                                        <li data-tab="regular-spec-tab"><a>Product Specifications</a></li> -->
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>


                                        <div class="form-body" style="background-color: #FAFAFA;">
                                            <div class="form-section is-grey">
                                                <div id="product-info-tab" class="tab-content is-active">
                                                    <div class="columns"
                                                        style="padding-left:310px; padding-right:310px; margin-bottom:0px;">
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
                                                                                    id="selectedType">{{ $hostingPlan->product_type }}</span>
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
                                                                                    data-value="Cloud Hosting"
                                                                                    onclick="updateType('Cloud Hosting')">Cloud
                                                                                    Hosting</a>
                                                                                <a class="dropdown-item font-size-base"
                                                                                    data-value="Regular Wordpress Hosting"
                                                                                    onclick="updateType('Wordpress Hosting')">Wordpress
                                                                                    Hosting</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="product_type"
                                                                        id="type-hidden"
                                                                        value="{{ $hostingPlan->product_type }}">
                                                                </div>

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
                                                                                    id="selectedGroup">{{ $hostingGroupName }}</span>
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
                                                                                @foreach ($hostingGroups as $group)
                                                                                    <a class="dropdown-item font-size-base"
                                                                                        data-value={{ $group->name }}
                                                                                        onclick="updateGroup('{{ $group->hosting_group_id }}', '{{ $group->name }}')">{{ $group->name }}</a>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <input type="hidden" name="hosting_group_id"
                                                                        id="group-id-hidden"
                                                                        value="{{ $hostingGroupId }}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column is-6">
                                                            <div class="column-content">
                                                                <div class="field">
                                                                    <label>Backup</label>
                                                                    <div class="control">
                                                                        <input class="input" type="text"
                                                                            value="{{ old('package_type', $hostingPlan->package_type) }}"
                                                                            disabled>
                                                                        <input type="hidden" name="package_type"
                                                                            value="{{ old('package_type', $hostingPlan->package_type) }}">
                                                                    </div>
                                                                </div>
                                                                <div class="field" style="flex-basis: 50%;">
                                                                    <label>Product Name</label>
                                                                    <input class="input" name="name"
                                                                        value="{{ $hostingPlan->name }}"
                                                                        style="width: 100%; padding: 10px; height:35px;"
                                                                        required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div style="padding-left:310px; padding-right:310px; margin">
                                                        <div class="field" style="flex-basis: 50%;">
                                                            <label>Product Description</label>
                                                            <input class="input" name="description"
                                                                value="{{ $hostingPlan->description }}"
                                                                style="width: 100%; padding: 10px; margin-bottom: 0.75rem;"
                                                                required>
                                                        </div>
                                                    </div>
                                                    <div style="padding-left:310px; padding-right:310px">
                                                        <div class="field">
                                                            <label class="checkbox is-outlined is-primary"
                                                                style="padding-left:0px; padding-right:0px">
                                                                <input type="hidden" name="best_seller" value="0">
                                                                <input type="checkbox" name="best_seller" value="1" {{ $hostingPlan->best_seller ? 'checked' : '' }}>
                                                                <span></span>
                                                                Tick If Best Seller
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{-- <div id="regular-pricing-tab" class="tab-content">
                                                    <div class="table-wrapper" style="min-height:100px" data-simplebar>
                                                        <table id="users-datatable"
                                                            class="table is-datatable is-hoverable has-text-centered">
                                                            <thead>
                                                                <tr class="color-row">
                                                                    <th></th>
                                                                    <th class="has-text-centered">One Time/Monthly</th>
                                                                    <th class="has-text-centered">Quarterly</th>
                                                                    <th class="has-text-centered">Semi-Annually</th>
                                                                    <th class="has-text-centered">Annually</th>
                                                                    <th class="has-text-centered">Biennially</th>
                                                                    <th class="has-text-centered">Triennially</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Enable</th>
                                                                    @foreach(['monthly', 'quarterly', 'semi_annually',
                                                                    'annually', 'biennially', 'triennially'] as
                                                                    $duration)
                                                                    <td>
                                                                        <label class="checkbox is-outlined is-primary">
                                                                            <input type="checkbox"
                                                                                name="prices[{{ $duration }}][enable]"
                                                                                class="toggle-checkbox"
                                                                                @if(isset($prices[$duration]['price'])
                                                                                && !empty($prices[$duration]['price']))
                                                                                checked @endif>
                                                                            <span></span>
                                                                        </label>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Price</th>
                                                                    @foreach(['monthly', 'quarterly', 'semi_annually',
                                                                    'annually', 'biennially', 'triennially'] as
                                                                    $duration)
                                                                    <td>
                                                                        <div class="control">
                                                                            <input type="number"
                                                                                name="prices[{{ $duration }}][price]"
                                                                                class="input has-text-centered toggle-input"
                                                                                @if(!isset($prices[$duration]['enable'])
                                                                                || !$prices[$duration]['enable'])
                                                                                disabled @endif
                                                                                value="{{ $prices[$duration]['price'] ?? '' }}">
                                                                        </div>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Discount (%)</th>
                                                                    @foreach(['monthly', 'quarterly', 'semi_annually',
                                                                    'annually', 'biennially', 'triennially'] as
                                                                    $duration)
                                                                    <td>
                                                                        <div class="control">
                                                                            <input type="number"
                                                                                name="prices[{{ $duration }}][discount]"
                                                                                class="input has-text-centered toggle-discount"
                                                                                min="0" max="100"
                                                                                @if(!isset($prices[$duration]['enable'])
                                                                                || !$prices[$duration]['enable'])
                                                                                disabled @endif
                                                                                value="{{ $prices[$duration]['discount'] ?? '' }}">
                                                                        </div>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Price After</th>
                                                                    @foreach(['monthly', 'quarterly', 'semi_annually',
                                                                    'annually', 'biennially', 'triennially'] as
                                                                    $duration)
                                                                    <td>
                                                                        <div class="control">
                                                                            <input type="number"
                                                                                name="prices[{{ $duration }}][price_after]"
                                                                                class="input has-text-centered toggle-price-after"
                                                                                required
                                                                                @if(!isset($prices[$duration]['enable'])
                                                                                || !$prices[$duration]['enable'])
                                                                                disabled @endif
                                                                                value="{{ $prices[$duration]['price_after'] ?? '' }}">
                                                                        </div>
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                                <tr>
                                                                    <th>Actions</th>
                                                                    <!-- Optional: You can add a header for clarity -->
                                                                    @foreach(['monthly', 'quarterly', 'semi_annually',
                                                                    'annually', 'biennially', 'triennially'] as
                                                                    $duration)
                                                                    <td>
                                                                        @if(isset($prices[$duration]))
                                                                        <button type="button" class="is-danger button"
                                                                            onclick="deletePrice({{ $prices[$duration]->price_id }})">Delete</button>
                                                                        @else
                                                                        <span>No Price Available</span>
                                                                        @endif
                                                                    </td>
                                                                    @endforeach
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div> --}}

                                            {{-- 
                                                <div id="regular-spec-tab" class="tab-content">
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

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
                                                                                <input class="input"
                                                                                    name="regular_main_spec[storage]"
                                                                                    value="{{ old('regular_main_spec.storage', optional($regularSpec)->storage) }}"
                                                                                    placeholder="0" required>
                                                                                <p class="ml-2">GB</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>CPU</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input"
                                                                                    name="regular_main_spec[CPU]"
                                                                                    value="{{ old('regular_main_spec.CPU', optional($regularSpec)->CPU) }}"
                                                                                    placeholder="0" required>
                                                                                <p class="ml-2">Core</p>
                                                                            </div>
                                                                        </div>


                                                                        <div class="field">
                                                                            <label>Entry Process</label>
                                                                            <div class="control">
                                                                                <input class="input"
                                                                                    name="entry_process"
                                                                                    value="{{ old('entry_process', $hostingPlan->entry_process) }}"
                                                                                    required>
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
                                                                                <input class="input"
                                                                                    name="regular_main_spec[RAM]"
                                                                                    value="{{ old('regular_main_spec.RAM', optional($regularSpec)->RAM) }}"
                                                                                    placeholder="0" required>
                                                                                <p class="ml-2">GB</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>I/O</label>
                                                                            <div
                                                                                class="control is-inline-flex is-align-items-center">
                                                                                <input class="input" name="max_io"
                                                                                    value="{{ old('max_io', $hostingPlan->max_io) }}"
                                                                                    placeholder="0" required>
                                                                                <p class=" ml-2">KB/s</p>
                                                                            </div>
                                                                        </div>

                                                                        <div class="field">
                                                                            <label>NPROC</label>
                                                                            <div class="control">
                                                                                <input class="input" name="nproc"
                                                                                    value="{{ $hostingPlan->nproc }}"
                                                                                    placeholder="0" required>
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

                                                        <div class="column is-12-mobile is-4-tablet is-8-desktop"
                                                            style="padding-left: 40px;">
                                                            <div class="columns">
                                                                <div class="column is-6" style="padding-bottom:0px;">
                                                                    <!-- Max Database -->
                                                                    <div class="field">
                                                                        <label>Max Database</label>
                                                                        <div class="control is-inline-flex"
                                                                            style="align-items: center; gap:10px">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_database"
                                                                                    id="max_database_unlimited"
                                                                                    value="Unlimited"
                                                                                    onchange="toggleDatabaseInput()">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_database"
                                                                                    id="max_database_limited"
                                                                                    value="Limited"
                                                                                    onchange="toggleDatabaseInput()">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_database_input"
                                                                                name="max_database" placeholder="0"
                                                                                value="{{ old('max_database', $hostingPlan->max_database) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Bandwidth -->
                                                                    <div class="field">
                                                                        <label>Max Bandwidth</label>
                                                                        <div class="control is-inline-flex"
                                                                            style="align-items: center; gap:10px">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_bandwidth"
                                                                                    id="max_bandwidth_unlimited"
                                                                                    value="Unlimited"
                                                                                    onchange="toggleBandwidthInput()">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_bandwidth"
                                                                                    id="max_bandwidth_limited"
                                                                                    value="Limited"
                                                                                    onchange="toggleBandwidthInput()">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input"
                                                                                id="max_bandwidth_input"
                                                                                name="max_bandwidth" placeholder="0"
                                                                                value="{{ old('max_bandwidth', $hostingPlan->max_bandwidth) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Email Account -->
                                                                    <div class="field">
                                                                        <label>Max Email Account</label>
                                                                        <div class="control is-inline-flex"
                                                                            style="align-items: center; gap:10px">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_email_account"
                                                                                    id="max_email_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_email_account"
                                                                                    id="max_email_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_email_input"
                                                                                placeholder="0" name="max_email_account"
                                                                                value="{{ old('max_email_account', $hostingPlan->max_email_account) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max FTP Account -->
                                                                    <div class="field">
                                                                        <label>Max FTP Account</label>
                                                                        <div class="control is-inline-flex"
                                                                            style="align-items: center; gap:10px">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_ftp_account"
                                                                                    id="max_ftp_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_ftp_account"
                                                                                    id="max_ftp_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_ftp_input"
                                                                                placeholder="0" name="max_ftp_account"
                                                                                value="{{ old('max_ftp_account', $hostingPlan->max_ftp_account) }}"
                                                                                disabled required>
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
                                                                                        name="max_domain"
                                                                                        id="max_domain_unlimited"
                                                                                        value="Unlimited">
                                                                                    <span></span> Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_domain"
                                                                                        id="max_domain_limited"
                                                                                        value="Limited">
                                                                                    <span></span> Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    id="max_domain_input"
                                                                                    placeholder="0" name="max_domain"
                                                                                    value="{{ old('max_domain', $hostingPlan->max_domain) }}"
                                                                                    disabled required>
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
                                                                                        name="max_addon_domain"
                                                                                        id="max_addon_domain_unlimited"
                                                                                        value="Unlimited">
                                                                                    <span></span> Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_addon_domain"
                                                                                        id="max_addon_domain_limited"
                                                                                        value="Limited">
                                                                                    <span></span> Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    id="max_addon_domain_input"
                                                                                    name="max_addon_domain"
                                                                                    placeholder="0"
                                                                                    value="{{ old('max_addon_domain', $hostingPlan->max_addon_domain) }}"
                                                                                    disabled required>
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
                                                                                        name="max_parked_domain"
                                                                                        id="max_parked_domain_unlimited"
                                                                                        value="Unlimited">
                                                                                    <span></span> Unlimited
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio"
                                                                                        name="max_parked_domain"
                                                                                        id="max_parked_domain_limited"
                                                                                        value="Limited">
                                                                                    <span></span> Limited
                                                                                </label>
                                                                                <input class="input"
                                                                                    id="max_parked_domain_input"
                                                                                    name="max_parked_domain"
                                                                                    placeholder="0"
                                                                                    value="{{ old('max_parked_domain', $hostingPlan->max_parked_domain) }}"
                                                                                    disabled required>
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
                                                                                    <input type="radio" name="ssh"
                                                                                        id="ssh_no" value="No">
                                                                                    <span></span> No
                                                                                </label>
                                                                                <label
                                                                                    class="radio is-outlined is-primary p-0"
                                                                                    style="display: flex; align-items: center;">
                                                                                    <input type="radio" name="ssh"
                                                                                        id="ssh_yes" value="Yes">
                                                                                    <span></span> Yes
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
                                                                        <input type="radio" name="free_domain"
                                                                            id="free_domain_no" value="No">
                                                                        <span></span> No
                                                                    </label>
                                                                    <label class="radio is-outlined is-primary p-0"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain"
                                                                            id="free_domain_yes" value="Yes">
                                                                        <span></span> Yes
                                                                    </label>
                                                                    <input class="input" id="free_domain_input"
                                                                        name="free_domain"
                                                                        value="{{ old('free_domain', $hostingPlan->free_domain) }}"
                                                                        required>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div> --}}

                                                <div id="custom-pricing-tab" class="tab-content">
                                                    <div class="columns">
                                                        <div class="column" style="border-right: 1px solid #ccc;">
                                                            <label>RAM</label>
                                                            <div class="field">
                                                                <label>Increment</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full" id="multiple_ram"
                                                                        name="custom_main_spec[multiplier_RAM]"
                                                                        style="width: 100%;"
                                                                        value="{{ old('custom_main_spec.multiplier_RAM', optional($customSpec)->multiplier_RAM) }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="columns">
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>Range (Unit: GB)</label>
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center p-0">
                                                                            <input class="input" id="min_ram"
                                                                                name="custom_main_spec[min_RAM]"
                                                                                placeholder="0"
                                                                                value="{{ old('custom_main_spec.min_RAM', optional($customSpec)->min_RAM) }}"
                                                                                required>
                                                                            <p class="ml-2">To</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>&nbsp;</label>
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center">
                                                                            <input class="input" id="max_ram"
                                                                                name="custom_main_spec[max_RAM]"
                                                                                value="{{ old('custom_main_spec.max_RAM', optional($customSpec)->max_RAM) }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p id="ram_warning" class="help danger-text"
                                                                style="display: none;">Max RAM must be a multiple of the
                                                                increment!</p>
                                                            <div class="field">
                                                                <label>Unit Price (IDR)</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full"
                                                                        name="custom_main_spec[price_RAM]"
                                                                        value="{{ old('custom_main_spec.price_RAM', optional($customSpec)->price_RAM) }}"
                                                                        style="width: 100%;" required>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="column" style="border-right: 1px solid #ccc;">
                                                            <label>CPU</label>
                                                            <div class="field">
                                                                <label>Increment</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full" id="multiple_cpu"
                                                                        name="custom_main_spec[multiplier_CPU]"
                                                                        style="width: 100%;"
                                                                        value="{{ old('custom_main_spec.multiplier_CPU', optional($customSpec)->multiplier_CPU) }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="columns">
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>Range (Unit: GHz)</label>
                                                                        <!-- Changed unit from GB to GHz for CPU -->
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center p-0">
                                                                            <input class="input" id="min_cpu"
                                                                                name="custom_main_spec[min_CPU]"
                                                                                placeholder="0"
                                                                                value="{{ old('custom_main_spec.min_CPU', optional($customSpec)->min_CPU) }}"
                                                                                required>
                                                                            <p class="ml-2">To</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>&nbsp;</label>
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center">
                                                                            <input class="input" id="max_cpu"
                                                                                name="custom_main_spec[max_CPU]"
                                                                                value="{{ old('custom_main_spec.max_CPU', optional($customSpec)->max_CPU) }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p id="cpu_warning" class="help danger-text"
                                                                style="display: none;">Max CPU must be a multiple of the
                                                                increment!</p>
                                                            <div class="field">
                                                                <label>Unit Price (IDR)</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full"
                                                                        name="custom_main_spec[price_CPU]"
                                                                        value="{{ old('custom_main_spec.price_CPU', optional($customSpec)->price_CPU) }}"
                                                                        style="width: 100%;" required>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="column">
                                                            <label>SSD Storage</label>
                                                            <div class="field">
                                                                <label>Increment</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full" id="multiple_ssd"
                                                                        name="custom_main_spec[step_storage]"
                                                                        style="width: 100%;"
                                                                        value="{{ old('custom_main_spec.step_storage', optional($customSpec)->step_storage) }}"
                                                                        required>
                                                                </div>
                                                            </div>
                                                            <div class="columns">
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>Range (Unit: GB)</label>
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center p-0">
                                                                            <input class="input" id="min_ssd"
                                                                                name="custom_main_spec[min_storage]"
                                                                                placeholder="0"
                                                                                value="{{ old('custom_main_spec.min_storage', optional($customSpec)->min_storage) }}"
                                                                                required>
                                                                            <p class="ml-2">To</p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label>&nbsp;</label>
                                                                        <div
                                                                            class="control is-inline-flex is-align-items-center">
                                                                            <input class="input" id="max_ssd"
                                                                                name="custom_main_spec[max_storage]"
                                                                                value="{{ old('custom_main_spec.max_storage', optional($customSpec)->max_storage) }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p id="ssd_warning" class="help danger-text"
                                                                style="display: none;">Max Storage must be a multiple of
                                                                the increment!</p>
                                                            <div class="field">
                                                                <label>Unit Price (IDR)</label>
                                                                <div class="control is-inline-flex is-align-items-center"
                                                                    style="width: 100%;">
                                                                    <input class="input w-full"
                                                                        name="custom_main_spec[price_storage]"
                                                                        value="{{ old('custom_main_spec.price_storage', optional($customSpec)->price_storage) }}"
                                                                        style="width: 100%;" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div id="custom-spec-tab" class="tab-content">
                                                    @if ($errors->any())
                                                        <div class="alert alert-danger">
                                                            <ul>
                                                                @foreach ($errors->all() as $error)
                                                                    <li>{{ $error }}</li>
                                                                @endforeach
                                                            </ul>
                                                        </div>
                                                    @endif

                                                    <div class="columns is-justify-content-center w-full">
                                                        <div class="column is-12-mobile is-6-tablet is-12-desktop">
                                                            <div class="columns">
                                                                <!-- First Column (Left Side) -->
                                                                <div class="column is-6" style="padding-bottom:0px;">
                                                                    <!-- Max Domain -->
                                                                    <div class="field">
                                                                        <label>Max Domain</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_domain"
                                                                                    id="max_domain_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_domain"
                                                                                    id="max_domain_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_domain_input"
                                                                                placeholder="0" name="max_domain"
                                                                                value="{{ old('max_domain', $hostingPlan->max_domain) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Bandwidth -->
                                                                    <div class="field">
                                                                        <label>Max Bandwidth</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_bandwidth"
                                                                                    id="max_bandwidth_unlimited"
                                                                                    value="Unlimited"
                                                                                    onchange="toggleBandwidthInput()">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_bandwidth"
                                                                                    id="max_bandwidth_limited"
                                                                                    value="Limited"
                                                                                    onchange="toggleBandwidthInput()">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input"
                                                                                id="max_bandwidth_input"
                                                                                name="max_bandwidth" placeholder="0"
                                                                                value="{{ old('max_bandwidth', $hostingPlan->max_bandwidth) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Addon Domain -->
                                                                    <div class="field">
                                                                        <label>Max Addon Domain</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_addon_domain"
                                                                                    id="max_addon_domain_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_addon_domain"
                                                                                    id="max_addon_domain_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input"
                                                                                id="max_addon_domain_input"
                                                                                name="max_addon_domain" placeholder="0"
                                                                                value="{{ old('max_addon_domain', $hostingPlan->max_addon_domain) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max FTP Account -->
                                                                    <div class="field">
                                                                        <label>Max FTP Account</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_ftp_account"
                                                                                    id="max_ftp_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_ftp_account"
                                                                                    id="max_ftp_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_ftp_input"
                                                                                placeholder="0" name="max_ftp_account"
                                                                                value="{{ old('max_ftp_account', $hostingPlan->max_ftp_account) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Second Column (Right Side) -->
                                                                <div class="column is-6" style="padding-bottom:0px;">
                                                                    <!-- Max Email Account -->
                                                                    <div class="field">
                                                                        <label>Max Email Account</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_email_account"
                                                                                    id="max_email_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_email_account"
                                                                                    id="max_email_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_email_input"
                                                                                placeholder="0" name="max_email_account"
                                                                                value="{{ old('max_email_account', $hostingPlan->max_email_account) }}"
                                                                                disabled>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Database -->
                                                                    <div class="field">
                                                                        <label>Max Database</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_database"
                                                                                    id="max_database_unlimited"
                                                                                    value="Unlimited"
                                                                                    onchange="toggleDatabaseInput()">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="max_database"
                                                                                    id="max_database_limited"
                                                                                    value="Limited"
                                                                                    onchange="toggleDatabaseInput()">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input" id="max_database_input"
                                                                                name="max_database" placeholder="0"
                                                                                value="{{ old('max_database', $hostingPlan->max_database) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- Max Parked Domain -->
                                                                    <div class="field">
                                                                        <label>Max Parked Domain</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_parked_domain"
                                                                                    id="max_parked_domain_unlimited"
                                                                                    value="Unlimited">
                                                                                <span></span> Unlimited
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio"
                                                                                    name="max_parked_domain"
                                                                                    id="max_parked_domain_limited"
                                                                                    value="Limited">
                                                                                <span></span> Limited
                                                                            </label>
                                                                            <input class="input"
                                                                                id="max_parked_domain_input"
                                                                                name="max_parked_domain" placeholder="0"
                                                                                value="{{ old('max_parked_domain', $hostingPlan->max_parked_domain) }}"
                                                                                disabled required>
                                                                        </div>
                                                                    </div>

                                                                    <!-- SSH -->
                                                                    <div class="field">
                                                                        <label>SSH</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center gap-2">
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="ssh"
                                                                                    id="ssh_no" value="No">
                                                                                <span></span> No
                                                                            </label>
                                                                            <label
                                                                                class="radio is-outlined is-primary p-0 mr-3"
                                                                                style="display: flex; align-items: center;">
                                                                                <input type="radio" name="ssh"
                                                                                    id="ssh_yes" value="Yes">
                                                                                <span></span> Yes
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="columns">
                                                                <!-- First Column (I/O) -->
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label for="io_input">I/O</label>
                                                                        <div
                                                                            class="control is-flex is-align-items-center">
                                                                            <input class="input" name="max_io"
                                                                                value="{{ old('max_io', $hostingPlan->max_io) }}"
                                                                                placeholder="0" required>
                                                                            <p class="ml-2">KB/s</p>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <!-- Second Column (Entry Process) -->
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label for="entry_process_input">Entry
                                                                            Process</label>
                                                                        <div class="control">
                                                                            <input class="input" name="entry_process"
                                                                                value="{{ old('entry_process', $hostingPlan->entry_process) }}"
                                                                                required>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Third Column (NPROC) -->
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label for="nproc_input">NPROC</label>
                                                                        <div class="control">
                                                                            <input class="input" name="nproc"
                                                                                value="{{ old('nproc', $hostingPlan->nproc) }}"
                                                                                placeholder="0" required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- Free Domain -->
                                                            <div class="field">
                                                                <label>Free Domain</label>
                                                                <div
                                                                    class="control is-flex is-align-items-center gap-2">
                                                                    <label class="radio is-outlined is-primary p-0 mr-3"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain"
                                                                            id="free_domain_no" value="No">
                                                                        <span></span> No
                                                                    </label>
                                                                    <label class="radio is-outlined is-primary p-0 mr-3"
                                                                        style="display: flex; align-items: center;">
                                                                        <input type="radio" name="free_domain"
                                                                            id="free_domain_yes" value="Yes">
                                                                        <span></span> Yes
                                                                    </label>
                                                                    <input class="input" id="free_domain_input"
                                                                        name="free_domain"
                                                                        value="{{ old('free_domain', $hostingPlan->free_domain) }}"
                                                                        placeholder="E.g. .net, .com" name="free_domain"
                                                                        disabled style="width: auto; flex-grow: 1;">
                                                                </div>
                                                            </div>

                                                            <div class="columns">
                                                                <!-- First Column (I/O) -->
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label for="io_input">SSL</label>
                                                                        <div class="control is-flex">
                                                                            <input class="input" type="text"
                                                                                value="{{ old('ssl', $hostingPlan->ssl) }}"
                                                                                disabled>
                                                                            <input type="hidden" name="ssl"
                                                                                value="{{ old('ssl', $hostingPlan->ssl) }}">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <!-- Second Column (Entry Process) -->
                                                                <div class="column">
                                                                    <div class="field">
                                                                        <label for="entry_process_input">Backup</label>
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

    <!-- JavaScript to Enable Radio Buttons Based on Input Values -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initialize the state of the inputs based on the values
            const maxDatabaseInput = document.getElementById('max_database_input');
            const maxBandwidthInput = document.getElementById('max_bandwidth_input');
            const maxEmailInput = document.getElementById('max_email_input');
            const maxFTPInput = document.getElementById('max_ftp_input');
            const maxDomainInput = document.getElementById('max_domain_input');
            const maxAddonDomainInput = document.getElementById('max_addon_domain_input');
            const maxParkedDomainInput = document.getElementById('max_parked_domain_input');

            if (parseInt(maxDatabaseInput.value) > 0) {
                document.getElementById('max_database_limited').checked = true;
                toggleDatabaseInput();
            } else {
                document.getElementById('max_database_unlimited').checked = true;
            }

            if (parseInt(maxBandwidthInput.value) > 0) {
                document.getElementById('max_bandwidth_limited').checked = true;
                toggleBandwidthInput();
            } else {
                document.getElementById('max_bandwidth_unlimited').checked = true;
            }

            if (parseInt(maxEmailInput.value) > 0) {
                document.getElementById('max_email_limited').checked = true;
                toggleEmailInput();
            } else {
                document.getElementById('max_email_unlimited').checked = true;
            }

            if (parseInt(maxFTPInput.value) > 0) {
                document.getElementById('max_ftp_limited').checked = true;
                toggleFTPInput();
            } else {
                document.getElementById('max_ftp_unlimited').checked = true;
            }

            // Check Max Domain
            if (parseInt(maxDomainInput.value) > 0) {
                document.getElementById('max_domain_limited').checked = true;
                toggleDomainInput();
            } else {
                document.getElementById('max_domain_unlimited').checked = true;
            }

            // Check Max Addon Domain
            if (parseInt(maxAddonDomainInput.value) > 0) {
                document.getElementById('max_addon_domain_limited').checked = true;
                toggleAddonDomainInput();
            } else {
                document.getElementById('max_addon_domain_unlimited').checked = true;
            }

            // Check Max Parked Domain
            if (parseInt(maxParkedDomainInput.value) > 0) {
                document.getElementById('max_parked_domain_limited').checked = true;
                toggleParkedDomainInput();
            } else {
                document.getElementById('max_parked_domain_unlimited').checked = true;
            }
        });

        // Function to toggle database input based on radio selection
        function toggleDatabaseInput() {
            const databaseInput = document.getElementById('max_database_input');
            const limitedRadio = document.getElementById('max_database_limited');
            databaseInput.disabled = !limitedRadio.checked;
        }

        // Function to toggle bandwidth input based on radio selection
        function toggleBandwidthInput() {
            const bandwidthInput = document.getElementById('max_bandwidth_input');
            const limitedRadio = document.getElementById('max_bandwidth_limited');
            bandwidthInput.disabled = !limitedRadio.checked;
        }

        // Function to toggle email input based on radio selection
        function toggleEmailInput() {
            const emailInput = document.getElementById('max_email_input');
            const limitedRadio = document.getElementById('max_email_limited');
            emailInput.disabled = !limitedRadio.checked;
        }

        // Function to toggle FTP input based on radio selection
        function toggleFTPInput() {
            const ftpInput = document.getElementById('max_ftp_input');
            const limitedRadio = document.getElementById('max_ftp_limited');
            ftpInput.disabled = !limitedRadio.checked;
        }
        // Function to toggle domain input based on radio selection
        function toggleDomainInput() {
            const domainInput = document.getElementById('max_domain_input');
            const limitedRadio = document.getElementById('max_domain_limited');
            domainInput.disabled = !limitedRadio.checked;
        }

        // Function to toggle addon domain input based on radio selection
        function toggleAddonDomainInput() {
            const addonDomainInput = document.getElementById('max_addon_domain_input');
            const limitedRadio = document.getElementById('max_addon_domain_limited');
            addonDomainInput.disabled = !limitedRadio.checked;
        }

        // Function to toggle parked domain input based on radio selection
        function toggleParkedDomainInput() {
            const parkedDomainInput = document.getElementById('max_parked_domain_input');
            const limitedRadio = document.getElementById('max_parked_domain_limited');
            parkedDomainInput.disabled = !limitedRadio.checked;
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Data dari backend
            const hostingPlanData = {
                maxDatabase: "{{ $hostingPlan->max_database }}",
                maxBandwidth: "{{ $hostingPlan->max_bandwidth }}",
                maxEmail: "{{ $hostingPlan->max_email_account }}",
                maxFtp: "{{ $hostingPlan->max_ftp_account }}",
                maxDomain: "{{ $hostingPlan->max_domain }}",
                maxAddonDomain: "{{ $hostingPlan->max_addon_domain }}",
                maxParkedDomain: "{{ $hostingPlan->max_parked_domain }}",
                sshStatus: "{{ $hostingPlan->ssh }}",
                freeDomain: "{{ $hostingPlan->free_domain }}"
            };

            const setRadioButton = (name, value) => {
                const radio = document.getElementById(`${name}_${value.toLowerCase()}`);
                if (radio) radio.checked = true;
            };

            // Set radio buttons to default values
            // setRadioButton('max_database', 'Unlimited');
            // setRadioButton('max_bandwidth', 'Unlimited');
            // setRadioButton('max_email', 'Unlimited');
            // setRadioButton('max_ftp', 'Unlimited');
            // setRadioButton('max_domain', 'Unlimited');
            // setRadioButton('max_addon_domain', 'Unlimited');
            // setRadioButton('max_parked_domain', 'Unlimited');
            // setRadioButton('ssh', 'No'); // Default SSH to "No"
            // setRadioButton('free_domain', 'No');

            const radios = document.querySelectorAll('input[type="radio"]');
            const inputs = document.querySelectorAll('input.input');

            const handleInputState = () => {
                radios.forEach(radio => {
                    const parent = radio.closest('.control');
                    const input = parent ? parent.querySelector('.input') : null;

                    if (input) {
                        input.disabled = true; // Disable all inputs initially

                        if ((radio.value === 'Limited' || radio.value === 'Yes') && radio.checked) {
                            input.disabled = false; // Enable input for "Limited" or "Yes"
                        }
                    }
                });
            };

            handleInputState(); // Initial state handling

            radios.forEach(radio => {
                radio.addEventListener('change', handleInputState);
            });

            // Handle free domain logic
            const freeDomainNo = document.getElementById('free_domain_no');
            const freeDomainYes = document.getElementById('free_domain_yes');
            const freeDomainInput = document.getElementById('free_domain_input');

            const setInitialFreeDomainState = () => {
                if (hostingPlanData.freeDomain === 'No') {
                    freeDomainNo.checked = true;
                } else {
                    freeDomainYes.checked = true;
                }
            };

            setInitialFreeDomainState(); // Memanggil fungsi untuk mengatur status awal

            const handleFreeDomainChange = () => {
                if (freeDomainNo.checked) {
                    freeDomainInput.disabled = true;
                    freeDomainInput.value = ''; // Clear input if "No" is selected
                } else {
                    freeDomainInput.disabled = false; // Enable input if "Yes" is selected
                    freeDomainInput.value = freeDomainInput.value === '' ? '' : freeDomainInput.value;
                }
            };

            freeDomainNo.addEventListener('change', handleFreeDomainChange);
            freeDomainYes.addEventListener('change', handleFreeDomainChange);
            handleFreeDomainChange(); // Set initial state for free domain

            // Handle input states based on radio buttons
            const handleInputStateWithRadio = (radioName, inputId, oldValue) => {
                const unlimitedRadio = document.getElementById(`${radioName}_unlimited`);
                const limitedRadio = document.getElementById(`${radioName}_limited`);
                const inputField = document.getElementById(inputId);

                const updateInputState = () => {
                    inputField.disabled = unlimitedRadio.checked;
                    if (unlimitedRadio.checked) {
                        inputField.value = '0'; // Set displayed input value to 0
                    } else {
                        inputField.value = oldValue !== 'Unlimited' ? oldValue : '';
                    }
                };

                updateInputState(); // Initial state setup
                unlimitedRadio.addEventListener('change', updateInputState);
                limitedRadio.addEventListener('change', updateInputState);
            };

            handleInputStateWithRadio('max_database', 'max_database_input', "{{ old('max_database', $hostingPlan->max_database) }}");
            handleInputStateWithRadio('max_bandwidth', 'max_bandwidth_input', "{{ old('max_bandwidth', $hostingPlan->max_bandwidth) }}");
            handleInputStateWithRadio('max_email', 'max_email_input', "{{ old('max_email_account', $hostingPlan->max_email_account) }}");
            handleInputStateWithRadio('max_ftp', 'max_ftp_input', "{{ old('max_ftp_account', $hostingPlan->max_ftp_account) }}");
            handleInputStateWithRadio('max_domain', 'max_domain_input', "{{ old('max_domain', $hostingPlan->max_domain) }}");
            handleInputStateWithRadio('max_addon_domain', 'max_addon_domain_input', "{{ old('max_addon_domain', $hostingPlan->max_addon_domain) }}");
            handleInputStateWithRadio('max_parked_domain', 'max_parked_domain_input', "{{ old('max_parked_domain', $hostingPlan->max_parked_domain) }}");

            // SSH Status logic
            const sshNo = document.getElementById('ssh_no');
            const sshYes = document.getElementById('ssh_yes');

            // Default set ke No
            sshNo.checked = true;

            // Set radio button berdasarkan data dari database
            if (hostingPlanData.sshStatus === "Yes") {
                sshYes.checked = true;
            }

            // Fungsi untuk menangani perubahan radio button SSH
            const handleSSHChange = () => {
                if (sshYes.checked) {
                    console.log("SSH Enabled");
                    // Lakukan aksi penyimpanan untuk SSH Yes (via form submit atau AJAX)
                } else {
                    console.log("SSH Disabled");
                    // Lakukan aksi penyimpanan untuk SSH No
                }
            };

            // Event listener untuk perubahan pada radio button SSH
            sshNo.addEventListener('change', handleSSHChange);
            sshYes.addEventListener('change', handleSSHChange);

            // Panggil handleSSHChange untuk menyimpan status awal saat halaman di-refresh
            handleSSHChange();

            // Handle form submission
            const form = document.querySelector('form'); // Adjust the selector if needed
            form.addEventListener('submit', (event) => {
                const maxDatabaseUnlimited = document.getElementById('max_database_unlimited');
                const maxDatabaseInput = document.getElementById('max_database_input');
                const maxBandwidthUnlimited = document.getElementById('max_bandwidth_unlimited');
                const maxBandwidthInput = document.getElementById('max_bandwidth_input');
                const maxEmailUnlimited = document.getElementById('max_email_unlimited');
                const maxEmailInput = document.getElementById('max_email_input');
                const maxFtpUnlimited = document.getElementById('max_ftp_unlimited');
                const maxFtpInput = document.getElementById('max_ftp_input');
                const maxDomainUnlimited = document.getElementById('max_domain_unlimited');
                const maxDomainInput = document.getElementById('max_domain_input');
                const maxAddonUnlimited = document.getElementById('max_addon_domain_unlimited');
                const maxAddonInput = document.getElementById('max_addon_domain_input');
                const maxParkedUnlimited = document.getElementById('max_parked_domain_unlimited');
                const maxParkedInput = document.getElementById('max_parked_domain_input');

                // Set value for free_domain
                const freeDomainValue = freeDomainYes.checked ? freeDomainInput.value.trim() : 'No';
                freeDomainInput.value = freeDomainValue; // Set input value for free_domain

                // Ensure that all inputs are prepared correctly
                if (freeDomainNo.checked) {
                    freeDomainInput.disabled = false; // Enable temporarily for form submission
                    freeDomainInput.value = 'No';
                } else if (freeDomainYes.checked && freeDomainInput.value.trim() === '') {
                    freeDomainInput.value = ''; // Leave blank if input is empty
                }

                // Change displayed value to Unlimited for form submission
                if (maxDatabaseUnlimited.checked) {
                    maxDatabaseInput.disabled = false; // Enable the input temporarily
                    maxDatabaseInput.value = 'Unlimited'; // Set value for database
                }

                if (maxBandwidthUnlimited.checked) {
                    maxBandwidthInput.disabled = false; // Enable the input temporarily
                    maxBandwidthInput.value = 'Unlimited'; // Set value for bandwidth
                }

                if (maxEmailUnlimited.checked) {
                    maxEmailInput.disabled = false; // Enable the input temporarily
                    maxEmailInput.value = 'Unlimited'; // Set value for email
                }

                if (maxFtpUnlimited.checked) {
                    maxFtpInput.disabled = false; // Enable the input temporarily
                    maxFtpInput.value = 'Unlimited'; // Set value for FTP
                }

                if (maxDomainUnlimited.checked) {
                    maxDomainInput.disabled = false; // Enable the input temporarily
                    maxDomainInput.value = 'Unlimited'; // Set value for domain
                }

                if (maxAddonUnlimited.checked) {
                    maxAddonInput.disabled = false; // Enable the input temporarily
                    maxAddonInput.value = 'Unlimited'; // Set value for addon domain
                }

                if (maxParkedUnlimited.checked) {
                    maxParkedInput.disabled = false; // Enable the input temporarily
                    maxParkedInput.value = 'Unlimited'; // Set value for parked domain
                }
            });
        });
    </script>

    <script>
        // function updateGroup(value) {
        //     document.getElementById('selectedGroup').innerText = value;
        //     document.getElementById('group-id-hidden').value = value; // Update hidden input
        // }

        function updateGroup(groupId, groupName) {
            // Update the displayed group name
            document.getElementById('selectedGroup').innerText = groupName;

            // Update the hidden input value with the selected group ID
            document.getElementById('group-id-hidden').value = groupId;

            // Optionally, you can close the dropdown after selection
            const dropdownMenu = document.getElementById('group-dropdown-menu');
            dropdownMenu.classList.remove('is-active'); // This line will close the dropdown if needed
        }


        function updateType(value) {
            document.getElementById('selectedType').innerText = value;
            document.getElementById('type-hidden').value = value; // Update hidden input
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const checkboxes = document.querySelectorAll('.toggle-checkbox');
            const inputs = document.querySelectorAll('.toggle-input');
            const discounts = document.querySelectorAll('.toggle-discount');
            const pricesAfter = document.querySelectorAll('.toggle-price-after');

            // Function to toggle input disabled state based on checkbox
            const toggleInputs = () => {
                checkboxes.forEach((checkbox, index) => {
                    const isChecked = checkbox.checked;
                    inputs[index].disabled = !isChecked;
                    discounts[index].disabled = !isChecked;
                    pricesAfter[index].disabled = !isChecked;
                });
            };

            // Function to calculate price after discount
            const calculatePriceAfter = (index) => {
                const price = parseFloat(inputs[index].value) || 0;
                const discount = parseFloat(discounts[index].value) || 0;
                const priceAfter = price - (price * (discount / 100));
                pricesAfter[index].value = priceAfter;
            };

            // Initially run the toggle function on page load
            toggleInputs(); // This makes sure inputs are enabled/disabled correctly based on initial checkbox state

            // Add event listeners to all checkboxes
            checkboxes.forEach((checkbox, index) => {
                checkbox.addEventListener('change', () => {
                    toggleInputs();
                });

                // Add input event listeners for Price and Discount inputs
                inputs[index].addEventListener('input', () => {
                    if (checkbox.checked) {
                        calculatePriceAfter(index);
                    }
                });
                discounts[index].addEventListener('input', () => {
                    if (checkbox.checked) {
                        calculatePriceAfter(index);
                    }
                });
            });
        });
    </script>

    <script>
        function deletePrice(priceId) {
            if (confirm("Are you sure you want to delete this price?")) {
                fetch(`/prices/${priceId}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Content-Type': 'application/json',
                    },
                })
                    .then(response => {
                        if (response.ok) {
                            location.reload();
                        } else {
                            alert('Failed to delete the price. Please try again.');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        alert('An error occurred while deleting the price.');
                    });
            }
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabs = document.querySelectorAll('.tabs li');
            const tabContents = document.querySelectorAll('.tab-content');
            let activeTab = document.querySelector('.tabs li.is-active').getAttribute('data-tab'); // Default active tab

            // Event listener for each tab to activate the correct tab when clicked
            tabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const selectedTab = this.getAttribute('data-tab');
                    setActiveTab(selectedTab);
                });
            });

            // Function to set the active tab and show the corresponding content
            function setActiveTab(tabId) {
                // Remove 'is-active' class from all tabs and hide all contents
                tabs.forEach(tab => tab.classList.remove('is-active'));
                tabContents.forEach(content => content.style.display = 'none');

                // Add 'is-active' class to the clicked tab and show the corresponding content
                document.querySelector(`li[data-tab="${tabId}"]`).classList.add('is-active');
                document.getElementById(tabId).style.display = 'block';

                // Update the active tab in the local variable
                activeTab = tabId;
            }

            // Simulate saving changes and retaining the active tab after saving
            document.getElementById('saveChanges').addEventListener('click', function () {
                // Normally, you would trigger a save action here
                alert('Changes saved!');

                // Retain the current active tab by simply not changing the activeTab variable.
                // The UI will stay on the same tab.
            });
        });
    </script>

    <script>
        // Fungsi untuk membuka modal
        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('is-active');
        }

        // Fungsi untuk menutup modal
        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('is-active');
        }

        // Buka modal pertanyaan saat tombol "Right Actions" diklik
        document.getElementById('open-modal').addEventListener('click', function () {
            openModal('question-modal');
        });

        // Event Listener untuk tombol "Save"
        // document.getElementById('confirm-save').addEventListener('click', function () {
        //     closeModal('question-modal'); // Tutup modal pertanyaan
        //     openModal('saved-modal'); // Buka modal "Saved!"
        // });

        document.getElementById('confirm-save').addEventListener('click', function (event) {
            event.preventDefault(); // Cegah submit form secara langsung

            closeModal('question-modal'); // Tutup modal pertanyaan
            openModal('saved-modal'); // Buka modal "Saved!"

            // Kirim form secara manual setelah modal dibuka
            document.querySelector('form').submit();
        });

        // Tutup modal saat background atau tombol close diklik
        document.querySelectorAll('.h-modal-close').forEach(function (closeBtn) {
            closeBtn.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah refresh halaman
                const modals = document.querySelectorAll('.modal');
                modals.forEach(function (modal) {
                    modal.classList.remove('is-active');
                });
            });
        });

        // Event Listener untuk tombol "Cancel"
        document.getElementById('cancel-button').addEventListener('click', function (event) {
            event.preventDefault(); // Mencegah refresh halaman
            closeModal('question-modal'); // Tutup modal pertanyaan
        });
    </script>
    <script>
        document.getElementById('multiple_ram').addEventListener('input', function () {
            var multipleRamValue = this.value;
            document.getElementById('min_ram').value = multipleRamValue;
        });
        document.getElementById('multiple_cpu').addEventListener('input', function () {
            var multipleCpuValue = this.value;
            document.getElementById('min_cpu').value = multipleCpuValue;
        });
        document.getElementById('multiple_ssd').addEventListener('input', function () {
            var multipleSsdValue = this.value;
            document.getElementById('min_ssd').value = multipleSsdValue;
        });
    </script>
    <script>
        // Function to validate if max is a multiple of multiple
        function validateMultiple(multipleId, maxId, warningId) {
            var multipleValue = parseFloat(document.getElementById(multipleId).value);
            var maxValue = parseFloat(document.getElementById(maxId).value);
            var warningElement = document.getElementById(warningId);

            // Check if both values are valid numbers and maxValue is a multiple of multipleValue
            if (!isNaN(multipleValue) && !isNaN(maxValue) && maxValue % multipleValue !== 0) {
                warningElement.style.display = 'block'; // Show warning
            } else {
                warningElement.style.display = 'none'; // Hide warning
            }
        }

        // Add event listeners for real-time validation on max input for RAM, CPU, and SSD
        document.getElementById('max_ram').addEventListener('input', function () {
            validateMultiple('multiple_ram', 'max_ram', 'ram_warning');
        });

        document.getElementById('max_cpu').addEventListener('input', function () {
            validateMultiple('multiple_cpu', 'max_cpu', 'cpu_warning');
        });

        document.getElementById('max_ssd').addEventListener('input', function () {
            validateMultiple('multiple_ssd', 'max_ssd', 'ssd_warning');
        });

        // Add event listeners to update min values when multiple values change
        document.getElementById('multiple_ram').addEventListener('input', function () {
            var multipleRamValue = this.value;
            document.getElementById('min_ram').value = multipleRamValue;
            validateMultiple('multiple_ram', 'max_ram', 'ram_warning'); // Revalidate
        });

        document.getElementById('multiple_cpu').addEventListener('input', function () {
            var multipleCpuValue = this.value;
            document.getElementById('min_cpu').value = multipleCpuValue;
            validateMultiple('multiple_cpu', 'max_cpu', 'cpu_warning'); // Revalidate
        });

        document.getElementById('multiple_ssd').addEventListener('input', function () {
            var multipleSsdValue = this.value;
            document.getElementById('min_ssd').value = multipleSsdValue;
            validateMultiple('multiple_ssd', 'max_ssd', 'ssd_warning'); // Revalidate
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