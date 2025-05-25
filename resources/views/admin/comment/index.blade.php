@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5 mb-5">
        <h3>Yorumlar</h3>
        <table class="table table-bordered" id="comments-table">
            <thead>
            <tr>
                <th>Blog Başlığı</th>
                <th>Yorum Yapan</th>
                <th>Yorum</th>
                <th>Tarih</th>
                <th>İşlem</th>
            </tr>
            </thead>
        </table>
    </div>
@endsection

@section('scripts')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

    <script>
        $(function() {
            $('#comments-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ route('admin.comments.data') }}',
                language: {url: 'https://cdn.datatables.net/plug-ins/1.13.4/i18n/tr.json'},
                columns: [
                    { data: 'blog_title', name: 'blog_title' },
                    { data: 'author_name', name: 'author_name' },
                    { data: 'comment', name: 'comment' },
                    { data: 'created_at', name: 'created_at' },
                    { data: 'action', name: 'action', orderable: false, searchable: false },
                ]
            });
        });
    </script>
@endsection
