@extends('admin.layouts.app')

@section('content')
    <div class="container">
        <h2>Profil Bilgileri</h2>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <label for="profile_photo">Profil Fotoğrafı:</label>
            <input type="file" name="profile_photo" id="profile_photo" accept="image/*">

            <button type="submit">Kaydet</button>
        </form>

        @if(auth()->user()->profile_photo)
            <div>
                <p>Mevcut Fotoğraf:</p>
                <img src="{{ asset('storage/' . auth()->user()->profile_photo) }}" alt="Profil Fotoğrafı" width="150">
            </div>
        @endif
    </div>
@endsection
