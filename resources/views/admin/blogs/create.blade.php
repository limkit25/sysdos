@extends('admin.layout')
@section('content')
<div class="card card-primary">
    <div class="card-header"><h3 class="card-title">Tulis Artikel Baru</h3></div>
    <form action="{{ route('admin.blogs.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="form-group">
                <label>Judul Artikel</label>
                <input type="text" name="title" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Gambar Utama</label>
                <input type="file" name="image" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Konten</label>
                <textarea name="content" class="form-control summernote" required></textarea>
            </div>
        </div>
        <div class="card-footer"><button type="submit" class="btn btn-primary">Terbitkan</button></div>
    </form>
</div>
@endsection