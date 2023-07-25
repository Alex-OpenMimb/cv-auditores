<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CV Auditores de Colombia SAS | Auditores Barranquilla</title>
    <meta name="description" content="Contamos con un equipo de profecionales con  experiencia en el ejercicio en las áreas de Auditoria, Revisoría Fiscal, Impuestos, Consultorías y otros campos afines del conocimiento de procesos..." >
    <meta name="keywords" content="auditoría,impuestos, revisoría fiscal, declaración de renta">
    <link rel="stylesheet" href="{{ asset('assets/fontello.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="icon" href="{{ asset('assets/img/logo.jpeg') }}">
</head>
<body>

    <header class="header">
        <div class="p-3 bg-light">
            <div class="d-flex gap-2 fs-5">
                <div><a href="https://mobile.facebook.com/CV-Auditores-de-Colombia-SAS-220244811436349/?tsid=0.9318187122680963&source=result" target="_black"><i class="icon-facebook-squared gray-1"></i></a></div>
                <div><a href="#"><i class="icon-twitter gray-1"></i></a> </div>
                <div><a href="#"><i class="icon-instagram gray-1"></i></a></div>
                <div><a href="https://api.whatsapp.com/send?phone=573136823862" target="_black"><i class="icon-whatsapp gray-1"></i></a></div>
                <div class="align-self-end fs-6">
                    <i class="icon-phone gray-1"></i>
                    <span class="text-secondary font-s-0-8">317 639 4275</span> 
                    <span>-</span>
                    <span class="text-secondary font-s-0-8">315 772 2830 </span> 
                    <span>-</span>
                    <span class="text-secondary font-s-0-8">310 831 8424</span> 
                </div>
                <a a href="{{route('webSite.contact')}}" class="text-secondary text-decoration-none font-s-0-8 d-none d-md-block mt-2 ms-3">Contacto</a>

            </div>
            <div class="d-flex justify-content-between justify-content-md-end mt-4 p-relative">
                <div class="header__container-logo">
                    <a href="#" class="text-decoration-none text-dark fs-3 fw-bold d-flex"><img class="logo" src="../../assets/img/logo.jpeg" alt="CV Auditores de Colombia SAS"> <div class="d-flex flex-column align-self-end"> <span class="fs-2 fw-bold">CV AUDITORES</span> <span class="fst-italic font-s-0-8">de Colombia</span>
                    </div>
                    </a>
               </div>
                <div class="align-self-center">
                    <button class="btn-hamburger  border-0 bg-light d-block d-md-none d-lg-none "><i class="fs-1 icon-menu second-color"></i></button>
                </div>
            </div>

        </div>
        <article>
            <nav class="menu">
                <ul id="menu__nav" class="menu__nav  fs-5 d-md-flex justify-content-md-between list-style-none ">
                    <li class="menu__link"><a class="menu__item text-decoration-none  fw-bold  " href="{{route('home')}}"><span  class="text-center">Inicio</span> <i class="icon-plus-squared fs-5 me-2"></i></a></li>
                    <li class="menu__link menu__link--white"><a  class="menu__item text-decoration-none  fw-bold position-relative " href="#"><span class="text-center">Servicios</span> <i class="icon-plus-squared fs-5 me-2"></i></a>
                        <ul class="menu__sub fs-6 mt-1  d-block list-style-none">
                            <div class="menu__sub--container d-md-flex justify-content-md-around ">

                                <div class="menu__sub--box-1 d-none d-md-block d-lg-block">
                                    <span class="text-primary fw-bold">SERVICIOS</span>
                                    <img class="w-100 mb-3 mt-2" src="../../assets/img/service.jpg" alt="Servicios">
                                    <div>
                                        <p class="text-primary font-w-1 text-justify">Contamos con un equipo de trabajo con amplia experiencia en el sector tributario, revisoria fiscal y auditoría contable.</p>
                                    </div>
                                </div>

                                <div class="menu__sub--box-2">
                                    @foreach ($servicesGlobal as $service)
                                        <li class="menu__sub-link"><a class="text-primary  text-decoration-none" href="{{route('service.home', $service->slug)}}">{{$service->name}}</a></li>
                                        
                                    @endforeach
                                        
                                    <li class="menu__sub-link"><a href="{{route('webSite.contact')}}" class="text-decoration-none text-primary ">Contáctanos</a></li>
                                </div>
                            </div>
                        </ul>
                    </li>
                    <li class="menu__link"><a class="menu__item text-decoration-none  fw-bold " href="{{route('webSite.about')}}"><span class="text-center">Sobre Nosotros</span> <i class="icon-plus-squared fs-5 me-2"></i></a></li>
                    <li class="menu__link"><a class="menu__item text-decoration-none  fw-bold"  href="{{route('webSite.blog')}}"><span class="text-center">Blog</span> <i class="icon-plus-squared fs-5 me-2"></i></a></li>
                    <li class="menu__link"><a class="menu__item text-decoration-none  fw-bold"  href="{{route('webSite.landing')}}"><span class="text-center">Formación</span> <i class="icon-plus-squared fs-5 me-2"></i></a></li>

                </ul>
            </nav>
        </article>
    </header>

    <a class="wpp-btn" href="https://api.whatsapp.com/send?phone=573136823862" target="_blank">
        <i class="icon-whatsapp"></i>
    </a>

    <main>

        @yield('content')

    </main>


