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
                <form method="GET" action="{{ route('blogIndex') }}" class="mb-4">
                    <label for="category">Kategoriye Göre Filtrele:</label>
                    <select name="category_id" id="category" onchange="this.form.submit()" class="form-control w-50 mb-3">
                        <option value="">Tüm Kategoriler</option>
                        @foreach ($categories as $category)
                            @include('admin.blog.partials.category-option', ['category' => $category, 'prefix' => ''])
                        @endforeach
                    </select>
                </form>
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
@endsection
