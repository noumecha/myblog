<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{

    public function index()
    {
        $contact_data = [];
        $contact_data['title'] = "Online Store - Products";
        $contact_data['subtitle'] = "List of Products";
        return view('contact.index')->with('contact_data', $contact_data);
    }

}
