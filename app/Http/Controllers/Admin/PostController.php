<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function creatPost(){
        return view('getCreate');
    }
    public function create(Request $request){
        $posts=Post::create($request->all());
        return redirect()->route('show')->with(['success'=>'create successfully']);
    }
    public function showAllPosts(){
        $posts=Post::all();
        return view('index',compact('posts'));
    }
    public function home(){
        $posts=Post::all();
        return view('home',compact('posts'));
    }
    public function contact(){
        return view('contactUs');
    }
}
