<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $comprasmes = DB::select('SELECT month(c.purchase_date) AS mes, sum(c.total) AS totalmes FROM purchases c WHERE c.status="VALID" GROUP BY month(c.purchase_date) ORDER BY month(c.purchase_date) DESC LIMIT 12');

        $ventasmes = DB::select('SELECT month(v.sale_date) AS mes, sum(v.total) AS totalmes FROM sales v WHERE v.status="VALID" GROUP BY month(v.sale_date) ORDER BY month(v.sale_date) DESC LIMIT 12');

        // $comprasmes=DB::select('SELECT monthname(c.purchase_date) AS mes, sum(c.total) AS totalmes FROM purchases c WHERE c.status="VALID" GROUP BY monthname(c.purchase_date) ORDER BY month(c.purchase_date) DESC LIMIT 12');
        // $ventasmes=DB::select('SELECT monthname(v.sale_date) AS mes, sum(v.total) AS totalmes FROM sales v WHERE v.status="VALID" GROUP BY monthname(v.sale_date) ORDER BY month(v.sale_date) DESC LIMIT 12');

        $ventasdia = DB::select('SELECT DATE_FORMAT(v.sale_date,"%d/%m/%Y") AS dia, sum(v.total) AS totaldia FROM sales v WHERE v.status="VALID" GROUP BY v.sale_date ORDER BY day(v.sale_date) DESC LIMIT 15');

        $totales = DB::select('SELECT (SELECT ifnull(sum(c.total),0) FROM purchases c WHERE DATE(c.purchase_date)=curdate() AND c.status="VALID") AS totalcompra, (SELECT ifnull(sum(v.total),0) FROM sales v WHERE DATE(v.sale_date)=curdate() AND v.status="VALID") AS totalventa');

        $productosvendidos = DB::select('SELECT p.code AS code, 
        sum(dv.quantity) AS quantity, p.name AS name , p.id AS id , p.stock AS stock FROM products p 
        INNER JOIN sale_details dv ON p.id=dv.product_id 
        INNER JOIN sales v ON dv.sale_id=v.id WHERE v.status="VALID" 
        AND year(v.sale_date)=year(curdate()) 
        GROUP BY p.code ,p.name, p.id , p.stock ORDER BY sum(dv.quantity) DESC LIMIT 10');
       
       
        return view('home', compact( 'comprasmes', 'ventasmes', 'ventasdia', 'totales', 'productosvendidos'));
    }
}
