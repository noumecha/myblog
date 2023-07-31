<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        $home_data = [];
        $home_data['title'] = "My Blog";
        $home_data['subtitle'] = "Let's Tech";
        $home_data['description'] = "My own blog";
        $home_data['author'] = "Noumel - Nzali-Support";
        return view('home.index')->with('home_data', $home_data);
    }
}
