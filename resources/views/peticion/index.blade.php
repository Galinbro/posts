
@extends('layouts.peticion')




@section('content')

    @if(Session::has('create_peticion'))

        <p class="bg-success">{{session('create_peticion')}}</p>

    @endif

    <div class="row">
        <div class="col-sm-4">
            {!! Form::open(['method' =>'POST','action'=>'PeticionController@store']) !!}

            <div class="form-group">
                {!! Form::label('responsable_id', 'Responsable:') !!}
                {!! Form::select('responsable_id', ['' => 'Elige un responsable'] + $responsables, null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('ug', 'Ug:') !!}
                {!! Form::text('ug', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_grupo', 'Id del grupo:') !!}
                {!! Form::text('id_grupo', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('id_cliente', 'Id del cliente:') !!}
                {!! Form::text('id_cliente', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('producto', 'Producto:') !!}
                {!! Form::text('producto', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('tarifa', 'Tarifa:') !!}
                {!! Form::text('tarifa', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('rentabilidad', 'rentabilidad:') !!}
                {!! Form::text('rentabilidad', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reciprocidad', 'Reciprocidad:') !!}
                {!! Form::text('reciprocidad', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('reciprocidad_num', 'Reciprocidad Numero:') !!}
                {!! Form::text('reciprocidad_num', null, ['class'=>'form-control']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('argumento', 'Argumento:') !!}
                {!! Form::textarea('argumento', null, ['class'=>'form-control', 'rows' => 3]) !!}
            </div>
            <div class="form-group">
                {!! Form::submit('Crear Peticion', ['class'=>'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>
        <div class="col-sm-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Responsable</th>
                        <th>Cliente</th>
                        <th>Producto</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                @if($peticiones)
                    @foreach($peticiones as $peticion)
                        <tr>
                            <td>{{$peticion->id}}</td>
                            <td>{{$peticion->responsable['name']}}</td>
                            <td>{{$peticion->id_cliente}}</td>
                            <td>{{$peticion->producto}}</td>
                            <td>
                                @if($peticion->status == 0)
                                    Pendiente
                                @elseif($peticion->status == 1)
                                    En Proceso
                                @else
                                    Finalizada
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endif
                </tbody>
            </table>
            <div class="row">
                <div class="col-sm-6 col-sm-offset-5">
                    {{$peticiones->links()}}
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('js/home.js')}}"></script>
@endsection
