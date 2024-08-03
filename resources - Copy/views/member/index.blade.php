@extends('template.app')
@section('content')
<div class="section-header">
    <h1>Halaman Member</h1>
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
                <a href="{{ route('member.create') }}" class="btn btn-md btn-info mb-3">TAMBAH</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tr>
                            <th scope="col">NO</th>
                            <th scope="col">NO IDENTITAS</th>
                            <th scope="col">NAMA MEMBER</th>
                            <th scope="col">PASSWORD</th>
                            <th scope="col">ALAMAT</th>
                            <th scope="col">NO HP</th>
                            <th scope="col">TANGGAL JOIN</th>
                            <th scope="col" style="width: 20%">ACTIONS</th>
                        </tr>
                        @forelse ($member as $index => $data_member)
                        <tr>
                            <td class="text-center">{{ ++$index }}</td>
                            <td>{{ $data_member->no_identitas }}</td>
                            <td>{{ $data_member->nama_member }}</td>
                            <td>{{ $data_member->password }}</td>
                            <td>{{ $data_member->alamat }}</td>
                            <td>{{ $data_member->no_hp }}</td>
                            <td>{{ $data_member->tgl_join }}</td>
                            <td class="text-center">
                                <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $data_member->id) }}" method="POST">
                                    <a href="{{ route('member.show', $data_member->id) }}" class="btn btn-sm btn-dark">SHOW</a>
                                    <a href="{{ route('member.edit', $data_member->id) }}" class="btn btn-sm btn-primary">EDIT</a>
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
                    {{-- {{ $member->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
