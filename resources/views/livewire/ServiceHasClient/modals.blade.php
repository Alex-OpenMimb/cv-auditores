 <!-- Modal create user -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          {{-- <h5 class="modal-title" id="exampleModalLabel">Información del servicio</h5> --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @if ($edit == 2)
            <div class="modal-body">
                <div class="mb-2">
                    <h3>Información del cliente</h3>
                    <hr>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Nombre</label>
                        <h5 class=""><b>{{$service->client->name}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Telefono</label>
                        <h5 class=""><b>{{$service->client->phone}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Compañia</label>
                        <h5 class=""><b>{{$service->client->company}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Email</label>
                        <h5 class=""><b>{{$service->client->email}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Ciudad</label>
                        <h5 class=""><b>{{$service->client->city}}</b></h5>
                    </div>
                </div>
                <div class="mb-2">
                    <h3>Información general</h3>
                    <hr>
                </div>
                <div class="row">
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Nombre del servicio</label>
                        <h5 class=""><b>{{$service->service->name}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Mensaje de registro</label>
                        <h5 class=""><b>{{$service->message}}</b></h5>
                    </div>
                    <div class="form-group col-lg-4 col-md-4 col-sm-12">
                        <label >Fecha de registro</label>
                        <h5 class=""><b>{{$service->full_created_at}}</b></h5>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
                <a class="btn btn-info btn-icon-split" wire:click="handleView({{$service->id}}, 1, '{{$service->status}}')">
                    <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Marcar como {{$service->status == 'LEIDO' ? 'no':''}} leido</span>
                </a>
            </div>
        @endif
    </div>
    </div>
</div>
