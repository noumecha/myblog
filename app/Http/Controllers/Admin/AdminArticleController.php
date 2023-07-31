<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index()
    {
        $admin_data = [];
        $admin_data['title'] = 'Admin Page - articles - Online Store';
        $admin_data['articles'] = Article::all();

        return view('admin.article.index')->with('admin_data', $admin_data);
    }

    public function store(Request $request) {

        article::validate($request);

        $newArticle = new Article();

        $newArticle->setName($request->input('title'));
        $newArticle->setContent($request->input('content'));
        $newArticle->setImage("games.jpg");
        $newArticle->save();

        if($request->hasFile('image')) {
            $imageName = $newArticle->getId().".".$request->file('image')->getExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $newArticle->setImage($imageName);
            $newArticle->save();
        }

        return back();
    }

    public function delete($id) {
        article::destroy($id);
        return back();
    }

    public function edit($id) {
        $admin_data = [];

        $admin_data['title'] = 'Admin Page - Edit article - Simple Blog';
        $admin_data['articles'] = article::findOrFail($id);

        return view('admin.article.edit')->with('admin_data', $admin_data);
    }

    public function update(Request $request, $id) {

        article::validate($request);

        $article = Article::findOrFail($id);
        $article->setTitle($request->input('title'));
        $article->setContent($request->input('content'));

        if($request->hasFile('image')) {
            $imageName = $article->getId().".".$request->file('image')->getExtension();
            Storage::disk('public')->put(
                $imageName,
                file_get_contents($request->file('image')->getRealPath())
            );
            $article->setImage($imageName);
        }

        $article->save();
        return redirect()->route('admin.article.index');

    }

}
