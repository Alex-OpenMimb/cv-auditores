 <!-- Modal create servicio -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $edit == 1 ? 'Crear':'Editar'}} Colaborador</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group  col-sm-12">
                <label>Nombre</label>
                <input wire:model.lazy="name" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12">
                <label>Posición</label>
                <input wire:model.lazy="position" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12">
                <label>Perfil</label>
                <input wire:model.lazy="profile" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12">
                <label>Telefono</label>
                <input wire:model.lazy="phone" type="number" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group  col-sm-12">
                <label>{{$edit == 1 || !$user->image ? 'Cargar':'Editar'}} imagen</label>
                @if ($edit == 2)
                    <div class="mb-2 text-center">
                        @if ($user->image)
                            <img class="rounded-circle" width="200px" height="200px" src="{{ asset('image/jobTeams/'.$user->image) }}">
                        @endif
                    </div>
                @endif
                <input type="file" class="form-control text-center" id="image"
                    wire:model="image" accept="image/x-png, image/gif, image/jpeg"
                >
            </div>
            <div class="form-group col-lg-8 col-md-8 col-sm-12">
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
