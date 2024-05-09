@extends('layouts._default.dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <div class="card shadow-sm">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <!-- Page Heading -->
                            <h1 class="h3 text-gray-800">Tabel Pegawai</h1>
                            <a href="{{ route('pegawai.add') }}" class="btn btn-success">Tambah Data</a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table my-3" id="tabel_pegawai">
                                <thead class="thead-dark">
                                    <tr>
                                        <th scope="col">NIP</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">JK</th>
                                        <th scope="col">Lahir</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($employees as $key => $employee)
                                        <tr>
                                            <td>{{ $employee->nip }}</td>
                                            <td>{{ $employee->name }}</td>
                                            <td>{{ $employee->gender == 'man' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $employee->place_of_birth }}, {{ $employee->day_of_birth }}</td>
                                            <td>
                                                <a href="{{ route('pegawai.detail', ['employee' => $employee->id]) }}"
                                                    class="btn btn-sm btn-primary">Detail</a>
                                                <a href="{{ route('pegawai.edit', ['employee' => $employee->id]) }}"
                                                    class="btn btn-sm btn-warning">Edit</a>
                                                <a href="#" onclick="handleHapus({{ $employee->id }})"
                                                    class="btn btn-sm btn-danger">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
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
        new DataTable('#tabel_pegawai', {
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
    </script>
@endsection
