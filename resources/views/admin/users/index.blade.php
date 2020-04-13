
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

    <div class="row">
        <div class="col-sm-4">
            <h1>Usuarios</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'users.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

                <div class="form-group">
                    {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre de usuario']) !!}
                    {!! Form::select('type', [''=>'Seleccione un tipo de usuario', 1=>'Administrador', 2=>'Colaborador', 3=>'General'], null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
            <i class="fa fa-filter" aria-hidden="true" id="filter"></i>
            {!! Form::close() !!}
        </div>
    </div>

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



@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.location.href.indexOf("?") > -1) {
                $('#filter').attr('class', 'fa fa-filter');
                $("#filter").click(function () {
                    window.location.href = "{{URL::to('admin/users')}}"
                });

                $("div.form-group select").val('{{$selected}}');

            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
