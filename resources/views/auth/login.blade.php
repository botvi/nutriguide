<!DOCTYPE html>
<html class="dark-style customizer-hide" data-assets-path="{{ asset('admin') }}/assets/"
    data-template="vertical-menu-template-free" data-theme="theme-dark" dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
        name="viewport" />

    <title>Login - NUTRIGUIDE</title>

    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="{{ asset('env') }}/nutriguide.png" rel="icon" type="image/x-icon" />

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link href="{{ asset('admin') }}/assets/vendor/fonts/boxicons.css" rel="stylesheet" />

    <!-- Core CSS -->
    <link class="template-customizer-core-css" href="{{ asset('admin') }}/assets/vendor/css/core.css"
        rel="stylesheet" />
    <link class="template-customizer-theme-css" href="{{ asset('admin') }}/assets/vendor/css/theme-default.css"
        rel="stylesheet" />
    <link href="{{ asset('admin') }}/assets/css/demo.css" rel="stylesheet" />

    <!-- Vendors CSS -->
    <link href="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" />

    <!-- Page CSS -->
    <!-- Page -->
    <link href="{{ asset('admin') }}/assets/vendor/css/pages/page-auth.css" rel="stylesheet" />
    <!-- Helpers -->
    <script src="{{ asset('admin') }}/assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('admin') }}/assets/js/config.js"></script>
</head>

<body class="bg-dark text-light">
    <!-- Content -->

    <div class="container-xxl">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner">
                <!-- Register -->
                <div class="card bg-dark text-light">
                    <div class="card-body">
                        <!-- Logo -->
                        <div class="app-brand justify-content-center">
                            <a class="app-brand-link gap-2" href="index.html">
                                <img src="{{ asset('env') }}/nutriguide.png" srcset="" width="30px">
                                <span class=" demo text-body fw-bolder" style="font-size: 2rem">LOGIN</span>
                            </a>
                        </div>

                        <form class="mb-3"action="{{ route('login') }}" id="formAuthentication" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="email">EMAIL</label>
                                <input autofocus class="form-control bg-dark text-light" id="email" name="email"
                                    placeholder="Enter your email" style="color:#fff" type="text" />
                            </div>
                            <div class="mb-3 form-password-toggle">
                                <div class="d-flex justify-content-between">
                                    <label class="form-label" for="password" style="color:#fff">PASSWORD</label>
                                </div>
                                <div class="input-group input-group-merge">
                                    <input aria-describedby="password" class="form-control bg-dark text-light"
                                        id="password" name="password"
                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                        type="password" />
                                    <span class="input-group-text cursor-pointer bg-dark text-light"><i
                                            class="bx bx-hide"></i></span>
                                </div>
                            </div>
                            {{-- <div class="mb-3">
                                <div class="form-check">
                                    <input class="form-check-input" id="remember-me" type="checkbox" />
                                    <label class="form-check-label" for="remember-me"> Remember Me </label>
                                </div>
                            </div> --}}
                            <div class="mb-3">
                                <button class="btn btn-primary d-grid w-100" type="submit">Sign in</button>
                            </div>
                        </form>

                        <p class="text-center">
                            <span>Sudah ada akun?</span>
                            <a href="/register">
                                <span>Buat Akun Baru</span>
                            </a>
                        </p>
                    </div>
                </div>
                <!-- /Register -->
            </div>
        </div>
    </div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    @include('sweetalert::alert')
    <script src="{{ asset('admin') }}/assets/vendor/libs/jquery/jquery.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/libs/popper/popper.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/js/bootstrap.js"></script>
    <script src="{{ asset('admin') }}/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="{{ asset('admin') }}/assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="{{ asset('admin') }}/assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>
