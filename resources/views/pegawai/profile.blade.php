<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pegawai Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile Pegawai</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $pegawai->nama_pegawai }}</h5>
                <p class="card-text">ID Pegawai: {{ $pegawai->id }}</p>
                <p class="card-text">Password: {{ $pegawai->password }}</p>
                <p class="card-text">Alamat: {{ $pegawai->alamat }}</p>
                <p class="card-text">Jabatan: {{ $pegawai->jabatan }}</p>
            </div>
        </div><br>
        <a href="{{ route('pegawai.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>