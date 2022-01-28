<div class="container-fluid px-0 bg-green" style="padding: 6.5rem 0">

    <div class="row justify-content-evenly w-100 mx-auto">

        <div class="col-12 col-lg-4" style="color:#fff; 
        background-image: url({{asset('assets/icons/logo-dorado-icono.svg');}}); 
        background-repeat:no-repeat; 
        background-position: center;
        background-color: rgba(30, 71, 72, 0.6);
        background-blend-mode: overlay;">

            <h4 class="fs-1 fw-normal-sackers text-center mt-5">{{__('Contacto')}}</h4>
            <hr style="color:#ECD259; opacity:1; width:60%;" class="mx-auto">
            <p class="fs-6 fw-light-zen text-start mx-5">{{__('Póngase en contacto con un agente para obtener más información sobre este desarrollo, estaremos listos para responder cualquier pregunta.')}}</p>
        </div>

        <div class="col-11 col-lg-4 mt-5 mt-lg-0">

            <form action="{{route('store.message');}}" method="post">
                @csrf

                <x-honeypot />

                <input class="form-contact mb-3" type="text" name="name" id="name" placeholder="{{__('Nombre')}}" required>

                <input class="form-contact mb-3" type="email" name="email" id="email" placeholder="{{__('Correo electrónico')}}" required>

                <input class="form-contact mb-3" type="tel" name="phone" id="phone" placeholder="{{__('Teléfono')}}" required>

                <input type="hidden" name="c-type" id="c-type" value="{{$unit->name ?? 'General'}}">
                
                <input type="hidden" name="agent" id="agent" value="{{request()->query('utm_campaign') ?? Cookie::get('agent') ?? 'Sin Agente'}}">

                <textarea class="form-contact mb-4" name="message" id="message" cols="30" rows="4" placeholder="{{__('Mensaje')}}"></textarea>

                <button id="contact_submit" type="submit" class="btn btn-yellow w-100 shadow-7">{{__('Enviar')}}</button>
            </form>

            @if (session('message'))
                <div class="w-100 fs-5 my-3 text-center fw-light-zen" style="color:white;">
                    <i class="far fa-check-circle"></i>
                    {{ session('message'); }}
                </div>
            @endif

        </div>

    </div>
    

</div>