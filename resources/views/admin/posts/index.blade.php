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

    <h1>Posts</h1>

   <table class="table table-striped">
       <thead>
           <tr>
               <th>Id</th>
               <th>Foto</th>
               <th>Usuario</th>
               <th>Categoria</th>
               <th>Titulo</th>
               <th>Cuerpo</th>
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
                       <td><a href="{{route('posts.edit', $post->id)}}">{{$post->user->name}}</a></td>
                       <td>{{$post->category ? $post->category->name : 'Sin categoria'}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{Str::limit($post->body,25)}}</td>
                       <td>{{$post->created_at->diffForhumans()}}</td>
                       <td>{{$post->updated_at->diffForhumans()}}</td>
                   </tr>
               @endforeach
            @endif
       </tbody>
   </table>

@endsection
