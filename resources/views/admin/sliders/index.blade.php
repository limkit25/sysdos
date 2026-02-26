@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header"><h3 class="card-title">Tambah Slide Baru</h3></div>
            <form action="{{ route('admin.sliders.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Gambar Banner (Wajib)</label>
                        <div class="custom-file">
                            <input type="file" name="image" class="custom-file-input" id="imgInput" required>
                            <label class="custom-file-label">Pilih Gambar...</label>
                        </div>
                        <small class="text-muted">Disarankan ukuran landscape lebar (misal: 1920x800px).</small>
                    </div>
                    <div class="form-group">
                        <label>Judul (Opsional)</label>
                        <input type="text" name="title" class="form-control" placeholder="Contoh: Promo Spesial">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi Singkat (Opsional)</label>
                        <textarea name="description" class="form-control" rows="2" placeholder="Keterangan tambahan..."></textarea>
                    </div>
                    <div class="form-group">
                        <label>Urutan</label>
                        <input type="number" name="order" class="form-control" value="0">
                    </div>
                </div>
                <div class="card-footer"><button type="submit" class="btn btn-primary btn-block">Upload Slide</button></div>
            </form>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card"><div class="card-header"><h3 class="card-title">Daftar Slide Aktif</h3></div>
            <div class="card-body p-0 table-responsive">
                <table class="table table-striped">
                    <thead><tr><th>Urutan</th><th>Gambar</th><th>Info Text</th><th>Aksi</th></tr></thead>
                    <tbody>
                        @foreach($sliders as $s)
                        <tr>
                            <td>{{ $s->order }}</td>
                            <td><img src="{{ asset('storage/' . $s->image) }}" height="60" class="rounded"></td>
                            <td><strong>{{ $s->title ?? '-' }}</strong><br><small>{{ Str::limit($s->description, 50) }}</small></td>
                            <td style="white-space: nowrap;">
                                <a href="{{ route('admin.sliders.edit', $s->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.sliders.destroy', $s->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus slide ini?')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>document.querySelector('.custom-file-input').addEventListener('change',function(e){e.target.nextElementSibling.innerText=e.target.files[0].name})</script>
@endsection