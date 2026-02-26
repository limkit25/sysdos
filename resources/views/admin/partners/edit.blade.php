@extends('admin.layout')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Edit Partner: {{ $partner->name }}</h3>
            </div>
            <form action="{{ route('admin.partners.update', $partner->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="form-group">
                        <label>Nama Klien/Partner</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $partner->name) }}" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Logo Saat Ini</label><br>
                        <img src="{{ asset('storage/' . $partner->logo) }}" height="50" class="mb-2 border p-1">
                        <div class="custom-file">
                            <input type="file" name="logo" class="custom-file-input" id="logoInput">
                            <label class="custom-file-label" for="logoInput">Ganti Logo...</label>
                        </div>
                        <small class="text-muted">Kosongkan jika tidak ingin mengganti logo.</small>
                    </div>

                    <div class="form-group">
                        <label>Urutan Tampil</label>
                        <input type="number" name="order" class="form-control" value="{{ old('order', $partner->order) }}">
                    </div>
                </div>

                <div class="card-footer">
                    <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-warning float-right">Update Partner</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    document.querySelector('.custom-file-input').addEventListener('change', function(e){
        var fileName = document.getElementById("logoInput").files[0].name;
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
    })
</script>
@endsection