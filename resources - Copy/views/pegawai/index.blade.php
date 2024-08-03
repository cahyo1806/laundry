@extends('template.app')

@section('content')
<div class="section-header">
    <h1>Halaman Pegawai</h1>
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
                <a href="{{ route('pegawai.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Id Pegawai</th>
                                <th scope="col">Nama Pegawai</th>
                                <th scope="col">Password</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Nomor HP</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col" style="width: 20%">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($pegawai as $index => $data_pegawai)
                            <tr>
                                <td class="text-center">{{ $index + 1 }}</td>
                                <td>{{ $data_pegawai->id_pegawai }}</td>
                                <td>{{ $data_pegawai->nama_pegawai }}</td>
                                <td>{{ $data_pegawai->password }}</td>
                                <td>{{ $data_pegawai->alamat }}</td>
                                <td>{{ $data_pegawai->no_hp }}</td>
                                <td>{{ $data_pegawai->jabatan }}</td>
                                <td class="text-center">
                                    <a href="{{ route('pegawai.show', $data_pegawai->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('pegawai.edit', $data_pegawai->id) }}" class="btn btn-sm btn-primary">EDIT</a>
                                    <form action="{{ route('pegawai.destroy', $data_pegawai->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda Yakin ?');">HAPUS</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">
                                    <div class="alert alert-danger">
                                        Data Pegawai Belum Ada.
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{-- {{ $pegawai->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
