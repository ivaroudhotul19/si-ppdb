@extends('dashboard.layouts.main')

@section('title')
    Edit Siswa {{ $student->name }}
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/students">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Edit Siswa</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/students/{{ $student->id }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="no_pendf">Nomor Pendaftaran</label>
                                        <input type="text" name="no_pendf" id="no_pendf" 
                                            class="form-control  @error('no_pendf') is-invalid @enderror"
                                            placeholder="Enter nomor pendaftaran" required value="{{ old('no_pendf',  $student->no_pendf) }}">
                                            @error ('no_pendf')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="name">Nama</label>
                                        <input type="text" name="name" id="name" 
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Enter nama" required value="{{ old('name', $student->name) }}">
                                            @error ('name')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <div class="col-lg-6 col-md-12">
                                            <label for="image">Foto</label>
                                            <div class="form-file">
                                                <label class="form-file-label" for="image"></label>
                                                <img class="img-preview img-fluid mb-3 col-sm-5 d-block" src="{{ asset('storage/'.$student->image) }}">
                                                <input type="file" name="image" id="image" 
                                                class="form-file-input @error('image') is-invalid @enderror"
                                                onchange="previewImage()">
                                                @error ('image')
                                                <div class="invalid-feedback">
                                                   {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 mb-3">
                                        <label for="major_id">Jurusan</label>
                                        <fieldset class="form-group">
                                            <select name="major_id" id="major_id" class="form-select">
                                                {{-- select combobox--}}
                                                @foreach ($majors as $major)
                                                    @if (old('major_id',  $student->major_id) == $major->id)
                                                    {{-- buat yang lama tidak hilang --}}
                                                        <option value="{{ $major->id }}" selected>{{ $major->jurusan }}</option>
                                                    @else     
                                                        <option value="{{ $major->id }}">{{  $major->jurusan }}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </fieldset>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="asal_sklh">Asal Sekolah</label>
                                        <input type="text" name="asal_sklh" id="asal_sklh" 
                                            class="form-control @error('asal_sklh') is-invalid @enderror"
                                            placeholder="Enter asal sekolah" required value="{{ old('asal_sklh', $student->asal_sklh) }}">
                                            @error ('asal_sklh')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="tmpt_lahir">Tempat Lahir</label>
                                        <input type="text" name="tmpt_lahir" id="tmpt_lahir" 
                                            class="form-control @error('tmpt_lahir') is-invalid @enderror"
                                            placeholder="Enter tempat lahir" required value="{{ old('tmpt_lahir', $student->tmpt_lahir) }}">
                                            @error ('tmpt_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tgl_lahir">Tanggal Lahir</label>
                                        <input type="date" name="tgl_lahir" id="tgl_lahir" 
                                            class="form-control @error('tgl_lahir') is-invalid @enderror"
                                            placeholder="Enter tanggal lahir" required value="{{ old('tgl_lahir', $student->tgl_lahir) }}">
                                            @error ('tgl_lahir')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="umur">Umur</label>
                                        <input type="text" name="umur" id="umur" 
                                            class="form-control @error('umur') is-invalid @enderror"
                                            placeholder="Enter umur" required value="{{ old('umur', $student->umur) }}">
                                            @error ('umur')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="jns_kelamin">Jenis Kelamin</label>
                                        <div class="form-check-primary mb-4 mt-3">
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jns_kelamin" id="laki" class="form-check-input
                                                @error('jns_kelamin') is-invalid @enderror" value="Laki-Laki" 
                                                {{ old('jns_kelamin', $student->jns_kelamin)=='Laki-Laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="laki"> Laki-laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input type="radio" name="jns_kelamin" id="perempuan" class="form-check-input
                                                @error('jns_kelamin') is-invalid @enderror" value="Perempuan"
                                                {{ old('jns_kelamin', $student->jns_kelamin)=='Perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perempuan"> Perempuan</label>
                                            </div>
                                            @error ('jns_kelamin')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror    
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="agama">Agama</label>
                                        <input type="text" name="agama" id="agama" 
                                            class="form-control @error('agama') is-invalid @enderror"
                                            placeholder="Enter agama" required value="{{ old('agama', $student->agama) }}">
                                            @error ('agama')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                    </div>
                                
                                </div>
                            </div>
                            <div>
                                <div class="form-group mb-3">
                                    <label for="almt">Alamat</label>
                                    <input type="text" name="almt" id="almt" 
                                        class="form-control @error('almt') is-invalid @enderror" 
                                        placeholder="Enter alamat" required value="{{ old('almt', $student->almt) }}">
                                        @error ('almt')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="nama_ortu">Nama Orang Tua</label>
                                    <input type="text" name="nama_ortu" id="nama_ortu" 
                                        class="form-control @error('nama_ortu') is-invalid @enderror" 
                                        placeholder="Enter nama orang tua" required value="{{ old('nama_ortu', $student->nama_ortu) }}">
                                        @error ('nama_ortu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label for="pkerjaan_ortu">Pekerjaan Orang Tua</label>
                                    <input type="text" name="pkerjaan_ortu" id="pkerjaan_ortu" 
                                        class="form-control @error('pkerjaan_ortu') is-invalid @enderror"
                                        placeholder="Enter pekerjaan orang tua" required value="{{ old('pkerjaan_ortu', $student->pkerjaan_ortu) }}">
                                        @error ('pkerjaan_ortu')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nilai_un">Nilai Ujian Nasional</label>
                                            <input type="text" name="nilai_un" id="nilai_un" 
                                                class="form-control @error('nilai_un') is-invalid @enderror"
                                                placeholder="Enter nilai ujian nasional" required value="{{ old('nilai_un', $student->nilai_un) }}">
                                                @error ('nilai_un')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-3">
                                            <label for="nilai_usek">Nilai Ujian Sekolah</label>
                                            <input type="text" name="nilai_usek" id="nilai_usek" 
                                                class="form-control @error('nilai_usek') is-invalid @enderror"
                                                placeholder="Enter nilai ujian sekolah" required value="{{ old('nilai_usek', $student->nilai_usek) }}">
                                                @error ('nilai_usek')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="prestasi" class="form-label">Prestasi</label>
                                    <textarea type="text" name="prestasi" id="prestasi" class="form-control"
                                        rows="3"></textarea>
                                </div>
                                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                                    <button type="reset" class="btn btn-light me-md-2">Cancel</button>
                                    <button type="submit" class="btn btn-secondary">Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    document.addEvenListner('trix-file-accept', function(e) {
        e.preventDefault();
    });
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        
        imgPreview.style.display = 'block';

        const oFReader = new  FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>
@endsection