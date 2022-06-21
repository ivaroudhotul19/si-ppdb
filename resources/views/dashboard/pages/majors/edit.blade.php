@extends('dashboard.layouts.main')

@section('title')
    Edit Jurusan {{ $major->kd_jurusan }}
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit Jurusan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/majors">Data Jurusan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Jurusan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Edit Jurusan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/majors/{{ $major->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="kd_jurusan">Kode</label>
                                <input type="text" name="kd_jurusan" id="kd_jurusan" 
                                    class="form-control @error('kd_jurusan') is-invalid @enderror" 
                                    placeholder="Enter kode jurusan" required value="{{ old('kd_jurusan', $major->kd_jurusan) }}" autofocus>
                                    @error('kd_jurusan')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="jurusan">Jurusan</label>
                                <input type="text" name="jurusan" id="jurusan" 
                                    class="form-control @error('jurusan') is-invalid @enderror" 
                                    placeholder="Enter jurusan" required value="{{ old('jurusan', $major->jurusan) }}">
                                    @error('jurusan')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="daya_tampung">Daya Tampung</label>
                                <input type="text" name="daya_tampung" id="daya_tampung" 
                                    class="form-control @error('daya_tampung') is-invalid @enderror"
                                    placeholder="Enter daya tampung" required value="{{ old('daya_tampung', $major->daya_tampung) }}">
                                    @error('daya_tampung')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="thn_ajaran">Tahun Ajaran</label>
                                <input type="text" name="thn_ajaran" id="thn_ajaran" 
                                    class="form-control @error('thn_ajaran') is-invalid @enderror"
                                    placeholder="Enter tahun ajaran" required value="{{ old('thn_ajaran', $major->thn_ajaran) }}">
                                    @error('thn_ajaran')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                <button type="reset" class="btn btn-light me-md-2">Cancel</button>
                                <button type="submit" class="btn btn-dark">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection