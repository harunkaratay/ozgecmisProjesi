<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function createPage(){
        return view('admin.blog.create');
    }

    public function addPage(Request $request){
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->summary = $request->summary;
        $blog->content = $request->content;
        $blog->save();
        return redirect('/blogIndex')->with('success', 'Blog başarıyla eklendi.');
    }
    public function indexPage(){

        return view('admin.blog.index');
    }
}
