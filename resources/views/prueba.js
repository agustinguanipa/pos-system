$(document).ready(function () {
    $("#agregar").click(function () {
        agregar();
    });
});

var cont = 1;
total = 0;
subtotal = []

$("#guardar").hide();
$("#product_id").change(mostrarValores);

function mostrarValores() {
    datosProducto = document.getElementById('product_id').value.split('_');
    $("#price").val(datosProducto[2]);
    $("#stock").val(datosProducto[2]);
}

function agregar() {
    datosProducto = document.getElementById('product_id').value.split('_');

    product_id = datosProducto[0];
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();

    if (product_id != "" && quantity != "" && quantity > 0 && discount != "" && price != "") {
        if (parseInt(stock) >= parseInt(quantity)) {
            subtotal[cont] = (quantity * price) - (quantity * price * discount / 100);
            total = total + subtotaol[cont];

            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa fa-times fa-2x"></i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td> <td> <input type="hidden" name="price[]" value="' + parseFloat(price).toFixed(2) + '"> <input class="form-control" type="number" value="' + parseFloat(price).toFixed(2) + '" disabled> </td> <td> <input type="hidden" name="discount[]" value="' + parseFloat(discount) + '"> <input class="form-control" type="number" value="' + parseFloat(discount) + '" disabled> </td> <td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td> <td align="right">s/' + parseFloat(subtotal[cont]).toFixed(2) + '</td></tr>';

            cant++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'La cantidad a vender supera el stock'
            })
        }
    } else {
        Swal.fire({
            type: 'error',
            text: 'Rellene todos los campos del detalle de la venta'
        })
    }
}

function limpiar() {
    $("#quantity").val("");
    $("#discount").val("0");
    $("#price").val("");
}

function totales() {
    $("#total").html("$ " + total.toFixed(2));

    total_impuesto = total * impuesto / 100;
    total_pagar = total + total_impuesto;
    $("#total_impuesto").html("$ " + total_impuesto.toFixed(2));
    $("#total_pagar_html").html("$ " + total_pagar.toFixed(2));
    $("#total_pagar").html("$ " + total_pagar.toFixed(2));
}

function evaluar() {
    if (total > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}

function eliminar(index) {
    total = total - subtotal[index];
    total_impuesto = total * impuesto / 100;
    total_pagar_html = total + total_impuesto;
    $("#total").html("$ " + total);
    $("#total_impuesto").html("$ " + total_impuesto);
    $("#total_pagar_html").html("$ " + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}