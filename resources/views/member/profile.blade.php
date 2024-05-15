<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Member Profile</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            padding-top: 50px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Profile Member</h1>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $member->nama_member }}</h5>
                <p class="card-text">ID Member: {{ $member->id }}</p>
                <p class="card-text">Nomor Identitas: {{ $member->no_identitas }}</p>
                <p class="card-text">Password: {{ $member->password }}</p>
                <p class="card-text">Alamat: {{ $member->alamat }}</p>
                <p class="card-text">Nomor HP: {{ $member->no_hp }}</p>
                <p class="card-text">Tanggal Join: {{ $member->tgl_join }}</p>
            </div>
        </div><br>
        <a href="{{ route('member.index') }}" class="btn btn-secondary">Kembali</a>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>