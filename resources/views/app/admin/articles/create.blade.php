<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Create Article</title>
    <link rel="icon" type="image/png" href="../../../assets/img/logos/logo/logoo.svg" />

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
    <link rel="stylesheet" href="../../../assets/css/app.css" />
    <link rel="stylesheet" href="../../../assets/css/main.css" />
    <link rel="stylesheet" href="../../../assets/css/styles.css" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800;900&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,600,700" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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
                    <!-- Container untuk menampung notifikasi -->
                    <div class="mb-3" id="notification-container"></div>


                    <div class="page-content-inner">
                        <!-- Flash messages for success -->
                        @if (session('success'))
                        <div id="notification-success" class="notification is-success is-light">
                            <button class="delete"></button>
                            {{ session('success') }}
                        </div>
                        @endif

                        <!-- Flash messages for validation errors -->
                        @if ($errors->any())
                        <div id="notification-error" class="notification is-danger is-light">
                            <button class="delete"></button>
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif

                        <!-- Form content -->
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-layout" style="max-width: none;">
                                <div class="form-outer">
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Create an Article</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="/admin/articles" class="button h-button is-light is-dark-outlined">
                                                        <span class="icon" style="min-width: unset;">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Back to Article</span>
                                                    </a>
                                                    <button id="submit" class="button h-button is-primary is-raised">Save</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <!-- Fields -->
                                        <div class="field">
                                            <label class="label" for="title">Title</label>
                                            <div class="control">
                                                <input type="text" class="input" id="title" name="title" value="{{ old('title') }}">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="author">Author</label>
                                            <div class="control">
                                                <input type="text" class="input" id="author" name="author" value="{{ old('author') }}">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="content">Content</label>
                                            <div class="control w-full">
                                                <textarea name="content" id="content" placeholder="Write your text here..">{{ old('content') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="image">Picture</label>
                                            <div class="control">
                                                <div class="file has-name is-fullwidth">
                                                    <label class="file-label" for="image">
                                                        <input class="file-input" type="file" id="image" name="image" accept="image/*">
                                                        <span class="file-cta">
                                                            <span class="file-icon">
                                                                <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                                            </span>
                                                            <span class="file-label">Choose a file...</span>
                                                        </span>
                                                        <span class="file-name light-text" id="image-name"></span>
                                                    </label>
                                                </div>
                                                <img id="image-preview" src="" alt="Preview" style="max-width: 100px; margin-top: 10px; display: none;">
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

        <!--Huro Scripts-->
        <!--Load Mapbox-->
        <!-- <script>
                $('#summernote').summernote({
                    placeholder: 'Hello stand alone ui',
                    tabsize: 2,
                    height: 250,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: true, 
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture', 'video']],
                        ['view', ['codeview', 'help']]
                    ]
                });
            </script> -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi SunEditor
                const editor = SUNEDITOR.create(document.getElementById('content'), {
                    placeholder: 'Write your text here...',
                    height: 250,
                    toolbar: [
                        ['style', ['style']],
                        ['font', ['bold', 'underline', 'italic', 'strike']],
                        ['para', ['ul', 'ol', 'paragraph']],
                        ['insert', ['link', 'image', 'video']],
                        ['view', ['fullscreen', 'codeview']]
                    ]
                });

                // Ambil form
                const form = document.querySelector('form');

                // Event listener saat form disubmit
                form.addEventListener('submit', function(event) {
                    // Ambil konten SunEditor
                    const content = editor.getContents();

                    // Masukkan konten ke textarea
                    document.getElementById('content').value = content;

                    // Log untuk debugging
                    console.log("Editor Content:", content);
                });
            });
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const fileInput = document.querySelector('#image');
                const fileNameDisplay = document.querySelector('#image-name');
                const imagePreview = document.querySelector('#image-preview');
                const maxFileSize = 2 * 1024 * 1024; // 2MB dalam byte

                fileInput.addEventListener('change', (event) => {
                    const file = event.target.files[0];
                    const notificationContainer = document.querySelector('#notification-container');

                    if (file) {
                        if (file.size > maxFileSize) {
                            // Membuat notifikasi untuk ukuran file terlalu besar
                            const notification = document.createElement('div');
                            notification.classList.add('message', 'is-danger');
                            notification.innerHTML = `
                    <a class="delete"></a>
                    <div class="message-body">
                        The file size is too large. The maximum file size is 2MB.
                    </div>
                `;

                            // Menambahkan notifikasi ke dalam container notifikasi
                            notificationContainer.innerHTML = ''; // Clear any previous notifications
                            notificationContainer.appendChild(notification);

                            // Menghilangkan notifikasi saat tombol delete diklik
                            notification.querySelector('.delete').addEventListener('click', function() {
                                notification.remove();
                            });

                            // Menghilangkan notifikasi otomatis setelah 7 detik
                            setTimeout(function() {
                                notification.remove();
                            }, 7000); // 7000 ms = 7 detik

                            // Reset input file dan preview
                            fileInput.value = '';
                            fileNameDisplay.textContent = 'Choose a file...';
                            imagePreview.style.display = 'none'; // Menyembunyikan preview
                        } else {
                            // Menampilkan nama file dan preview gambar
                            fileNameDisplay.textContent = file.name;
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                imagePreview.src = e.target.result;
                                imagePreview.style.display = 'block';
                            };
                            reader.readAsDataURL(file);
                        }
                    }
                });
            });

            $('#submit').on('click', function() {
                var content = $('#summernote').summernote('code');
                $('#sun-editor').val(content);
            });
        </script>



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