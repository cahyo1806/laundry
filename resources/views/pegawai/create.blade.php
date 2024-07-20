@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Tambah Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pegawai</a></div>
        <div class="breadcrumb-item">Tambah Pegawai</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pegawai.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nama_pegawai">Id Pegawai:</label>
                        <input type="number" class="form-control" id="id_pegawai" name="id_pegawai" value="{{ old('id_pegawai') }}" required>
                        @error('id_pegawai')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai:</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{ old('nama_pegawai') }}" required>
                        @error('nama_pegawai')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                        @error('password')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat:</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat') }}" required>
                        @error('alamat')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_hp">Nomor HP:</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp') }}" required>
                        @error('no_hp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jabatan">Jabatan:</label>
                        <select class="form-control" id="jabatan" name="jabatan" required>
                            <option value="">Pilih Jabatan</option>
                            <option value="karyawan" {{ old('jabatan') == 'karyawan' ? 'selected' : '' }}>Karyawan</option>
                            <option value="supervisi" {{ old('jabatan') == 'supervisi' ? 'selected' : '' }}>Supervisi</option>
                            <option value="administrator" {{ old('jabatan') == 'administrator' ? 'selected' : '' }}>Administrator</option>
                        </select>
                        @error('jabatan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
