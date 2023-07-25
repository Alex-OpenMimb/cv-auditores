@extends('layouts.app')

@section('content')

<div class="main-container">

    <section class="position-relative">
        <div class="hero__layer"></div>
         <div class="hero__section text-light d-none  d-md-flex align-items-center gap-2 position-absolute"><i class="icon-home fs-3"></i><i class="icon-circle font-s-0-2"></i> <span class="font-w-7 l-spacing-5 fs-3">Contáctenos</span></div>

     <picture >
         <source srcset="../../assets/img/consultancy_d.webp" media="(min-width:768px)">
          <img class="hero_home-image w-100" src="../../assets/img/consultancy_m.webp" alt="Comunicate con Cv Auditores de Colombia SAS">
       </picture>
    </section>

    <section class="d-flex flex-column flex-lg-row justify-content-lg-around">
        <article>

            <div class="h-5 pt-3 w-75 mx-auto ">

                @include('layouts.alert')

            </div>

            <div class="container-form m-auto color-dark">
                <div class="mt-5 mb-4">
                    <h3 class="fw-bold ">Contáctenos llenando el siguiente formulario</h3>
                </div>
                <form id="contact-form" class="" method="POST" action="{{route('service.contact')}}" class="color-dark">
                    @csrf
                    <div class="d-flex flex-column py-3">
                        <label class="mb-2 fw-bold" for="">Nombres y apellidos</label>
                        <input id="input-name-contact" class="p-2 form__input" name="name" value="{{ old('name') }}" type="text" required>
                        @error('name')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column  py-3">
                        <label class="mb-2 fw-bold" for="">Empresa</label>
                        <input  id="input-company-contact"  class="p-2 form__input" name="company" value="{{ old('company') }}" type="text" required>
                        @error('company')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column  py-3">
                        <label class="mb-2 fw-bold" for="">Correo electrónico</label>
                        <input  id="input-email-contact"  class="p-2 form__input" name="email" value="{{ old('email') }}" type="email" required>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column  py-3">
                        <label class="mb-2 fw-bold" for="">Teléfono</label>
                        <input  id="input-phone-contact"  class="p-2 form__input" name="phone" value="{{ old('phone') }}" type="number" required>
                        @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column  py-3">
                        <label class="mb-2 fw-bold" for="">Ciudad</label>
                        <input  id="input-city-contact" class="p-2 form__input"  name="city" value="{{ old('city') }}" type="text">
                        @error('city')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="d-flex flex-column py-3">
                        <label class="mb-2 fw-bold" for="">Servicios</label>
                        <select class="p-2 form__input" name="service" value="{{ old('service') }}" aria-placeholder="Servicios" required>
                            @foreach ($servicesGlobal as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="d-flex flex-column py-3">
                        <label class="mb-2 fw-bold" for="">Mensaje</label>
                        <textarea id="input-message-contact"  class="form__input resize-none" name="message" value="{{ old('message') }}" cols="30" rows="10"></textarea>
                    </div>
                    <div>
                        <input id="input-check-contact"  type="checkbox" name="term" value="{{ old('term') }}" required>
                        <p>Acepto y he leído la Autorización para el tratamiento <a href="../../public/docs/portafolio_de_servicios_cv_auditores.pdf" download="">de datos personales y política de tratamiento de datos</a> </p>
                    </div>
                    
                    <button class="btn btn-danger" type="submit">Enviar</button>

                    <div class="msm-error h-5 d-flex align-items-center">
                        <span class="text-primary"></span>
                    </div>
                </form>
            </div>

        </article>

        <article class="my-4 lg-p-top-4">
            <div class=" cards card--md  d-flex flex-column back-white p-3 my-2">
                  <div class="text-primary py-1">
                    <span class="" >+57 317 639 4275</span>
                  </div>
                  <div class="text-primary py-1 ">
                    <span class="" >gerencia@cvauditoresbq.com</span>
                  </div>
                  <div class=" py-1">
                    <span class="" >Calle 82 No 49C-50 piso 2</span>
                  </div>
            </div>
            <div class=" cards  card--md d-flex flex-column back-white p-3 mt-5" >
                <span class="text-primary ms-1">Siguenos:</span>

                <div class="d-flex flex-column">
                    <a class="text-decoration-none py-1" href=""><i class="icon-facebook-squared "></i><span class="">Facebook</span></a>
                    <a class="text-decoration-none py-1" href=""><i class="icon-instagram "></i><span class="">Istagram</span></a>
                    <a class="text-decoration-none py-1" href=""><i class="icon-twitter "></i><span class="">Twitter</span></a>

                </div>
            </div>

        </article>


    </section>


</div>


@endsection
