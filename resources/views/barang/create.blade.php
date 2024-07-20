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
            <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="kode_barang">Kode Barang</label>
                        <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
                        @error('kode_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_barang">Nama Barang</label>
                        <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
                        @error('nama_barang')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" name="harga" class="form-control" value="{{ old('harga') }}" required>
                        @error('harga')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-md btn-primary">SIMPAN</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
    