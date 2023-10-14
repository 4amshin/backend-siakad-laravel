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
                <h1>QRCode</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">User</a></div>
                    <div class="breadcrumb-item">Show QrCode</div>
                </div>
            </div>

            <!--Body Section-->
            <div class="section-body">
                <!--Show QR Code-->
                <div class="visible-print text-center">
                    {!! QrCode::size(200)->generate($code) !!}
                    <p>Scan me to return to the original page.</p>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->

    <!-- Page Specific JS File -->
@endpush
