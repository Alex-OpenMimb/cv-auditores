<div class="card-header py-3 d-flex justify-content-between align-items-center">
    <h5 class="m-0 font-weight-bold text-primary">Tabla de {{$component}}</h5>
    @if ($url != 'ServiceHasClient' && $url != 'client')
        <a wire:click="handleReset(1)" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#{{$component}}-component">
            <span class="icon text-white-50">
            <i class="fas fa-check"></i>
            </span>
            <span class="text">Crear {{$component}}</span>
        </a>
    @endif
    @if ($url == 'client')
        <a wire:click="handleAction(1)" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#{{$component}}-component">
            <span class="icon text-white-50">
            <i class="fas fa-check"></i>
            </span>
            <span class="text">Ver emails</span>
        </a>
    @endif
</div>
