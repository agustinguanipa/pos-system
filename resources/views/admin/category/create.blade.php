@extends('layouts.admin')
@section('title','Categorías')
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
            Registrar Categoría
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item"><a href="{{route('categories.index')}}">Categorías</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registrar Categoría</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registrar Categoría</h4>
                    </div>
                    {!! Form::open(['route'=>'categories.store', 'method'=>'POST']) !!}
                        @include('admin.category._form')
                        <button type="submit" class="btn btn-primary mr-2">Registrar</button>
                        <a href="{{route('categories.index')}}" class="btn btn-light">Cancelar</a>
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
@endsection