<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">

    <meta content="" name="description">
    <meta content="" name="author">

    <title>Nutriguide</title>

    <!-- CSS FILES -->
    <link href="https://fonts.googleapis.com" rel="preconnect">

    <link crossorigin href="https://fonts.gstatic.com" rel="preconnect">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700&family=Open+Sans&display=swap"
        rel="stylesheet">

    <link href="{{ asset('web') }}/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('web') }}/css/bootstrap-icons.css" rel="stylesheet">

    <link href="{{ asset('web') }}/css/templatemo-topic-listing.css" rel="stylesheet">
    <!--

TemplateMo 590 topic listing

https://templatemo.com/tm-590-topic-listing

-->
</head>

<body id="top">

    <main>

        @include('template-web.navbar')

        @yield('content')

    </main>
    {{-- @include('template-web.footer') --}}

    @include('sweetalert::alert')


    <!-- JAVASCRIPT FILES -->
    <script src="{{ asset('web') }}/js/jquery.min.js"></script>
    <script src="{{ asset('web') }}/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('web') }}/js/jquery.sticky.js"></script>
    <script src="{{ asset('web') }}/js/click-scroll.js"></script>
    <script src="{{ asset('web') }}/js/custom.js"></script>
    <script>
        window.replainSettings = {
            id: '2f3b92a7-ccc2-42f6-9568-0e6006c65676'
        };
        (function(u) {
            var s = document.createElement('script');
            s.async = true;
            s.src = u;
            var x = document.getElementsByTagName('script')[0];
            x.parentNode.insertBefore(s, x);
        })('https://widget.replain.cc/dist/client.js');
    </script>
</body>

</html>
