@extends('layouts.admin')

@section('content')

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
                       <td>{{$post->user->name}}</td>
                       <td>{{$post->category_id}}</td>
                       <td>{{$post->title}}</td>
                       <td>{{$post->body}}</td>
                       <td>{{$post->created_at->diffForhumans()}}</td>
                       <td>{{$post->updated_at->diffForhumans()}}</td>
                   </tr>
               @endforeach
            @endif
       </tbody>
   </table>

@endsection
