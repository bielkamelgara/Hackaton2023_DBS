@extends('layouts.app')

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Información del') }} Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('product.index') }}"> {{ __('Regresar') }}</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Descripción:</strong>
                            {{ $product->description }}
                        </div>
                        <div class="form-group">
                            <strong>Precio:</strong>
                            {{ $product->price }}
                        </div>
                        <div class="form-group">
                            <strong>Talla:</strong>
                            {{ $product->size }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $product->color }}
                        </div>
                        <div class="form-group">
                            <strong>Disponibilidad:</strong>
                            {{ $product->avilable }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $product->ammount }}
                        </div>
                        <div class="form-group">
                            <strong>Muestra:</strong>
                            {{ $product->photo }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $product->status }}
                        </div>
                        <div class="form-group">
                            <strong>Emprendedor:</strong>
                            {{ $product->id_user }}
                        </div>
                        <div class="form-group">
                            <strong>Sector:</strong>
                            {{ $product->id_sector }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
