<div class="card shadow mb-4">
    @include('common.create')
    @include('common.alerts')

    <div class="card-body">
      <div class="table-responsive">
        @if($clients->isEmpty())
          <h2>NO HAY CLIENTE CREADO</h2>
          <hr>
        @else
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Compañía</th>
                    <th>Ciudad</th>
                    <th>Descripción</th>
                    <th>Fecha</th>
                    <th style="text-align: center;">Acciones</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($clients as $element)
                    <tr>
                        <td>{{$element->id}}</td>
                        <td>{{$element->name}}</td>
                        <td>{{$element->phone}}</td>
                        <td>{{$element->email}}</td>
                        <td>{{$element->company}}</td>
                        <td>{{$element->city}}</td>
                        <td>{{$element->description}}</td>
                        <td>{{$element->full_created_at}}</td>
                        <td style="text-align: center;">
                            <ul class="table-controls row d-flex justify-content-between mb-1 mt-1 gap-2" style="list-style-type: none;">
                                @if (Auth::user()->role->name == "Administrador")
                                    <li>
                                        <a class="btn button--md btn-danger btn-icon-split text-decoration-none c-pointer" onclick="handleDelete({{$element->id}}, 1)">
                                            <span class=" text-white-50 icon padding-0-6 padding-l-1-2">
                                            <i class="fas fa-trash "></i>
                                            </span>
                                        </a>
                                    </li>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
          {{ $clients->links() }}

        @endif
      </div>
    </div>
    @include('livewire.Client.modals')
</div>

@section('scripts')
  <script src="{!! asset('js/helpers/helper.js') !!}"></script>
@endsection
