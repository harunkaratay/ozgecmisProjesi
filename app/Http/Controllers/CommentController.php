<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'blog_id' => 'required|exists:blogs,id',
            'author_name' => 'required|string|max:255',
            'comment' => 'required|string',
        ]);

        Comment::create($validated);

        return redirect()->back()->with('success', 'Yorum başarıyla eklendi.');
    }

    public function index(){
        $comments = Comment::with('blog')->whereHas('blog')->latest()->get();
        return view('admin.comment.index', compact('comments'));
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('commentsIndex')->with('success', 'Yorum başarıyla silindi.');
    }
}
