@extends('layouts.admin')
@section('title','Productos')
@section('styles')
<style type="text/css">
    .unstyled-button {
        border: none;
        padding: 0;
        background: none;
      }
</style>

@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Registrar Producto
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item"><a href="{{route('products.index')}}">Productos</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar Producto</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar Producto</h4>
                    </div>
                    {!! Form::open(['route'=>'products.store', 'method'=>'POST', 'files' => true]) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="code">Código de Barras</label>
                            <input type="text" name="code" id="code" class="form-control" placeholder="">
                            <small id="helpId" class="form text text-muted">Opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="sell_price">Precio de Venta</label>
                            <input type="number" name="sell_price" id="sell_price" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Categoría</label>
                            <select class="form-control" name="category_id" id="category_id">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="provider_id">Proveedor</label>
                            <select class="form-control" name="provider_id" id="provider_id">
                                @foreach ($providers as $provider)
                                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{-- <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="picture" id="picture" lang="es">
                            <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                        </div> --}}
                        <div class="form-group">
                            <div class="card">
                                <div class="card-body">
                                <h4 class="card-title d-flex">Imagen
                                    <small class="ml-auto align-self-end">
                                    <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                                    </small>
                                </h4>
                                <input type="file" class="dropify" name="picture" id="picture"/>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('products.index')}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$categories->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
{!! Html::script('template/js/dropify.js') !!}
@endsection