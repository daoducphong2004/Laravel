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
        // $offset= ($page - 1) * $perpage;
        $data = DB::table('categories')->pluck('name','id')->all();
        dd($data);
        echo 1;
    }
}
