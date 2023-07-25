
<ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
    @if (Auth::user()->role->name == "Administrador")
        <li>
            <a wire:click="edit({{$element->id}}, 1)" class="btn button--md btn-info btn-icon-split text-decoration-none c-pointer text-light" data-toggle="modal" data-target="#{{$component}}-component">
                <span class="text-white-50 icon  ">
                    <i class="fas fa-edit padding-0-6"></i>
                </span>
                <span class="text ">Editar</span>
            </a>
        </li>
        @if ($url != 'user')            
            <li>
                <a class="btn button--md btn-danger btn-icon-split text-decoration-none c-pointer" onclick="handleDelete({{$element->id}}, 1)">
                    <span class=" text-white-50 icon padding-0-6 padding-l-1-2">
                    <i class="fas fa-trash "></i>
                    </span>
                    <span class="text ">Eliminar</span>
                </a>
            </li>
        @endif
    @endif
</ul>
