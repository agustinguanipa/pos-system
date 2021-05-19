<?php

namespace App\Http\Controllers;

use App\Sale;
use App\Client;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\SaleStoreRequest;
use App\Http\Requests\SaleUpdateRequest;
use App\SaleDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class SaleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $sales = Sale::get();
        return view('admin.sale.index', compact('sales'));
    }

    public function create()
    {
        $clients = Client::get();
        $products = Product::get();
        return view('admin.sale.create', compact('clients', 'products'));
    }

    public function store(SaleStoreRequest $request)
    {
        $sale = Sale::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Caracas'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key],
            "discount"=>$request->discount[$key]);
        }

        $sale->SaleDetails()->createMany($results);

        return redirect()->route('sales.index');
    }

    public function show(Sale $sale)
    {
        $subtotal = 0;
        $SaleDetails = $sale->SaleDetails;
        foreach ($SaleDetails as $SaleDetail) {
            $subtotal += $SaleDetail->quantity*$SaleDetail->price-$SaleDetail->quantity*$SaleDetail->price*$SaleDetail->discount/100;
        }

        return view('admin.sale.show', compact('sale', 'SaleDetails', 'subtotal'));
    }

    public function edit(Sale $sale)
    {
        $clients = Client::get();
        return view('admin.sale.show', compact('sale'));
    }

    public function update(SaleUpdateRequest $request, Sale $sale)
    {
        // $sale->update($request->all());
        // return redirect()->route('sales.index');
    }

    public function destroy(Sale $sale)
    {
        // $sale->delete();
        // return redirect()->route('sales.index');
    }

    public function pdf(Sale $sale)
    {
        $subtotal = 0;
        $SaleDetails = $sale->SaleDetails;
        foreach ($SaleDetails as $SaleDetail) {
            $subtotal += $SaleDetail->quantity * $SaleDetail->price;
        }

        $pdf = PDF::loadView('admin.sale.pdf', compact('sale', 'subtotal', 'SaleDetails'));
        return $pdf->download('Reporte_de_Venta_'.$sale->id.'.pdf');
    }
}
