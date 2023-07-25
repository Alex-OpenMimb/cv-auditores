@extends('layouts.app')

@section('content')

<div class="main-container padding-b-2">

    <section class="hero margin-b-0 d-md-flex flex-column justify-content-sm-center position-relative">
        <div class="hero__layer"></div>
        <div class="hero__section text-light d-none  d-md-flex align-items-center gap-2 position-absolute"><i class="icon-home fs-4"></i><i class="icon-circle font-s-0-2"></i> <h1 class="font-w-7 l-spacing-5 fs-3">Sobre Nosotros</h1></div>

        <picture >
            <source srcset="../../assets/img/consultancy_d.webp" media="(min-width:768px)">
             <img class="hero_home-image w-100" src="../../assets/img/consultancy_m.webp" alt="Sobre Cv Auditores de Colombia SAS">
          </picture>
    </section>


    <section class="padding-x-2 padding-3-md">

        <div class="">
            <div class="mt-5 mb-4">
                <h2 class="fw-bold">Valores Corporativos</h2>
            </div>

            <div class="">
                <ul class="list-style-none px-0 container-card-value gap-5">
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Sentido de Pertenencia</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Trabajo en Equipo</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Motivación al Logro</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Compromiso con su Gente</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Excelencia</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Respeto</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Veracidad</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Responsabilidad Social</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                    <li class="p-4 width-100  back-white my-4"> <a class="text-primary text-decoration-none fs-1" href="">Honestidad</a> <p class="mt-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam</p> </li>
                  
                </ul>
            </div>
        </div>


    </section>

    <section class="d-flex flex-column flex-md-row">
        <article class="bg-primary text-light p-4 h-20 h-28-lg w-100 d-flex justify-content-center align-items-center">
            <div class="card--corpo">
                <h2>Visión</h2>

                <p class="text-a-j mt-4">Ser la organización líder en Revisoría Fiscal, Auditoría y Consultoría especializada a nivel nacional, utilizando estándares internacionales y nuestro servicio personalizado de alta calidad y ética profesioanl. </p>
            </div>
        </article>
        <article class=" back-white p-4 h-20 h-28-lg w-100 d-flex justify-content-center align-items-center">
            <div class="card--corpo">
                <h2>Misión</h2>

                <p class="text-a-j mt-4">Asegurar un excelente servicio a nuestros clientes, en la búsqueda de soluciones eficaces para sus negocios dentro del marco administrativo y legal con el propósiton de coadyudar eficientemente al logro de sus objetivos.</p>
            </div>
        </article>
    </section>



    <section class="mt-4 px-3 ">

            <article class="container-card-teem">
                @foreach ($jobTeamsGlobal as $jobTeam)
                <div class="border back-white d-flex flex-md-column w-15-lg card-teem">
                    <div class="card-teem__picture">
                        @if ($jobTeam->image)
                            <img class="" width="140px" height="200px" src="{{ asset('image/jobTeams/'.$jobTeam->image) }}" alt="{{$jobTeam->name}}">
                        @else
                        
                        <picture >
                                <img class="" src="../../assets/img/teem/avatar_teem.png" alt="{{$jobTeam->name}}">
                        </picture>
                           
                        @endif
                    </div>
                    <div class="card-teem__text">
                        <div class="mt-3"><span class="text-uppercase color-gray5">{{$jobTeam->position}}</span></div>
                        <div class="text-primary font-s-lg-1-5"><span>{{$jobTeam->name}}</span></div>
                        <div class="font-s-0-6 font-s-lg-1 my-2" ><span  >{{$jobTeam->profile}}</span></div>
                        <div class="font-s-0-8 "><i class="icon-phone color-gray5 "></i><span class="color-gray5">{{$jobTeam->phone}}</span></div>
                    </div>
                </div>
            @endforeach
            </article>


    </section>


</div>

@endsection
