@extends('layouts.admin')
@section('title','Clientes')
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
            Editar Cliente
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Cliente</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Cliente</h4>
                    </div>
                    {!! Form::model($client,['route'=>['clients.update', $client], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$client->name}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="cedula">Cedula</label>
                            <input type="number" name="cedula" id="cedula" value="{{$client->cedula}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="rif_number">RIF</label>
                            <input type="number" name="rif_number" id="rif_number" value="{{$client->rif_number}}" class="form-control" placeholder="">
                            <small id="helpId" class="form text text-muted">Opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Dirección</label>
                            <input type="text" name="address" id="address" value="{{$client->address}}" class="form-control" placeholder="">
                            <small id="helpIp" class="form text text-muted">Opcional</small>
                        </div>
                        <div class="form-group">
                            <label for="address">Teléfono</label>
                            <input type="number" name="phone" id="phone" value="{{$client->phone}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="address">Email</label>
                            <input type="email" name="email" id="email" value="{{$client->email}}" class="form-control" placeholder="">
                        </div>
                    
                        {{-- <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" name="image" id="image" lang="es">
                            <label class="custom-file-label" for="image">Seleccionar Archivo</label>
                        </div> --}}
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                        <a href="{{route('clients.index')}}" class="btn btn-light">Cancelar</a>
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