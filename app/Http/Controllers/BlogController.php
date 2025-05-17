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
        $blogs = new Blog();
        $blogs->title = $request->title;
        $blogs->summary = $request->summary;
        $blogs->content = $request->content;
        $blogs->save();
        return redirect()->route('blogIndex')->with('success', 'Blog başarıyla eklendi.');
    }
    public function indexPage(){
        $blogs = Blog::get();
        return view('admin.blog.index' , compact('blogs'));
    }
    public function showBlog($id){
        $blogs = Blog::find($id);
        return view('admin.blog.show' , compact('blogs'));
    }
    public function deletePage($id){
        $blogs = Blog::find($id);
        $blogs->delete();
        return redirect()->route('blogIndex')->with('success', 'Blog başarıyla silindi.');
    }
}
