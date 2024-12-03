{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TLDs</title>
    <link rel="stylesheet" href="{{ asset('path/to/your/css/styles.css') }}"> <!-- Ganti dengan path CSS Anda -->
</head>

<body>
    <div class="container">
        <h1>TLDs</h1>
        <a href="/tlds/create" class="btn btn-primary">Add New TLD</a>
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tlds as $tld)
                <tr>
                    <td>{{ $tld->tld_name }}</td>
                    <td>Rp{{ number_format($tld->tld_price, 0, ',', '.') }}</td>
                    <td>
                        <a href="{{ route('tlds.edit', $tld) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('tlds.destroy', $tld) }}" method="POST" style="display:inline;">
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

</html> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: TLD</title>
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
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
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
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>

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

        <!--Activity panel-->
        @include('layouts.template-admin.web.partials.toolbar.activity')

        <!--Search panel-->
        <div id="search-panel" class="right-panel-wrapper is-search is-left">
            @include('layouts.template-admin.mobile.subsidebar')
        </div>

        <!-- Content Wrapper -->
        <div id="app-projects" class="view-wrapper" data-naver-offset="214" data-menu-item="#layouts-sidebar-menu" data-mobile-item="#home-sidebar-menu-mobile">
            <div class="page-content-wrapper">
                <div class="page-content is-relative">
                    <div class="page-title has-text-centered">
                        <div class="title-wrap">
                            <h1 class="title is-4">TLD</h1>
                        </div>
                    </div>
                    <div class="list-flex-toolbar">
                        <div class="control has-icon">
                            <input id="searchInput" class="input" placeholder="Search..." />
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>
                        <div class="buttons">
                            <a href="{{ route('tlds.create') }}" class="button h-button is-primary is-elevated">
                                <span class="icon" style="min-width: unset;">
                                    <i aria-hidden="true" class="fas fa-plus"></i>
                                </span>
                                <span>Add New</span>
                            </a>
                        </div>

                    </div>
                    <div class="page-content-inner">
                        <div class="table-wrapper" data-simplebar>
                            <table id="articles-datatable" class="table is-datatable is-hoverable">
                                <thead style="background-color:#EDE5F6;">
                                    <tr class="color-row">
                                        <th>TLD NAME</th>
                                        <th>PRICE</th>
                                        <th>CATEGORY</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($tlds as $tld)
                                    <tr>
                                        <td>{{ $tld->tld_name }}</td>
                                        <td>{{ $tld->tld_price }}</td>
                                        <td>{{ $tld->category }}</td>
                                        <td>
                                            <a href="{{ route('tlds.edit', $tld->tld_id) }}"
                                                class="edit-link"
                                                data-id="{{ $tld->tld_id }}"
                                                data-name="{{ $tld->tld_name }}"
                                                data-category="{{ $tld->category }}">
                                                <img src="{{ asset('assets/img/product/edit.svg') }}" alt="Edit" class="mr-6">
                                            </a>
                                            <a href="#" class="h-modal-trigger"
                                                onclick="event.preventDefault(); openDeleteModal('{{ $tld->tld_id }}', '{{ $tld->tld_name }}')">
                                                <img src="{{ asset('assets/img/product/trash.svg') }}" alt="">
                                            </a>
                                        </td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <script>
                            function openDeleteModal(id, title) {
                                // Set the title in the modal
                                document.getElementById('modal-tld-title').textContent = title;

                                // Set the form action to the delete route
                                const form = document.getElementById('delete-form');
                                form.action = "{{ url('/admin/tlds') }}/" + id; // Perhatikan rute yang sesuai

                                // Open the modal
                                const modal = document.getElementById('confirm-delete-modal');
                                modal.classList.add('is-active');
                            }

                            function closeModal() {
                                const modal = document.getElementById('confirm-delete-modal');
                                modal.classList.remove('is-active');
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
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <section class="modal-card-body">
                            <p>Are you sure you want to delete the article titled "<span id="modal-tld-title"></span>"?</p>
                        </section>
                        <footer class="modal-card-foot">
                            <button type="submit" class="button is-danger">Delete</button>
                            <button type="button" class="button h-modal-close">Cancel</button>
                        </footer>
                    </form>
                </div>
            </div>
        </div>

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const searchInput = document.getElementById('searchInput');
        const table = document.getElementById('articles-datatable');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            rows.forEach(row => {
                // Ambil TLD name dari kolom pertama
                const tldName = row.querySelector('td:first-child').textContent.toLowerCase();

                // Tampilkan/sembunyikan baris berdasarkan pencarian
                row.style.display = tldName.includes(searchTerm) ? '' : 'none';
            });
        });
    });
</script>

</html>