<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kelurahan;

class KelurahannController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('kelurahan.index-kelurahan', \compact('kelurahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kec = Kecamatan::all();
        return view('kelurahan.create-kelurahan', \compact('kec'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Kelurahan::create([
            'nama_kel' => $request->nama_kel,
            'kepala_kel' => $request->kepala_kel,
            'alamat' => $request->alamat,
            'kecamatan_id' => $request->kecamatan_id,
        ]);

        return redirect('index-kelurahan')->with('success', 'Data Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kec = Kecamatan::all();
        $kel = Kelurahan::findOrFail($id);

        return view('kelurahan.edit-kelurahan', \compact('kel', 'kec'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $kel = Kelurahan::findOrFail($id);
        $kel->update($request->all());

        return redirect('index-kelurahan')->with('success', 'Data Berhasil Diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kel = Kelurahan::findOrFail($id);
        $kel->delete();

        return back()->with('success', 'Data Berhasil Dihapus!');
    }
}
