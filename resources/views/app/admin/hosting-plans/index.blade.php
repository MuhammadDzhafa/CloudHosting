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
                            <h1 class="title is-4">Hosting Package</h1>
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

                    <div class="list-flex-toolbar">
                        <div class="control has-icon">
                            <input class="input" placeholder="Search..." />
                            <div class="form-icon">
                                <i data-feather="search"></i>
                            </div>
                        </div>

                        <div class="buttons">
                            <button class="button h-button is-primary is-elevated h-modal-trigger"
                                style="border-radius: 4px;" data-modal="new-group-button">
                                <span class="icon" style="min-width: unset">
                                    <i aria-hidden="true" class="fas fa-plus"></i>
                                </span>
                                <span>New Group</span>
                            </button>
                            <button class="button h-button is-primary is-elevated h-modal-trigger"
                                style="border-radius: 4px;" data-modal="create-new-product-modal">
                                <span class="icon" style="min-width: unset">
                                    <i aria-hidden="true" class="lnir lnir-circle-plus"></i>
                                </span>
                                <span>New Package</span>
                            </button>
                        </div>
                    </div>

                    {{-- <--Modals--> --}}
                        <div id="new-group-modal" class="modal h-modal">
                            <div class="modal-background h-modal-close"></div>
                            <div class="modal-content">
                                <div class="modal-card">
                                    <header class="modal-card-head">
                                        <h3 id="modal-title">Create a New Group</h3>
                                        <button class="h-modal-close ml-auto" aria-label="close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </header>
                                    <form method="POST" id="new-group-form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-card-body">
                                            <div class="inner-content">
                                                <div class="field">
                                                    <label class="label" style="font-weight:400;">Enter Group
                                                        Name</label>
                                                    <div class="control">
                                                        <input type="text" class="input" name="name"
                                                            placeholder="E.g. Cloud Hosting" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-card-foot is-centered">
                                            <button type="button" class="button h-button h-modal-close">Cancel</button>
                                            <button type="submit"
                                                class="button h-button is-primary is-raised">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                        <div id="create-new-product-modal" class="modal h-modal">
                            <div class="modal-background h-modal-close"></div>
                            <div class="modal-content">
                                <div class="modal-card">
                                    <header class="modal-card-head">
                                        <h3>Create a New Product</h3>
                                        <button class="h-modal-close ml-auto" aria-label="close">
                                            <i data-feather="x"></i>
                                        </button>
                                    </header>
                                    @include('app.admin.hosting-plans.create')
                                </div>
                            </div>
                        </div>

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
                                    @include('app.admin.hosting-plans.delete')
                                </div>
                            </div>
                        </div>

                        <div class="page-content-inner">

                            <!-- Datatable -->


                            <div class="table-wrapper" data-simpleba style="min-height:auto">
                                <table id="users-datatable" class="table is-datatable is-hoverable">
                                    <thead style="background-color:#EDE5F6;">
                                        <tr class="color-row">
                                            <th>PRODUCT NAME</th>
                                            <th>TYPE</th>
                                            <th>DESCRIPTION</th>
                                            <th>STORAGE</th>
                                            <th>CPU</th>
                                            <th>RAM</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($hostingGroups as $group)
                                            <!-- Tampilkan nama grup -->
                                            <tr class="is-striped-row" style="background-color:#F2F3F3;">
                                                <td>
                                                    <span style="font-weight: 500;">{{ $group->name }}</span>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <div class="d-flex justify-end">
                                                        <a href="javascript:void(0);" class="edit-link"
                                                            data-id="{{ $group->hosting_group_id }}"
                                                            data-name="{{ $group->name}}">
                                                            <img src="assets/img/product/edit.svg" alt="" class="mr-3">
                                                        </a>
                                                        <a href="#"
                                                            onclick="openDeleteModal('{{ $group->hosting_group_id }}', '{{ $group->name }}', 'group')">
                                                            <img src="assets/img/product/trash.svg" alt="">
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>

                                            <!-- Tampilkan hosting plans yang berelasi dengan grup -->
                                            @foreach ($group->hostingPlans as $hostingPlan) <!-- Relasi hosting plans di dalam group -->
                                                <tr class="is-striped-row">
                                                    <td>{{ $hostingPlan->name }}</td>
                                                    <td>{{ $hostingPlan->description }}</td>
                                                    <td>{{ $hostingPlan->type }}</td>
                                                    <td>{{ $hostingPlan->storage }}</td>
                                                    <td>{{ $hostingPlan->CPU }}</td>
                                                    <td>{{ $hostingPlan->RAM }}</td>
                                                    <td>
                                                        <div class="d-flex justify-end">
                                                            <!-- <a href=""><img src="assets/img/product/open.svg" alt=""
                                                                                    class="mr-3"></a> -->
                                                            <a
                                                                href="{{ route('hosting-plans.edit', $hostingPlan->hosting_plans_id) }}">
                                                                <img src="assets/img/product/edit.svg" alt="" class="mr-3">
                                                            </a>
                                                            <a href="#" class="h-modal-trigger"
                                                                onclick="event.preventDefault(); openDeleteModal('{{ $hostingPlan->hosting_plans_id }}', '{{ $hostingPlan->name }}')">
                                                                <img src="assets/img/product/trash.svg" alt="">
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach

                                            <!-- Jika tidak ada hosting plans, tampilkan pesan -->
                                            @if($group->hostingPlans->isEmpty())
                                                <tr>
                                                    <td colspan="7">No hosting plans available for this group.</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div id="paging-first-datatable" class="pagination datatable-pagination">
                                <div class="datatable-info">
                                    <span></span>
                                </div>
                            </div>

                        </div>
                </div>
            </div>
        </div>

        <script>
            function openDeleteModal(id, name, type) {
                // Set the name in the modal
                document.getElementById('modal-hosting-plan-name').textContent = name;

                // Set the form action based on the type
                const form = document.getElementById('delete-form');
                if (type === 'group') {
                    form.action = "{{ url('hosting-groups') }}/" + id; // For group deletion
                    document.getElementById('modal-message').innerHTML = `Are you sure you want to delete the group <strong>${name}</strong> and all related hosting plans?`;
                } else {
                    form.action = "{{ url('hosting-plans') }}/" + id; // For hosting plan deletion
                    document.getElementById('modal-message').innerHTML = `Are you sure you want to delete <strong>${name}</strong>?`;
                }

                // Open the modal
                const modal = document.getElementById('confirm-delete-modal');
                modal.classList.add('is-active');
            }
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const addNewGroupButton = document.querySelector('.h-modal-trigger[data-modal="new-group-button"]'); // Tombol "New Group"
                const newGroupModal = document.querySelector('#new-group-modal');
                const newGroupForm = document.querySelector('#new-group-form');
                const modalCloseButton = document.querySelector('.h-modal-close'); // Tombol close modal
                const modalTitle = document.querySelector('#modal-title'); // Judul modal

                // Fungsi untuk membuka modal dan mereset isinya
                function openModal(isEdit = false, groupId = null, groupName = '') {
                    if (isEdit) {
                        modalTitle.textContent = 'Edit Group'; // Judul untuk edit
                        newGroupForm.action = `/hosting-groups/${groupId}`; // Set action untuk update
                        newGroupForm.method = 'POST'; // Set method untuk POST
                        // Tambahkan input hidden untuk metode PUT
                        let methodField = newGroupForm.querySelector('input[name="_method"]');
                        if (!methodField) {
                            methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'PUT';
                            newGroupForm.appendChild(methodField);
                        }
                        newGroupForm.name.value = groupName; // Isi nama grup untuk edit
                    } else {
                        resetForm(); // Reset form untuk menambah grup baru
                        modalTitle.textContent = 'Create a New Group'; // Judul untuk tambah
                        // methodField.innerHTML = ''; // Remove PUT metho
                        newGroupForm.action = "{{ route('hosting-groups.store') }}"; // Set action untuk store
                        delete newGroupForm.querySelector('input[name="_method"]'); // Hapus input hidden jika ada
                    }
                    newGroupModal.classList.add('is-active'); // Buka modal
                }

                // Handle tombol "Add New Group"
                addNewGroupButton.addEventListener('click', () => {
                    openModal(); // Buka modal untuk menambah grup baru
                });

                // Handle edit button clicks
                document.querySelectorAll('.edit-link').forEach(link => {
                    link.addEventListener('click', () => {
                        const groupId = link.getAttribute('data-id');
                        const groupName = link.getAttribute('data-name');
                        openModal(true, groupId, groupName); // Buka modal untuk mengedit grup
                    });
                });

                // Modal close handling
                modalCloseButton.addEventListener('click', () => {
                    resetForm(); // Reset form saat modal ditutup
                    newGroupModal.classList.remove('is-active'); // Tutup modal
                });

                // Reset form function
                function resetForm() {
                    newGroupForm.reset(); // Bersihkan semua field di form
                    const methodField = newGroupForm.querySelector('input[name="_method"]');
                    if (methodField) {
                        methodField.remove(); // Hapus hidden input untuk PUT jika ada
                    }
                }
            });
        </script>

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