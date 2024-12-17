@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ $judul }}
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Satuan Barang</th>
                                    <th>Jenis Laundry</th>
                                    <th>Berat</th>
                                    <th>Created</th>
                                    <th>Aksi</th>
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
                                        <td>
                                            <a href="{{ url('barang/' . $a->id . '/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ url('barang/' . $a->id, []) }}" method="post" class="d-inline"
                                                onsubmit="return confirm('Apakah Dihapus?')">
                                                @method('delete')
                                                @csrf
                                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        </td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        {{ $barang->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
