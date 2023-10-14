@extends('layouts.app')

@section('title', 'Subjects')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <!--Header Section-->
            <div class="section-header">
                <h1>Subjects</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Subjects</a></div>
                    <div class="breadcrumb-item">All Subjects</div>
                </div>
            </div>

            <!--Body Section-->
            <div class="section-body">
                <!--Alert Message-->
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <!--Body-->
                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <!--Header (All User, New User)-->
                            <div class="card-header">
                                <h4>All Subjets</h4>
                                <div class="section-header-button">
                                    <a href="{{ route('subject.create') }}" class="btn btn-primary">New Subject</a>
                                </div>
                            </div>

                            <!--Body (Searc Box, Table)-->
                            <div class="card-body">
                                <!--Search Box-->
                                <div class="float-right">
                                    <form method="GET" action="{{ route('subject.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <!--Table-->
                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <!--Table Title-->
                                        <tr>
                                            <th>No</th>
                                            <th>Title</th>
                                            <th>Dosen</th>
                                            <th>Semester</th>
                                            <th>Tahun Akademik</th>
                                            <th>SKS</th>
                                            {{-- <th>Kode Matkul</th> --}}
                                            <th>Action</th>
                                        </tr>

                                        <!--Table Content, Display data from database using foreach loop-->
                                        <!--Auto Number-->
                                        @php
                                            $rowNumber = ($subjects->currentPage() - 1) * $subjects->perPage() + 1;
                                        @endphp

                                        <!--Table Content-->
                                        @foreach ($subjects as $subject)
                                            <tr>
                                                <td> {{ $rowNumber++ }} </td>
                                                <td>
                                                    {{ $subject->title }}
                                                </td>
                                                <td>
                                                    {{ $subject->dosen_id }}
                                                </td>
                                                <td>
                                                    {{ $subject->semester }}
                                                </td>
                                                <td>
                                                    {{ $subject->tahun_akademik }}
                                                </td>
                                                <td>
                                                    {{ $subject->sks }}
                                                </td>
                                                {{-- <td>
                                                    {{ $subject->kode_matkul }}
                                                </td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <!--Edit Button-->
                                                        <a href="{{ route('user.edit', $subject->id) }}"
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>

                                                        <!--Delete Button-->
                                                        <form action="{{ route('user.destroy', $subject->id) }}" method="POST"
                                                            class="ml-2">

                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                <i class="fas fa-times"></i>Delete
                                                            </button>
                                                        </form>
                                                    </div>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>

                                <!--Bottom Pagination [1, 2, ..]-->
                                <div class="float-right">
                                    {{ $subjects->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
