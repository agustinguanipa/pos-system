@extends('layouts.admin')
@section('title','Ventas')
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
            Detalle de Venta #{{$sale->id}}
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li> <li class="breadcrumb-item"><a href="{{route('sales.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{$sale->id}}</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>Cliente</strong></label>
                            <p><a href="{{route('clients.show', $sale->client)}}">{{$sale->client->name}}</a></p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Vendedor</strong></label>
                            <p>{{$sale->user->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Nº de Venta</strong></label>
                            <p>{{$sale->id}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row ">
                        <h4 class="card-title ml-3">Detalles de Venta</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Precio de Venta ($)</th>
                                        <th>Descuento ($)</th>
                                        <th>Cantidad</th>
                                        <th>Sub-Total ($)</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">SUBTOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">$ {{number_format($subtotal,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL IMPUESTO ({{$sale->tax}}%):</p>
                                        </th>
                                        <th>
                                            <p align="right">$ {{number_format($subtotal*$sale->tax/100,2)}}</p>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">$ {{number_format($sale->total,2)}}</p>
                                        </th>
                                    </tr>
                    
                                </tfoot>
                                <tbody>
                                    @foreach($SaleDetails as $SaleDetail)
                                    <tr>
                                        <td>{{$SaleDetail->product->name}}</td>
                                        <td>$ {{$SaleDetail->price}}</td>
                                        <td>{{$SaleDetail->discount}} %</td>
                                        <td>{{$SaleDetail->quantity}}</td>
                                        <td>$ {{number_format($SaleDetail->quantity * $SaleDetail->price - $SaleDetail->quantity * $SaleDetail->price * $SaleDetail->discount/100,2)}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer info-text">
                    <a href="{{route('sales.index')}}" class="btn btn-primary float-left">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
@section('scripts')
{!! Html::script('melody/j$ profile-demo.js') !!}
{!! Html::script('melody/j$ data-table.js') !!}
@endsection
