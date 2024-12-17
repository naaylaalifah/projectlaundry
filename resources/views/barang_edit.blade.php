@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Perbarui Data Barang
                    </div>
                    <div class="card-body">
                        <form action="{{ url('barang/' . $barang->id, []) }}" method="POST">

                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang</label>
                                <input id="kode_barang" class="form-control" type="text" name="kode_barang"
                                    value="{{ $barang->kode_barang ?? old('kode_barang') }}">
                                <span class="text-danger">{{ $errors->first('kode_barang') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang</label>
                                <input id="nama_barang" class="form-control" type="text" name="nama_barang"
                                    value="{{ $barang->nama_barang ?? old('nama_barang') }}">
                                <span class="text-danger">{{ $errors->first('nama_barang') }}</span>
                            </div>
                            <div class="form-group">
                                <label for="satuan_barang">Satuan barang</label>
                                <select id="satuan_barang" class="form-control" name="satuan_barang">
                                    @foreach ($list_satuan as $a)
                                        <option value="{{ $a }}" @selected($a == $barang->satuan_barang)>{{ $a }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <label for="jenis_laundry">Jenis Laundry</label>
                                    <select id="jenis_laundry" class="form-control" name="jenis_laundry">
                                        @foreach ($list_laundry as $a)
                                            <option value="{{ $a }}" @selected($a == $barang->jenis_laundry)>
                                                {{ $a }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <span class="text-danger">{{ $errors->first('jenis_laundry') }}</span>
                                </div>
                                <div class="form-group">
                                    <label for="berat">Berat</label>
                                    <input id="berat" class="form-control" type="text" name="nama_barang"
                                        value="{{ $barang->berat ?? old('berat') }}">
                                    <span class="text-danger">{{ $errors->first('barang') }}</span>
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
