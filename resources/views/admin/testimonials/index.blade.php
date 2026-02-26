@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Testimoni</h3>
            </div>
            <form action="{{ route('admin.testimonials.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Klien</label>
                        <input type="text" name="name" class="form-control" placeholder="Contoh: Budi Santoso" required>
                    </div>
                    <div class="form-group">
                        <label>Jabatan / Perusahaan</label>
                        <input type="text" name="position" class="form-control" placeholder="Contoh: CEO PT. Abadi" required>
                    </div>
                    <div class="form-group">
                        <label>Isi Testimoni</label>
                        <textarea name="content" class="form-control" rows="3" placeholder="Apa kata mereka?" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>Foto Klien (Opsional)</label>
                        <input type="file" name="photo" class="form-control">
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
                <h3 class="card-title">Daftar Testimoni</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Klien</th>
                            <th>Isi</th>
                            <th style="width: 100px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $item)
                        <tr>
                            <td>
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" 
                                         src="{{ $item->photo ? asset('storage/' . $item->photo) : 'https://ui-avatars.com/api/?name='.urlencode($item->name) }}" 
                                         alt="User Image">
                                    <span class="username"><a href="#">{{ $item->name }}</a></span>
                                    <span class="description">{{ $item->position }}</span>
                                </div>
                            </td>
                            <td>{{ Str::limit($item->content, 50) }}</td>
                            <td class="text-center" style="white-space: nowrap;">
    
    <a href="{{ route('admin.testimonials.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1">
        <i class="fas fa-edit"></i>
    </a>

    <form action="{{ route('admin.testimonials.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus testimoni ini?')">
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
@endsection