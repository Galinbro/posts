@extends('layouts.admin')

@section('content')

    <h1>Categorias</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' =>'POST','action'=>'AdminCategoriesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

        </div>
        <div class="col-sm-6">
            @if($categories)

                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>creado</th>
                        <th>Actualizado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td>{{$category->name}}</td>
                            <td>{{$category->created_at ? $category->created_at->diffForhumans() : 'Sin fecha'}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForhumans() : 'Sin fecha'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
