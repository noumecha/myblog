<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{

    public function index()
    {
        $about_data = [];
        $about_data['title'] = "Simple Blog - About";
        $about_data['subtitle'] = "About our awesome blog";
        return view('about.index')->with('about_data', $about_data);
    }

}
