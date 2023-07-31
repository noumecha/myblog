<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminHomeController extends Controller
{
    public function index()
    {

        $admin_data = [];
        $admin_data['title'] = 'Admin Page - Simple Blog';

        return view('admin.home.index')->with('admin_data',$admin_data);
    }
}
