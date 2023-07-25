<div class="card shadow mb-4">
    @include('common.alerts')

    @if($action == 1)
        @include('common.create')
        <div class="card-body">
        <div class="table-responsive">
            @if($posts->isEmpty())
                <h2>NO HAY SERVICIOS CREADOS</h2>
            @else
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Publicado por</th>
                    <th>Estado</th>
                    <th style="text-align: center;">Acciones</th>

                </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $element)
                        <tr>
                            <td>{{$element->id}}</td>
                            <td>{{$element->name}}</td>
                            <td>{{$element->user->name}}</td>
                            <td>{{$element->status}}</td>
                            <td style="text-align: center;">                                                                    
                                <ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
                                    <li>
                                        <a wire:click="edit({{$element->id}}, 2)" class="btn button--md btn-secondary btn-icon-split text-decoration-none c-pointer text-light">
                                            <span class="text-white-50 icon  ">
                                                <i class="fas fa-arrow-alt-circle-up"></i>
                                            </span>
                                            <span class="text ">Ver</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a wire:click="edit({{$element->id}}, 1)" class="btn button--md btn-info btn-icon-split text-decoration-none c-pointer text-light" data-toggle="modal" data-target="#{{$component}}-component">
                                            <span class="text-white-50 icon  ">
                                                <i class="fas fa-edit padding-0-6"></i>
                                            </span>
                                            <span class="text ">Editar</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="btn button--md btn-danger btn-icon-split text-decoration-none c-pointer" onclick="handleDelete({{$element->id}}, 1)">
                                            <span class=" text-white-50 icon padding-0-6 padding-l-1-2">
                                            <i class="fas fa-trash "></i>
                                            </span>
                                            <span class="text ">Eliminar</span>
                                        </a>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                {{ $posts->links() }}
            @endif
        </div>
        </div>

    @elseif($action == 2)
        @include('livewire.post.show')
    @endif
    @include('livewire.post.modals')


</div>


@push('js')

    <script>
        window.livewire.on('initializeCkEditor', function (description) {
            ClassicEditor
            .create(document.querySelector('#ckeditor'))
            .then(editor => {
                editor.model.document.on('change:data', () => {
                    @this.set('description', editor.getData());
                })
            })
        });

        window.livewire.on('clearCkEditor', function (description = '') {
            $('#textarea').empty()
            $("#textarea").append(`
                <label>Descripción</label>   
                <textarea  id="ckeditor" wire:model.lazy="description" type="text"  class="form-control" cols="10" rows="4" name="description">${description}</textarea> 
            `) 
        });
    </script> 
   
@endpush


@section('scripts')
  <script src="{!! asset('js/helpers/helper.js') !!}"></script> 
  
@endsection
