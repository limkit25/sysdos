@extends('admin.layout')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Layanan</h3>
    </div>
    <form action="{{ route('admin.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="card-body">
            <div class="form-group">
                <label>Nama Layanan</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $service->title) }}" required>
            </div>

            <div class="form-group">
                <label>Logo Layanan Saat Ini</label>
                <br>
                <img src="{{ asset('storage/' . $service->logo) }}" alt="{{ $service->title }}" style="max-height: 50px;" class="mb-2 border p-1">
                
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="logo" class="custom-file-input" id="logoInput">
                        <label class="custom-file-label" for="logoInput">Ganti Logo...</label>
                    </div>
                </div>
                <small class="text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
            </div>
            <div class="form-group">
                <label>Deskripsi Singkat</label>
                <textarea name="short_desc" class="form-control summernote" rows="3" required>{{ old('short_desc', $service->short_desc) }}</textarea>
            </div>
            <div class="form-group">
                <label>Urutan Tampil</label>
                <input type="number" name="order" class="form-control" value="{{ old('order', $service->order) }}" required>
                <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-warning">Update Data</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.getElementById('logoInput').addEventListener('change', function(e){
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        });
    });
</script>
@endsection