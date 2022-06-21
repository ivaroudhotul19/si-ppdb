@extends('dashboard.layouts.main')

@section('title')
    Detail Siswa {{ $student->name }}
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Siswa</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/students">Data Siswa</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Siswa</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mt-3">Data Siswa {{ $student->no_pendf }} - {{ $student->name }}</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <div class="table-responsive">
                            <table class='table table-striped'>
                                <tr>
                                    <th style="width: 30%" >Nomor Pendaftaran</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->no_pendf }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nama</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->name }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Foto</th>
                                    <th style="width: 1%">:</th>
                                    <td><img src="{{ asset('storage/'.$student->image) }}" alt="foto" class="img-fluid"
                                        width="200px">
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Jurusan</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->major->jurusan }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Tempat Lahir</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->tmpt_lahir }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Tanggal Lahir</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ date('d M Y',strtotime($student->tgl_lahir)) }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Jenis Kelamin</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->jns_kelamin }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Umur</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->umur }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Asal Sekolah</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->asal_sklh }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Alamat</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->almt }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Agama</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->agama }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nama Orang Tua</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->nama_ortu }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Pekerjaan Orang Tua</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->pkerjaan_ortu }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nilai Ujian Nasional</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->nilai_un }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Nilai Ujian Sekolah</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->nilai_usek }}</td>
                                </tr>
                                <tr>
                                    <th style="width: 30%" >Prestasi</th>
                                    <th style="width: 1%">:</th>
                                    <td>{{ $student->prestasi }}</td>
                                </tr>
                            </table>
                        </div>
                         <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                            <a href="/dashboard/students" class="btn btn-dark me-md-2">Back</a>
                            <a href="/download/detail-student/{{ $student->id }}" class="btn btn-dark me-md-2">Download Report</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection