<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        @yield('title')

        <!--favicons-->
        <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/assets/icons/apple-touch-icon.png')}}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/assets/icons/favicon-32x32.png')}}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/assets/icons/favicon-16x16.png')}}">
        <link rel="manifest" href="{{asset('/assets/icons/site.webmanifest')}}">
        <link rel="mask-icon" href="{{asset('/assets/icons/safari-pinned-tab.svg')}}" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#1E4748">
        <meta name="facebook-domain-verification" content="gzfqyqphag4ydt4256iuzg5bm2dhl3" />
        @yield('metatags-fb')
        
        <!--bootstrap-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}"/>
        <!--Styles-->
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/laguna-front-styles.css') }}"/>
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

    <body>
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-PJ5JZS3"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
        
        @include('pages.shared.header')
        <div id="main-content">
            @yield('content')

            <!-- Cookies Modal -->
            <div class="modal fade" id="cookiesModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="cookiesModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content  green-text bg-beige">
                        <div class="modal-header fw-normal-sackers">
                            <h5 class="modal-title" id="cookiesModalLabel">{{__('Política de cookies')}}</h5>
                        </div>
                        <div class="modal-body fw-normal-zen">
                            <p class="fs-5">{{__('Utilizamos Cookies propias y de terceros en nuestro sitio web para mejorar nuestros servicios y la experiencia en el sitio')}}</p>
                            <form action="{{route('set.agent.cookie')}}" method="get">
                                @csrf
                                <input type="hidden" name="agent_cookie" value="{{request()->query('utm_campaign') ?? 'Sin Agente'}}">
                                <button type="submit" class="btn btn-yellow w-100">{{__('Aceptar Cookies')}}</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            @php
                if(app()->getLocale() == 'en'){
                    $emailSubject = rawurlencode('Hello, I come from the website of Laguna Living');
                }else{
                    $emailSubject = rawurlencode('Hola, vengo del sitio web de Laguna Living');
                }
            @endphp

            <a href="https://wa.me/523222654686?text={{$emailSubject}}" id="whatsapp-floating" class="shadow-7 text-center" target="_blank" rel="noopener noreferrer">
                <i class="fab fa-whatsapp"></i>
            </a>

  
        </div>
        @include('pages.shared.footer')
        
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

        
        <script>
            var chatbox = document.getElementById('fb-customer-chat');
            chatbox.setAttribute("page_id", "100237132452253");
            chatbox.setAttribute("attribution", "biz_inbox");

            window.fbAsyncInit = function() {
                FB.init({
                xfbml            : true,
                version          : 'v12.0'
                });
            };

            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = 'https://connect.facebook.net/es_LA/sdk/xfbml.customerchat.js';
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        
        
    </body>

</html>