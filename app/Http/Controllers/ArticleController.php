<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;

class ArticleController extends Controller
{

    public function index()
    {
        $article_data = [];
        $article_data['title'] = "Online Store - Products";
        $article_data['subtitle'] = "List of Products";
        $article_data['articles'] = Article::all();
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
