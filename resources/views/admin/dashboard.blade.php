@extends('admin.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Dashboard Ringkasan</h1>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            
            <div class="col-lg-3 col-6">
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $total_projects }}</h3>
                        <p>Total Project</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <a href="{{ route('admin.projects.index') }}" class="small-box-footer">
                        Kelola Project <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $total_services }}</h3>
                        <p>Layanan Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <a href="{{ route('admin.services.index') }}" class="small-box-footer">
                        Lihat Layanan <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $total_testimonials }}</h3>
                        <p>Testimoni Klien</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <a href="{{ route('admin.testimonials.index') }}" class="small-box-footer">
                        Lihat Testimoni <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $total_messages }}</h3>
                        <p>Pesan Masuk</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <a href="{{ route('admin.contacts.index') }}" class="small-box-footer">
                        Buka Inbox <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header border-0">
                        <h3 class="card-title">Selamat Datang, {{ Auth::user()->name }}!</h3>
                    </div>
                    <div class="card-body">
                        <p>Selamat datang di panel administrator SysDev. Anda dapat mengelola semua konten website dari panel ini.</p>
                        <p>Gunakan menu di sebelah kiri untuk mulai mengedit.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
@endsection