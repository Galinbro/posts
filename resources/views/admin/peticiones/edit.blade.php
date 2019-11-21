@extends('layouts.admin')


@section('content')

    <h1>Cambiar Peticiones</h1>

    @if(Session::has('create_peticion'))

        <p class="bg-success">{{session('create_peticion')}}</p>

    @endif

    {!! Form::model($peticion, ['method' =>'PATCH','action'=>['AdminPeticionController@update', $peticion->id]]) !!}
    <div class="form-group">
        {!! Form::select('status', array('' => 'Elige Nuevo Estado', 0=>'Pendiente', 1=>'En Proceso', 2=>'Finalizada'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Crear Peticion', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_errors')

    <script src="{{asset('js/home.js')}}"></script>


@endsection
