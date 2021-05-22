<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Provider;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Requests\PurchaseStoreRequest;
use App\Http\Requests\PurchaseUpdateRequest;
use App\PurchaseDetails;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade as PDF;

class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:purchases.index')->only(['index']);
        $this->middleware('can:purchases.create')->only(['create','store']);
        $this->middleware('can:purchases.show')->only(['show']);
        $this->middleware('can:purchases.pdf')->only('pdf');
        $this->middleware('can:upload.purchases')->only('upload');
        $this->middleware('can:change.status.purchases')->only('change_status');
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }

    public function create()
    {
        $providers = Provider::get();
        $products = Product::get();
        return view('admin.purchase.create', compact('providers', 'products'));
    }

    public function store(PurchaseStoreRequest $request)
    {
        $purchase = Purchase::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'purchase_date'=>Carbon::now('America/Caracas'),
        ]);

        foreach ($request->product_id as $key => $product) {
            $results[] = array("product_id"=>$request->product_id[$key],
            "quantity"=>$request->quantity[$key], "price"=>$request->price[$key]);
        }

        $purchase->PurchaseDetails()->createMany($results);

        return redirect()->route('purchases.index');
    }

    public function show(Purchase $purchase)
    {
        $subtotal = 0;
        $PurchaseDetails = $purchase->PurchaseDetails;
        foreach ($PurchaseDetails as $PurchaseDetail) {
            $subtotal += $PurchaseDetail->quantity * $PurchaseDetail->price;
        }

        return view('admin.purchase.show', compact('purchase', 'PurchaseDetails', 'subtotal'));
    }

    public function update(PurchaseUpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function destroy(Purchase $purchase)
    {
        // $purchase->delete();
        // return redirect()->route('purchases.index');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0;
        $PurchaseDetails = $purchase->PurchaseDetails;
        foreach ($PurchaseDetails as $PurchaseDetail) {
            $subtotal += $PurchaseDetail->quantity * $PurchaseDetail->price;
        }

        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'PurchaseDetails'));
        return $pdf->download('Reporte_de_Compra_'.$purchase->id.'.pdf');
    }

    public function upload(Request $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        if ($purchase->status == 'VALID') {
            $purchase->update(['status'=>'CANCELED']);
            return redirect()->back();
        } else {
            $purchase->update(['status'=>'VALID']);
            return redirect()->back();
        }
    }
}
