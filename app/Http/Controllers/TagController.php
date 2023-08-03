<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
        $tag_data = [];
        $tag_data['title'] = "Simpl Blog - Tags";
        $tag_data['subtitle'] = "List of tags";
        $tag_data['tags'] = Tag::all();
        return view('tag.index')->with('tag_data', $tag_data);
    }

    public function show($id)
    {
        $tag_data = [];
        $tag = Tag::findOrFail($id);
        $tag_data['title'] = "Simple Blog - ".$tag->getTitle();
        $tag_data['subtitle'] = "Tag No - ".$tag->getId();
        $tag_data['Tag'] = $tag;
        return view('Tag.show')->with('tag_data', $tag_data);
    }
}
