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

            <div class="form-group">
                <label for="profile_image">Profil Fotoğrafı</label><br>
                @if($user->profile_image)
                    <img src="{{ asset($user->profile_image) }}" alt="Profil" width="120" class="mb-2"><br>
                @endif
                <input type="file" name="profile_image" class="form-control-file"> 
            </div>

            <button type="submit" class="btn btn-primary mt-3">Kaydet</button>
        </form>
    </div>
@endsection
