@extends('layouts.template')
@section('title', 'Edit DPT')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit DPT</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-dpt') }}">DPT</a></li>
                    <li class="breadcrumb-item"><a href="#">Edit DPT</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="col-12">
    <div class="card">
        <div class="card-content">
            <div class="card-body">
                <form class="form form-vertical" method="post" action="{{ route('update-dpt', $dpt->id) }}"
                    enctype="multipart/form-data">
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
                                    <label for="nama_kel">Jumlah TPS</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="jml_tps"
                                            name="jml_tps" value="{{ $dpt->jml_tps }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-bookmark"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">

                                <div class="form-group has-icon-left">
                                    <label for="kepala_kel">Jumlah Pemilih Laki-Laki</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="jml_laki"
                                            name="jml_laki" value="{{ $dpt->jml_laki }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group has-icon-left">
                                    <label for="alamat">Jumlah Pemilih Perempuan</label>
                                    <div class="position-relative">
                                        <input type="text" class="form-control" placeholder="..." id="jml_perempuan"
                                            name="jml_perempuan" value="{{ $dpt->jml_perempuan }}" required>
                                        <div class="form-control-icon">
                                            <i class="bi bi-people"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="position-relative">
                                        <label for="formFile" class="form-label">Input File</label>
                                        <input class="form-control" type="file" id="file" name="file" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 d-grid gap-2 d-md-block">
                                <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                <a href="{{ route('index-dpt') }}" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection