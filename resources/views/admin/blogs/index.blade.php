@extends('admin.layout')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Daftar Artikel</h3>
        <div class="card-tools">
            <a href="{{ route('admin.blogs.create') }}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tulis Baru</a>
        </div>
    </div>
    <div class="card-body p-0">
        <table class="table table-striped">
            <thead><tr><th>Gambar</th><th>Judul</th><th>Tanggal</th><th>Aksi</th></tr></thead>
            <tbody>
                @foreach($blogs as $blog)
                <tr>
                    <td><img src="{{ asset('storage/'.$blog->image) }}" height="50"></td>
                    <td>{{ $blog->title }}</td>
                    <td>{{ $blog->created_at->format('d M Y') }}</td>
                    <td>
                        <a href="{{ route('admin.blogs.edit', $blog->id) }}" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('admin.blogs.destroy', $blog->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Hapus?')">@csrf @method('DELETE')<button class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></button></form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection