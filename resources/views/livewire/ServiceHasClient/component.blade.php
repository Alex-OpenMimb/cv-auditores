<div class="card shadow mb-4">
    @include('common.create')
    @include('common.alerts')

    <div class="card-body">
      <div class="table-responsive">
        @if($services->isEmpty())
          <h2>NO HAY SERVICIO CREADO</h2>
          <hr>
        @else
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Cliente</th>
                    <th>Servicio</th>
                    <th>Mensaje</th>
                    <th style="text-align: center;">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($services as $element)
                    <tr>
                        <td>{{$element->id}}</td>
                        <td>{{$element->client->name}}</td>
                        <td>{{$element->service->name}}</td>
                        <td>{{$element->message}}</td>
                        <td style="text-align: center;">
                            <ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
                                @if (Auth::user()->role->name == "Administrador")

                                    <li>
                                        <a wire:click="edit({{$element->id}}, 2)" class="btn button--md btn-info btn-icon-split text-decoration-none c-pointer text-light" data-toggle="modal" data-target="#{{$component}}-component">
                                            <span class="text-white-50 icon  ">
                                                <i class="fas fa-arrow-alt-circle-up"></i>
                                            </span>
                                            <span class="text ">Ver</span>
                                        </a>
                                    </li>

                                    <li>
                                        <a class="btn button--md btn-{{$element->status == 'NOT_LEIDO' ? 'secondary':'success'}} btn-icon-split text-decoration-none c-pointer">
                                            <span class="text-white-50 icon padding-0-6 padding-l-1-2">
                                            <i class="{{$element->status == 'NOT_LEIDO' ? 'fas fa-comment-slash':'fas fa-comment'}}"></i>
                                            </span>
                                            <span class="text ">{{$element->status == 'NOT_LEIDO' ? 'No Leido':'Leido'}}</span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $services->links() }}

        @endif
      </div>
    </div>
    @include('livewire.ServiceHasClient.modals')
</div>

@section('scripts')
  <script src="{!! asset('js/helpers/helper.js') !!}"></script>
@endsection
