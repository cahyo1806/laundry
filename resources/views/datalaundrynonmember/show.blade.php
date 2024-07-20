<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detail Member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background: white">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                    <h3 class="text-center my-4">Detail Member</h3>
                    <hr>
                </div>
                <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <div class="card-body">
                            <ul class="list-group mb-4">
                                <li class="list-group-item"><strong>No Identitas: </strong>{{ $member->no_identitas }}</li>
                                <li class="list-group-item"><strong>No Member: </strong>{{ $member->nama_member }}</li>
                                <li class="list-group-item"><strong>Password: </strong>{{ $member->password }}</li>
                                <li class="list-group-item"><strong>Alamat: </strong>{{ $member->alamat }}</li>
                                <li class="list-group-item"><strong>No HP: </strong>{{ $member->no_hp }}</li>
                                <li class="list-group-item"><strong>Tanggal Join: </strong>{{ $member->tgl_join }}</li>
                            </ul>
                            <a href="{{ route('member.index') }}" class="btn btn-primary">Kembali</a>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
