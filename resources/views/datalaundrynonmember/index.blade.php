@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Non Member</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="#">Layout</a></div>
        <div class="breadcrumb-item">Default Layout</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('datalaundrynonmember.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Transaksi</th>
                            <th scope="col">Nama Customer</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">No Telpon</th>
                            <th scope="col">Id Pegawai</th>
                            <th scope="col">Keterangan</th>
                            <th scope="col">Status Laundry</th>
                            <th scope="col">Status Pembayaran</th>
                            <th scope="col">Lokasi Kirim</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                        @forelse ($datalaundrynonmember as $index => $data_datalaundrynonmember)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $data_datalaundrynonmember->tgl_transaksi }}</td>
                            <td>{{ $data_datalaundrynonmember->nama_customer }}</td>
                            <td>{{ $data_datalaundrynonmember->alamat }}</td>
                            <td>{{ $data_datalaundrynonmember->no_telp }}</td>
                            <td>{{ $data_datalaundrynonmember->id_pegawai }}</td>
                            <td>{{ $data_datalaundrynonmember->keterangan }}</td>
                            <td>{{ $data_datalaundrynonmember->status_laundry }}</td>
                            <td>{{ $data_datalaundrynonmember->status_pembayaran }}</td>
                            <td>{{ $data_datalaundrynonmember->lokasi_kirim }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('datalaundrynonmember.destroy', $data_datalaundrynonmember->id) }}" method="POST">
                                    <a href="{{ route('datalaundrynonmember.show', $data_datalaundrynonmember->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('datalaundrynonmember.edit', $data_datalaundrynonmember->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <div class="alert alert-danger">
                            Data User Belum Ada.
                        </div>
                        @endforelse
                    </table>
                    {{-- {{ $datalaundrymember->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
