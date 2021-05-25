<div class="row">
    <div class="col-lg">
        <div class="form-group">
            <label for="client_id">Cliente</label>
            <select class="form-control" name="client_id" id="client_id">
                @foreach ($clients as $client)
                    <option value="{{$client->id}}">{{$client->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<div class="form-group">
  <label for="code">Código de Barras</label>
  <input type="text" name="code" id="code" class="form-control">
</div>

<div class="row">
    <div class="col-lg">
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="selectpicker form-control" data-live-search="true" name="product_id" id="product_id">
                <option value="" disabled selected>Seleccionar un Producto</option>
                @foreach ($products as $product)
                    <option value="{{$product->id}}_{{$product->stock}}_{{$product->sell_price}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="stock">Stock Actual</label>
            <input type="number" name="stock" id="stock" class="form-control" disabled>
          </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="price">Precio de Venta</label>
            <input type="number" class="form-control" name="price" id="price" disabled>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity">
        </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="tax">Impuesto</label>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="12%">
          </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="discount">Descuento</label>
            <input type="number" class="form-control" name="discount" id="discount" value="0">
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto</button>
</div>
<hr class="mt-5 mb-3">
<div class="form-group">
    <h4>Detalles de Venta</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio de Venta ($)</th>
                    <th>Descuento</th>
                    <th>Cantidad</th>
                    <th>Sub-Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL IMPUESTO (12%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="5">
                        <p align="right">TOTAL A PAGAR: </p>
                    </th>
                    <th>
                        <p align="right"><span id="total_pagar_html">$ 0.00</span><input type="hidden" name="total" id="total_pagar"></p>
                    </th>
                </tr> 
            </tfoot>
            <tbody>
            </tbody>
        </table>
    </div>  
</div>