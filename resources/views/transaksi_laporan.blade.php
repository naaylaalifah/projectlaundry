<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Transaksi</title>

    <!-- Scripts-->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <center>
                    <h2>{{ $judul }}</h2>
                </center>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nama Pelanggan</th>
                            <th>Nama Barang</th>
                            <th>Biaya</th>
                            <th>Pengataran</th>
                            <th>Status Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dokter as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->pelanggan->nama_pelanggan }}</td>
                                <td>{{ $a->barang->nama_barang }}</td>
                                <td>{{ $a->biaya }}</td>
                                <td>{{ $a->pengataran }}</td>
                                <td>{{ $a->status_transaksi }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <h5>Mengetahui</h5>
                <br>
                <br>
                <br>
                <h5>Admin</h5>
            </div>
        </div>
    </div>
</body>

</html>
