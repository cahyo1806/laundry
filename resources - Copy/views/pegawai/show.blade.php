<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: #f8f9fa;">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div>
                    <h3 class="text-center mb-4">Detail Pegawai</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <ul class="list-group mb-4">
                            <li class="list-group-item"><strong>Id Pegawai:</strong> {{ $pegawai->id_pegawai }}</li>
                            <li class="list-group-item"><strong>Nama Pegawai:</strong> {{ $pegawai->nama_pegawai }}</li>
                            <li class="list-group-item"><strong>Password:</strong> {{ $pegawai->password }}</li>
                            <li class="list-group-item"><strong>Alamat:</strong> {{ $pegawai->alamat }}</li>
                            <li class="list-group-item"><strong>Nomor HP:</strong> {{ $pegawai->no_hp }}</li>
                            <li class="list-group-item"><strong>Jabatan:</strong> {{ ucfirst($pegawai->jabatan) }}</li>
                        </ul>
                        <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
