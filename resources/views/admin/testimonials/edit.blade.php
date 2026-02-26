@extends('admin.layout')

@section('content')
<div class="card card-warning">
    <div class="card-header">
        <h3 class="card-title">Edit Testimoni</h3>
    </div>
    <form action="{{ route('admin.testimonials.update', $testimonial->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="card-body">
            <div class="form-group">
                <label>Nama Klien</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $testimonial->name) }}" required>
            </div>
            <div class="form-group">
                <label>Jabatan / Perusahaan</label>
                <input type="text" name="position" class="form-control" value="{{ old('position', $testimonial->position) }}" required>
            </div>
            <div class="form-group">
                <label>Isi Testimoni</label>
                <textarea name="content" class="form-control" rows="3" required>{{ old('content', $testimonial->content) }}</textarea>
            </div>
            <div class="form-group">
                <label>Foto Klien</label><br>
                @if($testimonial->photo)
                    <img src="{{ asset('storage/' . $testimonial->photo) }}" width="100" class="mb-2 rounded-circle">
                @else
                    <span class="text-muted">Belum ada foto.</span>
                @endif
                <input type="file" name="photo" class="form-control">
                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti foto.</small>
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.testimonials.index') }}" class="btn btn-secondary">Batal</a>
            <button type="submit" class="btn btn-warning">Update Data</button>
        </div>
    </form>
</div>
@endsection