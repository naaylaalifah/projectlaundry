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
                                    <th>Nama Pelanggan</th>
                                    <th>Nama Barang</th>
                                    <th>Biaya</th>
                                    <th>Pengantaran</th>
                                    <th>Status Transaksi</th>
                                    <th>Created At</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transaksi as $a)
                                    <tr>
                                        <td>{{ $a->id }}</td>
                                        <td>{{ $a->pelanggan->nama_pelanggan }}</td>
                                        <td>{{ $a->barang->nama_barang }}</td>
                                        <td>{{ $a->biaya }}</td>
                                        <td>{{ $a->pengantaran }}</td>
                                        <td>{{ $a->status_transaksi }}</td>
                                        <td>{{ $a->created_at }}</td>
                                        <td>
                                            <a href="{{ url('transaksi/' . $a->id . '/edit', []) }}"
                                                class="btn btn-primary btn-sm">Edit</a>

                                            <form action="{{ url('transaksi/' . $a->id, []) }}" method="post"
                                                class="d-inline" onsubmit="return confirm('Apakah Dihapus?')">
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
                        {{ $transaksi->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
