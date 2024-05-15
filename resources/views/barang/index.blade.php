<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Harga Pelayanan</title>
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
              <a class="nav-link" href="{{route('pegawai.index')}}">Member</a>
              <a class="nav-link active" href="{{route('barang.index')}}">Barang</a>

            </div>
          </div>
        </div>
    </nav>
    <br>
    <div class="container">
        
        <h1 class="mb-4">Daftar Harga Pelayanan</h1>
        <a href="{{route('barang.create')}}" class="btn btn-primary">Tambah Pelayanan</a><hr>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Kode Pelayanan</th>
                    <th scope="col">Pelayanan</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($barang as $key => $barang)
                    <tr>
                        <th scope="row">{{ $barang->kode_barang }}</th>
                        <td>{{ $barang->nama_barang }}</td>
                        <td>{{ $barang->harga }}</td>
                        <td> 
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('barang.destroy', $barang->kode_barang) }}" method="POST">
                                <a href="{{ route('barang.edit', $barang->kode_barang) }}" class="btn btn-sm btn-warning">Update</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                    @empty
                        <div class="alert alert-danger">
                            Data Pelayanan Belum Ada.
                        </div>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>