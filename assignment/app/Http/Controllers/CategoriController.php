<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $danhmuc = DB::table('danhmuc')->get();
        $tintuc = DB::table('tintuc')
            ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
            ->select('tintuc.*', 'danhmuc.title as danhmuc', 'danhmuc.id as id_dm')
            ->get();
        return view('client.categori', ['danhmuc' => $danhmuc, 'tintuc' => $tintuc]);
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
        $danhmuc = DB::table('danhmuc')->get();
        $tintuc = DB::table('tintuc')
            ->join('danhmuc', 'tintuc.id_category', '=', 'danhmuc.id')
            ->select('tintuc.*', 'danhmuc.title as danhmuc')
            ->where('danhmuc.id', $id)
            ->get();
        return view('client.categori', ['tintuc' => $tintuc, 'danhmuc' => $danhmuc]);
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
