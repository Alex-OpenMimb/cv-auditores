@extends('layouts.app')

@section('content')

<div class="main-container padding-b-0-md">

    <section class="hero d-md-flex flex-column justify-content-sm-center position-relative">
        <div class="hero__layer d-flex justify-content-center align-items-center">
           <div class="container w-100 px-3">
                <h1 class="text-light font-calc-3 fw-bold " ><b>La Iglesia en Colombia</b></h1>
                <span class="text-light  font-w-3 font-calc-1">Obligación frente al impuesto sobre la renta y otros tributos</span>
           </div>
        </div>
        <picture >

            <source srcset="../../assets/img/landing_xd.webp" media="(min-width:800px)">
            <source srcset="../../assets/img/landing_d.webp" media="(min-width:480px)">
             <img class="hero_home-image w-100" src="../../assets/img/landing_m.webp" alt="Landing Page">
          </picture>
    </section>

    <section class="px-3  w-100">
        <div class="card-landing back-white position-relative ">
            <div class="card-landing__bar"></div>

                <h3 class="card-landing__title font-calc-2-5">Capacitate con nosotros</h3>
                <p class="font-s-1-5-n font-s-1-2 mt-2">Obligación frente al impuesto sobre la renta y otros tributos, y la libertad he igualdad religiosa.</p>

                <p class="mb-1 fs-4">Panelistas: </p>

                <div class="mb-3">
                    <strong class="d-block">Vicente Arriesta Floréz.</strong>
                    <strong class="d-block">Andrés Berdugo Beleño.</strong>
                </div>
                <span class="fs-6">Registra tus datos en el siguiente formulario para inscribirte en esta capacitación.</span>

        </div>

    </section>
<section class="box-landing-page mt-5 ">

    <div class="container_form-landing mx-auto">
        <div class="text-center w-100">
            <span class="fw-bold">Inscribite a nuestro webinar</span>
        </div>
        <form class="d-flex flex-column " method="POST" action="{{route('landing.save')}}">
            @csrf
            <div class="form-landing ">
                <input class="form__input w-100  p-2 my-2" type="text" name="name" value="{{ old('name') }}" placeholder="Nombres" required>
                    @error('name')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input class="form__input  w-100 p-2 my-2" type="text"  name="company" value="{{ old('company') }}" placeholder="Empresa">
                    @error('company')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input class="form__input w-100  p-2 my-2" type="number" name="phone" value="{{ old('phone') }}" placeholder="Teléfono">
                    @error('phone')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                <input class="form__input w-100  p-2 my-2" type="email" name="email" value="{{ old('email') }}" placeholder="Correo Eléctronico">
                    @error('email')
                        <span class="text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
            </div>

            <input type="checkbox" name="term" value="{{ old('term') }}" required>
            <p class="">Acepto y he leído la Autorización para el tratamiento <a href="../../public/docs/portafolio_de_servicios_cv_auditores.pdf" download="">de datos personales y política de tratamiento de datos</a> </p>
            <div>

                <button type="submit" class="btn btn-danger"> Enviar</button>
            </div>

        </form>
    </div>
</section>

</div>

@endsection
