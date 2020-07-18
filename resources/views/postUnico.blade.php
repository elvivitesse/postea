@extends('layouts.app')
@section('comentario')
<li class="media">
    <img src="" class="mr-3" alt="...">
    <div class="media-body">
        <h5 class="mt-0 mb-1">comentario uno</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin.
    </div>
</li>
<a href="#" class="card-link">Contestar</a>
<li class="media my-4">
    <img src="..." class="mr-3" alt="...">
    <div class="media-body">
        <h5 class="mt-0 mb-1">comentario dos</h5>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio,
        vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec
        lacinia congue felis in faucibus.
    </div>
</li>
@endsection
@section('content')
<div class="container">
    <div class="row mb-4 justify-content-md-center">
        <div class="col-md-8">
            <div class="card">
                <img src="{{ asset($post->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $post->created_at}}</h6>
                    <p class="card-text">{{ $post->content}}</p>
                    <a href="{{ action('PostController@index')}}" class="card-link">Todas las publicaciones</a>
                    @guest
                    <p></p>
                    <h5 class="card-title">Comentarios</h5>

                    <ul class="list-unstyled">
                        @yield('comentario')
                    </ul>
                    <a href="#" class="card-link">Contestar</a>
                    @else
                    <p></p>
                    <h5 class="card-title">Comentarios</h5>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" placeholder="Agrega un comentario público…"
                            aria-label="Recipient's username" aria-describedby="button-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="button-addon2">Comentar</button>
                        </div>
                    </div>
                    <ul class="list-unstyled">
                        @yield('comentario')
                    </ul>
                    <a href="#" class="card-link">Contestar</a>
                    @endguest
                </div>
            </div>
        </div>
    </div>
</div>
@endsection