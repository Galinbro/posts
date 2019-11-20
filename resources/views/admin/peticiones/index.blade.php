@extends('layouts.admin')


@section('content')

    <h1>Peticiones</h1>

    @if(Session::has('create_peticion'))

        <p class="bg-success">{{session('create_peticion')}}</p>

    @endif

    <div class="row">
        <div class="col">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Fecha de emision</th>
                    <th>Fecha de cambio de estado</th>
                    <th>Responsable</th>
                    <th>ug</th>
                    <th>Emisor</th>
                    <th>Status</th>
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
