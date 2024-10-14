<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <title>Awan Hosting :: Edit Contact</title>
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
                            <h1 class="title is-4">Edit Contact</h1>
                        </div>
                    </div>

                    <div class="page-content-inner">
                        <form id="edit-contact-form" action="{{ route('contact-us.update', $contact->contact_us_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-layout" style="max-width: none;">
                                <div class="form-outer">
                                    <div class="form-header stuck-header">
                                        <div class="form-header-inner">
                                            <div class="left">
                                                <h3>Edit Contact</h3>
                                            </div>
                                            <div class="right">
                                                <div class="buttons">
                                                    <a href="{{ route('contact-us.index') }}" class="button h-button is-light is-dark-outlined">
                                                        <span class="icon">
                                                            <i class="lnir lnir-arrow-left rem-100"></i>
                                                        </span>
                                                        <span>Back to Contacts</span>
                                                    </a>
                                                    <button id="submit" type="submit" class="button h-button is-primary is-raised">Update</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-body">
                                        <div class="field">
                                            <label class="label" for="name">Name</label>
                                            <div class="control">
                                                <input type="text" class="input" id="name" name="name" value="{{ old('name', $contact->name) }}" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="email">Email</label>
                                            <div class="control">
                                                <input type="email" class="input" id="email" name="email" value="{{ old('email', $contact->email) }}" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <label class="label" for="message">Message</label>
                                            <div class="control">
                                                <textarea id="message" name="message" style="width: 100%;" required>{{ old('message', $contact->message) }}</textarea>
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

        <!-- Script untuk mengatur textarea jika menggunakan editor -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Inisialisasi editor atau manipulasi DOM sesuai kebutuhan
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