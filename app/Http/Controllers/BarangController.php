<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['barang'] = \App\Models\Barang::orderBy('id', 'desc')->paginate(10);
        $data['judul'] = 'Data-Data Barang';
        return view('barang_index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['list_laundry'] = ['Cuci Kering Reguler', 'Cuci Kering Express', 'Setrika Reguler', 'Setrika Express', 'Komplit Reguler', 'Komplit Express'];
        $data['list_satuan'] = ['KG', 'Satuan'];

        return view('barang_create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang',
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'jenis_laundry' => 'required',
            'berat' => 'required'
        ]);

        $barang = new \App\Models\Barang();
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_barang = $request->satuan_barang;
        $barang->jenis_laundry = $request->jenis_laundry;
        $barang->berat = $request->berat;
        $barang->save();
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
        $data['barang'] = \App\Models\Barang::findOrFail($id);
        $data['list_laundry'] = ['Cuci Kering Reguler', 'Cuci Kering Express', 'Setrika Reguler', 'Setrika Express', 'Komplit Reguler', 'Komplit Express', 'Barang Lain'];
        $data['list_satuan'] = ['KG', 'Satuan'];
        return view('barang_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_barang' => 'required|unique:barangs,kode_barang' . $id,
            'nama_barang' => 'required',
            'satuan_barang' => 'required',
            'jenis_laundry' => 'required',
            'berat' => 'required'
        ]);

        $barang = \App\Models\Barang::findOrFail($id);
        $barang->kode_barang = $request->kode_barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->satuan_barang = $request->satuan_barang;
        $barang->jenis_laundry = $request->jenis_laundry;
        $barang->berat = $request->berat;
        $barang->save();
        return redirect('/barang')->with('pesan', 'Data sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $barang = \App\Models\Barang::findOrFail($id);
        $barang->delete();
        return back()->with('pesan', 'Data Sudah Dihapus');
    }

    public function laporan()
    {
        $data['barang'] = \App\Models\Barang::all();
        $data['judul'] = 'Laporan Data Barang';
        return view('barang_laporan', $data);
    }
}
