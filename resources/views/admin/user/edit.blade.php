@extends('layouts.admin')
@section('title','Usuarios del Sistema')
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
            Editar Usuario del Sistema
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item"><a href="{{route('users.index')}}">Usuarios del Sistema</a></li>
                <li class="breadcrumb-item active" aria-current="page">Editar Usuario del Sistema</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Editar Usuario del Sistema</h4>
                    </div>
                    {!! Form::model($user,['route'=>['users.update', $user], 'method'=>'PUT']) !!}
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" name="name" id="name" value="{{$user->name}}" class="form-control" placeholder="" required>
                        </div>
                        <div class="form-group">
                        <label for="email">E-Mail</label>
                        <input type="email" name="email" id="email" value="{{$user->email}}" class="form-control" placeholder="">
                        </div>
                        {{-- <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" name="password" id="password" class="form-control">
                            <small id="helpId" class="text-muted">Rellenar solo sí desea cambiar la contraseña</small>
                        </div> --}}
                        @include('admin.user._form')
                        <button type="submit" class="btn btn-primary mr-2">Editar</button>
                        <a href="{{route('users.index')}}" class="btn btn-light">Cancelar</a>
                    {!! Form::close() !!}
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$users->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
@endsection