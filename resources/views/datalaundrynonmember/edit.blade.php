@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Tambah Data Laundry Member</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Data Laundry Member</a></div>
        <div class="breadcrumb-item">Tambah Data Laundry Non Member</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('datalaundrynonmember.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tgl_transaksi">Tanggal Transaksi:</label>
                        <input type="date" class="form-control" id="tgl_transaksi" name="tgl_transaksi" value="{{ old('tgl_transaksi') }}" required>
                        @error('tgl_transaksi')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nama_customer">Nama Customer:</label>
                        <input type="text" class="form-control" id="nama_customer" name="nama_customer" value="{{ old('nama_customer') }}" required>
                        @error('nama_customer')
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
                        <label for="no_telp">Nomor Telpon:</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp" value="{{ old('no_telp') }}" required>
                        @error('no_telp')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="id_pegawai">Pegawai:</label>
                        <select class="form-control" id="id_pegawai" name="id_pegawai" required>
                            <option value="">Pilih Pegawai</option>
                            @foreach ($pegawai as $data_pegawai)
                                <option value="{{ $data_pegawai->id }}" {{ old('id_pegawai') == $data_pegawai->id ? 'selected' : '' }}>
                                    {{ $data_pegawai->nama_pegawai }}
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
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" required>{{ old('keterangan') }}</textarea>
                        @error('keterangan')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_laundry">Status Laundry:</label>
                        <select class="form-control" id="status_laundry" name="status_laundry" required>
                            <option value="">Pilih Status Laundry</option>
                            <option value="menunggu" {{ old('status_laundry') == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                            <option value="diproses" {{ old('status_laundry') == 'diproses' ? 'selected' : '' }}>Diproses</option>
                            <option value="selesai" {{ old('status_laundry') == 'selesai' ? 'selected' : '' }}>Selesai</option>
                        </select>
                        @error('status_laundry')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="status_pembayaran">Status Pembayaran:</label>
                        <select class="form-control" id="status_pembayaran" name="status_pembayaran" required>
                            <option value="">Pilih Status Pembayaran</option>
                            <option value="bayar" {{ old('status_pembayaran') == 'bayar' ? 'selected' : '' }}>Bayar</option>
                            <option value="belum" {{ old('status_pembayaran') == 'belum' ? 'selected' : '' }}>Belum</option>
                        </select>
                        @error('status_pembayaran')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="lokasi_kirim">Lokasi Kirim:</label>
                        <input type="text" class="form-control" id="lokasi_kirim" name="lokasi_kirim" value="{{ old('lokasi_kirim') }}" required>
                        @error('lokasi_kirim')
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
