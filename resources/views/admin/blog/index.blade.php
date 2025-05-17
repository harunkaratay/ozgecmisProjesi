@extends('admin.layouts.app')

@section('content')

    <div class="card">
        <div class="card-header">
            <h2 class="mb-5">Bloglar</h2>
            @auth()
                <a href="{{route('blogCreate')}}" class="btn btn-primary mb-3">Blog Ekle</a>
            @endauth
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="card-body">
            <div class="card-body">
                @if($blogs->isEmpty())
                    <p>Henüz yayınlanan bir blog yok</p>
                @else
                    @foreach($blogs as $b)
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $b->title }}</h5>
                                <p class="card-text">{{ $b->summary }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{route('showBlog',$b->id)}}" class="btn btn-sm btn-outline-dark">Devamını
                                        oku</a>
                                    @auth
                                        <a href="{{route('blogDelete',$b->id)}}" class="btn btn-outline-danger">Sil</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
        <div class="d-flex justify-content-end mt-4 mb-3">
            <a href="/home" class="btn btn-primary">Anasayfaya dön</a>
        </div>
@endsection
