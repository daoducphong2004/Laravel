<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //lấy tất cả các tin tức có join bảng danhmuc để lấy tên danh mục
         $tintuc = DB::table('tintuc')
         ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
         ->select('tintuc.*', 'danhmuc.title as danhmuc')
         ->get();
     // lấy tin tức có lượt view cao nhất để làm banner
     $tintuctopview = DB::table('tintuc')
         ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
         ->select('tintuc.*', 'danhmuc.title as danhmuc')
         ->orderBy('view', 'desc')
         ->first();
     // lấy danh mục
     $danhmuc = DB::table('danhmuc')->get();
     // lấy tin tức hàng tuần. Carbon để lấy tuần hiện tại theo thời gian thực
     $tintuchangtuan = DB::table('tintuc')
         ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
         ->select('tintuc.*', 'danhmuc.title as danhmuc')
         ->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])
         ->get();

     return view('client.index', ['tintuc' => $tintuc, 'danhmuc' => $danhmuc, 'tintuctop' => $tintuctopview, 'tintuchangtuan' => $tintuchangtuan]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
