<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Article;
use App\Models\Comment;
use App\Models\Categorie;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(Request $request)
    {
        $article_data = [];
        $article_data['title'] = "Online Store - Products";
        $article_data['subtitle'] = "List of Products";
        $article_data['categories'] = Categorie::all();
        $article_data['tags'] = Tag::all();
        $article_data['articles'] = Article::all();

        $article_data['category'] = $request->input('category');
        $article_data['tag'] = $request->input('tag');
        $article_data['word'] = $request->input('word');

        $article_data['searchResults']['category'] = Article::where('categorie_id', '=', $article_data['category'])->get();
        $article_data['searchResults']['tag'] = Tag::where('id', '=', $article_data['tag'])->get();
        $article_data['searchResults']['word'] = Article::where('title', 'LIKE', "%{$article_data['word']}%")->get();

        if($article_data['category'] !== "0") {
            $article_data['articles'] = $article_data['searchResults']['category'];
        } elseif ($article_data['word'] !== "") {
            $article_data['articles'] = $article_data['searchResults']['word'];
        } else {
            $article_data['articles'] = Article::all();
        }

        return view('article.index')->with('article_data', $article_data);
    }

    public function show($id)
    {
        $article_data = [];
        $article_data['articles'] = Article::all();
        $article = Article::findOrFail($id);
        $article_data['comments'] = Comment::all()->where('article_id', '=', $article->getId());
        $article_data['title'] = "Simple Blog - ".$article->getTitle();
        $article_data['subtitle'] = "Article No - ".$article->getId();
        $article_data['tags'] = explode(" ", $article->getTags());
        $article_data['article'] = $article;
        return view('article.show')->with('article_data', $article_data);
    }

}
