@extends('layouts.admin')
@section('title','Reporte de Ventas por Rango de Fecha')
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
            Reporte de Ventas por Rango de Fecha
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel de Administración</a></li>
                <li class="breadcrumb-item active" aria-current="page">Reporte de Ventas por Rango de Fecha</li>
            </ol>
        </nav>
    </div>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Reporte de Ventas por Rango de Fecha</h4>
                        {{--  <i class="fas fa-ellipsis-v"></i>  --}}
                        <div class="btn-group">
                            <a data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-ellipsis-v"></i>
                            </a>
                            {{--<div class="dropdown-menu dropdown-menu-right">
                                <a href="{{route('sales.create')}}" class="dropdown-item">Registrar</a>
                                { <button class="dropdown-item" type="button">Another action</button>
                                <button class="dropdown-item" type="button">Something else here</button>
                                
                            </div> --}} 
                        </div>
                    </div>
                    {!! Form::open(['route'=>'report.results', 'method'=>'POST']) !!}
                    <div class="row ">
                        <div class="col-12 col-md-3">
                            <span>Fecha Inicial</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_ini')}}" 
                                name="fecha_ini" id="fecha_ini">
                            </div>
                        </div>
                        <div class="col-12 col-md-3">
                            <span>Fecha Final</span>
                            <div class="form-group">
                                <input class="form-control" type="date" 
                                value="{{old('fecha_fin')}}" 
                                name="fecha_fin" id="fecha_fin">
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center mt-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-sm">Consultar</button>
                            </div>
                        </div>
                        <div class="col-12 col-md-3 text-center">
                            <span>Total de Ingresos: <b> </b></span>
                            <div class="form-group">                              
                                <strong>$ {{$total}}</strong>                          
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
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
                                @foreach ($sales as $sale)
                                <tr>
                                    <td>
                                        <a href="{{route('sales.show',$sale)}}">{{$sale->id}}</a>
                                    </td>
                                    <td>
                                        {{\Carbon\Carbon::parse($sale->sale_date)->format('d M y h:i a')}}
                                    </td>
                                    <td>{{$sale->total}}</td>
                                    <td>{{$sale->status}}</td>
                                    <td style="width: 50px;">
                                        <a href="{{route('sales.show',$sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-eye"></i></a>
                                        <a href="{{route('sales.pdf',$sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="far fa-file-pdf"></i></a>
                                        <a href="{{route('sales.print',$sale)}}" class="jsgrid-button jsgrid-edit-button"><i class="fas fa-print"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                {{--  <div class="card-footer text-muted">
                    {{$sales->render()}}
                </div>  --}}
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
{!! Html::script('template/js/data-table.js') !!}
<script>
    window.onload = function(){
        var fecha = new Date(); //Fecha actual
        var mes = fecha.getMonth()+1; //obteniendo mes
        var dia = fecha.getDate(); //obteniendo dia
        var ano = fecha.getFullYear(); //obteniendo año
        if(dia<10)
          dia='0'+dia; //agrega cero si el menor de 10
        if(mes<10)
          mes='0'+mes //agrega cero si el menor de 10
        document.getElementById('fecha_fin').value=ano+"-"+mes+"-"+dia;
      }
</script>
@endsection