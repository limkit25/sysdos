@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12 col-lg-5">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Project Baru</h3>
            </div>
            <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Judul Project</label>
                        <input type="text" name="title" class="form-control" placeholder="Nama Project" required>
                    </div>

                    <div class="form-group">
                        <label>Teknologi (Tech Stack)</label>
                        <input type="text" name="tech_stack" class="form-control" placeholder="Contoh: Laravel 12, MySQL, Bootstrap">
                    </div>

                    <div class="form-group">
                        <label>Deskripsi Singkat (Untuk Kartu Depan)</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Ringkasan pendek..." required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Konten Lengkap / Studi Kasus</label>
                        <textarea name="content" class="form-control summernote" required></textarea>
                    </div>

                    <div class="form-group">
                        <label>Link Demo / Ujicoba (Opsional)</label>
                        <input type="url" name="link" class="form-control" placeholder="https://...">
                    </div>

                    <div class="form-group">
                        <label>Gambar Project</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="imgInput" required>
                            <label class="custom-file-label" for="imgInput">Pilih Gambar...</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fas fa-save mr-2"></i> Simpan Project
                    </button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-12 col-lg-7">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title">Daftar Project</h3>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 80px">Gambar</th>
                                <th>Info Project</th>
                                <th class="text-center" style="width: 100px">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>
                                    <img src="{{ asset('storage/' . $project->image) }}" width="80" class="img-thumbnail rounded">
                                </td>
                                <td>
                                    <strong>{{ $project->title }}</strong>
                                    <br>
                                    <small class="text-muted">
                                        <i class="fas fa-code mr-1"></i> {{ $project->tech_stack ?? '-' }}
                                    </small>
                                    <br>
                                    <small>{{ Str::limit($project->description, 50) }}</small>
                                </td>
                                <td class="text-center align-middle" style="white-space: nowrap;">
                                    <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-warning btn-sm mr-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        var fileName = document.getElementById("imgInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
@endsection