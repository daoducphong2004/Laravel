<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UserController extends Controller
{
    public function getAll()
    {
        $query = DB::table('users')->get();
        return view('user', ['data' => $query]);
    }

    public function getUserbyAge()
    {
        $query = DB::table('users')
            ->where('age', '>', 25)
            ->get();
        return view('user', ['data' => $query]);
    }

    public function yc3()
    {
        $query = DB::table('users')
            ->where('age', '>', 25)
            ->where('status', 'active')
            ->get();
        return view('user', ['data' => $query]);
    }

    public function yc4()
    {
        $query = DB::table('users')
            ->orderBy('age', 'desc')
            ->get();
        return view('user', ['data' => $query]);
    }

    public function yc5()
    {
        $query = DB::table('users')
            ->limit(10)
            ->get();
        return view('user', ['data' => $query]);
    }

    public function yc7()
    {
        $query = DB::table('customers')
            ->where('name', 'LIKE', '%john%')
            ->get();
        return view('customers', ['data' => $query]);
    }

    public function yc9()
    {
        $query = DB::table('employees')
            ->whereIn('department_id', [1, 2, 3])
            ->get();
        return view('employees', ['data' => $query]);
    }

    public function yc15()
    {
        $query = DB::table('users')
            ->whereRaw('MONTH(birth_date) = ?', [5])
            ->get();
        return view('user',['data'=>$query]);
    }
}
