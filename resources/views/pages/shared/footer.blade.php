<footer class="text-center" style="color:#fff;">
    <div class="container-fluid bg-green px-0">

        <img class="logo-yellow my-4" src="{{asset('assets/img/logo-dorado.png');}}" alt="Logo Laguna Living">


        <div class="d-flex justify-content-center fs-2 mb-5">
            <a id="whatsapp_footer" class="link-light" href="https://wa.me/523222654686?text={{$emailSubject}}" target="_blank" rel="noopener">
                <i class="fab fa-whatsapp"></i>
            </a>

            <a class="link-light mx-4" href="https://www.instagram.com/lagunalivingvallarta/" target="_blank" rel="noopener">
                <i class="fab fa-instagram"></i>
            </a>

            <a class="link-light" href="https://www.facebook.com/lagunalivingvallarta" target="_blank" rel="noopener">
                <i class="fab fa-facebook"></i>
            </a>

        </div>

        <div class="row justify-content-center pb-5 px-0 w-100 mx-auto">

            @php

                // Datos de contacto según el Asesor
                if(request()->query('utm_campaign')){

                    if (request()->query('utm_campaign') == 'Jose Escobar'){
                        $phone = '3223230410';
                        $email = 'jose@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign') == 'Carlos Haro'){
                        $phone = '3222406386';
                        $email = 'carlos@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign')== 'Kenia Avila'){
                        $phone = '3222748089';
                        $email = 'kenia@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign')== 'Carmen Jasso'){
                        $phone = '3221680576';
                        $email = 'carmen@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign')== 'Lizbeth Morales'){
                        $phone = '3221702666';
                        $email = 'lizbeth@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign')== 'Albertina Azcona'){
                        $phone = '3221339404';
                        $email = 'albertina@c21oceanrealty.com';
                    }
                    elseif(request()->query('utm_campaign')== 'Ariel Moran'){
                        $phone = '3221404811';
                        $email = 'ariel@c21oceanrealty.com';
                    }
                    else{
                        $phone = '3222654686';
                        $email = 'info@lagunalivingvallarta.com';
                    }
                }
                elseif(Cookie::get('agent')){

                    if (Cookie::get('agent') == 'Jose Escobar'){
                        $phone = '3223230410';
                        $email = 'jose@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Carlos Haro'){
                        $phone = '3222406386';
                        $email = 'carlos@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Kenia Avila'){
                        $phone = '3222748089';
                        $email = 'kenia@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Carmen Jasso'){
                        $phone = '3221680576';
                        $email = 'carmen@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Lizbeth Morales'){
                        $phone = '3221702666';
                        $email = 'lizbeth@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Albertina Azcona'){
                        $phone = '3221339404';
                        $email = 'albertina@c21oceanrealty.com';
                    }
                    elseif(Cookie::get('agent') == 'Ariel Moran'){
                        $phone = '3221404811';
                        $email = 'ariel@c21oceanrealty.com';
                    }
                    else{
                        $phone = '3222654686';
                        $email = 'info@lagunalivingvallarta.com';
                    }

                }
                else{
                    $phone = '3222654686';
                    $email = 'info@lagunalivingvallarta.com';
                }
            @endphp

            <div class="col-8 col-lg-2">
                <img width="50px" src="{{asset('assets/icons/sobre.svg');}}" alt="">

                {{-- Muestra correo segun el asesor asignado --}}
                <a id="mail_footer" href="mailto:{{$email}}?subject={{$emailSubject}}" class="link-light" target="_blank" rel="noopener">
                    <h6 class="fs-6 fw-light-zen mt-3">{{$email}}</h6>
                </a>
            </div>


            <div class="col-4 col-lg-2">
                <img width="40px" src="{{asset('assets/icons/phone.svg');}}" alt="">
                <a id="phone_contact" href="tel:+52{{$phone}}" class="link-light">

                    {{-- Muestra telefono segun el asesor asignado --}}
                    <h6 class="fs-6 fw-light-zen mt-3">{{$phone}}</h6>
                </a>
            </div>

            <div class="col-11 col-lg-2 mt-4 mt-lg-0">
                <img width="32px" src="{{asset('assets/icons/marker.svg');}}" alt="">
                <address>
                    <h6 class="fs-6 fw-light-zen mt-3">Nuevo Vallarta, Nayarit, México</h6>
                </address>
            </div>

        </div>

        <!-- Messenger plugin de chat Code -->
        <div id="fb-root"></div>

        <!-- Your plugin de chat code -->
        <div id="fb-customer-chat" class="fb-customerchat">
        </div>

    </div>

    <div class="container-fluid px-0 py-3 bg-darkgreen fs-6 fw-light-zen">
        <a class="link-light text-decoration-underline me-5" href="{{route('view.privacy.policy')}}">{{__('Políticas de Privacidad')}}</a>
        <span>Laguna Living &copy; 2022</span>
    </div>

</footer>