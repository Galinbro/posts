@extends('layouts.admin')

@section('content')

    <h1>Categorias</h1>

    <div class="row">
        <div class="col-sm-6">
            {!! Form::open(['method' =>'POST','action'=>'AdminResponsableController@store']) !!}

            <div class="form-group">
                {!! Form::label('name', 'Nombre:') !!}
                {!! Form::text('name', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('email', 'Correo:') !!}
                {!! Form::text('email', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Crear Responsable', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>
        <div class="col-sm-6">
            @if($responsables)

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
                    @foreach($responsables as $responsable)
                        <tr>
                            <td>{{$responsable->id}}</td>
                            <td><a href="{{route('responsable.edit', $responsable->id)}}">{{$responsable->name}}</a></td>
                            <td>{{$responsable->created_at ? $responsable->created_at->diffForhumans() : 'Sin fecha'}}</td>
                            <td>{{$responsable->updated_at ? $responsable->updated_at->diffForhumans() : 'Sin fecha'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$responsables->links()}}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection
