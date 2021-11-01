<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Admin Panel</title>

        <!--favicons-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/assets/icons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/assets/icons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/icons/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('/assets/icons/site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('/assets/icons/safari-pinned-tab.svg')}}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

        <!--bootstrap-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <!--Font-->
        <link href="https://www.dafontfree.net/embed/c2Fja2Vycy1nb3RoaWMtbGlnaHQtYXQtcmVndWxhciZkYXRhLzQ2L3MvNjMyODYvU2Fja2VycyBHb3RoaWMgTGlnaHQgQVQub3Rm" rel="stylesheet" type="text/css"/>
        <!--Styles-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/laguna-style.css') }}"/>
        {{--Data tables--}}
        <link rel="stylesheet" type="text/css" href="{{ asset('css/datatables.min.css') }}"/>
    </head>

    <body>
        
        <div class="row justify-content-center" style="background-color:#EBEDEF; min-height: 100vh;">
            @yield('content') 
        </div>

        <script src="https://kit.fontawesome.com/164e915f72.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery-3.3.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/datatables.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        @yield('javascript')

        @include('admin.shared.footer')
    </body>

</html>