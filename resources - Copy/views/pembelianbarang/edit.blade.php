@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Tambah Pembelian Barang</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Pembelian Barang</a></div>
        <div class="breadcrumb-item">Tambah Pembelian Barang</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('pembelianbarang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang:</label>
                        <select class="form-control" id="kode_barang" name="kode_barang" required>
                            <option value="">Pilih KODE BARANG</option>
                            @foreach ($barang as $data_barang)
                                <option value="{{ $data_barang->kode_barang }}" {{ old('kode_barang') == $data_barang->kode_barang ? 'selected' : '' }}>
                                    {{ $data_barang->kode_barang }} - {{ $data_barang->nama_barang }}
                                </option>
                            @endforeach
                        </select>
                        @error('kode_barang')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_pegawai">Id Pegawai</label>
                        <select class="form-control" id="id_pegawai" name="id_pegawai" required>
                            <option value="">Pilih Pegawai</option>
                            @foreach ($pegawai as $data_pegawai)
                                <option value="{{ $data_pegawai->id }}" {{ old('id_pegawai') == $data_pegawai->id ? 'selected' : '' }}>
                                    {{ $data_pegawai->id_pegawai }} - {{ $data_pegawai->nama_pegawai }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_pegawai')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tanggal">Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}" required>
                        @error('tanggal')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" class="form-control" id="jumlah" name="jumlah" value="{{ old('jumlah') }}" required>
                        @error('jumlah')
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
