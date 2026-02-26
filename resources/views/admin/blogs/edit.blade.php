@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Artikel</h3>
            </div>
            <form action="{{ route('admin.blogs.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Artikel</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $blog->title) }}" required>
                    </div>

                    <div class="form-group">
                        <label>Gambar Utama</label><br>
                        <img src="{{ asset('storage/' . $blog->image) }}" height="100" class="mb-3 rounded">
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="blogImg">
                            <label class="custom-file-label" for="blogImg">Ganti Gambar...</label>
                        </div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>

                    <div class="form-group">
                        <label>Konten</label>
                        <textarea name="content" class="form-control summernote" required>{{ old('content', $blog->content) }}</textarea>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.blogs.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning float-right">Update Artikel</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        var fileName = e.target.files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
@endsection