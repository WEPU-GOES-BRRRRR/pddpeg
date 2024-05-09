@extends('layouts._default.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <div class="row">
        <div class="col-lg-12">
            {{-- Dropdown --}}
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-10">
                            <div class="form-group">
                                <select
                                    name="employee"
                                    id="employee"
                                    class="form-control"
                                >
                                    <option value="">-- Pilih --</option>
                                    @foreach ($employees as $key => $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="d-grid">
                                <button
                                    class="btn btn-success"
                                    onclick="handleCari()"
                                >Cari</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div
                class="card shadow-sm"
                id="canvas_tabel"
                hidden
            >
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Page Heading -->
                        <h1
                            class="h3 text-gray-800"
                            id="tabel_title"
                        >Data Keluarga</h1>
                        <a
                            id="btn_tambah_data_keluarga"
                            href="#"
                            role="button"
                            class="btn btn-success"
                            onclick="toggleModal('addFamilyModal')"
                        >Tambah Data</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table
                            class="table my-3"
                            id="tabel_keluarga"
                        >
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">Nama</th>
                                    <th scope="col">JK</th>
                                    <th scope="col">Lahir</th>
                                    <th scope="col">Hubungan</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody id="canvas_data">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@include('family.partials.modal')

@include('family.partials.script')
@endsection
