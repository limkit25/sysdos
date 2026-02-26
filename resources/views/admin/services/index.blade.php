@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Layanan</h3>
            </div>
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: Web Development" required>
                    </div>

                    <div class="form-group">
                        <label>Upload Logo Layanan</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="logoInput" required>
                                <label class="custom-file-label" for="logoInput">Pilih file logo...</label>
                            </div>
                        </div>
                        <small class="text-muted">Format: PNG Transparan disarankan (Max 1MB).</small>
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Singkat</label>
                        <textarea name="short_desc" class="form-control summernote" rows="3" placeholder="Keterangan layanan..." required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Urutan Tampil</label>
                        <input type="number" name="order" class="form-control" value="0" required>
                        <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Layanan</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="width: 50px;">Urutan</th> <th style="width: 70px;">Ikon</th>
                            <th>Layanan</th>
                            <th>Deskripsi</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($services as $item)
                        <tr>
                            <td>{{ $item->order }}</td> <td class="text-center">
                                <i class="{{ $item->icon }} fa-2x text-primary"></i>
                            </td>
                            <td class="font-weight-bold">{{ $item->title }}</td>
                            <td>{{ $item->short_desc }}</td>
                            <td class="text-center" style="white-space: nowrap;">
                                <a href="{{ route('admin.services.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.services.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus layanan ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
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