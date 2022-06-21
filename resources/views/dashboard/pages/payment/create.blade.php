@extends('dashboard.layouts.main')

@section('title')
    Create Jurusan
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Pembayaran</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/payments">Data Pembayaran</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Pembayaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Pembayaran</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/payments" method="post">
                            @csrf
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
                                <label for="kd_bayar">Kode Bayar</label>
                                <input type="text" name="kd_bayar" id="kd_bayar" 
                                    class="form-control @error('kd_bayar') is-invalid @enderror" 
                                    placeholder="Enter nama" required value="{{ old('kd_bayar') }}">
                                    @error('kd_bayar')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="tagihan">Jumlah Bayar</label>
                                <input type="text" name="tagihan" id="tagihan" 
                                    class="form-control @error('tagihan') is-invalid @enderror" 
                                    placeholder="Enter tagihan" required value="{{ old('tagihan') }}">
                                    @error('tagihan')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="status">Status Pembayaran</label>
                                <div class="form-check-primary mb-4 mt-3">
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" id="lunas" class="form-check-input
                                        @error('status') is-invalid @enderror" value="Lunas" {{
                                            old('status')=='Lunas' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="lunas"> Lunas</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input type="radio" name="status" id="belum_lunas" class="form-check-input
                                        @error('status') is-invalid @enderror" value="Belum Lunas" {{
                                            old('status')=='Belum Lunas' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="belum_lunas"> Belum Lunas</label>
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