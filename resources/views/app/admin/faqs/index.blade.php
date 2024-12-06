<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: FAQ</title>
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

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>

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
                                <h1 class="title is-4">FAQ</h1>
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
                                <button class="button h-button is-primary is-elevated addData" data-modal="addandedit">
                                    <span class="icon" style="min-width: unset">
                                        <i aria-hidden="true" class="fas fa-plus"></i>
                                    </span>
                                    <span>Add New</span>
                                </button>
                            </div>
                        </div>
                        <div class="page-content-inner">
                            <div class="table-wrapper" data-simplebar>
                                <table id="faq-datatable" class="table is-datatable is-hoverable">
                                    <thead style="background-color:#EDE5F6;">
                                        <tr class="color-row">
                                            <th>QUESTION</th>
                                            <th>ANSWER</th>
                                            <th>CATEGORY</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($faqs as $category => $faqCollection)
                                        <tr>
                                            <td colspan="4"><strong>{{ $category }}</strong></td> <!-- Menampilkan kategori -->
                                        </tr>
                                        @foreach ($faqCollection as $faq) <!-- Mengiterasi koleksi FAQ di bawah kategori -->
                                        <tr>
                                            <td>{{ $faq->question }}</td>
                                            <td style="max-width: 200px;">{{ $faq->answer }}</td>
                                            <td>{{ $faq->category }}</td>
                                            <td class="text-left">
                                                <a href="javascript:void(0);"
                                                    class="edit-link mr-4"
                                                    data-id="{{ $faq->faq_id }}"
                                                    data-question="{{ $faq->question }}"
                                                    data-answer="{{ $faq->answer }}"
                                                    data-category="{{ $faq->category }}">
                                                    <img src="{{ asset('assets/img/product/edit.svg') }}" alt="Edit" class="inline w-6 h-6">
                                                </a>
                                                <a href="#"
                                                    class="h-modal-trigger"
                                                    onclick="event.preventDefault(); openDeleteModal('{{ $faq->faq_id }}', '{{ $faq->question }}')">
                                                    <img src="{{ asset('assets/img/product/trash.svg') }}" alt="Delete" class="inline w-6 h-6">
                                                </a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                            <script>
                                function openDeleteModal(id, question) {
                                    // Set the name in the modal
                                    document.getElementById('modal-faq-name').textContent = question;

                                    // Set the form action to the delete route
                                    const form = document.getElementById('delete-form');
                                    form.action = "{{ url('admin/faqs') }}/" + id; // Ganti url('faqs') dengan url('admin/faqs')

                                    // Open the modal
                                    const modal = document.getElementById('confirm-delete-modal');
                                    modal.classList.add('is-active');
                                }
                            </script>

                            <div id="paging-faq-datatable" class="pagination datatable-pagination">
                                <div class="datatable-info">
                                    <span></span>
                                </div>
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
                    @include('app.admin.faqs.delete')
                </div>
            </div>
        </div>
        @include("app.admin.faqs.create")

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
        const table = document.getElementById('faq-datatable');
        const rows = table.querySelectorAll('tbody tr');

        searchInput.addEventListener('input', function() {
            const searchTerm = this.value.toLowerCase().trim();

            rows.forEach(row => {
                // Abaikan baris kategori
                if (row.querySelector('td[colspan="4"]')) {
                    return;
                }

                // Ambil question dari kolom pertama
                const question = row.querySelector('td:first-child').textContent.toLowerCase();

                // Tampilkan/sembunyikan baris berdasarkan pencarian
                row.style.display = question.includes(searchTerm) ? '' : 'none';
            });

            // Tampilkan/sembunyikan kategori
            updateCategoryVisibility();
        });

        function updateCategoryVisibility() {
            const categoryRows = table.querySelectorAll('tr:has(td[colspan="4"])');

            categoryRows.forEach(categoryRow => {
                const category = categoryRow.querySelector('td').textContent;
                const nextRows = [];
                let nextSibling = categoryRow.nextElementSibling;

                // Kumpulkan baris-baris di bawah kategori
                while (nextSibling && !nextSibling.querySelector('td[colspan="4"]')) {
                    nextRows.push(nextSibling);
                    nextSibling = nextSibling.nextElementSibling;
                }

                // Periksa apakah ada baris dalam kategori yang terlihat
                const hasVisibleRows = nextRows.some(row => row.style.display !== 'none');

                // Tampilkan/sembunyikan kategori
                categoryRow.style.display = hasVisibleRows ? '' : 'none';
            });
        }
    });
</script>

</html>