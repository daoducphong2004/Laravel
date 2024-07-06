<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SaleController extends Controller
{
    public function yc8() 
    {
        $query = DB::table('sales')
        ->whereBetween('amount',[1000,5000])
        ->get();
        return view('sale',['data'=>$query]);
    }
}
