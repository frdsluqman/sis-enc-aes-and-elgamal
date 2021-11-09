<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
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
        $user = User::all();
        return view('user.index-user', \compact('user'));
    }

    public function profile()
    {
        return view('user.my-profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $user = User::findOrFail($id);
        return view('user.edit-user', \compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name' => ['string', 'min:3', 'max:191', 'required', 'unique:users,name'],
            'email' => ['string', 'min:3', 'max:191', 'required'],
            'foto' => 'required|max:1024',
        ]);

        if(Request()->foto <> "") {
            // hapus file
            Auth::user()->id;
            if (Auth::user()->foto <> "") {
                unlink(public_path('foto').'/'.Auth::user()->foto);
            }
            $file = Request()->foto;
            $filename = $file->getClientOriginalName();
            $file->move(public_path('foto'), $filename);

            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email,
                'foto' => $filename,
            ]);
        } else {
            auth()->user()->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);

        auth()->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'foto' => $filename,
        ]);
    }
        return back()->with('success', 'Data User Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return back()->with('success', 'User Berhasil Dihapus!');
    }
}
