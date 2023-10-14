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
                <h1>Generate QrCode</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">User</a></div>
                    <div class="breadcrumb-item">Generate QrCode</div>
                </div>
            </div>

            <!--Body Section-->
            <div class="section-body">
                <!--New User Form-->
                {{-- {{ $schedule->kode_absensi }} --}}
                <div class="card">
                    <form action="{{ route('generate-qrcode-update', $schedule) }}" method="POST">
                        @csrf
                        @method('put')
                        <!--Form Title-->
                        <div class="card-header">
                            <h4>Masukkan Kode</h4>
                        </div>

                        <!--Form Body-->
                        <div class="card-body">
                            <!--Kode-->
                            <div class="form-group">
                                <label>Kode Absensi</label>
                                <input type="text"
                                    class="form-control @error('code')
                                    is-invalid
                                @enderror"
                                    name="code">
                                @error('code')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
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
