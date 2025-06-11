<!-- resources/views/layouts/partials/head.blade.php -->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="xyGeF3SWwHk_rcBxSzKK5eQU5ISuNjH0YJZP0v7ieQ4" />
    <meta name="msvalidate.01" content="44CE23F261B27C36FA715C8E3194BEDB" />
    <title>{{ config('TUZA ASSETS') }}</title>

    <link rel="icon" href="{{ asset('assets/images/fiveicon.jpg') }}" type="image/png">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icons/6.4.6/css/flag-icons.min.css">
    <script src="{{ asset('ckeditor/build/ckeditor.js') }}"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    @livewireStyles

    <style>
        body {
            font-family: 'Roboto Slab', serif;
        }

        select:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: green !important;
        }

        textarea:focus {
            outline: none !important;
            box-shadow: none !important;
            border-color: green !important;
        }

        select.active {
            text-decoration: none !important;
        }

        textarea.active {
            text-decoration: none !important;
        }

        .card {
            background-color: #fff !important;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1) !important;
            transition: transform 0.3s ease !important;
        }

        .card:hover {
            transform: scale(1.05) !important;
            cursor: pointer !important;
        }
    </style>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-2EN9T1VY7W"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-2EN9T1VY7W');
    </script>


    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11564284450"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'AW-11564284450');
    </script>


</head>
