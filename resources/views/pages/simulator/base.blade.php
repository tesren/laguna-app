<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <title>{{__('Laguna Living - Departamentos en venta en Nuevo Vallarta')}}</title>
        <meta name="description" content="{{__('Departamentos en una de las mejores zonas de Nuevo Vallarta, con acceso a múltiples amenidades y cercanía de servicios, todo eso y más te ofrece Laguna Living.')}}">
    

        <!--favicons-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/assets/icons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/assets/icons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/icons/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('/assets/icons/site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('/assets/icons/safari-pinned-tab.svg')}}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#1E4748">
        <meta name="facebook-domain-verification" content="gzfqyqphag4ydt4256iuzg5bm2dhl3" />
        
        <!--bootstrap-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <!--Styles-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/laguna-front-styles.css') }}"/>
        <style>
            input, input::placeholder , textarea, textarea::placeholder{
                color: #1E4748 !important;
            }
        </style>
        <!--JQuery-Ui-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/jquery-ui.min.css') }}"/>
        {{-- Fancybox --}}
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"/>

            <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-134824574-3"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-134824574-3');
            gtag('config', 'G-THG4RYV6QE');
        </script>

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-PJ5JZS3');
        </script>
        <!-- End Google Tag Manager -->

        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
            n.callMethod.apply(n,arguments):n.queue.push(arguments)};
            if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
            n.queue=[];t=b.createElement(e);t.async=!0;
            t.src=v;s=b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t,s)}(window, document,'script',
            'https://connect.facebook.net/en_US/fbevents.js');
            fbq('init', '335729441223491');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" style="display:none"
            src="https://www.facebook.com/tr?id=335729441223491&ev=PageView&noscript=1"
            />
        </noscript>
        {{-- End Facebook Pixel Code  --}}
        
       
    </head>

    <body class="position-relative">
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ5JZS3"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        @yield('content')


        <footer class="text-center" style="color:#fff;">
            <div class="container-fluid bg-green px-0">

                <img class="logo-yellow my-4" src="{{asset('assets/img/logo-dorado.png');}}" alt="Logo Laguna Living">


                <div class="d-flex justify-content-center fs-2 pb-5">

                    <a class="link-light me-4" href="https://www.instagram.com/lagunalivingvallarta/" target="_blank" rel="noopener">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a class="link-light" href="https://www.facebook.com/lagunalivingvallarta" target="_blank" rel="noopener">
                        <i class="fab fa-facebook"></i>
                    </a>

                </div>

            </div>

            <div class="container-fluid px-0 py-3 bg-darkgreen fs-6 fw-light-zen">
                <a class="link-light text-decoration-underline me-5" href="{{route('view.privacy.policy')}}">{{__('Políticas de Privacidad')}}</a>
                <span>Laguna Living &copy; 2022</span>
            </div>

        </footer>


        <script type="text/javascript" src="{{ asset('/js/jquery-3.6.0.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('/js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>
        <script src="https://kit.fontawesome.com/164e915f72.js" crossorigin="anonymous"></script>
        <script type="text/javascript" src="{{ asset('/js/laguna.js') }}"></script>

        @yield('javascript')

        @if (Cookie::get('agent') == null)
            <script type="text/javascript">
                $(window).on('load',function(){
                    $('#cookiesModal').modal('show');
                });
            </script>
        @endif



    </body>

</html>