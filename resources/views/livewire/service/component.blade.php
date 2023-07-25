<div class="card shadow mb-4">
    @include('common.create')
    @include('common.alerts')

    <div class="card-body">
      <div class="table-responsive">
        @if($services->isEmpty())
            <h2>NO HAY SERVICIOS CREADOS</h2>
        @else
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th >Descripción</th>
                    <th>Estado</th>
                    <th style="text-align: center;">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($services as $element)
                    <tr >
                        <td>{{$element->id}}</td>
                        <td>{{$element->name}}</td>
                        <td class="">
                            <div  style= "  display: -webkit-box;
                            overflow: hidden;
                            -webkit-box-orient: vertical;
                            -webkit-line-clamp: 2">
                                {!!$element->description!!}
                            </div>
                        </td>
                        <td>{{$element->status}}</td>
                        <td style="text-align: center;">
                            @include('common.actions')
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
            {{ $services->links() }}
        @endif
      </div>
    </div>
    @include('livewire.service.modals')
</div>


   
     @push('js-2')


       <script>
         window.livewire.on('initializeCkEditorService', function (description) {
             ClassicEditor
             .create(document.querySelector('#ckeditor_service'))
             .then(editor => {
                 editor.model.document.on('change:data', () => {
                     @this.set('description', editor.getData());
                 })
             })
         });
   
         window.livewire.on('clearCkEditorService', function (description = '') {
             $('#textarea_service').empty()
             $("#textarea_service").append(`
                 <label>Descripción</label>   
                 <textarea  id="ckeditor_service" wire:model.lazy="description" type="text"  class="form-control" cols="10" rows="4" name="description">${description}</textarea> 
             `) 
         });
     </script>  
    
    @endpush


@section('scripts')

  <script src="{!! asset('js/helpers/helper.js') !!}"></script>
 

@endsection
