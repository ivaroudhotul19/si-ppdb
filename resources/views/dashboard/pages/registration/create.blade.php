@extends('dashboard.layouts.main')

@section('title')
    Create Registrasi
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Registrasi</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/registrations">Data Registrasi</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Registrasi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Registrasi</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/registrations" method="post">
                            @csrf
                            <div class="col-md-12 mb-3">
                                <label for="user_id">Admin</label>
                                <fieldset class="form-group">
                                    <select name="user_id" id="user_id" class="form-select">
                                        {{-- select combobox--}}
                                        @foreach ($users as $user)
                                           <option value="{{ $user->id }}">{{ $user->nip }} - {{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="student_id">Siswa</label>
                                <fieldset class="form-group">
                                    <select name="student_id" id="student_id" class="form-select">
                                        {{-- select combobox--}}
                                        @foreach ($students as $student)
                                           <option value="{{ $student->id }}">{{ $student->no_pendf }} - {{ $student->name }}</option>
                                        @endforeach
                                    </select>
                                </fieldset>
                            </div>
                            <div class="form-group mb-3">
                                <label for="no_registrasi">No Registrasi</label>
                                <input type="text" name="no_registrasi" id="no_registrasi" 
                                    class="form-control @error('no_registrasi') is-invalid @enderror" 
                                    placeholder="Enter nama" required value="{{ old('no_registrasi') }}">
                                    @error('no_registrasi')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tgl_registrasi">Tanggal Registasi</label>
                                <input type="date" name="tgl_registrasi" id="tgl_registrasi" 
                                    class="form-control @error('tgl_registrasi') is-invalid @enderror" 
                                    placeholder="Enter tgl_registrasi" required value="{{ old('tgl_registrasi') }}">
                                    @error('tgl_registrasi')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Status Registasi</label>
                                <div class="form-check-primary mb-4 mt-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" id="diseleksi" class="form-check-input
                                        @error('status') is-invalid @enderror" value="Diseleksi" {{
                                            old('status')=='Diseleksi' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="diseleksi"> Diseleksi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" id="diterima" class="form-check-input
                                        @error('status') is-invalid @enderror" value="Diterima" {{
                                            old('status')=='Diterima' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="diterima"> Diterima</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" id="dicabut" class="form-check-input
                                        @error('status') is-invalid @enderror" value="Dicabut" {{
                                            old('status')=='Dicabut' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="dicabut"> Dicabut</label>
                                    </div>
                                    @error ('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror    
                                </div>
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