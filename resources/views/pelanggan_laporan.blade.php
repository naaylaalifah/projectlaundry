<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Data Pelanggan</title>

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
                            <td>ID</td>
                            <td>Kode Pelanggan</td>
                            <td>Nama Pelanggan</td>
                            <td>Alamat</td>
                            <td>Nomor Hp</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelanggan as $a)
                            <tr>
                                <td>{{ $a->id }}</td>
                                <td>{{ $a->kode_pelanggan }}</td>
                                <td>{{ $a->nama_pelanggan }}</td>
                                <td>{{ $a->alamat }}</td>
                                <td>{{ $a->no_hp }}</td>
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
