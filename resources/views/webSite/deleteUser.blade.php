@extends('layouts.base')

@section('content')

<div class="container">

    <div class="card text-center">
        <h3>El usuario ha sido eliminado de nuestra base de datos</h3>
    </div>
    <div class="text-center">
        <a class="btn btn-danger" href="{{route('home')}}">Volver al sitio web</a>
    </div>

</div>
    
@endsection