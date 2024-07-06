<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class OrderController extends Controller
{
    public function yc6() 
    {
        $query = DB::table('orders')
        ->where('status','completed')
        ->orWhere('total','>',100)
        ->get();
        return view('order',['data'=>$query]);
    }

    public function yc10()
    {
        $query = DB::table('orders')
        ->join('customers', 'orders.customer_id', '=', 'customers.id')
        ->select('orders.*', 'customers.name as customer_name')
        ->get();
        return view('order',['data'=>$query]);
    }

    public function yc11() 
    {
        $query= DB::table('order_items')
        ->select('product_id', DB::raw('SUM(quantity) as total_quantity'))
        ->groupBy('product_id')
        ->get();

        return view('product',['data'=>$query]);
    }

    public function yc12()
    {
        $query = DB::table('orders')
        ->where('status','completed')
        ->update(['status'=>'shipped']);
    }

    public function yc13()
    {
        $query = DB::table('logs')
        ->whereDate('created_at', '<', '2020-01-01')
        ->delete();
    }
}
