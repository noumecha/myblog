<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $article_data = [];
        $article_data['title'] = "Online Store - Products";
        $article_data['subtitle'] = "List of Products";
        //$article_data['products'] = Article::all();
        return view('article.show')->with('article_data', $article_data);
    }

    public function show(/*$id*/)
    {
        $article_data = [];
        //$article = ProductController::$articles[$id-1];
        //$article = Article::findOrFail($id);
        $article_data['title'] = "Simple Blog - ";//.$article->getName();
        $article_data['subtitle'] = "Article information - ";//.$article->getName();
        //$article_data['product'] = $article;
        return view('article.show')->with('article_data', $article_data);
    }
}
