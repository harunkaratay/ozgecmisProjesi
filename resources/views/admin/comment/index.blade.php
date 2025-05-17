@extends('admin.layouts.app')


@section('content')

    <div class="container mt-5 mb-5">
        <h3>Yorumlar</h3>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered table-hover mt-3 mb-3">
            <thead>
            <tr>
                <th>Blog Başlığı</th>
                <th>Yorum Yapan</th>
                <th>Yorum</th>
                <th>Tarih</th>
                <th>İşlem</th>
            </tr>
            </thead>
            <tbody>
            @foreach($comments as $comment)
                <tr>
                    <td>{{ $comment->blog->title }}</td>
                    <td>{{ $comment->author_name }}</td>
                    <td>{{ $comment->comment }}</td>
                    <td>{{ $comment->created_at->diffForHumans() }}</td>
                    <td>
                        <form action="{{ route('admin.comments.destroy', $comment->id) }}" method="POST"
                              onsubmit="return confirm('Bu yorumu silmek istediğinizden emin misiniz?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Sil</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div style="position: fixed; bottom: 0; right: 0; margin: 1rem; z-index: 1030;">
        <a href="/home" class="btn btn-primary">Anasayfaya Dön</a>

@endsection
