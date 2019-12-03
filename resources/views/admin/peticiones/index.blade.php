@extends('layouts.admin')


@section('content')

    <div class="row">
        <div class="col-sm-4">
            <h1>Peticiones</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'peticiones.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
                <div class="row">
                    <div class="form-group">
                        <div class="col">
                            {!! Form::select('resposable',[''=>'Seleccione un responsable'] + $responsables, null, ['class'=>'form-control']) !!}
                            {!! Form::select('cr',[''=>'Seleccione un CR'] + $cr, null, ['class'=>'form-control']) !!}
                            {!! Form::select('emisor',[''=>'Seleccione un emisor'] + $emisor, null, ['class'=>'form-control']) !!}
                        </div>
                        <div class="col">
                            {!! Form::select('cliente',[''=>'Seleccione un cliente'] + $cliente, null, ['class'=>'form-control']) !!}
                            {!! Form::select('status',[''=>'Seleccione un status'], null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                </div>
                <div class="row" style="margin-top: 1em;">
                        <div class="col-sm-10">
                            <div class="checkbox-inline">
                                {!! Form::input('checkbox', 'pendientes', 0, ['class'=>'form-check-input', 'id'=>'inlineCheckbox1','checked']) !!}
                                <label class="form-check-label" for="inlineCheckbox1">Pendientes</label>
                            </div>
                            <div class="checkbox-inline">
                                {!! Form::input('checkbox', 'proceso', 1, ['class'=>'form-check-input', 'id'=>'inlineCheckbox2','checked']) !!}
                                <label class="form-check-label" for="inlineCheckbox2">Proceso</label>
                            </div>
                            <div class="checkbox-inline">
                                {!! Form::input('checkbox', 'finalizadas', 2, ['class'=>'form-check-input', 'id'=>'inlineCheckbox3', 'checked']) !!}
                                <label class="form-check-label" for="inlineCheckbox3">Finalizadas</label>
                            </div>
                            <div class="checkbox-inline">
                                {!! Form::input('checkbox', 'correcciones', 3, ['class'=>'form-check-input', 'id'=>'inlineCheckbox4', 'checked']) !!}
                                <label class="form-check-label" for="inlineCheckbox4">Correciones</label>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            <div class="row">
                                <button type="submit" class="btn btn-default">Buscar</button>
                                <i class="fa fa-filter" aria-hidden="true" id="filter"></i>
                            </div>
                        </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>

    @if(Session::has('update_peticion'))

        <p class="bg-success">{{session('update_peticion')}}</p>

    @endif

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha de emision</th>
                    <th>Ultimo cambio</th>
                    <th>Responsable</th>
                    <th>Cr</th>
                    <th>Emisor</th>
                    <th>Cliente</th>
                    <th>Estatus</th>
                </tr>
                </thead>
                <tbody>
                @if($peticiones)
                    @foreach($peticiones as $peticion)
                        <tr>
                            <td>{{$peticion->id}}</td>
                            <td>{{$peticion->created_at->diffForhumans()}}</td>
                            <td>{{$peticion->updated_at->diffForhumans()}}</td>
                            <td>{{$peticion->responsable['name']}}</td>
                            <td>{{$peticion->ug}}</td>
                            <td>{{$peticion->user->name}}</td>
                            <td><a href="{{route('peticiones.show', $peticion->id)}}">{{Illuminate\Support\Str::limit($peticion->nb_cliente, 40)}}</a></td>
                            <td>
                                <a href="{{route('peticiones.edit', $peticion->id)}}">
                                    @if($peticion->status == 0)
                                        Pendiente
                                    @elseif($peticion->status == 1)
                                        En Proceso
                                    @elseif($peticion->status == 2)
                                        Finalizada
                                    @else
                                        Correciones
                                    @endif
                                </a>
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

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.location.href.indexOf("?") > -1) {
                $('#filter').attr('class', 'fa fa-filter');
                $("#filter").click(function () {
                    window.location.href = "{{URL::to('admin/peticiones')}}"
                });
            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
