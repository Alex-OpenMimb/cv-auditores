@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="d-flex flex-column justify-content-center align-items-center">
                    
                <h3 class="mt-1">Ingresa tus datos</h3>

                </div>
                

                <div class="card-header"></div>

                <div class="card-body">

                    
                    <form method="POST" action="{{route('webSite.unsubscription')}}">
                        @csrf
                        @method('DELETE') 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="" required autocomplete="email" autofocus>

                                {{-- @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror --}}
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    DARSE DE BAJA
                                </button>

                            </div>
                        </div>
                    </form>


                  

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
