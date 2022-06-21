@extends('dashboard.layouts.main')

@section('title')
    Edit User {{ $user->name }}
@endsection

@section('container')
<section id="input-style">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                <h3>Edit User</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class='breadcrumb-header'>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/dashboard/users">Data User</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="card">
            <div class="card-header mt-3">
                <h4 class="card-title">Form Edit User</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-2">
                        <form action="/dashboard/users/{{ $user->id }}" method="post">
                            @method('put')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="name">Nama</label>
                                <input type="text" name="name" id="name" 
                                    class="form-control @error('name') is-invalid @enderror" 
                                    placeholder="Enter nama" required value="{{ old('name', $user->name) }}" 
                                    autofocus>
                                    @error('name')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="nip">Nip</label>
                                <input type="text" name="nip" id="nip" 
                                    class="form-control @error('nip') is-invalid @enderror" 
                                    placeholder="Enter nip" required value="{{ old('nip', $user->nip) }}">
                                    @error('nip')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" 
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter email" required value="{{ old('email', $user->email) }}">
                                    @error('email')
                                        <div class="position-absolute mb-5 invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" 
                                    class="form-control @error('password') is-invalid @enderror"
                                    placeholder="Enter new password" value="{{ old('password') }}">
                                    @error('password')
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