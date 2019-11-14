@extends('layouts.admin')

@section('content')

    <h1>Categorias</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::model($category,['method' =>'PATCH','action'=>['AdminCategoriesController@store', $category->id]]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Actualizar categoria', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>

    </div>

@endsection
