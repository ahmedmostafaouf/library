<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function creatPost(){
        return view('getCreate');
    }
    public function create(PostRequest $request){
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
    public function edit($id){
        $posts=Post::findOrFail($id);
        if(!$posts){
            return redirect()->route('show')->with(['error'=>"Sory Post Not Found In DataBse"]);
        }
        return view('edit',compact('posts'));
    }
    public function update(PostRequest $request,$id){
        $posts=Post::findOrFail($id);
        if(!$posts){
            return redirect()->route('show')->with(['error'=>"Sory Post Not Found In DataBse"]);
        }
         $posts->update($request->all());
        return redirect()->route('show')->with(['success'=>'update successfully']);
    }
    public function delete($id){
        $posts=Post::findOrFail($id);
        if(!$posts){
            return redirect()->route('show')->with(['error'=>"Sorry Post Not Found In DataBse"]);
        }
         $posts->delete();
        return redirect()->route('show')->with(['success'=>'Delete successfully']);
    }
    public function showPost($id){
        $posts=Post::findOrFail($id);
        if(!$posts){
            return redirect()->route('show')->with(['error'=>"Sorry Post Not Found In DataBase"]);
        }
        return view('showPost',compact('posts'));

    }
}
