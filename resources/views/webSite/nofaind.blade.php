@extends('layouts.base')

@section('content')

<div class="container">

    <div class="card text-center">
        <h3>El usuario no está registrado en nuestras bases de datos</h3>
    </div>
    <div class="text-center">
        <a class="btn btn-danger" href="{{route('webSite.unsubscription')}}">Volver al formulario</a>
    </div>

</div>

    
@endsection