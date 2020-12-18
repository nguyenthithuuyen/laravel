<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    function showList()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }

    function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    function store(Request $request)
    {

        $post = new Post();
        $post->title = $request->title;
        $post->desc = $request->desc;
        $post->category_id = $request->category_id;
        $post->content = $request->contentPost;
        $post->save();
        return redirect()->route('posts.showList');

    }

    function delete($id): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.showList');
    }

    function update($id)
    {
        $post = Post::find($id);
        $categories=Category::all();
        return view('posts.update', compact('post','categories'));
    }

    function edit($id, Request $request): \Illuminate\Http\RedirectResponse
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->category_id = $request->category_id;
        $post->desc = $request->desc;
        $post->content=$request->contentPost;
        $post->save();
        return redirect()->route('posts.showList');
    }
    function search(Request $request){
        $keyword= $request->keyword;
        $posts=Post::where('title','LIKE','%'.$keyword.'%')->get();
        return view('posts.index', compact('posts'));
    }
}
