@extends('layouts.sbadmin2')
@section('isinya')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Perbarui Data Pengantaran
                    </div>
                    <div class="card-body">
                        <form action="{{ url('pengantaran/' . $id, []) }}" method="POST">

                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="status_pengantaran">Status Pengantaran</label>
                                <select id="status_pengantaran" class="form-control" name="status_pengantaran">
                                    <option value="">Pilih Status Pengantaran</option>
                                    <option value="Belum Selesai">Belum Selesai</option>
                                    <option value="Selesai">Selesai</option>
                                </select>
                                <span class="text-danger">{{ $errors->first('status_pengantaran') }}</span>
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
