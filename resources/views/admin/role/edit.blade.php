@extends('layouts.admin')
@section('title','Roles del Sistema')
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
            Editar Rol del Sistema
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item"><a href="{{route('roles.index')}}">Roles del Sistema</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Rol del Sistema</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Rol del Sistema</h4>
                    </div>
                    {!! Form::model($role,['route'=>['roles.update', $role], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$role->name}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="slug">Slug</label>
                            <input type="text" name="slug" id="slug" value="{{$role->slug}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Descripción</label>
                            <textarea type="text" name="description" id="description" class="form-control" rows="3">{{$role->description}}</textarea>
                        </div>
                        @include('admin.role._form')
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                        <a href="{{route('roles.index')}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$roles->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
@endsection