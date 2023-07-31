<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
{
    public function index()
    {
        $admin_data = [];
        $admin_data['title'] = 'Admin Page - users - Simple Blog';
        $admin_data['users'] = User::all();

        return view('admin.user.index')->with('admin_data', $admin_data);
    }

    public function store(Request $request) {

        User::validate($request);

        $newUser = new User();

        $newUser->setName($request->input('name'));
        $newUser->setEmail($request->input('email'));
        $newUser->setTel($request->input('tel'));
        $newUser->setRole($request->input('role'));
        $newUser->setPassword($request->input('password'));
        $newUser->save();

        return back();
    }

    public function delete($id) {
        user::destroy($id);
        return back();
    }

    public function edit($id) {
        $admin_data = [];

        $admin_data['title'] = 'Admin Page - Edit user - Simple Blog';
        $admin_data['users'] = User::findOrFail($id);

        return view('admin.user.edit')->with('admin_data', $admin_data);
    }

    public function update(Request $request, $id) {

        User::validate($request);

        $user = User::findOrFail($id);
        $user->setName($request->input('name'));
        $user->setEmail($request->input('email'));
        $user->setTel($request->input('tel'));
        $user->setRole($request->input('role'));
        $user->setPassword($request->input('password'));

        $user->save();
        return redirect()->route('admin.user.index');

    }

}
