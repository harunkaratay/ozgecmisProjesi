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
            <a href="{{ route('blogIndex') }}" class="btn btn-secondary">Geri Dön</a>
            <a href="/home" class="btn btn-link">Anasayfaya dön</a>
        </div>
    </div>
@endsection
