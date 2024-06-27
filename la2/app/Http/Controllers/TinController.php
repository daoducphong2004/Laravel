<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class TinController extends Controller
{
    public function index(){
        $query=DB::table('tin')
        ->select('id','tieude','luotxem','decs')
        ->orderBy('luotxem')
        ->limit(10);
        $data=$query->get();
        return view('tin',['data'=>$data]);
    }
    public function tinmoi(){
        $query=DB::table('tin')
        ->select('id','tieude','luotxem','decs','ngaydang')
        ->orderBy('ngaydang','desc')
        ->limit(10);
        $data=$query->get();
        return view('tinmoi',['data'=>$data]);
    }
}
