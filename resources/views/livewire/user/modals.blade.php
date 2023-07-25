 <!-- Modal create user -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ $edit == 1 ? 'Crear':'Editar'}} usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group col-sm-12">
                <label>Nombre completo</label>
                <input wire:model.lazy="name" type="text" class="form-control"  placeholder="Nombre">
            </div>
            <div class="form-group col-sm-12">
                <label>Correo electronico</label>
                <input wire:model.lazy="email" type="email" class="form-control"  placeholder="Email">
            </div>
            @if ($edit == 1)
                <div class="form-group col-sm-12">
                    <label>Contraseña</label>
                    <input wire:model.lazy="password" type="password" class="form-control"  placeholder="contraseña">
                </div>
            @endif
            <div class="form-group col-sm-12">
                <label >Rol*</label>
                <select wire:model="role" class="form-control" >
                    <option selected value="Elegir" disabled="true">Elegir</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}" >
                            {{ $role->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-12">
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
            @if ($edit == 2)
                <a class="btn btn-info btn-icon-split" onclick="handlePassword({{$element->id}}, 1)">
                    <span class="icon text-white-50">
                    <i class="fas fa-edit"></i>
                    </span>
                    <span class="text">Cambiar contraseña</span>
                </a>
            @endif
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
          <button type="button" wire:click="StoreOrUpdate(1)" class="btn btn-primary" >Guardar</button>
        </div>
    </div>

    </div>
</div>
