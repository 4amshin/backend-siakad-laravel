@extends('layouts.app')

@section('title', 'Blank Page')

@push('style')
    <!-- CSS Libraries -->
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <!--Header Section-->
            <div class="section-header">
                <h1>New User</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">User</a></div>
                    <div class="breadcrumb-item">New User</div>
                </div>
            </div>

            <!--Body Section-->
            <div class="section-body">
                <!--New User Form-->
                <div class="card">
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf
                        <!--Form Title-->
                        <div class="card-header">
                            <h4>New User</h4>
                        </div>

                        <!--Form Body-->
                        <div class="card-body">
                            <!--Name-->
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text"
                                    class="form-control @error('name')
                                    is-invalid
                                @enderror"
                                    name="name">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--Email-->
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email"
                                    class="form-control @error('email')
                                    is-invalid
                                @enderror"
                                    name="email">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--Password-->
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password"
                                    class="form-control @error('password')
                                    is-invalid
                                @enderror"
                                    name="password">
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!--Roles-->
                            <div class="form-group">
                                <label class="form-label">Roles</label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="admin" class="selectgroup-input"
                                            checked="">
                                        <span class="selectgroup-button">Admin</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="dosen" class="selectgroup-input">
                                        <span class="selectgroup-button">Dosen</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" name="roles" value="mahasiswa" class="selectgroup-input">
                                        <span class="selectgroup-button">Mahasiswa</span>
                                    </label>
                                </div>
                            </div>

                            <!--Phone-->
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" class="form-control" name="phone">
                            </div>

                            <!--Address-->
                            <div class="form-group mb-0">
                                <label>Address</label>
                                <textarea class="form-control" data-height="150" name="address"></textarea>
                            </div>
                        </div>

                        <!--Submit Button-->
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
