<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['transaksi'] = \App\Models\Transaksi::orderBy('id', 'desc')->paginate(10);
        $data['judul'] = 'Data-Data Transaksi';
        return view('transaksi_index', $data);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_pelanggan'] =
            \App\Models\Pelanggan::selectRaw("id,concat(kode_pelanggan,' - ',nama_pelanggan) as tampil")->pluck('tampil', 'id');
        $data['list_barang'] =
            \App\Models\Barang::selectRaw("id,concat(kode_barang,' - ',nama_barang) as tampil")->pluck('tampil', 'id');

        return view('transaksi_create', $data);
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'biaya' => 'required',
            'pengantaran' => 'required',
            'status_transaksi' => 'required',
        ]);

        // Simpan data ke database
        $transaksi = new \App\Models\Transaksi();
        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->biaya = $request->biaya;
        $transaksi->pengantaran = $request->pengantaran;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->save();

        if ($request->pengantaran == 'ya') {
            $pengantaran = new \App\Models\Pengantaran();
            $pengantaran->transaksi_id = $transaksi->id;
            $pengantaran->status_pengantaran = 'Belum Selesai';
            $pengantaran->save();
        }

        // Redirect dengan pesan sukses
        return back()->with('pesan', 'Data sudah Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['transaksi'] = \App\Models\Transaksi::findOrFail($id);
        $data['list_pelanggan'] =
            \App\Models\Pelanggan::selectRaw("id,concat(kode_pelanggan,' - ',nama_pelanggan) as tampil")->pluck('tampil', 'id');
        $data['list_barang'] =
            \App\Models\Barang::selectRaw("id,concat(kode_barang,' - ',nama_barang) as tampil")->pluck('tampil', 'id');
        $data['list_pengantaran'] = ['Ya', 'Tidak'];

        return view('transaksi_edit', $data);
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pelanggan_id' => 'required',
            'barang_id' => 'required',
            'biaya' => 'required',
            'pengantaran' => 'required',
            'status_transaksi' => 'required',
        ]);

        // Simpan data ke database
        $transaksi = \App\Models\Transaksi::findOrFail($id);

        if ($transaksi->pengantaran == 'ya' && $request->pengantaran == 'tidak') {
            $pengantaran = \App\Models\Pengantaran::where('transaksi_id', $transaksi->id)->first();
            if ($pengantaran != null) {
                $pengantaran->delete();
            }
        } elseif ($transaksi->pengantaran == 'tidak' && $request->pengantaran == 'ya') {
            $pengantaran = new \App\Models\Pengantaran();
            $pengantaran->transaksi_id = $transaksi->id;
            $pengantaran->status_pengantaran = 'Belum Selesai';
            $pengantaran->save();
        }

        $transaksi->pelanggan_id = $request->pelanggan_id;
        $transaksi->barang_id = $request->barang_id;
        $transaksi->biaya = $request->biaya;
        $transaksi->pengantaran = $request->pengantaran;
        $transaksi->status_transaksi = $request->status_transaksi;
        $transaksi->save();


        return redirect('/transaksi')->with('pesan', 'Data sudah Diperbarui');

        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $transaksi = \App\Models\Transaksi::findOrFail($id);
        $transaksi->delete();
        return back()->with('pesan', 'Data Sudah Dihapus');
        //
    }
}
