<div class="widget-content-area card-body ">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h5><b>Información del la prublicación</b></h5>
                <hr>
            </div>
        </div>
    </div>
    <div class="widget-one">
        <div class="row">
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Titulo</label>
                <h6 class=""><b>{{$post->name}}</b></h6>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Descripción</label>
                <div  style="  display: -webkit-box;
                overflow: hidden;
                -webkit-box-orient: vertical;
                -webkit-line-clamp: 2"><p>{!! $post->description !!}</p></div>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Publicado por</label>
                <h6 class=""><b>{{$post->user->name}}</b></h6>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Imagen</label>
                @if ($post->image)
                    <img width="200px" height="200px" src="{{ asset('image/post/'.$post->image) }}">
                @else
                    <h6 class=""><b>No tiene imagen...</b></h6>
                @endif
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Fecha de publiación</label>
                <h6 class=""><b>{{$post->full_created_at}}</b></h6>
            </div>
            <div class="form-group col-lg-4 col-md-4 col-sm-12">
                <label >Última modificación</label>
                <h6 class=""><b>{{$post->full_updated_at}}</b></h6>
            </div>
        </div>
    </div>
    <br>
    <div class="widget-content-area">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h5><b>Comentarios</b></h5>
                    <hr>
                </div>
            </div>
        </div>
        <div class="widget-one">
            @if($post->comments->count())
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>Cliente</th>
                                <th>Comentario</th>
                                <th>Estado</th>
                                <th style="text-align: center;">Acciones</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($post->comments as $comment)
                                    <tr>
                                        <td>{{$comment->client->name}}</td>
                                        <td>{{$comment->description}}</td>
                                        <td>{{$comment->status}}</td>
                                        <td style="text-align: center;">
                                            <ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
                                                <li>
                                                    <a class="btn button--md btn-info btn-icon-split text-decoration-none c-pointer text-light" onclick="handlerStatusComment({{$comment->id}}, {{$comment->post_id}}, 2, '{{$comment->status}}')">
                                                        <span class="text-white-50 icon  ">
                                                            <i class="fas fa-edit padding-0-6"></i>
                                                        </span>
                                                        <span class="text ">{{$comment->status == 'ACTIVO' ? 'Deshabilitar':'Habilitar'}} </span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a wire:click="editCommentResponse({{$comment->id}}, {{$comment->post_id}}, 2)" class="btn button--md btn-success btn-icon-split text-decoration-none c-pointer"  data-toggle="modal" data-target="#response-comment">
                                                        <span class="text-white-50 icon padding-0-6 padding-l-1-2">
                                                            <i class="fas fa-audio-description"></i>
                                                        </span>
                                                        <span class="text">Respuesta</span>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="btn button--md btn-danger btn-icon-split text-decoration-none c-pointer" onclick="deleteComment({{$comment->id}}, {{$comment->post_id}}, 2, 'handleDeleteComment')">
                                                        <span class=" text-white-50 icon padding-0-6 padding-l-1-2">
                                                            <i class="fas fa-trash "></i>
                                                        </span>
                                                        <span class="text ">Delete </span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @else
                <h2>Sin comentarios...</h2>
            @endif
        </div>
    </div>
    <div class="row ">
        <div class="col-lg-5 mt-2  text-left">
            <button type="button" wire:click="handleAction(1)" class="btn btn-dark mr-1">
                <i class="mbri-left"></i> Regresar
            </button>
        </div>
    </div>
</div>

