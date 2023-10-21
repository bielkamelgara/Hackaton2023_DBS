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
                    <p class="card-text">{{ $product->description }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
        @endforeach
    </div>
@endsection

