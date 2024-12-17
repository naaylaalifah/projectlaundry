<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['pelanggan'] = \App\Models\Pelanggan: :orderBy('id','desc')->paginate(10);
        $data['judul'] = 'Data-Data Pelanggan';
        return view('pelanggan_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pelanggan_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_pelanggan' =>
'required | unique:pelanggans, kode_pelanggan',
        'nama_pelanggan' => 'required',
        'alamat' => 'required',
        'no_hp' => 'required'
        ]);

        $pelanggan = new \App\Models\Pelanggan();
        $pelanggan->kode_pelanggan = $request->nama_pelanggan;
        $pelanggan->nama_pelanggan = $request->nama_pelanggan;
        $pelanggan->alamat = $request->alamat;
        $pelanggan->no_hp = $request->no_hp;
        $pelanggan->save();
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
        $data['pelanggan'] = 
\App\Models\Barang: :findOrFail ($id);
        return view ('pelanggan_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'kode_pelanggan' => 'required|unique:pelanggans,kode_pelanggan'.$id,
            'nama_pelanggan' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required'
            ]);
    
            $pelangggan = \App\Models\Pelanggan::findOrFail($id);
            $pelangggan->kode_pelanggan = $request->kode_pelanggan;
            $pelangggan->nama_pelanggan = $request->nama_pelanggan;
            $pelangggan->alamat = $request->alamat;
            $pelangggan->no_hp = $request->no_hp;
            $pelangggan->save();
            return redirect('/pelanggan')->with('pesan', 'Data sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pelangggan =\App\Models\Pelanggan::findOrFail($id);
        $pelangggan->delete();
        return back()->with('pesan','Data Sudah Dihapus');
    }

    public function laporan()
    {
    $data['pelanggan'] = \App\Models\Pelanggan::all();
    $data['judul'] = 'Laporan Data Pelanggan';
    return view('pelanggan_laporan', $data);
    }
}
