 <!-- Modal create servicio -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $edit == 1 ? 'Crear':'Editar'}}  servicio </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group  col-sm-12">
                <label>Nombre</label>
                <input wire:model.lazy="name" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12" id="textarea_service" wire:ignore>
                <label>Descripción</label>
                <textarea id="ckeditor_service" wire:model.lazy="description" type="text"  class="form-control" cols="10" rows="4" name="description"></textarea>
            </div>
            <div class="form-group  col-sm-12">
                <label>{{$edit == 1 || !$service->image ? 'Cargar':'Editar'}} imagen</label>
                @if ($edit == 2)
                    <div class="mb-2 text-center">
                        @if ($service->image)
                            <img class="rounded-circle" width="200px" height="200px" src="{{ asset('image/service/'.$service->image) }}">
                        @endif
                    </div>
                @endif
                <input type="file" class="form-control text-center" id="image"
                    wire:model="image" accept="image/x-png, image/gif, image/jpeg"
                >
            </div>
            <div class="form-group  col-sm-12">
                <label >Estado*</label>
                <select wire:model="status" class="form-control">
                    <option selected value="Elegir" disabled="true">Elegir</option>
                    <option value="ACTIVO">ACTIVO</option>
                    <option value="DESACTIVADO">DESACTIVADO</option>
                </select>
            </div>
        </div>
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
