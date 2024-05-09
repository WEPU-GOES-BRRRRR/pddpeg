@extends('layouts._default.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Heading -->
                            <h1 class="h3 text-gray-800">Form Tambah Pegawai</h1>
                            <a href="{{ route('pegawai.index') }}" class="btn btn-danger">
                                <i class="fa-solid fa-xmark"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="nip">NIP</label>
                            <input type="text" class="form-control" value="{{ $employee->nip }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ $employee->name }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="day_of_birth">Tempat, Tanggal Lahir</label>
                            <input type="text" class="form-control"
                                value="{{ $employee->place_of_birth }}, {{ $employee->day_of_birth }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="gender">Jenis Kelamin</label>
                            <input type="text" class="form-control" value="{{ $employee->gender }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="religion">Agama</label>
                            <input type="text" class="form-control" value="{{ $employee->religion }}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="blood_type">Golongan Darah</label>
                            <input type="text" class="form-control" value="{{ strtoupper($employee->blood_type) }}"
                                readonly>
                        </div>
                        <div class="form-group">
                            <label for="address">Alamat Lengkap</label>
                            <textarea rows="5" class="form-control" readonly>{{ $employee->address }}</textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <script>
        new DataTable('#tabel_pegawai')
    </script>
@endsection
