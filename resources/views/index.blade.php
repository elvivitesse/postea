<!--  
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <title>Mi app de Larabel</title>
</head>

<body>
    <div class="jumbotron jumbotron-fluid">
        <div class="container text-center">
            <h1 class="display-4">¡POSTEA!</h1>
        </div>
    </div>              -->
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
                    <img src="{{ asset($publicacion->image)}}" class="card-img-top" alt="...">
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

<!--   
</body>

</html>

-->