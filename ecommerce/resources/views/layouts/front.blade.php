<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @yield('title')
    </title>

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

    <link href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/bootstrap5.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
    <style>
        /* body {
            background: rgb(88, 88, 88);
            background: linear-gradient(90deg, rgba(88, 88, 88, 1) 24%, rgba(169, 169, 169, 1) 79%, rgba(208, 208, 208, 1) 100%);
        } */
    </style>
</head>

<body>
    @include('layouts.inc.frontnavbar')
    <div class="content">
        @yield('content')
    </div>




    <script src="{{ asset('frontend/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/js/custom.js') }}"></script>
    <script src="{{ asset('frontend/js/sweetalert.min.js') }}"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
    <script>
        var availableTags = [];
        $.ajax({
            method: "GET",
            url: "/product-list",
            success: function(response) {
                // console.log(response);
                startAutoComplete(response);
            }
        });

        function startAutoComplete(availableTags) {
            $("#search_product").autocomplete({
                source: availableTags
            });
        }
    </script>

    @if (session('status'))
        <script>
            swal("{{ session('status') }}");
        </script>
    @endif
    @yield('scripts')
</body>

</html>
