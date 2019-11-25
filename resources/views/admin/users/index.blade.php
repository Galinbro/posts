
@extends('layouts.admin')



@section('content')

    @if(Session::has('deleted_user'))

        <p class="bg-danger">{{session('deleted_user')}}</p>

    @endif

    @if(Session::has('create_user'))

        <p class="bg-success">{{session('create_user')}}</p>

    @endif

    @if(Session::has('update_user'))

        <p class="bg-success">{{session('update_user')}}</p>

    @endif

    <h1>Users</h1>

    <table class="table table-striped">
        <thead>
          <tr>
            <th>Id</th>
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

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$users->links()}}
        </div>
    </div>
@endsection
