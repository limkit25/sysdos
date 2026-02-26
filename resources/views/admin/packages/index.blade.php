@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-4">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Tambah Paket Harga</h3>
            </div>
            <form action="{{ route('admin.packages.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="name" class="form-control" placeholder="Misal: Basic" required>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga (Rp)</label>
                                <input type="number" name="price" class="form-control" placeholder="500000" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Siklus</label>
                                <input type="text" name="cycle" class="form-control" placeholder="/ bulan" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Fitur (Satu per baris)</label>
                        <textarea name="features" class="form-control" rows="5" placeholder="Gratis Domain&#10;SSL Certificate&#10;Support 24/7" required></textarea>
                        <small class="text-muted">Tekan ENTER untuk memisahkan setiap fitur.</small>
                    </div>
                    <div class="form-group">
                        <label>Link Tombol (Opsional)</label>
                        <input type="url" name="cta_link" class="form-control" placeholder="https://wa.me/...">
                    </div>
                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="popularCheck" name="is_popular" value="1">
                            <label for="popularCheck" class="custom-control-label">Set sebagai Paket Populer (Best Seller)</label>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Simpan Paket</button>
                </div>
            </form>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar Paket</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Paket</th>
                            <th>Harga</th>
                            <th>Populer?</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($packages as $item)
                        <tr>
                            <td class="font-weight-bold">{{ $item->name }}</td>
                            <td>Rp {{ number_format($item->price, 0, ',', '.') }} {{ $item->cycle }}</td>
                            <td>
                                @if($item->is_popular)
                                    <span class="badge badge-success">Ya</span>
                                @else
                                    <span class="badge badge-secondary">Tidak</span>
                                @endif
                            </td>
                            <td class="text-center" style="white-space: nowrap;">
                                <a href="{{ route('admin.packages.edit', $item->id) }}" class="btn btn-warning btn-sm mr-1"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.packages.destroy', $item->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus paket ini?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button>
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