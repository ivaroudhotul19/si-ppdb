@extends('dashboard.layouts.main')

@section('alert-css')
    <link rel="stylesheet" href={{ asset("assets/sweetalert2.min.css") }}>
@endsection

@section('title')
    Dashboard Pembayaran
@endsection

@section('container')
<div class="main-content container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Data Pembayaran</h3> 
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data Pembayaran</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-md-flex justify-content-md-end mt-2">
                <a href="/dashboard/payments/create" class="btn btn-primary me-md-2"><i class="fas fa-plus">
                    </i> Add Pembayaran
                </a>
                <a href="/download/payments" class="btn btn-primary">
                    <i class="fas fa-file-download"></i><span> Download Report</span>
                </a>
            </div>
            <div class="card-body">
                <table class='table table-striped' id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Siswa</th>
                            <th>Kode Bayar</th>
                            <th>Tagihan</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($payments as $payment)   
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $payment->new_student->name }}</td>
                                <td>{{ $payment->kd_bayar }}</td>
                                <td>Rp. {{ number_format($payment->tagihan) }}</td>
                                <td>{{ $payment->status }}</td>
                                <td>    
                                    <a href="/dashboard/payments/{{ $payment->id }}/edit" class="btn btn-warning icon">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="/dashboard/payments/{{ $payment->id }}" method="post" id="btn-delete" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        {{-- <input name="_method" type="hidden" value="DELETE"> --}}
                                        <button class="btn btn-danger icon show_confirm" data-toggle="tooltip" title='Delete'>
                                            <i class="fas fa-trash"></i>
                                        </button>        
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>
@endsection

@section('alert')
<script src={{ asset("assets/sweetalert2.min.js") }}></script>
<script type="text/javascript">
     $('.show_confirm').click(function(event) {
          var form =  $(this).closest("form");
          var name = $(this).data("name");
          event.preventDefault();
          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
                }
            })
      });
</script>
@endsection