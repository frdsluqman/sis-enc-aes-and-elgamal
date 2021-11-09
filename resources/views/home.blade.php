@extends('layouts.template')
@section('title', 'Dashboard')\

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Dashboard</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon purple">
                            <i class="iconly-boldHome"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Kecamatan</h6>
                        <h6 class="font-extrabold mb-0">{{ $kec }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon blue">
                            <i class="iconly-boldHome"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Kelurahan</h6>
                        <h6 class="font-extrabold mb-0">{{ $kel }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon green">
                            <i class="iconly-boldBookmark"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">Daftar Pemilih Tetap</h6>
                        <h6 class="font-extrabold mb-0">{{ $dpt }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
            <div class="card-body px-3 py-4-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="stats-icon red">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h6 class="text-muted font-semibold">User</h6>
                        <h6 class="font-extrabold mb-0">{{ $user }}</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection