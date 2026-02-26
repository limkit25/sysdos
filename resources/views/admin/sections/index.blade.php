@extends('admin.layout')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Atur Urutan & Tampilan Section</h3>
            </div>
            <form action="{{ route('admin.sections.update') }}" method="POST">
                @csrf
                <div class="card-body p-0">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th width="100">Urutan (1-7)</th>
                                <th>Nama Section</th>
                                <th class="text-center">Tampilkan?</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sections as $section)
                            <tr>
                                <td>
                                    <input type="number" name="sections[{{ $section->id }}][order]" 
                                           class="form-control text-center font-weight-bold" 
                                           value="{{ $section->order }}">
                                </td>
                                <td class="align-middle font-weight-bold">{{ $section->label }}</td>
                                <td class="text-center align-middle">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" 
                                               id="sec_{{ $section->id }}" 
                                               name="sections[{{ $section->id }}][is_visible]" 
                                               value="1" 
                                               {{ $section->is_visible ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="sec_{{ $section->id }}"></label>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer text-right">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save mr-2"></i> Simpan Urutan</button>
                </div>
            </form>
        </div>
        <div class="alert alert-info mt-3">
            <i class="fas fa-info-circle mr-2"></i>
            <strong>Tips:</strong> Ubah angka urutan (1 = Paling Atas). Jangan lupa klik Simpan.
        </div>
    </div>
</div>
@endsection