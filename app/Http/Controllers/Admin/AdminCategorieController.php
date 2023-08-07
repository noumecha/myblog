<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategorieController extends Controller
{
    public function index()
    {
        $admin_data = [];
        $admin_data['title'] = 'Admin Page - Categories - Online Store';
        $admin_data['categories'] = Categorie::all();

        return view('admin.categorie.index')->with('admin_data', $admin_data);
    }

    public function store(Request $request) {

        Categorie::validate($request);

        $newCategorie = new Categorie();

        $newCategorie->setName($request->input('name'));
        $newCategorie->save();

        return back();
    }

    public function delete($id) {
        Categorie::destroy($id);
        return back();
    }

    public function edit($id) {
        $admin_data = [];

        $admin_data['title'] = 'Admin Page - Edit Categorie - Simple Blog';
        $admin_data['categories'] = Categorie::findOrFail($id);

        return view('admin.categorie.edit')->with('admin_data', $admin_data);
    }

    public function update(Request $request, $id) {

        Categorie::validate($request);

        $Categorie = Categorie::findOrFail($id);
        $Categorie->setName($request->input('name'));

        $Categorie->save();
        return redirect()->route('admin.categorie.index');

    }

}
