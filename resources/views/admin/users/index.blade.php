
@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif

    @if(Session::has('create_user'))

        <p class="bg-success">{{session('create_user')}}</p>

    @endif

    @if(Session::has('edit_user'))

        <p class="bg-success">{{session('edit_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
            <th>Foto</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Role</th>
            <th>Estatus</th>
            <th>Creado</th>
            <th>Actualizado</th>
          </tr>
        </thead>
        <tbody>

        @if($users)

            @foreach($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td><img height="45" src="{{$user->photo ? $user->photo->file : 'http://placehold.it/400x400'}}" alt=" "></td>
            <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{$user->is_active == 1 ? 'Activo' : 'No Activo'}}</td>
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr>

            @endforeach
        @endif
       </tbody>
     </table>
@endsection
