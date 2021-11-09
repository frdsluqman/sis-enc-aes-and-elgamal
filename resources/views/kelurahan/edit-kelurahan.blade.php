@extends('layouts.template')
@section('title', 'Edit Kelurahan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Kelurahan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-kelurahan') }}">Kelurahan</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit Kelurahan</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="post" action="{{ route('update-kelurahan', $kel->id) }}">
                    {{ csrf_field() }}
                    <div class="form-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="input-group mb-3">
                                    <select class="form-select" id="kecamatan_id" name="kecamatan_id">
                                        <option selected>--Pilih Kecamatan--</option>
                                        @foreach ($kec as $data)
                                        <option value="{{ $data->id }}">{{ $data->nama_kec }}</option>
                                        @endforeach
                                    </select>
                                    <label class="input-group-text" for="inputGroupSelect01">Options</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="nama_kel">Nama Kelurahan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="nama_kel"
                                            name="nama_kel" value="{{ $kel->nama_kel }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-door-open"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="kepala_kel">Kepala Lurah</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="kepala_kel"
                                            name="kepala_kel" value="{{ $kel->kepala_kel }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-person"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="alamat">Alamat</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="alamat"
                                            name="alamat" value="{{ $kel->alamat }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmark"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <a href="{{ route('index-kelurahan') }}"
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