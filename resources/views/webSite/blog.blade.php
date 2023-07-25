@extends('layouts.app')

@section('content')

<div class="main-container">

    <section class="hero d-md-flex flex-column justify-content-sm-center position-relative">
        <div class="hero__layer d-flex justify-content-center align-items-center">
            <div class="text-light text-center">
                <h1 class="font-w-7 l-spacing-5 font-calc-1"> REVISORÍA FISCAL Y ACTUALIZACIÓN EN AUDITORÍA</h1>
                <span class="fs-6 d-none d-md-block">Encuentra las últimas actualizaciones en Revisoría Fiscal y temas relacionados para tu empresa </span>
            </div>
        </div>
        <picture >
            <source srcset="../../assets/img/revision_d.webp" media="(min-width:768px)">
             <img class="hero_home-image w-100" src="../../assets/img/revision_m.webp" alt="Blog ACTUALIZACIÓN EN AUDITORÍA Y REVISORÍA FISCAL ">
          </picture>
    </section>

    <section class="padding-x-1 padding-x-2-md">

        <article class="d-flex flex-column flex-md-row gap-2 max-widt-32 max-widt-45-md max-widt-60-lg mx-auto mb-5">
            @foreach ($posts as $key => $item)
                @if ($key < 2)
                    <div class="d-flex border border-1 bg-light w-50vw-md ">
                        <div class="p-4">
                            <div><h2 class="card-blog__name fw-bold compr-text" >{{$item->name}}</h2></div>
                            <div class="card-blog__date">{{$item->full_created_at}}</div>
                            <div class="">
                            <p id="" class="card-blog__decription ">Para conocer más detalles sobre este interesante post, has click para <a href="{{route('webSite.blog', $item->slug)}}">continuar leyendo</a> </p>
                            {{-- <p id="" class="card-blog__decription">{!!$item->description_short!!}...</p> --}}
                           </div>
                            {{-- <a href="{{route('webSite.blog', $item->slug)}}">Continuar leyendo</a> --}}
                        </div>
                        <div class="d-none d-lg-block">
                            @if ($item->image)

                            <img class="h-100" src="{{ asset('image/post/'.$item->image) }}" alt="{{$item->name}}" title="{{$item->name}}"> 
                                
                            @else

                            <img class="h-100" src="../../assets/img/logo_blog_card.png" alt="{{$item->name}}" title="{{$item->name}}">
                                
                            @endif
                        </div>
                    </div>
                @endif
            @endforeach
        </article>
      
        <article class="d-flex flex-column flex-md-row max-widt-32 max-widt-45-md max-widt-60-lg mx-auto gap-4">

            <article class="w-50vw-md">
                <div class="">
                    <br>
                    <h2>{{$post->name}}</h2>
                    <span> <strong> {{$post->full_created_at}} por  {{$post->user->name}} </strong></span>
                </div>
                <hr>
                <div class="mb-5 " >
                    <p>{!! $post->description !!}</p>
                </div>

                <hr>
                <div>
                    <form method="POST" action="{{route('blog.saveComment', $post->id)}}">

                        @csrf
                        <h3>Dejanos conocer tus comentarios</h3>

                            <textarea class="form-coment form-coment__text resize-none" name="description" cols="" rows="10" required></textarea>
                            <div class="d-flex flex-column flex-md-row gap-3">
                                <input class="form-coment  form-content_input" type="text" name="name" placeholder="Nombre" required>
                                <input class="form-coment  form-content_input" type="email" name="email" placeholder="Correo Eléctronico" required>
                            </div>
                            <div class="my-3">
                                <button class="btn btn-danger" type="submit">Enviar</button>

                            </div>

                    </form>
                </div>

                <div class="">
                    <h3>Comentarios</h3>
                    @if ($post->comments()->active()->count() > 0)
                        @foreach ($post->comments as $item)
                            @if ($item->status == 'ACTIVO')
                                <div class="d-flex flex-column border border-1 back-white my-3">
                                    <div class="p-3">
                                        <div class="card-response__name fw-bold">{{$item->client->name}}</div>
                                        <div class="card-response__date">{{$item->full_created_at}}</div>
                                        <div class="mt-4 text-justify"><p>{{$item->description}} </p></div>
                                    </div>
                                </div>
                                @if ($item->commentResponses->count() > 0)
                                    <div class="margin-l-2 "><i class="icon-reply"></i>Respuesta a:<span class="fst-italic ms-1">{{$item->client->name}}</span></div>
                                    @foreach ($item->commentResponses as $response)
                                        <div class="margin-l-2 d-flex flex-column border border-1 back-white mb-5">
                                            <div class="p-3">
                                                <div class="card-response__name fw-bold">{{$response->user->name}}</div>
                                                <div class="card-response__date">{{$response->full_created_at}}</div>
                                                <div class="mt-4 text-justify"><p>{{$response->description}} </p></div>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            @endif
                        @endforeach
                    @else
                        <h4 class="fs-6">Sin comentarios...</h4>
                    @endif

                </div>

            </article>

            <article class="margin-l-3-md margin-t-1-5-md">

                <h3 class="mb-4">Últimas Publicaciones</h3>

                <ul class="list-post d-flex flex-column gap-2">
                    @foreach ($posts as $item)
                       <li class="w-15-lg">
                           <a class="text-decoration-none" href="{{route('webSite.blog', $item->slug)}}">{{$item->name}}</a>
                      </li> 
                    @endforeach
                </ul>

            </article>

        </article>


    </section>





</div>



@endsection
