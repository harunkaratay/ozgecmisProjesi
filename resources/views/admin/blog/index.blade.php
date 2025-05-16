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
                    @foreach($blogs as $b)
                        <div class="card mb-4 shadow-sm p-3">
                            <div class="card-body">
                                <h5 class="card-title fw-bold">{{ $b->title }}</h5>
                                <p class="card-text">{{ $b->summary }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="{{route('blogShow',$b->id)}}" class="btn btn-sm btn-primary">Devamını oku</a>
                                    <div>
                                        <a href="{{route('blogDelete',$b->id)}}" class="btn btn-outline-danger">Sil</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                        <a href="/welcome" class="ml-4">Anasayfaya dön</a>
                </div>
            </div>
        </div>

    @endsection
