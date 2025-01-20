<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Hosting-Plans</title>
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

    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->

    <!--Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}" />
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
</head>

<body>
    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!-- Pageloader -->
        <div class="pageloader"></div>
        <div class="infraloader is-active"></div>
        <!-- Mobile navbar -->
        @include('layouts.template-admin.mobile.navbar')
        <!-- Mobile sidebar -->
        @include('layouts.template-admin.mobile.sidebar')
        <!-- Circular menu -->
        <div id="circular-menu" class="circular-menu">
            @include('layouts.template-admin.web.floatingbtn')
            @include('layouts.template-admin.web.partials.toolbar')
        </div>
        <!-- Sidebar -->
        @include('layouts.template-admin.web.partials.toolbar.sidebar')
        <!-- Languages panel -->
        @include('layouts.template-admin.web.partials.toolbar.language')
        <!-- Activity panel -->
        @include('layouts.template-admin.web.partials.toolbar.activity')
        <!--Search panel-->
        <div id="search-panel" class="right-panel-wrapper is-search is-left">
            <div class="panel-overlay"></div>

            <div class="right-panel">
                <div class="right-panel-head">
                    <img class="light-image" src="{{ asset('assets/img/logos/logo/logo.svg') }}" alt="" />
                    <img class="dark-image" src="{{ asset('assets/img/logos/logo/logo-light.svg') }}" alt="" />
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
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-user-popover="0" alt="">
                                </div>
                                <div class="flex-meta">
                                    <span>Alice C.</span>
                                    <span>Software Engineer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-user-popover="6" alt="">
                                </div>
                                <div class="flex-meta">
                                    <span>Tara S.</span>
                                    <span>UI/UX Designer</span>
                                </div>
                            </a>
                            <a class="media-flex-center">
                                <div class="h-avatar is-small">
                                    <img class="avatar" src="https://via.placeholder.com/150x150" data-user-popover="5" alt="">
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
                            <button class="button h-button is-primary is-elevated h-modal-trigger group-trigger"
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
                    <div id="validation-message" class="mb-3"></div>
                    <!-- Success Message -->
                    @if(session('success'))
                    <div class="message is-success" id="success-message">
                        <div class="message-body">
                            {{ session('success') }}
                        </div>
                    </div>
                    @endif

                    @if(session('error'))
                    <div class="message is-danger" id="error-message">
                        <div class="message-body">
                            {{ session('error') }}
                        </div>
                    </div>
                    @endif

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
                                                <div class="mb-3" id="notification-area"></div>
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
                                    <h3>Create a New Package</h3>
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
                                        <th>PRODUCT TYPE</th>
                                        <th>PACKAGE TYPE</th>
                                        <th>DESCRIPTION</th>
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
                                        <td class="text-left">
                                            <a href="javascript:void(0);"
                                                class="edit-link mr-4"
                                                data-id="{{ $group->hosting_group_id }}"
                                                data-name="{{ $group->name }}">
                                                <img src="{{ asset('assets/img/product/edit.svg') }}" alt="Edit" class="inline w-6 h-6">
                                            </a>
                                            <a href="#"
                                                onclick="openDeleteModal({{ $group->hosting_group_id }}, '{{ $group->name }}', 'group')">
                                                <img src="{{ asset('assets/img/product/trash.svg') }}" alt="Delete Hosting Group" class="inline w-6 h-6">
                                            </a>
                                        </td>
                                    </tr>

                                    @foreach ($group->hostingPlans as $hostingPlan) <!-- Relasi hosting plans di dalam group -->
                                    <tr class="is-striped-row">
                                        <td>{{ $hostingPlan->name }}</td>
                                        <td>{{ $hostingPlan->product_type }}</td>
                                        <td>{{ $hostingPlan->package_type }}</td>
                                        <td>{{ $hostingPlan->description }}</td>

                                        <td class="text-left">
                                            <a href="{{ route('hosting-plans.edit', $hostingPlan->hosting_plans_id) }}" class="mr-4">
                                                <img src="{{ asset('assets/img/product/edit.svg') }}" alt="Edit" class="inline w-6 h-6">
                                            </a>
                                            <a href="#"
                                                class="h-modal-trigger"
                                                onclick="event.preventDefault(); openDeleteModal('{{ $hostingPlan->hosting_plans_id }}', '{{ $hostingPlan->name }}')">
                                                <img src="{{ asset('assets/img/product/trash.svg') }}" alt="Delete" class="inline w-6 h-6">
                                            </a>
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
                // Ensure the modal elements exist before trying to modify them
                const modalNameElement = document.getElementById('modal-hosting-plan-name');
                const modalMessageElement = document.getElementById('modal-message');
                const form = document.getElementById('delete-form'); // Ensure you have a delete form with this ID

                if (modalNameElement && modalMessageElement && form) {
                    // Set the name in the modal
                    modalNameElement.textContent = name;

                    // Set the form action based on the type
                    if (type === 'group') {
                        form.action = `{{ route('hosting-groups.destroy', '') }}/${id}`; // For group deletion
                        modalMessageElement.innerHTML = `Are you sure you want to delete the group <strong>${name}</strong> and all related hosting plans?`;
                    } else {
                        form.action = `{{ route('hosting-plans.destroy', '') }}/${id}`; // For hosting plan deletion
                        modalMessageElement.innerHTML = `Are you sure you want to delete <strong>${name}</strong>?`;
                    }

                    // Open the modal
                    const modal = document.getElementById('confirm-delete-modal');
                    if (modal) {
                        modal.classList.add('is-active');
                    }
                } else {
                    console.error('Error: Modal elements not found');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const searchInput = document.getElementById('searchInput');
                const table = document.getElementById('users-datatable');
                const rows = table.querySelectorAll('tbody tr');

                searchInput.addEventListener('input', function() {
                    const searchTerm = this.value.toLowerCase().trim();

                    rows.forEach(row => {
                        // Cek apakah baris adalah header group atau baris hosting plan
                        const isGroupRow = row.querySelector('td:first-child').getAttribute('style')?.includes('font-weight: 500');

                        if (isGroupRow) {
                            // Selalu tampilkan baris group
                            row.style.display = '';
                        } else {
                            // Untuk baris hosting plan
                            const productName = row.querySelector('td:first-child').textContent.toLowerCase();

                            // Tampilkan jika sesuai dengan pencarian
                            row.style.display = productName.includes(searchTerm) ? '' : 'none';
                        }
                    });

                    // Sembunyikan group yang tidak memiliki hosting plan yang cocok
                    const groupRows = table.querySelectorAll('tr[style*="background-color:#F2F3F3"]');
                    groupRows.forEach(groupRow => {
                        const nextRows = [];
                        let nextSibling = groupRow.nextElementSibling;

                        // Kumpulkan baris hosting plan di bawah group
                        while (nextSibling && !nextSibling.querySelector('td:first-child[style*="font-weight: 500"]')) {
                            nextRows.push(nextSibling);
                            nextSibling = nextSibling.nextElementSibling;
                        }

                        // Cek apakah ada hosting plan yang masih terlihat
                        const hasVisiblePlans = nextRows.some(row => row.style.display !== 'none');

                        // Tampilkan/sembunyikan group
                        groupRow.style.display = hasVisiblePlans ? '' : 'none';
                    });
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const newGroupForm = document.querySelector('#new-group-form');
                const notificationArea = document.querySelector('#notification-area');

                const validGroupNameRegex = /^[a-zA-Z0-9()&-\s]+$/;

                newGroupForm.addEventListener('submit', function(e) {
                    const groupNameInput = newGroupForm.querySelector('input[name="name"]');
                    const groupName = groupNameInput.value;

                    // Clear previous notifications
                    notificationArea.innerHTML = '';

                    if (!validGroupNameRegex.test(groupName)) {
                        e.preventDefault(); // Prevent form submission

                        // Add styled notification
                        notificationArea.innerHTML = `
                    <div class="message is-danger">
                        <a class="delete"></a>
                        <div class="message-body">
                            Use only letters, numbers, spaces, (), &, and -.
                        </div>
                    </div>
                `;

                        // Add delete functionality to close the notification
                        const deleteButton = notificationArea.querySelector('.delete');
                        deleteButton.addEventListener('click', () => {
                            notificationArea.innerHTML = '';
                        });

                        // Automatically remove the notification after 5 seconds
                        setTimeout(() => {
                            notificationArea.innerHTML = '';
                        }, 5000);
                    }
                });
            });
        </script>



        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const newGroupModal = document.querySelector('#new-group-modal');
                const newGroupForm = document.querySelector('#new-group-form');
                const modalTitle = document.querySelector('#modal-title');
                const validationMessageContainer = document.getElementById('validation-message');

                // Function to open the modal
                function openModal(isEdit = false, groupId = null, groupName = '') {
                    if (isEdit) {
                        modalTitle.textContent = 'Edit Group';
                        newGroupForm.action = `/hosting-groups/${groupId}`;
                        newGroupForm.method = 'POST';
                        let methodField = newGroupForm.querySelector('input[name="_method"]');
                        if (!methodField) {
                            methodField = document.createElement('input');
                            methodField.type = 'hidden';
                            methodField.name = '_method';
                            methodField.value = 'PUT';
                            newGroupForm.appendChild(methodField);
                        }
                        newGroupForm.name.value = groupName;
                    } else {
                        resetForm();
                        modalTitle.textContent = 'Create a New Group';
                        newGroupForm.action = "{{ route('hosting-groups.store') }}";
                        const methodField = newGroupForm.querySelector('input[name="_method"]');
                        if (methodField) {
                            methodField.remove();
                        }
                    }
                    newGroupModal.classList.add('is-active');
                }

                // Function to reset the form
                function resetForm() {
                    newGroupForm.reset();
                    const methodField = newGroupForm.querySelector('input[name="_method"]');
                    if (methodField) {
                        methodField.remove();
                    }
                }

                // Attach event listeners to the "New Group" button
                const modalTriggers = document.querySelectorAll('.group-trigger');
                modalTriggers.forEach(trigger => {
                    trigger.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Fetch the hosting group count
                        fetch('/check-hosting-group-count')
                            .then(response => response.json())
                            .then(data => {
                                if (data.count >= 2) {
                                    // Show validation error
                                    if (validationMessageContainer) {
                                        validationMessageContainer.innerHTML = `
                                    <div class="message is-danger">
                                        <div class="message-body">
                                            You can only create a maximum of 2 hosting groups.
                                        </div>
                                    </div>
                                `;

                                        // Remove the message after 5 seconds
                                        setTimeout(() => {
                                            validationMessageContainer.innerHTML = '';
                                        }, 5000);
                                    }

                                    // Ensure the modal does not open
                                    newGroupModal.classList.remove('is-active');
                                } else {
                                    // Open the modal
                                    openModal();
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    });
                });

                // Attach event listeners to edit buttons
                const editLinks = document.querySelectorAll('.edit-link');
                editLinks.forEach(link => {
                    link.addEventListener('click', function() {
                        const groupId = this.getAttribute('data-id');
                        const groupName = this.getAttribute('data-name');
                        openModal(true, groupId, groupName);
                    });
                });

                // Close the modal
                const modalCloseButton = document.querySelector('.h-modal-close');
                if (modalCloseButton) {
                    modalCloseButton.addEventListener('click', function() {
                        resetForm();
                        newGroupModal.classList.remove('is-active');
                    });
                }
            });
        </script>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Automatically hide success message after 5 seconds
                const successMessage = document.getElementById('success-message');
                if (successMessage) {
                    setTimeout(() => {
                        successMessage.remove();
                    }, 5000); // 5000ms = 5 seconds
                }

                // Automatically hide error message after 5 seconds
                const errorMessage = document.getElementById('error-message');
                if (errorMessage) {
                    setTimeout(() => {
                        errorMessage.remove();
                    }, 5000); // 5000ms = 5 seconds
                }
            });
        </script>

        <script src="{{ asset('assets/js/app.js') }}"></script>
        <script src="{{ asset('assets/js/functions.js') }}"></script>
        <script src="{{ asset('assets/js/main.js') }}" async></script>
        <script src="{{ asset('assets/js/components.js') }}" async></script>
        <script src="{{ asset('assets/js/popover.js') }}" async></script>
        <script src="{{ asset('assets/js/widgets.js') }}" async></script>
        <script src="{{ asset('assets/js/touch.js') }}" async></script>
        <script src="{{ asset('assets/js/syntax.js') }}" async></script>

    </div>
</body>


</html>