<footer class="back-second p-3">
    <article class="footer__article d-sm-flex justify-content-sm-evenly align-items-sm-center" >
        <div class="d-flex flex-column align-items-center ">
            <h4 class="text-light">CV AUDITORES</h4>
            <div>
                <i></i>
                <span class="text-light" >Calle 82 No 49C-50 piso 2</span>
            </div>
           
              
            <div class="d-flex flex-column">
                <div class="d-flex">
                    <i class="icon-phone text-light"></i>
                    <span class="text-light" >57 317 639 4275</span>
                </div>
                <div class="d-flex">
                    <i class="icon-phone text-light"></i>
                    <span class="text-light" >57 315772 2830 </span>
                </div>
                <div class="d-flex">
                    <i class="icon-phone text-light"></i>
                    <span class="text-light" >57 310 8318424</span>
                </div>
                   
                   
            </div>
         
            <div>
                <a href="https://mobile.facebook.com/CV-Auditores-de-Colombia-SAS-220244811436349/?tsid=0.9318187122680963&source=result" target="_black"><i class="icon-facebook-squared text-light"></i></a>
                <a href=""><i class="icon-instagram text-light"></i></a>
                <a href=""><i class="icon-twitter text-light"></i></a>
                <a href="https://api.whatsapp.com/send?phone=573136823862" target="_black"><i class="icon-whatsapp text-light"></i></a>
            </div>
            <div>
                <a class="text-light text-decoration-none" href="{{route('webSite.contact')}}">Contacto</a>
            </div>

        </div>

        <div class="d-flex  flex-column align-items-center mt-5 mt-sm-0">
          <h4 class="text-light">COMPROMETIDOS</h4>
          <ul class="footer__container text-center" >

             <li class="text-light"><span>Afiliado a Camara de Comercio</span></li>
             <li class="text-light"><span>Vigilado por Supersociedades</span></li>
             <li class="text-light"><span>Junta central de Contadores</span></li>
             
          </ul>
        </div>

        <div class="d-flex  flex-column align-items-center mt-5">
          <h4 class="text-light">SERVICIOS</h4>
          <ul class="footer__container" >
            @foreach ($servicesGlobal as $service)
                <li> <a class="text-light text-decoration-none"  href="{{route('service.home', $service->slug)}}">{{$service->name}}</a> </li>
            @endforeach
          </ul>
        </div>

        <div class="d-none d-sm-block">

          <div><a class="text-light text-decoration-none" href="{{route('webSite.landing')}}">Formación</a></div>
          <div><a class="text-light text-decoration-none" href="{{route('webSite.about')}}">Sobre Nosotros</a></div>
          <div><a class="text-light text-decoration-none" href="{{route('webSite.blog')}}">Blog</a></div>
         

        </div>

    </article>

</footer>


<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
 <script src="{{ asset('js/app.js') }}" type="module"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>
</html>
