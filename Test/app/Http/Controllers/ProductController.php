<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   public function yc14()
   {
    $product=[
        'name' => 'Yêu cầu 14',
        'price' => 14.00,
        'quantity' => 140,
    ];
    DB::table('products')->insert($product);
    echo "thêm thành công";
   }
}
