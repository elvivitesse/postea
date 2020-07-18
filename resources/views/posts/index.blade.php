@extends('layouts.app')

@section('content')
<div class="container">
    @foreach ($publicaciones as $publicacion)
    <div class="row mb-4 justify-content-md-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">
                        <a href="{{ action('PostController@show', $publicacion->id) }}">{{$publicacion->title}}</a>
                    </h5>
                </div>
                <img src="{{ Storage::url($publicacion->image) }}" class="card-img-top" alt="...">
                <!-- se verifica si el usuario esta autenticado o iniciado secion  -->
                @guest
                @else
                <!-- se verifica si la publicacion pertenece al usuario autenticado para poder poner si boton para borrar -->
                @if(Auth::user()->id == $publicacion->user_id)
                <form method="POST" action='{{ url("delete/{$publicacion->id}") }}'>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary">Eliminar</button>
                </form>
                @else
                @endif
                @endguest
            </div>
        </div>
    </div>
    @endforeach
    {{$publicaciones->links()}}
</div>
@endsection


@section('navbar')
<!-- Los posts del usuario  -->
@parent
<!-- boton para la pagina que crea un uevo post para el usuario -->
<li class="nav-item">
    <a class="nav-link" href="{{ action('PostController@create') }}">{{ __('Crear') }}</a>
</li>
<!-- boton o link para poder ver todos los posts del usuario logueado  -->
<li class="nav-item">
    <a class="nav-link" href="{{ action('PostController@userPosts') }}">{{ __('Mis Posts') }}</a>
</li>
<li class="nav-item">
    <button type="button" class="btn btn-primary">
    <span class="badge badge-light">9</span>
    <span class="sr-only">{{ $publicacion->title }}</span>
    </button>
</li>

@auth
<!-- boton para poder actiualizar los datos del usuario  -->
<li class="nav-item">
    <a class="btn btn-primary" class="nav-link"
        href="{{ action('PostController@config', Auth::user()->id) }}">{{ __('Actualizar cuenta') }}</a>
</li>
@endauth
@endsection