<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    public function index()
    {
        $admin_data = [];
        $admin_data['title'] = 'Admin Page - Tags - Online Store';
        $admin_data['tags'] = Tag::all();

        return view('admin.tag.index')->with('admin_data', $admin_data);
    }

    public function store(Request $request) {

        Tag::validate($request);

        $newTag = new Tag();

        $newTag->setName($request->input("name"));
        $newTag->save();

        return back();
    }

    public function delete($id) {
        Tag::destroy($id);
        return back();
    }

    public function edit($id) {
        $admin_data = [];

        $admin_data['title'] = 'Admin Page - Edit Tag - Simple Blog';
        $admin_data['Tags'] = Tag::findOrFail($id);

        return view('admin.tag.edit')->with('admin_data', $admin_data);
    }

    public function update(Request $request, $id) {

        Tag::validate($request);

        $Tag = Tag::findOrFail($id);
        $Tag->setName($request->input('name'));

        $Tag->save();
        return redirect()->route('admin.tag.index');

    }

}
