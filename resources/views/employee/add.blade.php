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
                        <form action="{{ route('pegawai.store') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" id="nip" class="form-control"
                                    value="{{ old('nip') }}">
                                @error('nip')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="name">Nama Lengkap</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    value="{{ old('name') }}">
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="place_of_birth">Tempat Lahir</label>
                                <input type="text" name="place_of_birth" id="place_of_birth" class="form-control"
                                    value="{{ old('place_of_birth') }}">
                                @error('place_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="day_of_birth">Tanggal Lahir</label>
                                <input type="date" name="day_of_birth" id="day_of_birth" class="form-control"
                                    value="{{ old('day_of_birth') }}">
                                @error('day_of_birth')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            @php
                                $gender = [
                                    ['identifier' => 'man', 'label' => 'Laki-laki'],
                                    ['identifier' => 'woman', 'label' => 'Perempuan'],
                                ];
                                $religion = ['islam', 'budha', 'katholik', 'kristen'];
                                $blood = ['a', 'b', 'ab', 'o'];
                            @endphp
                            <div class="form-group">
                                <label for="gender">Jenis Kelamin</label>
                                <select name="gender" id="gender" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($gender as $g)
                                        <option value="{{ $g['identifier'] }}"
                                            {{ old('gender') == $g['identifier'] ? 'selected' : '' }}>{{ $g['label'] }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('gender')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="religion">Agama</label>
                                <select name="religion" id="religion" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($religion as $r)
                                        <option value="{{ $r }}" {{ old('religion') == $r ? 'selected' : '' }}>
                                            {{ ucfirst($r) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('religion')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="blood_type">Golongan Darah</label>
                                <select name="blood_type" id="blood_type" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    @foreach ($blood as $b)
                                        <option value="{{ $b }}"
                                            {{ old('blood_type') == $b ? 'selected' : '' }}>
                                            {{ strtoupper($b) }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('blood_type')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat Lengkap</label>
                                <textarea name="address" id="address" rows="5" class="form-control">{{ old('address') }}</textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>
                        </form>
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
