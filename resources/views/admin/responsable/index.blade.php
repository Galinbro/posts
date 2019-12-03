@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_resp'))

        <p class="bg-danger">{{session('deleted_resp')}}</p>

    @endif

    @if(Session::has('create_resp'))

        <p class="bg-success">{{session('create_resp')}}</p>

    @endif

    @if(Session::has('update_resp'))

        <p class="bg-success">{{session('update_resp')}}</p>

    @endif

    <div class="row">
        <div class="col-sm-4">
            <h1>Responsables</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'responsable.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre de responsable']) !!}
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-default">Buscar</button>
            </div>
            <i class="fa fa-filter" aria-hidden="true" id="filter"></i>
            {!! Form::close() !!}
        </div>
    </div>


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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.location.href.indexOf("?") > -1) {
                $('#filter').attr('class', 'fa fa-filter');
                $("#filter").click(function () {
                    window.location.href = "{{URL::to('admin/responsable')}}"
                });
            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
