@extends('layouts.app')

@section('template_title')
    {{ $product->name ?? 'Detalle Producto' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Detalle Producto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('products.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $product->name }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $product->quantity }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $product->usuario()->name }}
                        </div>
                        <div class="form-group">
                            <strong>Categoría:</strong>
                            {{ $product->category()->name }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
