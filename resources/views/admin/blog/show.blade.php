@extends('admin.layouts.app')


@section('content')

    <div class="container mt-5">
        <div class="card shadow rounded-3">
            <div class="card-body">
                <h2 class="card-title mb-3">{{ $blogs->title }}</h2>
                <h5 class="card-subtitle text-muted mb-4">{{ $blogs->summary }}</h5>
            </div>
        </div>
        <div class="card-text" style="white-space: pre-wrap;">
            {!! nl2br(e($blogs->content)) !!}
        </div>
        <div class="mt-3 mb-2 d-flex justify-content-between align-items-center">
            <a href="{{url('/admin/blog/index')}}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </div>
    <div class="card">
        <div class="card-header">
            <h4>Yorumlar</h4>

            @foreach($blogs->comments as $comment)
                <div class="border rounded p-3 mb-2">
                    <strong>{{ $comment->author_name }}</strong> ·
                    <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
                    <p class="mb-0">{{ $comment->comment }}</p>
                </div>
            @endforeach

            @guest()
        </div>
        <div class="card-body">
            <div class="card">
                <div class="card-header">
                    <h5>Yorum Yap</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('comments.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="blog_id" value="{{ $blogs->id }}">
                        <div class="mb-3">
                            <label for="author_name" class="form-label">Adınız</label>
                            <input type="text" name="author_name" id="author_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="comment" class="form-label">Yorumunuz</label>
                            <textarea name="comment" id="comment" rows="3" class="form-control" required></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Gönder</button>
                    </form>
                </div>
            </div>
        </div>
         @endguest
    </div>


@endsection
