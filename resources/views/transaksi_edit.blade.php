@extends('layouts.sbadmin2')

@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Perbarui Data Transaksi
                    </div>
                    <div class="card-body">
                        <form action="{{ url('transaksi/' . $transaksi->id) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <div class="form-group">
                                <label for="pelanggan_id">Pilih Pelanggan</label>
                                <select id="pelanggan_id" class="form-control" name="pelanggan_id">
                                    <option value="">Pilih Pelanggan</option>
                                    @foreach ($list_pelanggan as $id => $a)
                                        <option value="{{ $id }}" @selected($id == $transaksi->pelanggan_id)>
                                            {{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('pelanggan_id') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="barang_id">Pilih Barang</label>
                                <select id="barang_id" class="form-control" name="barang_id">
                                    <option value="">Pilih Barang</option>
                                    @foreach ($list_barang as $id => $a)
                                        <option value="{{ $id }}" @selected($id == $transaksi->barang_id)>
                                            {{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <span class="text-danger">{{ $errors->first('barang_id') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="biaya">Biaya</label>
                                <input id="biaya" class="form-control" type="text" name="biaya"
                                    value="{{ $transaksi->biaya ?? old('biaya') }}">
                                <span class="text-danger">{{ $errors->first('biaya') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="pengantaran">Pengantaran</label>
                                <select id="pengantaran" class="form-control" name="pengantaran">
                                    <option>Pilih Pengantaran</option>
                                    <option value="ya">Ya</option>
                                    <option value="tidak">Tidak</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('pengantaran') }}</span>
                            </div>

                            <div class="form-group">
                                <label for="status_transaksi">Status Transaksi</label>
                                <input id="status_transaksi" class="form-control" type="text" name="status_transaksi"
                                    value="{{ $transaksi->status_transaksi ?? old('status_transaksi') }}">
                                <span class="text-danger">{{ $errors->first('status_transaksi') }}</span>
                            </div>

                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
