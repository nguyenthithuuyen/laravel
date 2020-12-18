<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    function index(){
        $posts=Post::all();
        return view('front-end.home',compact('posts'));
    }
    function showDetailPost($id){
        $post=Post::find($id);
        if (!session()->has('post-'.$post->id)){
            session()->put('post-'.$post->id, 0);
        }
        $currentTitleViewPost= session('post-'.$post->id) ;
        $currentTitleViewPost++;

        session()->put('post-'.$post->id, $currentTitleViewPost);
        return view ('front-end.posts.detail',compact('post'));
    }
}
