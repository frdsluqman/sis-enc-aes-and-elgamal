@extends('layouts.template')
@section('title', 'Tambah Kecamatan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Tambah Kecamatan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-kecamatan') }}">Kecamatan</a></li>
                    <li class="breadcrumb-item"><a href="#">Tambah Kecamatan</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="post" action="{{ route('simpan-kecamatan') }}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_kec">Nama Kecamatan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control @error('nama_kec') is-invalid @enderror"
                                            placeholder="..." id="nama_kec" name="nama_kec" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                        @error('nama_kec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="kepala_kec">Kepala Camat</label>
                                    <div class="position-relative">
                                        <input type="text"
                                            class="form-control @error('kepala_kec') is-invalid @enderror"
                                            placeholder="..." id="kepala_kec" name="kepala_kec" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                        @error('kepala_kec')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="alamat">Alamat</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control @error('alamat') is-invalid @enderror"
                                            placeholder="..." id="alamat" name="alamat" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmark"></i>
                                        </div>
                                        @error('alamat')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-outline-primary rounded-pill"><i
                                        class="icon-mid bi bi-arrow-down-circle-fill me-1"></i>Simpan</button>
                                <a href="{{ route('index-kecamatan') }}" class="btn btn-outline-dark rounded-pill"><i
                                        class="icon-mid bi bi-arrow-left-circle-fill me-1"></i>Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection