@extends('admin.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Paket Harga: <strong>{{ $package->name }}</strong></h3>
            </div>
            <form action="{{ route('admin.packages.update', $package->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="card-body">
                    <div class="form-group">
                        <label>Nama Paket</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $package->name) }}" required>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label>Harga (Rp)</label>
                                <input type="number" name="price" class="form-control" value="{{ old('price', $package->price) }}" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label>Siklus (Contoh: / bulan)</label>
                                <input type="text" name="cycle" class="form-control" value="{{ old('cycle', $package->cycle) }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fitur (Satu per baris)</label>
                        <textarea name="features" class="form-control" rows="6" required>{{ old('features', $package->features) }}</textarea>
                        <small class="text-muted">Tekan ENTER untuk memisahkan setiap fitur.</small>
                    </div>

                    <div class="form-group">
                        <label>Link Tombol (Opsional)</label>
                        <input type="url" name="cta_link" class="form-control" value="{{ old('cta_link', $package->cta_link) }}" placeholder="https://...">
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox" id="popularCheck" name="is_popular" value="1" {{ $package->is_popular ? 'checked' : '' }}>
                            <label for="popularCheck" class="custom-control-label">Set sebagai Paket Populer (Best Seller)</label>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.packages.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-1"></i> Batal
                    </a>
                    <button type="submit" class="btn btn-warning float-right">
                        <i class="fas fa-save mr-1"></i> Update Paket
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection