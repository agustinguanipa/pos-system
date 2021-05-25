<div class="row">
    <div class="col-lg">
        <div class="form-group">
            <label for="provider_id">Proveedor</label>
            <select class="form-control" name="provider_id" id="provider_id">
                @foreach ($providers as $provider)
                    <option value="{{$provider->id}}">{{$provider->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="tax">Impuesto</label>
            <input type="number" class="form-control" name="tax" id="tax" aria-describedby="helpId" placeholder="12%">
          </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col-lg">
        <div class="form-group">
            <label for="product_id">Producto</label>
            <select class="form-control" name="product_id" id="product_id">
                @foreach ($products as $product)
                    <option value="{{$product->id}}">{{$product->name}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="quantity">Cantidad</label>
            <input type="number" class="form-control" name="quantity" id="quantity">
        </div>
    </div>
    <div class="col-lg">
        <div class="form-group">
            <label for="price">Precio de Compra</label>
            <input type="number" class="form-control" name="price" id="price">
        </div>
    </div>
</div>
<div class="form-group">
    <button type="button" id="agregar" class="btn btn-primary float-right">Agregar Producto</button>
</div>
<hr class="mt-5 mb-3">
<div class="form-group">
    <h4>Detalles de Compra</h4>
    <div class="table-responsive col-md-12">
        <table id="detalles" class="table table-striped">
            <thead>
                <tr>
                    <th>Eliminar</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Sub-Total</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th colspan="4">
                        <p align="right">TOTAL:</p>
                    </th>
                    <th>
                        <p align="right"><span id="total">$ 0.00</span></p>
                    </th>
                </tr>
                <tr id="dvOcultar">
                    <th colspan="4">
                        <p align="right">TOTAL IMPUESTO (12%):</p>
                    </th>
                    <th>
                        <p align="right"><span id="total_impuesto">$ 0.00</span></p>
                    </th>
                </tr>
                <tr>
                    <th colspan="4">
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