<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        $home = DB::table('orders')->get();
        $total_products = DB::table('orders')->get()->sum('total_product');
        return view('admin.home.home',compact('total_products','home'));
    }
}
