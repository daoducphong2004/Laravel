<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CategoryController extends Controller
{
    public function crud()
    {
        // $data=[];
        // for($i=0;$i<=2000;$i++){
        //     $data[]=[
        //         'name'=>'category'.$i,
        //         'image'=>'img'.$i.'jpg'
        //     ];
        // }
        // DB::table('categories')->insert($data);
        // $data=[
        //     'name'=>'test'
        // ];
        // DB::table('categories')->delete();
        $data = DB::table('categories')->find(2004);
        dd($data);
        echo 1;
    }
}
