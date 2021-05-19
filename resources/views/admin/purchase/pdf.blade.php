<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Reporte de Compra</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }
        p, label, span, table{
            font-size: 9pt;
        }
        .h2{
            font-size: 16pt;
        }
        .h3{
            font-size: 12pt;
            display: block;
            background: #007E33;
            color: #FFF;
            text-align: center;
            padding: 3px;
            margin-bottom: 5px;
        }
        #page_pdf{
            width: 95%;
            margin: 15px auto 10px auto;
        }

        #factura_head, #factura_cliente, #factura_detalle{
            width: 100%;
            margin-bottom: 10px;
        }
        .logo_factura{
            width: 25%;
        }
        .logo_factura1 img{
            width: 350px;
        }
        .info_empresa{
            width: 50%;
            text-align: center;
        }
        .info_factura{
            width: 25%;
        }
        .info_cliente{
            width: 100%;
        }
        .datos_cliente{
            width: 100%;
        }
        .datos_cliente tr td{
            width: 50%;
        }
        .datos_cliente{
            padding: 10px 10px 0 10px;
        }
        .datos_cliente label{
            width: 75px;
            display: inline-block;
            font-weight: bold;
        }
        .datos_cliente p{
            display: inline-block;
        }

        .textright{
            text-align: right;
        }
        .textleft{
            text-align: left;
        }
        .textcenter{
            text-align: center;
        }
        .round{
            border-radius: 10px;
            border: 1px solid #007E33;
            overflow: hidden;
            padding-bottom: 15px;
        }
        .round p{
            padding: 0 15px;
        }

        #factura_detalle{
            border-collapse: collapse;
        }
        #factura_detalle thead th{
            background: #6c757d;
            color: #FFF;
            padding: 5px;
        }
        #detalle_productos tr:nth-child(even) {
            background: #ededed;
        }
        #detalle_productos tr td {
            text-align: right;
        }
        .nota{
            font-size: 8pt;
        }
        .label_gracias{
            font-weight: bold;
            font-style: italic;
            text-align: center;
            margin-top: 20px;
        }
        .anulada{
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translateX(-50%) translateY(-50%);
        }
        .venta_detalle table{
            border-collapse: collapse;
            font-size: 12pt;
            font-family: 'Arial';
            width: 100%;
        }
        .venta_detalle table th{
            text-align: left;
            padding: 10px;
            background: #3d7ba8;
            color: #fff;
        }
        .venta_detalle table tr:nth-child(odd){
            background: #fff;
        }
        .venta_detalle table td{
            padding: 10px;
        }
        .pagada{
        font-size: 12pt;
        }
        .anulado{
        font-size: 12pt;
        }
        .titulo p{
            font-size: 15pt;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
<div id="page_pdf">
	<br><br><br>
	<table id="factura_head">
		<tr>
			<td class="logo_factura">
				<div>
					<img src="#" width="180px">
				</div>
			</td>
			<td class="info_empresa" colspan="2">		
                <div class="card">
                    <span class="h2">NOMBRE EMPRESA</span>
                    <p>SLOGAN</p>
                    <p>REGISTRO</p>
                    <p>TELEFONO</p>
                    <p>EMAIL</p>
                    <p>DIRECCION</p>
                </div>
			</td>
			<td class="info_factura">
				<div class="card">
					<div class="card-header">
						<span class="h3">Compra</span>
					</div>
					<div class="card-body">
						<p><b>No. Compra: </b><strong>{{$purchase->id}}</strong></p>
						<p><b>Fecha: </b>{{$purchase->id}}</p>
						<p>Hora: {{$purchase->id}}</p>
						<p>Comprador: {{$purchase->user->name}}</p>
					</div>
				</div>
			</td>
		</tr>
		<br><br><br><br><br>
		
	</table>
	<table id="factura_cliente">
		<tr>
			<td class="info_cliente">
				<div class="card">
					<div class="card-header">
						<span class="h3"><b>Proveedor</b></span>
					</div>
					<div class="card-body<">
						<table class="datos_cliente">
						<tr>
							<td><label>Cedula:</label><p>{{$purchase->provider->rif_number}}</p></td>
							<td><label>Teléfono:</label> <p>{{$purchase->provider->phone}}</p></td>
						</tr>
						<tr>
							<td><label>Nombre:</label> <p>{{$purchase->provider->name}}</p></td>
							<td><label>Dirección:</label> <p>{{$purchase->provider->address}}</p></td>
						</tr>
					</table>
					</div>
				</div>
			</td>
		</tr>
	</table>
		<br><br>
	<table id="factura_detalle">
			<thead>
				<tr>
					<th width="50px" class="textcenter">Cant.</th>
					<th class="textcenter">Descripción</th>
					<th class="textright" width="150px">Precio de Compra ($)</th>
					<th class="textright" width="150px">Sub-Total</th>
				</tr>
			</thead>
			<tbody id="detalle_productos">
                @foreach ($PurchaseDetails as $PurchaseDetail)
                <tr>
                    <td>{{$PurchaseDetail->quantity}}</td>
                    <td>{{$PurchaseDetail->product->name}}</td>
                    <td>$ {{$PurchaseDetail->price}}</td>
                    <td>$ {{number_format($PurchaseDetail->quantity*$PurchaseDetail->price,2)}}</td>
                </tr>
                @endforeach
			</tbody>
			<tfoot id="detalle_totales">
				<tr>
                    <th colspan="3">
                        <p align="right">SUBTOTAL:</p>
                    </th>
                    <td>
                        <p align="right">$ {{number_format($subtotal,2)}}<p>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <p align="right">TOTAL IMPUESTO ({{$purchase->tax}}%):</p>
                    </th>
                    <td>
                        <p align="right">$ {{number_format($subtotal*$purchase->tax/100,2)}}</p>
                    </td>
                </tr>
                <tr>
                    <th colspan="3">
                        <p align="right">TOTAL A PAGAR:</p>
                    </th>
                    <td>
                        <p align="right">$ {{number_format($purchase->total,2)}}<p>
                    </td>
                </tr>
		    </tfoot>
	</table>
	<br><br><br><br>
	<div>
		<h4 class="label_gracias">Mensaje</h4>
	</div>

</div>

</body>
</html>