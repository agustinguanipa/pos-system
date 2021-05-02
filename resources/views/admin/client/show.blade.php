@extends('layouts.admin')
@section('title','Clientes')
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
            {{$client->name}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li> <li class="breadcrumb-item"><a href="{{route('clients.index')}}">Clientes</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$client->name}}</li>
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
                                <h3>{{$client->name}}</h3>
                                <div class="d-flex justify-content-between">
                                </div>
                            </div>
                            <div class="border-bottom py-4">
                                <div class="list-group">
                                    <button type="button" class="list-group-item list-group-item-action active btn btn-primary">
                                        Sobre el Cliente
                                    </button>
                                    <button type="button"
                                        class="list-group-item list-group-item-action">Historial de Compras</button>
                                    <button type="button" class="list-group-item list-group-item-action">Registrar
                                        Producto</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 pl-lg-5">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h4>Información del Cliente</h4>
                                </div>
                            </div>
                            <div class="profile-feed">
                                <div class="d-flex align-items-start profile-feed-item">
                                    <div class="form-group col-md-6">
                                        <strong><i class="fab fa-product-hunt mr-1"></i> Nombre</strong>
                                        <p class="info-text">
                                            {{$client->name}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i> Cédula de Identidad</strong>
                                        <p class="info-text">
                                            {{$client->cedula}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-address-card mr-1"></i> RIF</strong>
                                        <p class="info-text">
                                            {{$client->rif_number}}
                                        </p>
                                        <hr>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <strong><i class="fas fa-mobile mr-1"></i>Teléfono</strong>
                                        <p class="info-text">
                                            {{$client->phone}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i> E-Mail</strong>
                                        <p class="info-text">
                                            {{$client->email}}
                                        </p>
                                        <hr>
                                        <strong><i class="fas fa-map-marked-alt mr-1"></i> Dirección</strong>
                                        <p class="info-text">
                                            {{$client->address}}
                                        </p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer info-text">
                    <a href="{{route('clients.index')}}" class="btn btn-primary float-left">Regresar</a>
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
