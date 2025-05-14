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
        <div class="mt-4">
            <a href="{{ route('blogIndex') }}" class="btn btn-secondary">Geri Dön</a>
        </div>
    </div>

@endsection
