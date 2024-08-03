@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Halaman Pembelian Barang</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dasbor</a></div>
        <div class="breadcrumb-item"><a href="#">Tata Letak</a></div>
        <div class="breadcrumb-item">Tata Letak Default</div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <a href="{{ route('pembelianbarang.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode Barang</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Tanggal</th>
                                <th scope="col">Jumlah</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pembelianbarang as $index => $data_pembelianbarang)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $data_pembelianbarang->kode_barang }}</td>
                                <td>{{ $data_pembelianbarang->pegawai->nama_pegawai }}</td>
                                <td>{{ $data_pembelianbarang->tanggal }}</td>
                                <td>{{ $data_pembelianbarang->jumlah }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pembelianbarang.show', $data_pembelianbarang->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('pembelianbarang.edit', $data_pembelianbarang->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    <form action="{{ route('pembelianbarang.destroy', $data_pembelianbarang->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="8" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Pembelian Barang Belum Ada.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $pembelianbarang->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
