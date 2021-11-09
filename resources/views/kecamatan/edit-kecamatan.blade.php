@extends('layouts.template')
@section('title', 'Edit Kecamatan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Kecamatan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-kecamatan') }}">Kecamatan</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit Kecamatan</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="post" action="{{ route('update-kecamatan', $kec->id) }}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_kec">Nama Kecamatan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="nama_kec"
                                            name="nama_kec" value="{{ $kec->nama_kec }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            @error('nama_kec')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="kepala_kec">Kepala Camat</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="kepala_kec"
                                            name="kepala_kec" value="{{ $kec->kepala_kec }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            @error('kepala_kec')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="alamat">Alamat</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="alamat"
                                            name="alamat" value="{{ $kec->alamat }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmark"></i>
                                        </div>
                                        <div class="invalid-feedback">
                                            <i class="bx bx-radio-circle"></i>
                                            @error('alamat')
                                            {{ $message }}
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <a href="{{ route('index-kecamatan') }}"
                                    class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection