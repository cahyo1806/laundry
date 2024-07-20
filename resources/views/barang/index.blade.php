@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Halaman Barang</h1>
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
                <a href="{{ route('barang.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Kode Barang</th>
                            <th scope="col">Nama Barang</th>
                            <th scope="col">Harga</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                        @forelse ($barang as $index => $data_barang)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $data_barang->kode_barang }}</td>
                            <td>{{ $data_barang->nama_barang }}</td>
                            <td>{{ $data_barang->harga }}</td>
                            <td class="text-center">
                                <form action="{{ route('barang.destroy', $data_barang->kode_barang) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <div class="alert alert-danger">
                                    Data Barang Belum Ada.
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </table>
                    {{-- {{ $barang->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
