@extends('layouts.admin')

@section('styles')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css">

@endsection


@section('content')

    <h1>Subir fotos</h1>

    <div class="row">

        <div class="col">
            {!! Form::open(['method' =>'POST','action'=>'AdminMediaController@store', 'class' => 'dropzone']) !!}

            {!! Form::close() !!}
        </div>
    </div>

@endsection

@section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

@endsection

