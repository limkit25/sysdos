@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Project: <strong>{{ $project->title }}</strong></h3>
            </div>
            <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT') <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Judul Project</label>
                                <input type="text" name="title" class="form-control" value="{{ old('title', $project->title) }}" required>
                            </div>

                            <div class="form-group">
                                <label>Teknologi (Tech Stack)</label>
                                <input type="text" name="tech_stack" class="form-control" value="{{ old('tech_stack', $project->tech_stack) }}">
                            </div>

                            <div class="form-group">
                                <label>Konten Lengkap / Studi Kasus</label>
                                <textarea name="content" class="form-control summernote" required>{{ old('content', $project->content) }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Deskripsi Singkat</label>
                                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $project->description) }}</textarea>
                                <small class="text-muted">Ringkasan untuk kartu di halaman depan.</small>
                            </div>

                            <div class="form-group">
                                <label>Link Demo / Ujicoba</label>
                                <input type="url" name="link" class="form-control" value="{{ old('link', $project->link) }}">
                            </div>

                            <div class="form-group">
                                <label>Gambar Project</label>
                                <br>
                                <img src="{{ asset('storage/' . $project->image) }}" class="img-fluid mb-2 rounded border p-1" style="max-height: 200px;">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="editImgInput">
                                    <label class="custom-file-label" for="editImgInput">Ganti Gambar...</label>
                                </div>
                                <small class="text-muted">Biarkan kosong jika tidak ingin mengganti gambar.</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="card-footer">
                    <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning float-right">
                        <i class="fas fa-save mr-1"></i> Update Data
                    </button>
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