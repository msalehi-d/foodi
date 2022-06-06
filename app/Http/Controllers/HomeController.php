<?php

namespace App\Http\Controllers;

use App\Models\Food;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['foods'] = Food::where('stock', '>', 0)->limit(16)->get();
        return view('home.index',$data);
    }
}
