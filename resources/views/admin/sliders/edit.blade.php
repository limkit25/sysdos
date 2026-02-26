@extends('admin.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Slide</h3>
            </div>
            <form action="{{ route('admin.sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="card-body">
                    
                    <div class="form-group">
                        <label>Gambar Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $slider->image) }}" class="img-fluid rounded border p-1" style="max-height: 150px;">
                    </div>

                    <div class="form-group">
                        <label>Ganti Gambar (Opsional)</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="sliderImg">
                            <label class="custom-file-label" for="sliderImg">Pilih file baru...</label>
                        </div>
                        <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                    </div>

                    <div class="form-group">
                        <label>Judul (Opsional)</label>
                        <input type="text" name="title" class="form-control" value="{{ old('title', $slider->title) }}" placeholder="Contoh: Promo Spesial">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat (Opsional)</label>
                        <textarea name="description" class="form-control" rows="2">{{ old('description', $slider->description) }}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Urutan</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $slider->order) }}">
                    </div>

                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.sliders.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning float-right">Update Slide</button>
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