@extends('layouts._default.dashboard')
@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    {{-- Perubahan ahmad --}}
    <h1>Ahmad Fadilah</h1>

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
            >
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <!-- Page Heading -->
                        <h1
                            class="h3 text-gray-800"
                            id="tabel_title"
                        ></h1>
                        <a
                            href="#"
                            class="btn btn-success"
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
                                {{-- @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $employee->nip }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->gender == 'man' ? 'Laki-laki' : 'Perempuan' }}</td>
                                <td>{{ $employee->place_of_birth }}, {{ $employee->day_of_birth }}</td>
                                <td>
                                    <a
                                        href="{{ route('pegawai.detail', ['employee' => $employee->id]) }}"
                                        class="btn btn-sm btn-primary"
                                    >Detail</a>
                                    <a
                                        href="{{ route('pegawai.edit', ['employee' => $employee->id]) }}"
                                        class="btn btn-sm btn-warning"
                                    >Edit</a>
                                    <a
                                        href="#"
                                        onclick="handleHapus({{ $employee->id }})"
                                        class="btn btn-sm btn-danger"
                                    >Hapus</a>
                                </td>
                                </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<script>
    new DataTable('#tabel_keluarga', {
            layout: {
                topStart: {
                    buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
                }
            }
        })

        function handleHapus(id) {
            Swal.fire({
                title: "Apakah anda yakin?",
                text: "Anda mungkin tidak bisa mengembalikan data ini!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Hapus!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ config('app.url') }}/pegawai/hapus/${id}`,
                        method: 'POST',
                        data: {
                            _token: `{{ csrf_token() }}`,
                            _method: `DELETE`
                        },
                        success: function(response) {
                            Swal.fire({
                                title: response.title,
                                icon: response.icon,
                                text: response.text
                            }).then((result1) => {
                                if (result1.isConfirmed) {
                                    window.location.reload()
                                }
                            })
                        }
                    })
                }
            });
        }

        function handleCari() {
            let employee_id = $('#employee').val()
            let html = ``;
            $.ajax({
                url: `{{ config('app.url') }}/keluarga/${employee_id}/get`,
                method: 'GET',
                success: function(response) {
                    response.forEach((data, index) => {
                        html += `
                        <tr>
                            <td>${data.name}</td>
                            <td>${data.gender == 'man' ? 'Laki-laki' : 'Perempuan'}</td>
                            <td>${data.place_of_birth}, ${data.day_of_birth}</td>
                            <td>${data.status}</td>
                            <td>
                                <a href="#"
                                    class="btn btn-sm btn-primary">Detail</a>
                                    <a href="#"
                                    class="btn btn-sm btn-warning">Edit</a>
                                <a href="#"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        `
                    })
                    $('#canvas_data').html(html)
                    $('#tabel_title').text('Data Keluarga')
                    $('#canvas_tabel').removeClass('d-none');
                },
                error: function(erro) {
                    Swal.fire({
                        title: 'Mencari Data Keluarga',
                        icon: 'error',
                        text: 'Gagal menemukan data keluarga!'
                    }).then((resultWhenError) => {
                        if (resultWhenError.isConfirmed) {
                            window.location.reload()
                        }
                    })
                }
            })
        }
</script>
@endsection
