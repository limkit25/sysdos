@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-plus-circle mr-2"></i>Tambah Logo Partner</h3>
            </div>
            <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    
                    <div class="form-group">
                        <label>Nama Klien/Partner</label>
                        <input type="text" name="name" class="form-control" required placeholder="Contoh: PT. Maju Jaya">
                    </div>
                    
                    <div class="form-group">
                        <label>Upload Logo</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" name="logo" class="custom-file-input" id="logoInput" required>
                                <label class="custom-file-label" for="logoInput">Pilih file logo...</label>
                            </div>
                        </div>
                        <small class="text-muted">Disarankan format PNG Transparan (Max 1MB).</small>
                        @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label>Urutan Tampil (Angka)</label>
                        <input type="number" name="order" class="form-control" value="0">
                        <small class="text-muted">Angka lebih kecil tampil lebih dulu.</small>
                    </div>

                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-upload mr-2"></i> Simpan Partner</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card card-outline card-info">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-list-alt mr-2"></i>Daftar Logo Partner</h3>
            </div>
            <div class="card-body p-0">
                @if(session('success'))
                    <div class="alert alert-success m-3">{{ session('success') }}</div>
                @endif

                <table class="table table-striped table-valign-middle">
                    <thead>
                        <tr>
                            <th style="width: 50px">Urutan</th>
                            <th>Logo</th>
                            <th>Nama Klien</th>
                            <th style="width: 80px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($partners as $partner)
                        <tr>
                            <td>{{ $partner->order }}</td>
                            <td>
                                <img src="{{ asset('storage/' . $partner->logo) }}" 
                                     alt="{{ $partner->name }}" 
                                     style="max-height: 40px; filter: grayscale(100%);">
                            </td>
                            <td>{{ $partner->name }}</td>
                            <td>
                                <a href="{{ route('admin.partners.edit', $partner->id) }}" class="btn btn-warning btn-sm">
    <i class="fas fa-edit"></i>
</a>
                                <form action="{{ route('admin.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus partner ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">Belum ada logo partner yang ditambahkan.</td>
                        </tr>
                        @endforelse
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