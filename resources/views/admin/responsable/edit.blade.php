@extends('layouts.admin')

@section('content')

    <h1>Categorias</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($responsable,['method' =>'PATCH','action'=>['AdminResponsableController@update', $responsable->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Actualizar Responsable', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>

@endsection
