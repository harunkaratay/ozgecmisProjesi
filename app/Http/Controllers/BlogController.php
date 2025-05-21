<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    public function createPage(){
        return view('admin.blog.create');
    }

    public function addPage(Request $request){

        $request->validate([
            'title' => 'required',
            'summary' => 'required',
            'content' => 'required',
            'category_path' => 'required', // örnek: Yazılım,Backend,Laravel
        ]);

        $categoryNames = array_map('trim', explode(',', $request->category_path));
        $parentId = null;

        foreach ($categoryNames as $name) {
            $category = Category::where('name', $name)->where('parent_id', $parentId)->first();

            if (!$category) {
                $category = Category::create([
                    'name' => $name,
                    'parent_id' => $parentId
                ]);
            }

            $parentId = $category->id;
        }

        $blogs = new Blog();
        $blogs->title = $request->title;
        $blogs->summary = $request->summary;
        $blogs->content = $request->content;
        $blogs->category_id = $parentId; // en alttaki kategori
        $blogs->save();

        return redirect()->route('blogIndex')->with('success', 'Blog başarıyla eklendi.');
    }
    public function indexPage(Request $request){
        $query = Blog::with('category');
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();

        if ($request->filled('category_id')) {
            $category = Category::find($request->category_id);
            if ($category) {
                $categoryIds = $this->getAllCategoryIds($category);
                //dd($categoryIds);
                $query->whereIn('category_id', $categoryIds);
            }
        }

        $blogs = $query->get();
        $categories = Category::whereNull('parent_id')->get();

        return view('admin.blog.index', compact('blogs', 'categories'));
    }

    private function getAllCategoryIds($category){
        $ids = [$category->id];
        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getAllCategoryIds($child));
        }
        return $ids;
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
