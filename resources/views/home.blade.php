@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('info'))
                        <div class="alert alert-success" role="alert">
                                    {{ session('info') }}
                        </div>
                    @endif
                </div>
                <div class="card-header">Menu</div>
                <p>
                    <a href="#">
                    <img src="images/index3.png" title="Mis citas"
                        width="85" height="68">
                        mis citas
                    </a>
                </p>
                <p>
                    <a href="{{ route('cars.index') }}">
                    <img src="images/coche.png" title="Mis coches"
                        width="85" height="68">
                        mis coches
                    </a>
                </p>
                <p>
                    <a href="{{ route('facturas.index') }}">
                    <img src="images/factura.png" title="Mis facturas"
                        width="85" height="68">
                        mis facturas
                    </a>
                </p>
            </div>

            </div>
        </div>
        <div class="card">
            @auth()
            <div class="links">
                <a href="{{ route('cars.index') }}">
                    <img src="images/coche.png" title="Mis coches"
                        width="85" height="68">
                </a>
                <a href="#">
                    <img src="images/index3.png" title="Mis citas"
                        width="85" height="68">
                </a>
            </div>
            @endauth
            <div class="links">
                <a href="https://laravel.com/docs">Docs</a>
                <a href="https://laracasts.com">Laracasts</a>
                <a href="https://laravel-news.com">News</a>
                <a href="https://blog.laravel.com">Blog</a>
                <a href="https://nova.laravel.com">Nova</a>
                <a href="https://forge.laravel.com">Forge</a>
                <a href="https://github.com/laravel/laravel">GitHub</a>
            </div>
        </div>
        </div>
    </div>
</div>
@endsection
