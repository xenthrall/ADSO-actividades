@extends('layouts.app')

@section('title')
        Welcome
@endsection

@section('titleContent')
    <div class="bg-primary text-center py-3">
        <h1 class="text-white">Dashboard</h1>
    </div>
@endsection

@section('content')
    <div class="container-fluid"> 
        <div class="row">
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Marcas</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="{{ Route('marcas.index') }}" class="btn btn-primary">Ir a Marcas</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Categorias</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="{{ route('categorias.index') }}" class="btn btn-primary">Ir a Categorias</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Productos</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card’s content.</p>
                        <a href="{{ route('productos.index') }}" class="btn btn-primary">Ir a Productos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection