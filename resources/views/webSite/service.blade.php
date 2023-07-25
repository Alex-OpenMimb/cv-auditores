@extends('layouts.app')

@section('content')

<div class="main-container">

    <section class="hero d-md-flex flex-column justify-content-sm-center position-relative">
        <div class="hero__layer"></div>
        <div class="hero__section text-light d-none  d-md-flex align-items-center gap-2 position-absolute">
            <i class="icon-folder fs-3"></i>
            <i class="icon-circle font-s-0-2"></i>
            <h1 class="font-w-7 l-spacing-5 fs-3">{{$service->name}}</h1>
        </div>

        <picture>
            @if ($service->image)
                <source srcset=" {{ asset('image/service/'.$service->image) }}" media="(min-width:768px)">
                <img class="hero_home-image w-100" alt="Servicios CV Auditores de Colombia SAS" height="200px" src=" {{ asset('image/service/'.$service->image) }}">
            @else
                <source srcset="../../assets/img/audit_d.webp" media="(min-width:768px)">
                <img class="hero_home-image w-100" src="../../assets/img/audit_m.webp" alt="Servicios CV Auditores de Colombia SAS">
            @endif
       </picture>
    </section>

    <section class="d-lg-flex">

        <div class="d-lg-flex flex-column align-items-lg-center justify-content-lg-center">
            <div class="cards card__list-service d-flex flex-column">

                <span class="p-2 ps-4 bg-primary text-light ">SERVICIOS</span>
                <ul class="list-style-none card__list-service-item">
                    @foreach ($servicesGlobal as $item)
                        @if ( $item->name != $service->name)
                            <li class="p-2"> <a class="text-decoration-none d-flex justify-content-between" href="{{route('service.home', $item->slug)}}"><h2 class="fs-6">{{$item->name}}</h2 class="fs-6"> <i class="icon-right-open"></i> </a> </li>
                        @endif
                    @endforeach
                </ul>
           </div>

           <article class="cards card__contact py-4 d-none d-lg-block">
            <div class="d-flex flex-column ">
               <span class="gray-5 l-spacing-5 p-1 ps-4">CONTÁCTANOS</span>
               <span class="p-1 fw-bold fs-3 ps-4">Solicita tu cotización</span>
               <a class="text-decoration-none d-flex gap-3 p-1 ps-4" href="{{route('webSite.contact')}}"><span>Ir al formulario</span><i class="icon-right"></i></a>
            </div>
           </article>
        </div>

        <div class="service-container__card">
            <article class="service-container__article">
                <div class="cards card__service position-relative">
                    <div class="layer position-absolute d-flex align-items-center"><span class="fw-bold text-primary layer__text">{{$service->name}}</span></div>
                    <picture>
                        <source srcset="../../assets/img/banner_d.png" media="(min-width:700px)">
                            <img class="w-100"  src="../../assets/img/banner_m.png" alt="Serivios CV Auditores de Colombia SAS">
                    </picture>
                </div>
                <div class="service__description">
                    <p class="">{!!$service->description!!}</p>
                </div>
            </article>
        </div>
        <article class="cards card__contact py-4 d-block d-lg-none">
            <div class="d-flex flex-column ">
               <span class="gray-5 l-spacing-5 p-1 ps-4">CONTÁCTANOS</span>
               <span class="p-1 fw-bold fs-3 ps-4">Solicita tu cotización</span>
               <a class="text-decoration-none d-flex gap-3 p-1 ps-4" href="{{route('webSite.contact')}}"><span>Ir al formulario</span><i class="icon-right"></i></a>
            </div>
        </article>
    </section>

</div>

@endsection
