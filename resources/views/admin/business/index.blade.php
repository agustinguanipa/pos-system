@extends('layouts.admin')
@section('title','Empresa')
@section('styles')
@endsection
@section('options')
@endsection
@section('preference')
@endsection
@section('content')
<div class="content-wrapper">
    <div class="page-header">
        <h3 class="page-title">
            Empresa
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active" aria-current="page">Empresa</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Empresa</h4>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <strong><i class="fas fa-building mr-1"></i> Nombre</strong>
                            <p class="info-text">
                                {{$business->name}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-stream mr-1"></i> Descripción</strong>
                            <p class="info-text">
                                {{$business->description}}
                            </p>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <strong><i class="fas fa-exclamation-circle mr-1"></i> Logo</strong><br>
                                </div>
                                <div class="col-md-6">
                                    <img style="width:50px ; height:50px ;" src="{{asset('image/'.$business->logo)}}"
                                        class="rounded float-left" alt="logo">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-6"> 
                            <strong><i class="fas fa-map-marker-alt mr-1"></i> Dirección</strong>
                            <p class="info-text">
                                {{$business->address}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-at mr-1"></i> E-Mail</strong>
                            <p class="info-text">
                                {{$business->email}}
                            </p>
                            <hr>
                            <strong><i class="fas fa-address-card mr-1"></i> RIF</strong>
                            <p class="info-text">
                                {{$business->rif_number}}
                            </p>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal-2">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Actualizar Datos de la Empresa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            {!! Form::model($business,['route'=>['business.update',$business], 'method'=>'PUT','files' => true]) !!}
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$business->name}}"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="description">Descripción</label>
                    <textarea class="form-control" name="description" id="description"
                        rows="3">{{$business->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="mail">E-Mail</label>
                    <input type="email" class="form-control" name="mail" id="mail" value="{{$business->mail}}"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="address">Dirección</label>
                    <input type="text" class="form-control" name="address" id="address" value="{{$business->address}}"
                        aria-describedby="helpId">
                </div>
                <div class="form-group">
                    <label for="rif_number">RIF</label>
                    <input type="text" class="form-control" name="rif_number" id="rif_number" value="{{$business->rif_number}}"
                        aria-describedby="helpId">
                </div>
                <div class="card-body">
                    <h5 class="card-title d-flex">Logo
                        <small class="ml-auto align-self-end">
                            <a href="dropify.html" class="font-weight-light" target="_blank">Seleccionar Archivo</a>
                        </small>
                    </h5>
                    <input type="file" name="picture" id="picture" class="dropify" />
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
{!! Html::script('template/js/dropify.js') !!}
@endsection