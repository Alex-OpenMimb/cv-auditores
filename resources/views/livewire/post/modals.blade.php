 <!-- Modal create servicio -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $edit == 1 ? 'Crear':'Editar'}}  post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form class="modal-body" wire:submit.prevent="store(document.querySelector('#yourTextAreaId').value)" >
            <div class="form-group  col-sm-12">
                <label>Titulo</label>
                <input wire:model.lazy="name" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12" id="textarea"  wire:ignore>
                <label>Descripción</label> 
                <textarea  id="ckeditor" wire:model.lazy="description" type="text"  class="form-control" cols="10" rows="4" name="description"> </textarea>               
            </div>
            <div class="form-group  col-sm-12">
                <label>{{$edit == 1 || !$post->image ? 'Cargar':'Editar'}} imagen</label>
                @if ($edit == 2)
                    <div class="mb-2 text-center">
                        @if ($post->image)
                            <img class="rounded-circle" width="200px" height="200px" src="{{ asset('image/post/'.$post->image) }}">
                        @endif
                    </div>
                @endif
                <input type="file" class="form-control text-center" id="image"
                    wire:model="image" accept="image/x-png, image/gif, image/jpeg"
                >
            </div>
            <div class="form-group  col-sm-12">
                <label >Publicado por</label>
                <select wire:model="user_id" class="form-control">
                    <option selected value="Elegir" disabled="true">Elegir</option>
                    @foreach ($users as $user)
                        <option value="{{$user->id}}">{{$user->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group  col-sm-12">
                <label >Estado*</label>
                <select wire:model="status" class="form-control">
                    <option selected value="Elegir" disabled="true">Elegir</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="DESACTIVADO">DESACTIVADO</option>
                </select>
            </div>
        </form>
        <div class="mt-2">
            @include('common.messages')
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" wire:click="StoreOrUpdate(1)" class="btn btn-primary" >Guardar</button>
        </div>
    </div>

    </div>
</div>


<!-- Modal respuesta de comentario -->
<div wire:ignore.self class="modal fade" id="response-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Respuesta de comentario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @if ($edit == 3)

        <div class="modal-body">
            <div class="widget-one">
                @if($comment->commentResponses->count())
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTablecommentResponses" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Respuesta</th>
                                    <th>Fecha</th>
                                    <th style="text-align: center;">Acciones</th>
                                </tr>
                                </thead>
                                <tbody>
                                    @foreach ($comment->commentResponses as $commentResponse)
                                        <tr>
                                            <td>{{$commentResponse->user->name}}</td>
                                            <td>{{$commentResponse->description}}</td>
                                            <td>{{$commentResponse->full_created_at}}</td>
                                            <td style="text-align: center;">
                                                <ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
                                                    <li>
                                                        <a class="btn button--md btn-danger btn-icon-split text-decoration-none c-pointer" onclick="deleteComment({{$commentResponse->id}}, {{$comment->post_id}}, 2,'handleDeleteCommentResponse')">
                                                            <span class=" text-white-50 icon padding-0-6 padding-l-1-2">
                                                                <i class="fas fa-trash "></i>
                                                            </span>
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
                    <h2>Sin respuestas...</h2>
                @endif
            </div>
        <div class="modal-footer">
            <a class="btn btn-info btn-icon-split" onclick="addCommentResponse({{$comment->id}}, {{$comment->post_id}}, 2)">
                <span class="icon text-white-50">
                <i class="fas fa-edit"></i>
                </span>
                <span class="text">Agregar respuesta</span>
            </a>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    @endif


    </div>
</div>







