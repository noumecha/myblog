<?php

namespace App\Http\Controllers\Admin;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\Categorie;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminArticleController extends Controller
{
    public function index()
    {
        $admin_data = [];
        $admin_data['title'] = 'Admin Page - articles - Online Store';
        $admin_data['articles'] = Article::all();
        $admin_data['categories'] = Categorie::all();
        $admin_data['tags'] = Tag::all();

        return view('admin.article.index')->with('admin_data', $admin_data);
    }

    public function store(Request $request) {

        article::validate($request);

        $newArticle = new Article();

        $newArticle->setTitle($request->input('title'));
        $newArticle->setContent($request->input('content'));
        $newArticle->setImage("games.jpg");
        $newArticle->setUserId(auth()->user()->id);
        $newArticle->setTags($request->input('tags'));
        $newArticle->setCatgorieId($request->input('categorie'));
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
        $admin_data['categories'] = Categorie::all();
        $admin_data['tags'] = Tag::all();

        return view('admin.article.edit')->with('admin_data', $admin_data);
    }

    public function update(Request $request, $id) {

        Article::validate($request);

        $article = Article::findOrFail($id);
        $article->setTitle($request->input('title'));
        $article->setContent($request->input('content'));
        $article->setTags($request->input('tags'));
        $article->setCatgorieId($request->input('categorie'));

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
