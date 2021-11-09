<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class KelurahanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kelurahans = Kelurahan::all();
        return view('kelurahan.index-kelurahan', \compact('kelurahans'));
    }

    public function create()
    {
        $kec = Kecamatan::all();
        return view('kelurahan.create-kelurahan', \compact('kec'));
    }

    public function save(Request $request)
    {
        Kelurahan::create([
            'nama_kel' => $request->nama_kel,
            'kepala_kel' => $request->kepala_kel,
            'alamat' => $request->alamat,
            'kecamatan_id' => $request->kecamatan_id,
        ]);

        return redirect('index-kelurahan')->with('success', 'Data Berhasil Disimpan!');
    }

    public function edit($id)
    {
        $kec = Kecamatan::all();
        $kel = Kelurahan::findOrFail($id);

        return view('kelurahan.index-kelurahan', \compact('kel', 'kec'));
    }

    public function update(Request $request, $id)
    {
        $kel = Kelurahan::findOrFail($id);
        $kel->update($request->all());

        return redirect('index-kelurahan')->with('success', 'Data Berhasil Diubah!');
    }
}
