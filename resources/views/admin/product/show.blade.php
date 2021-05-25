@extends('layouts.admin')
@section('title','Productos')
@section('styles')
<style type="text/css">
    .info-text {
        font-size: 16px;
      }
</style>
@endsection
@section('create')

@endsection
@section('options')

@endsection
@section('preference')

@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            {{$product->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li> <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$product->name}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="border-bottom text-center pb-4">
                                <h3>{{$product->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom text-center py-4">
                                <img src="{{asset('image/'.$product->image)}}" alt="Product Image" class="img-lg mb-3"/>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="py-4">
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Status
                                        </span>
                                        <span class="float-right text-muted">
                                            {{$product->status}}
                                        </span>
                                    </p>
                                        <p class="clearfix">
                                        <span class="float-left">
                                            Categoría
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="{{route('categories.show',$product->category->id)}}">
                                                {{$product->category->name}}
                                            </a>
                                        </span>
                                    </p>
                                    <p class="clearfix">
                                        <span class="float-left">
                                            Proveedor
                                        </span>
                                        <span class="float-right text-muted">
                                            <a href="{{route('providers.show',$product->provider->id)}}">
                                                {{$product->provider->name}}
                                            </a>
                                        </span>
                                    </p>
                                </div>
                                @if ($product->status == 'ACTIVE')
                                    <a class="btn btn-success btn-block change-status" href="{{route('change.status.products', $product)}}" title="Status">
                                        <i class="fas fa-check"></i> ACTIVO
                                    </a>
                                @else
                                    <a class="btn btn-danger btn-block change-status" href="{{route('change.status.products', $product)}}" title="Status">
                                        <i class="fas fa-times"></i> DESACTIVADO
                                    </a>
                                @endif 
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del Producto</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-barcode mr-1"></i> Código</strong>
                                        <p class="info-text">
                                            {{$product->code}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-barcode mr-1"></i> Código de Barras</strong>
                                        <p class="info-text">
                                            {!! DNS1D::getBarcodeHTML($product->code, 'EAN13'); !!}
                                        </p>
                                        <hr>
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                        <p class="info-text">
                                            {{$product->name}}
                                        </p>
                                    </div>
                                    <div class="form-group col-md-6"> 
                                        <strong><i class="fas fa-boxes mr-1"></i> Stock</strong>
                                        <p class="info-text">
                                            {{$product->stock}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-dollar-sign mr-1"></i> Precio de Venta</strong>
                                        <p class="info-text">
                                            {{$product->sell_price}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer info-text">
                    <a href="{{route('products.index')}}" class="btn btn-primary float-left">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/js/profile-demo.js') !!}
{!! Html::script('melody/js/data-table.js') !!}
@endsection
