<?php

namespace App\Http\Controllers;

use App\Printer;
use Illuminate\Http\Request;
use App\Http\Requests\PrinterUpdateRequest;

class PrinterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('can:printers.index')->only(['index']);
        $this->middleware('can:printers.edit')->only(['update']);
    }
    
    public function index()
    {
        $printer = Business::where('id', 1)->firstOrFail();
        return view('admin.printer.index', compact('printer'));
    }

    public function update(BusinessUpdateRequest $request, Business $category)
    {
        $printer->update($request->all());
        return redirect()->route('printers.index');
    }
}
