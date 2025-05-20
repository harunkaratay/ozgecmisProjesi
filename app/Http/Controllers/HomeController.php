<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexBlog(){
        $blogs = Blog::get();
        return view('public.home.cv' , compact('blogs'));
    }

    public function showBlog($id){
        $blogs = Blog::with('comments')->findOrFail($id);
        return view('public.home.show', compact('blogs'));
    }
}
