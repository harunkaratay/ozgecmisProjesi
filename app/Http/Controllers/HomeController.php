<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function indexBlog(Request $request)
    {
        $query = Blog::with('category');

        if ($request->filled('category_id')) {
            $category = Category::find($request->category_id);
            if ($category) {
                $categoryIds = $this->getAllCategoryIds($category);
                $query->whereIn('category_id', $categoryIds);
            }
        }

        $blogs = $query->get();
        $categories = Category::with('childrenRecursive')->whereNull('parent_id')->get();

        return view('public.home.cv', compact('blogs', 'categories'));
    }

    public function showBlog($id){
        $blogs = Blog::with('comments')->findOrFail($id);
        return view('public.home.show', compact('blogs'));
    }

    private function getAllCategoryIds($category)
    {
        $ids = [$category->id];
        foreach ($category->children as $child) {
            $ids = array_merge($ids, $this->getAllCategoryIds($child));
        }
        return $ids;
    }
}
