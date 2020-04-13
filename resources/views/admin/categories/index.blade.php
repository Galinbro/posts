@extends('layouts.admin')

@section('content')

    <div class="row">
        <div class="col-sm-4">
            <h1>Categorias</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'categories.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}

            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Nombre de categoria']) !!}
                {!! Form::select('category',[''=>'Seleccione un grupo', 1=> 'Productos', 2=>'Control Interno', 3=>'Experiencia Unica'], null, ['class'=>'form-control']) !!}
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
            {!! Form::open(['method' =>'POST','action'=>'AdminCategoriesController@store']) !!}

                <div class="form-group">
                    {!! Form::label('name', 'Nombre:') !!}
                    {!! Form::text('name', null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('group', 'Grupo:') !!}
                    {!! Form::select('group', [''=> 'Selecciones un grupo', 1=>'Productos', 2=>'Control Interno',3=>'One Team'] ,null, ['class'=>'form-control']) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Crear categoria', ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}

            @include('includes.form_errors')
        </div>
        <div class="col-sm-6">
            @if($categories)



                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>nombre</th>
                        <th>Grupo</th>
                        <th>creado</th>
                        <th>Actualizado</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($categories as $category)
                        <tr>
                            <td>{{$category->id}}</td>
                            <td><a href="{{route('categories.edit', $category->id)}}">{{$category->name}}</a></td>
                            <td>
                                @if($category->group == 1)
                                    Productos
                                @elseif($category->group == 2)
                                    Control Interno
                                @else
                                    One Team
                                @endif
                            </td>
                            <td>{{$category->created_at ? $category->created_at->diffForhumans() : 'Sin fecha'}}</td>
                            <td>{{$category->updated_at ? $category->updated_at->diffForhumans() : 'Sin fecha'}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-sm-6 col-sm-offset-5">
                        {{$categories->links()}}
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
                    window.location.href = "{{URL::to('admin/categories')}}"
                });
                $("div.form-group select").val('{{$selected}}');
            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
