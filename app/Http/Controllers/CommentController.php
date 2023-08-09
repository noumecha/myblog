<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Article;

class CommentController extends Controller
{
    public function index()
    {
        $comment_data = [];
        $comment_data['title'] = 'comment Page';
        $comment_data['comments'] = Comment::all();

        return view('article.comment')->with('comment_data', $comment_data);
    }

    public function store(Request $request)
    {
        Comment::validate($request);

        $newComment = new Comment();
        $newComment->setContent($request->input('content'));
        $newComment->setArticleId($request->input('article_id'));
        if ($request->input('parent_id') !== null) {
            $newComment->setParentId($request->input('parent_id'));
        }
        $newComment->setUserId(auth()->user()->id);
        $newComment->save();


        return back();
    }

}
