 <!-- Modal create user -->
 <div wire:ignore.self class="modal fade" id="{{$component}}-component" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mb-2">
                <h3>Información de emails de todos los clientes</h3>
                <hr>
            </div>
            
            <div class="row">
                @if(!$clients->isEmpty())

                    @foreach ($clients as $element)
                        <div class="form-group col-lg-4 col-md-4 col-sm-12">
                            <h5 class=""><b>{{$element->email}};</b></h5>
                        </div>
                    @endforeach
                @else
                    <h2>NO HAY CLIENTE CREADO</h2>
                    <hr>
                @endif
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
    </div>
    </div>
</div>
