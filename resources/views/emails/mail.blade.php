Hola <strong>{{ $name }}</strong>!

<p>{{$body}}</p>

@if($comentario)
    <p>{{$comentario}}</p>
@endif

@if($datos)

    @foreach($datos as $dato)
        <p>{{$dato}}</p>
    @endforeach

@endif



<p>Por parte del staff de BEyG división sureste, tenga un excelente día.</p>
