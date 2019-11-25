@extends('layouts.admin')

@section('content')

    <h1>Edit Post</h1>

    <div class="row">
        <div class="col-sm-3">
            <img src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400'}}" class="img-responsive img-rounded" alt="">
        </div>
        <div class="col-sm-9">
            {!! Form::model($post, ['method' =>'PATCH','action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Categoria:') !!}
                {!! Form::select('category_id', $categories, null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Archivo:') !!}
                {!! Form::file('photo_id', ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('archivo_id', 'Archivo:') !!}
                {!! Form::text('archivo_id', $url , ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Actualizar Post', ['class'=>'btn btn-primary col-sm-6']) !!}
            </div>
            {!! Form::close() !!}

            {!! Form::open(['method' =>'DELETE','action'=>['AdminPostsController@destroy', $post->id]]) !!}
                <div class="form-group">
                    {!! Form::submit('Delete Post', ['class'=>'btn btn-danger col-sm-6']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="row">
        @include('includes.form_errors')
    </div>

@endsection

