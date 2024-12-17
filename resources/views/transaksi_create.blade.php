@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Tambah Data Transaksi
                    </div>
                    <div class="card-body">
                        <form action="{{ url('transaksi', []) }}" method="POST">

                            @method('POST')
                            @csrf
                            <div class="form-group">
                                <label for="pelanggan_id">Nama Pelanggan</label>
                                <select id="pelanggan_id" class="form-control" name="pelanggan_id">
                                    <option value="">Pilih Nama Pelanggan</option>
                                    @foreach ($list_pelanggan as $id => $a)
                                        <option value="{{ $id }}" @selected($id == old('pelanggan_id'))>
                                            {{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('pelanggan_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="barang_id">Nama Barang</label>
                                <select id="barang_id" class="form-control" name="barang_id">
                                    <option value="">Pilih Nama Barang</option>
                                    @foreach ($list_barang as $id => $a)
                                        <option value="{{ $id }}" @selected($id == old('barang_id'))>
                                            {{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('barang_id') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input id="biaya" class="form-control" type="text" name="biaya"
                                    value="{{ old('biaya') }}">
                                <span class="text-danger">{{ $errors->first('biaya') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="pengantaran">Pengantaran</label>
                                <select id="pengantaran" class="form-control" name="pengantaran">
                                    <option>Pilih Pengataran</option>
                                    <option value="ya">Ya</option>
                                    <option value="tidak">Tidak</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('pengantaran') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="status_transaksi">Status Transaksi</label>
                                <input id="status_transaksi" class="form-control" type="text" name="status_transaksi"
                                    value="{{ old('status_transaksi') }}">
                                <span class="text-danger">{{ $errors->first('status_transaksi') }}</span>
                            </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    </div>
@endsection
