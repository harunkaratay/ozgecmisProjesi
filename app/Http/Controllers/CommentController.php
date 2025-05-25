<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

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

    public function index()
    {
        return view('admin.comment.index');
    }

    public function data(Request $request)
    {
        $comments = Comment::with('blog')->select('comments.*');

        return DataTables::of($comments)
            ->addColumn('blog_title', fn($comment) => $comment->blog ? $comment->blog->title : '-')
            ->addColumn('author_name', fn($comment) => $comment->author_name ?? 'Bilinmiyor')
            ->addColumn('comment', fn($comment) => $comment->comment)
            ->addColumn('created_at', fn($comment) => $comment->created_at->diffForHumans())
            ->addColumn('action', function ($comment) {
                return '
            <form action="'.route('admin.comments.destroy', $comment->id).'" method="POST"
                  onsubmit="return confirm(\'Bu yorumu silmek istediğinizden emin misiniz?\')">
                <input type="hidden" name="_token" value="'.csrf_token().'">
                <input type="hidden" name="_method" value="DELETE">
                <button type="submit" class="btn btn-sm btn-danger">Sil</button>
            </form>
        ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->route('commentsIndex')->with('success', 'Yorum başarıyla silindi.');
    }
}
