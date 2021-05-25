@extends('layouts.admin')
@section('title','Compras')
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
            Compras
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active" aria-current="page">Compras</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Compras</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group mb-2">
                            <a href="{{route('purchases.create')}}" class="btn btn-primary"><i class="fas fa-plus"></i> Agregar</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="order-listing" class="table">
                            <thead>
                                <tr class="bg-primary text-white">
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Total</th>
                                    <th>Status</th>
                                    <th style="width: 15px;">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                <tr>
                                    <td>
                                        <a href="{{route('purchases.show',$purchase)}}">{{$purchase->id}}</a>
                                    </td>
                                    <td>{{$purchase->purchase_date}}</td>
                                    <td>{{$purchase->total}}</td>
                                    @if ($purchase->status == 'VALID')
                                    <td>
                                        <a class="btn btn-success btn-sm change-status" href="{{route('change.status.purchases', $purchase)}}" title="Status">
                                            <i class="fas fa-check"></i> VÁLIDA
                                        </a>
                                    </td>
                                    @else
                                    <td>
                                        <a class="btn btn-danger btn-sm change-status" href="{{route('change.status.purchases', $purchase)}}" title="Status">
                                            <i class="fas fa-times"></i> CANCELADA
                                        </a>
                                    </td>
                                    @endif
                                    <td style="width: 50px;">
                                        {{-- <a class="jsgrid-button jsgrid-edit-button" href="{{route('purchases.edit', $purchase)}}" title="Editar">
                                            <i class="far fa-edit"></i>
                                        </a> --}}
                                        {{-- <button class="jsgrid-button jsgrid-delete-button unstyled-button" type="submit" title="Eliminar">
                                            <i class="far fa-trash-alt"></i>
                                        </button> --}}
                                        <a href="{{route('purchases.show',$purchase)}}" class="jsgrid-button jsgrid-edit-button show"><i class="far fa-eye"></i></a>
                                        <a href="{{route('purchases.pdf',$purchase)}}" class="jsgrid-button jsgrid-edit-button pdf"><i class="far fa-file-pdf"></i></a>
                                        <a href="#" class="jsgrid-button jsgrid-edit-button print"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$purchases->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
@endsection