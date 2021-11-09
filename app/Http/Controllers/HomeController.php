<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Dpt;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $kec = Kecamatan::count();
        $kel = Kelurahan::count();
        $dpt = Dpt::count();
        $user = User::count();
        return view('home', \compact('kec', 'kel', 'dpt', 'user'));
    }
}
