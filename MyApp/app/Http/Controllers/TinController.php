<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TinController extends Controller
{
    //
    public function index()
    {
        $title="hihihihihihih hôm nay ăn gì";
        $data=["title"=>$title];
        return view("tintuc/index",$data);
    }
    public function test($id){
        $data=["id"=>$id];
        return view("tintuc/index",$data);
    }
    public function test1($id,$id2){
        $data=["id"=>$id,
    "id2"=>$id2];   
        return view("tintuc/index",$data);
    }
    // //hàm preg_match('/[a-zA-Z]/', $id)  dùng để kiểm tra chữ và số. nếu là chữ cho ra kết quả là 11. còn nếu là số cho ra kết quả là 1
    // public function redirectTest($id){
    //     if(preg_match('/[a-zA-Z]/', $id)){
    //         $data= ['id'=>$id];
    //         return view("redirectTest",$data);
       

    //  }else{
    //         return redirect('/home');
    //     }   
    // }
}
