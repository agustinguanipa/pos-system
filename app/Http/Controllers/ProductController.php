<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Provider;
use Illuminate\Http\Request;
use App\Http\Request\ProductStoreRequest;
use App\Http\Request\ProductUpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::get();
        return view('admin.product.index', compact('products'));
    }

    public function create()
    {
        $products = Category::get();
        $providers = Provider::get();
        return view('admin.product.create', compact('categories', 'providers'));
    }

    public function store(StoreRequest $request)
    {
        Product::create($request->all());
        return redirect()->route('products.index');
    }

    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $products = Category::get();
        $providers = Provider::get();
        return view('admin.product.index', compact('product', 'categories', 'providers'));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $product->update($request->all());
        return redirect()->route('products.index');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
