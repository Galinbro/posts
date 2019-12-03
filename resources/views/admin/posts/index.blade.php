@extends('layouts.admin')

@section('content')

    @if(Session::has('deleted_blog'))

        <p class="bg-danger">{{session('deleted_blog')}}</p>

    @endif

    @if(Session::has('create_blog'))

        <p class="bg-success">{{session('create_blog')}}</p>

    @endif

    @if(Session::has('edit_blog'))

        <p class="bg-success">{{session('edit_blog')}}</p>

    @endif

    <div class="row">
        <div class="col-sm-4">
            <h1>Usuarios</h1>
        </div>
        <div class="col-sm-8">
            {!! Form::open(['route' =>'posts.index', 'method'=> 'GET', 'class'=>'navbar-form navbar-left pull-right', 'role' => 'search']) !!}
            <div class="row">
                <div class="form-group">
                    {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Titulo de post']) !!}
                    {!! Form::select('category',[''=>'Seleccione una categoria'] + $categories, null, ['class'=>'form-control']) !!}
                    {!! Form::select('emisor',[''=>'Seleccione un usuario'] + $emisor, null, ['class'=>'form-control']) !!}
                </div>
            </div>
            <div class="row pull-right">
                <div class="form-group">
                    <button type="submit" class="btn btn-default">Buscar</button>
                </div>
                <i class="fa fa-filter" aria-hidden="true" id="filter"></i>
                {!! Form::close() !!}
            </div>
        </div>
    </div>



   <table class="table table-striped" id="posts">
       <thead>
           <tr>
               <th>Id</th>
               <th>Foto</th>
               <th>Titulo</th>
               <th>Usuario</th>
               <th>Categoria</th>
               <th>link</th>
               <th>Creado</th>
               <th>Actualizado</th>
           </tr>
       </thead>
       <tbody>
            @if($posts)
                @foreach($posts as $post)
                   <tr>
                       <td>{{$post->id}}</td>
                       <td><img height="50" src="{{$post->photo ? $post->photo->file : 'http://placehold.it/400x400' }}" alt=""></td>
                       <td><a href="{{route('posts.edit', $post->id)}}">{{$post->title}}</a></td>
                       <td>{{$post->user->name}}</td>
                       <td>{{$post->category ? $post->category->name : 'Sin categoria'}}</td>
                       <td>{{Str::limit($post->archivo->file,40)}}</td>
                       <td>{{$post->created_at->diffForhumans()}}</td>
                       <td>{{$post->updated_at->diffForhumans()}}</td>
                   </tr>
               @endforeach
            @endif
       </tbody>
   </table>

    <div class="row">
        <div class="col-sm-6 col-sm-offset-5">
            {{$posts->links()}}
        </div>
    </div>

@endsection

@section('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            if (window.location.href.indexOf("?") > -1) {
                $('#filter').attr('class', 'fa fa-filter');
                $("#filter").click(function () {
                    window.location.href = "{{URL::to('admin/posts')}}"
                });
            }else{
                $('#filter').attr('class', '');
            }
        });
    </script>
@endsection
