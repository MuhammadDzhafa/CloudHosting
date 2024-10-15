<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Testimonials</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/logos/logo/logoo.svg') }}" />

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
            j.src = 'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-N8ZNRQ9');
    </script>
    <!-- End Google Tag Manager -->

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
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

            @include('layouts.template-admin.mobile.subsidebar')

            <!-- Content Wrapper -->
            <div id="app-projects" class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">
                <div class="page-content-wrapper">
                    <div class="page-content is-relative">
                        <div class="page-title has-text-centered">
                            <div class="title-wrap">
                                <h1 class="title is-4">Testimonials</h1>
                            </div>
                            <div class="toolbar ml-auto">
                                @include("layouts.template-admin.web.partials.toolbar.notification")
                                @include("layouts.template-admin.web.partials.toolbar.activity-panel")
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
                        <div class="page-content-inner">
                            <div class="table-wrapper" data-simplebar>
                                <table id="users-datatable" class="table is-datatable is-hoverable">
                                    <thead style="background-color:#EDE5F6;">
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
                                                <img src="{{ asset('storage/testimonial_pictures/' . $testimonial->picture) }}" alt="Picture" style="width: 100px;">
                                                @else
                                                No Image
                                                @endif
                                            </td>
                                            <td>{{ $testimonial->occupation }}</td>
                                            <td>
                                                <a href="javascript:void(0);" class="edit-link" data-id="{{ $testimonial->testimonial_id }}" data-domain="{{ $testimonial->domain_web }}" data-text="{{ $testimonial->testimonial_text }}" data-picture="{{ $testimonial->picture }}" data-occupation="{{ $testimonial->occupation }}" data-facebook="{{ $testimonial->facebook }}" data-instagram="{{ $testimonial->instagram }}">
                                                    <img src="{{ asset('assets/img/product/edit.svg') }}" alt="" class="mr-6">
                                                </a>
                                                <!-- <form action="{{ route('testimonials.destroy', $testimonial->testimonial_id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Are you sure you want to delete this testimonial?');">
        @csrf
        @method('DELETE')
        <button type="submit" style="background: none; border: none; padding: 0; cursor: pointer;">
            <img src="{{ asset('assets/img/product/trash.svg') }}" alt="Delete">
        </button>
    </form> -->
                                                <a href="#" class="h-modal-trigger" onclick="event.preventDefault(); openDeleteModal('{{ $testimonial->testimonial_id }}', '{{ $testimonial->domain_web }}')">
                                                    <img src="{{ asset('assets/img/product/trash.svg') }}" alt="">
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <script>
                                function openDeleteModal(id, domain_web) {
                                    // Set the name in the modal
                                    document.getElementById('modal-testimonial-name').textContent = domain_web;

                                    // Set the form action to the delete route
                                    const form = document.getElementById('delete-form');
                                    form.action = "{{ url('testimonials') }}/" + id;

                                    // Open the modal
                                    const modal = document.getElementById('confirm-delete-modal');
                                    modal.classList.add('is-active');
                                }
                            </script>

                            <div id="paging-first-datatable" class="pagination datatable-pagination">
                                <div class="datatable-info">
                                    <span></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal for Delete Confirmation -->
            <div id="confirm-delete-modal" class="modal h-modal">
                <div class="modal-background h-modal-close"></div>
                <div class="modal-content">
                    <div class="modal-card">
                        <header class="modal-card-head">
                            <h3>Confirm Delete</h3>
                            <button class="h-modal-close ml-auto" aria-label="close">
                                <i data-feather="x"></i>
                            </button>
                        </header>
                        @include('app.admin.testimonials.delete')
                    </div>
                </div>
            </div>
            @include("app.admin.testimonials.create")

            <!-- Concatenated plugins -->
            <script src="{{ asset('assets/js/app.js') }}"></script>

            <!-- Huro js -->
            <script src="{{ asset('assets/js/functions.js') }}"></script>
            <script src="{{ asset('assets/js/main.js') }}" async></script>
            <script src="{{ asset('assets/js/components.js') }}" async></script>
            <script src="{{ asset('assets/js/popover.js') }}" async></script>
            <script src="{{ asset('assets/js/widgets.js') }}" async></script>

            <!-- Additional Features -->
            <script src="{{ asset('assets/js/touch.js') }}" async></script>
            <script src="{{ asset('assets/js/syntax.js') }}" async></script>
        </div>
</body>

</html>