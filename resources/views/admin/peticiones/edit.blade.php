@extends('layouts.admin')


@section('content')

    <h1><a href="{{route('peticiones.index')}}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a> Actualizar Estado de Peticiones</h1>

    @if(Session::has('create_peticion'))

        <p class="bg-success">{{session('create_peticion')}}</p>

    @endif

    {!! Form::model($peticion, ['method' =>'PATCH','action'=>['AdminPeticionController@update', $peticion->id]]) !!}
    <div class="form-group">
        {!! Form::select('status', array('' => 'Elige Nuevo Estado', 0=>'Pendiente', 1=>'En Proceso', 2=>'Finalizada', 3=>'Correcciones'), null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('comentario', 'Comentarios:') !!}
        {!! Form::textarea('comentario', null, ['class'=>'form-control', 'rows' => 3]) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Actualizar Estado', ['class'=>'btn btn-primary']) !!}
    </div>
    {!! Form::close() !!}

    @include('includes.form_errors')

    <script src="{{asset('js/home.js')}}"></script>


@endsection
