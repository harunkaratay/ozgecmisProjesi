@extends('admin.layouts.app')

@section('content')

        <div class="card">
            <div class="card-header">
                <h2 class="mb-5">Bloglar</h2>
                <a href="{{route('blogCreate')}}" class="btn btn-primary mb-3">Blog Ekle</a>
            </div>
            <div class="card-body">
                <div class="card-body">
                    <h5 class="card-title">Special title treatment</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="javascript:void(0)" class="btn btn-sm btn-primary">Devamını oku </a>
                </div>
            </div>
        </div>

@endsection
