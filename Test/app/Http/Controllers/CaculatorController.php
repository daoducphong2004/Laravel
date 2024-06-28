<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CaculatorController extends Controller
{
    public function cong($a, $b=0)
    {
        $sum = $a + $b;
        return view('caculator', compact("a", "b", 'sum'));
    }
    public function tru(){
       $query= DB::table();
    }
}
