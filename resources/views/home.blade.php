@extends('layouts.admin')

@section('title', 'Productos')
@section('content')
    <!-- cards -->
    <div class="show-post">
        @foreach ($products as $product)
            <div class="card" style="width: 18rem; margin: 1%;">
                <img src="{{ $product->url() }}" class="card-img-top" height="200" width="100" alt="{{ $product->url() }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $product->name }}</h5>
                    <h6 class="card'text">C$ {{$product->price}}</h6>
                    <p class="card-text">{{ $product->description }}</p>
                    <h6 class="card-title">{{ $product->avilable }}</h6>
                    <a href="chat" class="btn btn-primary">Ver Mensaje</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
