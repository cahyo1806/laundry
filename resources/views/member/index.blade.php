<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="{{route('home')}}">Laundry</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link" aria-current="page" href="{{route('home')}}">Beranda</a>
              <a class="nav-link" href="{{route('pegawai.index')}}">Pegawai</a>
              <a class="nav-link active" href="{{route('pegawai.index')}}">Member</a>
              <a class="nav-link" href="{{route('barang.index')}}">Barang</a>

            </div>
          </div>
        </div>
    </nav>
    <br>
    <div class="container">
        
        <h1 class="mb-4">Data Member</h1>
        <a href="{{ route('member.create') }}" class="btn btn-primary">Tambah Member</a><hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nomor Identitas</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Password</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Nomor HP</th>
                    <th scope="col">Tanggal Join</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($member as $key => $member)
                    <tr>
                        <th scope="row">{{ $key + 1 }}</th>
                        <td>{{ $member->no_identitas }}</td>
                        <td>{{ $member->nama_member }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $member->password }}</td>
                        <td class="text-truncate" style="max-width: 150px;">{{ $member->alamat }}</td>
                        <td>{{ $member->no_hp }}</td>
                        <td>{{ $member->tgl_join }}</td>
                        <td> 
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('member.destroy', $member->id) }}" method="POST">
                                <a href="{{ route('member.show', $member->id) }}" class="btn btn-sm btn-info">Detail</a>
                                <a href="{{ route('member.edit', $member->id) }}" class="btn btn-sm btn-warning">Update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data Member Belum Ada.
                        </div>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>