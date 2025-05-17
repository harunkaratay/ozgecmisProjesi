@extends('admin.layouts.app')


@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Blog Oluştur</h2>
        </div>
        <div class="card-body">
            <form action="{{route('blogAdd')}}" method="POST">
                @csrf
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div>
                                <label for="defaultFormControlInput" class="form-label"><h4>Başlık</h4></label>
                                <input type="text" class="form-control" id="defaultFormControlInput"
                                       placeholder="yapay-zeka" aria-describedby="defaultFormControlHelp" name="title">
                                <label for="defaultFormControlInput" class="form-label mt-3"><h4>İçerik</h4></label>
                                <input type="text" class="form-control" id="defaultFormControlInput"
                                       placeholder="yapay-zeka nedir?" aria-describedby="defaultFormControlHelp"
                                       name="summary">
                                <div>
                                    <label for="exampleFormControlTextarea1" class="form-label mt-3"><h4>Makale</h4>
                                    </label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="200"
                                              name="content"></textarea>
                                </div>
                                <button type="submit" class="btn btn-success mt-3">Yayınla</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
