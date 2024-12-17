<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengantaranController extends Controller
{
    /**
     *  Display a listing of the resource
     */
    public function index()
    {
        $data ['pengantaran']= \App/Models\pengantaran:: orderBy('id','desc')->paginate(10)
        $data ['judul']='Data-Data pengantaran';
        return view ('pengantaran_index',$data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       //
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
        return view('pengantaran_edit',array('id'=> $id));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status_pengantaran'=> 'required'
        ]);

        $pengantaran = \App\Models\Pengantaran::findorFail($id);
        $pengantaran->status_pengantaran = $request->status_pengantaran;
        $pengantaran->save();

        return redirect('/pengantaran')->with('pesan', 'Data sudah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengantaran = \App\Models\Pengantaran::findOrFail($id);
        $pengantaran->delete();
        return back()->with('pesan','Data Sudah Dihapus');
    }
}
