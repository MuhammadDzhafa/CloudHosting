<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags  -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Edit Article</title>
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

</head>

<body>
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-N8ZNRQ9" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="huro-app" class="app-wrapper">
        <div class="app-overlay"></div>
        <!--Pageloader-->
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
                            <h1 class="title is-4">Edit Article</h1>
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <!-- Tambahkan ID pada form untuk memudahkan penanganan di JavaScript -->
                        <form id="edit-article-form" action="{{ route('articles.update', $article->article_id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-layout" style="max-width: none;">
                                <div class="form-outer">
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Edit Article</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="/admin/articles" class="button h-button is-light is-dark-outlined">
                                                        <span class="icon">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Back to Article</span>
                                                    </a>
                                                    <button id="submit" type="submit" class="button h-button is-primary is-raised">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="field">
                                            <label class="label" for="title">Title</label>
                                            <div class="control">
                                                <input type="text" class="input" id="title" name="title" value="{{ old('title', $article->title) }}" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="author">Author</label>
                                            <div class="control">
                                                <input type="text" class="input" id="author" name="author" value="{{ old('author', $article->author) }}" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="content">Content</label>
                                            <div class="control">
                                                <textarea id="content" name="content">{{ old('content', $article->content) }}</textarea>
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
                                                            <span class="file-label">
                                                                Choose a file...
                                                            </span>
                                                        </span>
                                                        <!-- Perbaiki penggunaan old() untuk field 'image' -->
                                                        <span class="file-name light-text" id="image-name">{{ old('image', $article->image ? basename($article->image) : 'Choose a file...') }}</span>
                                                    </label>
                                                </div>
                                                <!-- Tampilkan gambar sebelumnya jika ada -->
                                                <img id="image-preview" src="{{ $article->image ? asset('storage/'.$article->image) : '' }}" alt="Preview" style="max-width: 100px; margin-top: 10px; display: {{ $article->image ? 'block' : 'none' }};">
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

        <!-- Huro Scripts -->
        <script src="../../../assets/js/app.js"></script>

        <!-- Inisialisasi SunEditor -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi SunEditor dengan konten yang sudah ada
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

                // Masukkan konten awal ke SunEditor
                editor.setContents(`{!! addslashes($article->content) !!}`);

                // Ambil form dengan ID yang benar
                const form = document.getElementById('edit-article-form');

                // Event listener saat form disubmit
                form.addEventListener('submit', function(event) {
                    // Ambil konten SunEditor
                    const content = editor.getContents();

                    // Masukkan konten ke textarea
                    document.getElementById('content').value = content;

                    // Log untuk debugging (opsional)
                    console.log("Editor Content:", content);
                });
            });
        </script>

        <!-- Penanganan File Input dan Preview Gambar -->
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                const fileInput = document.querySelector('#image');
                const fileNameDisplay = document.querySelector('#image-name');
                const imagePreview = document.querySelector('#image-preview');

                fileInput.addEventListener('change', (event) => {
                    const file = event.target.files[0]; // Ambil file yang dipilih
                    if (file) {
                        fileNameDisplay.textContent = file.name; // Ubah teks menjadi nama file
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result; // Tampilkan preview gambar yang diupload
                            imagePreview.style.display = 'block'; // Tampilkan gambar
                        };
                        reader.readAsDataURL(file);
                    } else {
                        fileNameDisplay.textContent = 'Choose a file...'; // Jika tidak ada file yang dipilih
                        imagePreview.src = ''; // Hapus preview gambar
                        imagePreview.style.display = 'none'; // Sembunyikan gambar
                    }
                });
            });
        </script>

        <!-- Hapus duplikasi script app.js dan script lainnya jika tidak diperlukan -->
        <!-- Pastikan hanya memuat script yang diperlukan sekali -->
        <!-- Contoh: -->
        <!-- <script src="../../../assets/js/app.js"></script> -->

        <!-- Huro js -->
        <script src="../../../assets/js/functions.js"></script>
        <script src="../../../assets/js/main.js" async></script>
        <script src="../../../assets/js/components.js" async></script>
        <script src="../../../assets/js/popover.js" async></script>
        <script src="../../../assets/js/widgets.js" async></script>


        <!-- Additional Features -->
        <script src="../../../assets/js/touch.js" async></script>
        <script src="../../../assets/js/syntax.js" async></script>
    </div>
</body>

</html>