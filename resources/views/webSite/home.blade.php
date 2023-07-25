
@extends('layouts.app')

@section('content')

<section>
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
         <picture class="" >
            <source srcset="../../assets/img/hero_porfolio_d.webp" media="(min-width:768px)"> 
             <img class="w-100" src="../../assets/img/hero_porfolio_m.webp" alt="UN EQUIPO DE PROFESIONALES A SU SERVICIO DE CV AUDITORES">

             <div class="carousel-caption d-none d-md-block">
              <span class="fs-3 fw-bold">UN EQUIPO DE PROFESIONALES A SU SERVICIO</span>
            
            </div>
          </picture>
      </div>
      <div class="carousel-item">
         <picture class="" >
            <source srcset="../../assets/img/hero_service_d.webp" media="(min-width:768px)"> 
             <img class="w-100" src="../../assets/img/hero_service_m.webp" alt="CV AUDITORES OFRECE SERVICIO ESPECIALIZADO PARA SUS PROCESOS">

             <div class="carousel-caption d-none d-md-block">
              <span class="fs-3 fw-bold">SERVICIO ESPECIALIZADO PARA SUS PROCESOS</span>
            
            </div>
          </picture>
      </div>
      <div class="carousel-item">
         <picture class="" >
            <source srcset="../../assets/img/hero_teem_d.webp" media="(min-width:768px)"> 
             <img class="w-100" src="../../assets/img/hero_teem_m.webp" alt="UN PORTAFOLIO DE SERVICIOS">

             <div class="carousel-caption d-none d-md-block">
              <span class="fs-3 fw-bold">UN PORTAFOLIO DE SERVICIOS AJUSTADO A SU NECESIDAD</span>
            
            </div>
          </picture>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
</section>
    
<section>
    <article class="card__article d-md-flex justify-content-center">
      <div class="">
          <div class="card__title mb-4">
              <h2 class="title title-sm">¿Quiénes Somos?</h2>
        </div>

        <div class="card__about"><p><strong>CV AUDITORES DE COLOMBIA SAS.</strong> Es una empresa legalmente constituida desde el 2003 que nació por iniciativa y finalidad para satisfacer las necesidades de nuestros clientes, entidades públicas, privadas o particulares, y se ha dedicado a crecer con un excelente servicio, calidad y cumplimiento en el trabajo </p></div>
        
      </div >
      <div class="">
          <div class="card__title mb-4">
              <h2 class="title title-sm">Nuestro Compromiso</h2>
        </div>

        <div class="card__about"><p><strong>CV AUDITORES DE COLOMBIA SAS.</strong> enmarcada dentro de las normas de ética, se ha orientado hacia dos objetivos: Brindar nuestros servicios profesionales para comprender y solucionar las necesidades de nuestros clientes. Ofrecer servicios cuyos resultados justifiquen su costo </p></div>

      </div>

    </article>

   <article>

          

   </article>

</section>
    
<section class="porfolio w-100 position-relative">
  <div class="porfolio__layer position-absolute w-100 d-flex flex-column justify-content-center">
      <div class="porfolio__container d-flex flex-column justify-content-center gap-2">
          <span class="porfolio__title text-light fw-light f-san-serif mb-3">Conoce más</span>
          <p class="porfolio__text text-light fw-bold f-san-serif">NUESTRO PORTAFOLIO</p>
          <a href="../../docs/portafolio_de_servicios_cv_auditores.pdf" download="" class="border-0 rounded button--md button--gray text-light text-decoration-none d-flex justify-content-center align-items-center">Ver mas</a >
      </div>
  </div>
  <picture class="" >
      <source srcset="../../assets/img/porfolio_d-1.webp" media="(min-width:1200px)"> 
      <source srcset="../../assets/img/porfolio_d.webp" media="(min-width:768px)"> 
       <img class="hero_home-image w-100" src="../../assets/img/porfolio_m.webp" alt="Portafolio de servicios">
      
      </div>
    </picture>

</section>
 
<section>
  <article class="carousel">
    <div class="text-center margin-top-4">
      <h2 class="title fw-bold">Nuestra Experiencia</h2>

    </div>
        <div  class="slick-list" id="slick-list">
          
             <button class="slick-arrow slick-prev" id="button-prev" data-button="button-prev">
                <i class="icon-left-open"></i>
             </button>

               <div class="slick-track d-flex align-items-center" id="track">

                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-1.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-2.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-3.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-4.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-5.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-6.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-7.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-8.webp" alt="Clientes satisfechos">
                  </div>
                  <div class="slick">
                      <img class="w-100" src="../../assets/img/brand/brand-9.jpg" alt="Clientes satisfechos">
                  </div>
                 

               </div>

              

              <button class="slick-arrow slick-next position-absolute" id="button-next" data-button="button-next">
                  <i class="icon-right-open"></i>
              </button>
        </div>
  </article>

</section>


@endsection



