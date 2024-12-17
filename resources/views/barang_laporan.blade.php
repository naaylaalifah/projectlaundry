<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Barang</title>

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
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Satuan Barang</th>
                            <th>Jenis Laundry</th>
                            <th>Berat</th>
                            <th>Created</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($barang as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_barang }}</td>
                                <td>{{ $a->nama_barang }}</td>
                                <td>{{ $a->satuan_barang }}</td>
                                <td>{{ $a->jenis_laundry }}</td>
                                <td>{{ $a->berat }}</td>
                                <td>{{ $a->created_at }}</td>
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
