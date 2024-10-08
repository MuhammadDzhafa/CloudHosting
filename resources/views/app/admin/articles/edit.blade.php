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
                    <form action="{{ route('articles.update', $article->article_id) }}" method="POST" enctype="multipart/form-data">
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
                                                    <a href="/articles" class="button h-button is-light is-dark-outlined">
                                                        <span class="icon">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Back to Article</span>
                                                    </a>
                                                    <button id="submit" class="button h-button is-primary is-raised">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="field">
                                            <label class="label" for="title">Title</label>
                                            <div class="control">
                                                <input type="text" class="input" id="title" name="title" value="{{ old('title', $article->title) }}">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="author">Author</label>
                                            <div class="control">
                                                <input type="text" class="input" id="author" name="author" value="{{ old('author', $article->author) }}">
                                            </div>
                                        </div>
                                        <!-- <div class="field">
                                            <label class="label" for="content">Content</label>
                                            <div class="control">
                                                <input type="text" class="input" id="content" name="content" value="{{ old('content', $article->content) }}">
                                            </div>
                                        </div> -->
                                        <div class="field">
                                            <label class="label">Content</label>
                                            <div class="control">
                                                <textarea id="sun-editor" name="content">{{ old('content', $article->content) }}</textarea>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="picture">Picture</label>
                                            <div class="control">
                                                <div class="file has-name is-fullwidth">
                                                    <label class="file-label" for="picture">
                                                        <input class="file-input" type="file" id="picture" name="picture" accept="image/*">
                                                        <span class="file-cta">
                                                            <span class="file-icon">
                                                                <i class="lnil lnil-lg lnil-cloud-upload"></i>
                                                            </span>
                                                            <span class="file-label">
                                                                Choose a file...
                                                            </span>
                                                        </span>
                                                        <span class="file-name light-text" id="picture-name"></span>
                                                    </label>
                                                </div>
                                                <img id="picture-preview" src="" alt="Preview" style="max-width: 100px; margin-top: 10px; display: none;">
                                                <!-- Use the existing picture from the article -->
                                                <img id="existing-picture" src="{{ asset('storage/' . $article->picture) }}" alt="Existing Preview" style="max-width: 100px; margin-top: 10px; display: {{ $article->picture ? 'block' : 'none' }};">
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

            <script>
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
                // Preview new picture
                document.getElementById('picture').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const pictureName = document.getElementById('picture-name');
                    const picturePreview = document.getElementById('picture-preview');
                    const existingPicture = document.getElementById('existing-picture');

                    if (file) {
                        const reader = new FileReader();
                        
                        // Update selected file name
                        pictureName.textContent = file.name;

                        reader.onload = function(e) {
                            // Set new image to src of img
                            picturePreview.src = e.target.result;
                            picturePreview.style.display = 'block'; // Show new image
                            existingPicture.style.display = 'none'; // Hide existing image
                        };
                        
                        reader.readAsDataURL(file); // Read file as URL
                    } else {
                        // If no file selected, hide preview
                        pictureName.textContent = '';
                        picturePreview.src = '';
                        picturePreview.style.display = 'none';
                        existingPicture.style.display = 'block'; // Show existing image again
                    }
                });
            </script>
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
            <script src="assets/js/syntax.js" async></script>
        </div>
    </body>
</html>
