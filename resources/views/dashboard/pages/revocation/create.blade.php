@extends('dashboard.layouts.main')
@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Input Pencabutan</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/revocations">Data Pencabutan</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Input Pencabutan</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Input Pencabutan</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/revocations" method="post">
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
                                <label for="tgl_cabut">Tanggal Pencabutan</label>
                                <input type="date" name="tgl_cabut" id="tgl_cabut" 
                                    class="form-control @error('tgl_cabut') is-invalid @enderror" 
                                    placeholder="Enter nama" required value="{{ old('tgl_cabut') }}">
                                    @error('tgl_cabut')
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