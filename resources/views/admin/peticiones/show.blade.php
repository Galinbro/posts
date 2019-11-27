@extends('layouts.admin')




@section('content')

    <h1><a href="{{route('peticiones.index')}}"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a> Informacion de Peticion</h1>

    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">

            {!! Form::model($peticion, ['method' =>'PATCH','action'=>['PeticionController@update', $peticion->id]]) !!}
            <div class="form-group">
                {!! Form::label('responsable_id', 'Responsable:') !!}
                {!! Form::select('responsable_id', ['' => 'Elige un responsable'] + $responsables, null, ['disabled','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ug', 'Cr:') !!}
                {!! Form::text('ug', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_grupo', 'Id del grupo:') !!}
                {!! Form::text('id_grupo', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_cliente', 'Id del cliente:') !!}
                {!! Form::text('id_cliente', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('nb_cliente', 'Nombre del cliente:') !!}
                {!! Form::text('nb_cliente', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('producto', 'Producto:') !!}
                {!! Form::text('producto', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tarifa', 'Tarifa:') !!}
                {!! Form::text('tarifa', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rentabilidad', 'rentabilidad:') !!}
                {!! Form::text('rentabilidad', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reciprocidad', 'Reciprocidad:') !!}
                {!! Form::text('reciprocidad', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reciprocidad_num', 'Reciprocidad Numero:') !!}
                {!! Form::text('reciprocidad_num', null, ['readonly','class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('argumento', 'Argumento:') !!}
                {!! Form::textarea('argumento', null, ['readonly','class'=>'form-control', 'rows' => 3]) !!}
            </div>
            <div class="form-group">
                {!! Form::label('comentario', 'Comentario:') !!}
                {!! Form::textarea('comentario', null, ['readonly','class'=>'form-control', 'rows' => 3]) !!}
            </div>
            {!! Form::close() !!}

        </div>
    </div>
    <script src="{{asset('js/home.js')}}"></script>


@endsection
