@extends('layouts.admin')

@section('content')

    @if($photos)

        <table class="table table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>Foto</th>
                <th>Creado</th>
            </tr>
            </thead>
            <tbody>
            @foreach($photos as $photo)
                <tr>
                    <td>{{$photo->id}}</td>
                    <td><img height="50" src="{{$photo->file}}" alt=""></td>
                    <td>{{$photo->created_at->diffForhumans()}}</td>
                    <td>
                        {!! Form::open(['method' =>'DELETE','action'=>['AdminMediaController@destroy', $photo->id]]) !!}

                            <div class="form-group">
                                {!! Form::submit('borrar', ['class'=>'btn btn-danger']) !!}
                            </div>
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif


@endsection
