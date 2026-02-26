@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-cogs mr-2"></i>Pengaturan Umum Website</h3>
            </div>
            
            <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                
                <div class="card-body">
                    <div class="row">
                        
                        <div class="col-md-6">
                            <h5 class="text-primary border-bottom pb-2 mb-3">Identitas & Tampilan</h5>

                            <div class="form-group">
                                <label>Logo Website</label><br>
                                @if($setting->logo)
                                    <div class="mb-2 p-2 bg-secondary rounded d-inline-block">
                                        <img src="{{ asset('storage/' . $setting->logo) }}" height="40" alt="Logo">
                                    </div>
                                @endif
                                <div class="custom-file">
                                    <input type="file" name="logo" class="custom-file-input" id="logoInput">
                                    <label class="custom-file-label" for="logoInput">Ganti Logo...</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Nama Website / Perusahaan</label>
                                <input type="text" name="site_name" class="form-control" value="{{ $setting->site_name }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>Email Kontak</label>
                                <input type="email" name="email" class="form-control" value="{{ $setting->email }}" required>
                            </div>
                            
                            <div class="form-group">
                                <label>No. Telepon / WhatsApp</label>
                                <input type="text" name="phone" class="form-control" value="{{ $setting->phone }}" required>
                            </div>
                            
                            
                            <div class="form-group">
                                <label>Alamat Kantor</label>
                                <textarea name="address" class="form-control" rows="3" required>{{ $setting->address }}</textarea>
                            </div>

                            <hr>
                            
                            <div class="form-group">
                                <label>Warna Tema Website</label>
                                <div class="input-group">
                                    <input type="color" name="theme_color" class="form-control form-control-color" 
                                           value="{{ $setting->theme_color ?? '#4dabf7' }}" title="Pilih warna tema">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Background Hero Section</label><br>
                                @if($setting->hero_image)
                                    <img src="{{ asset('storage/' . $setting->hero_image) }}" height="80" class="mb-2 rounded border p-1">
                                @endif
                                <div class="custom-file">
                                    <input type="file" name="hero_image" class="custom-file-input" id="heroImage">
                                    <label class="custom-file-label" for="heroImage">Ganti Background...</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <h5 class="text-primary border-bottom pb-2 mb-3">Sosial Media</h5>
                            
                            <div class="form-group">
                                <label><i class="fab fa-facebook text-primary mr-2"></i>Facebook</label>
                                <input type="url" name="facebook" class="form-control" value="{{ $setting->facebook }}">
                            </div>
                            <div class="form-group">
                                <label><i class="fab fa-instagram text-danger mr-2"></i>Instagram</label>
                                <input type="url" name="instagram" class="form-control" value="{{ $setting->instagram }}">
                            </div>
                            <div class="form-group">
                                <label><i class="fab fa-linkedin text-info mr-2"></i>LinkedIn</label>
                                <input type="url" name="linkedin" class="form-control" value="{{ $setting->linkedin }}">
                            </div>
                            <div class="form-group">
                                <label><i class="fab fa-twitter text-info mr-2"></i>Twitter / X</label>
                                <input type="url" name="twitter" class="form-control" value="{{ $setting->twitter }}">
                            </div>

                            {{-- <h5 class="text-primary border-bottom pb-2 mb-3 mt-5">
                                <i class="fas fa-eye mr-2"></i>Tampilkan / Sembunyikan Section
                            </h5>
                            
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchHero" name="show_hero" value="1" {{ $setting->show_hero ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchHero">Hero Section</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchPartner" name="show_partners" value="1" {{ $setting->show_partners ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchPartner">Logo Partner</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchService" name="show_services" value="1" {{ $setting->show_services ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchService">Layanan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchPricing" name="show_pricing" value="1" {{ $setting->show_pricing ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchPricing">Paket Harga</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchPortfolio" name="show_portfolio" value="1" {{ $setting->show_portfolio ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchPortfolio">Portfolio</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchTesti" name="show_testimonials" value="1" {{ $setting->show_testimonials ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchTesti">Testimoni</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-switch">
                                            <input type="checkbox" class="custom-control-input" id="switchContact" name="show_contact" value="1" {{ $setting->show_contact ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="switchContact">Kontak Form</label>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                        </div>
                    </div>
                </div>

                <div class="card-footer text-right bg-light">
                    <button type="submit" class="btn btn-primary px-4">
                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    // Script untuk nama file upload
    document.querySelectorAll('.custom-file-input').forEach(input => {
        input.addEventListener('change', function(e){
            var fileName = e.target.files[0].name;
            var nextSibling = e.target.nextElementSibling
            nextSibling.innerText = fileName
        })
    });
</script>
@endsection