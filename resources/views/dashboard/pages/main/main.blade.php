@extends('dashboard.layouts.main')

@section('title')
    Dashboard PPDB Admin
@endsection

@section('container')
     <div class="page-title">
        <h3>Dashboard</h3>
        <p class="text-subtitle text-muted">Penerimaan Peserta Didik Baru SMA ANGKASA</p>
    </div>
    <section class="section">
        <div class="row mb-2">
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data User</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $user }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-3x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Jurusan</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $major }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-3x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $student }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-child fa-3x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Pembayaran</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $payment }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-credit-card fa-3x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Registrasi</div>
                                <div class="h5 mb-0 font-weight-bold text-white">{{ $registration }}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-registered fa-3x text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- kotak 1 --}}
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2 bg-primary">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-2xl font-weight-bold text-white text-uppercase mb-1">Data Pencabutan</div>
                            <div class="h5 mb-0 font-weight-bold text-white">{{ $revocation }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-backward fa-3x text-white"></i>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection