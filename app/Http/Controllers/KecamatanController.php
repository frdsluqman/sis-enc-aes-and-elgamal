<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index-kecamatan', \compact('kecamatan'));
    }

    public function create()
    {
        return view('kecamatan.create-kecamatan');
    }

    public function save(Request $request)
    {
        Request()->validate([
            'nama_kec' => 'required',
            'kepala_kec' => 'required',
            'alamat' => 'required',
        ],
        [
            'nama_kec.required' => 'Wajib diisi !!',
            'kepala_kec.required' => 'Wajib diisi !!',
            'alamat.required' => 'Wajib diisi !!',
        ]);

        Kecamatan::create([
            'nama_kec' => $request->nama_kec,
            'kepala_kec' => $request->kepala_kec,
            'alamat' => $request->alamat,
        ]);

        return redirect('index-kecamatan');
    }

    public function edit($id)
    {
        $kec = Kecamatan::findOrFail($id);
        return view('kecamatan.edit-kecamatan', \compact('kec'));
    }

    public function update(Request $request, $id)
    {
        $kec = Kecamatan::findOrFail($id);
        $kec->update($request->all());

        return redirect('index-kecamatan')->with('success', 'Data Berhasil Diubah!');
    }

    public function destroy($id)
    {
        $kec = Kecamatan::findOrFail($id);
        $kec->delete();
        return back()->with('success', 'Data Berhasil dihapus!');
    }
}
