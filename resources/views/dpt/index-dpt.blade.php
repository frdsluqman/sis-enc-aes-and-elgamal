@extends('layouts.template')
@section('title', 'DPT (Daftar Pemilih Tetap)')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>DPT (Daftar Pemilih Tetap)</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">DPT (Daftar Pemilih Tetap)</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{ route('create-dpt') }}" class="btn btn-outline-primary rounded-pill"><i
                    class="icon-mid bi bi-plus-circle-fill me-1"></i>Tambah</a>
        </div>
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th class="text-center">Asal Kecamatan</th>
                    <th class="text-center">Jumlah TPS</th>
                    <th class="text-center">Jumlah Pemilih Laki-Laki</th>
                    <th class="text-center">Jumlah Pemilih Perempuan</th>
                    <th class="text-center">File</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dpt as $data)
                <tr>
                    <th class="text-center">{{ $data->kecamatan->nama_kec }}</th>
                    <th class="text-center">{{ $data->jml_tps }}</th>
                    <th class="text-center">{{ $data->jml_laki }}</th>
                    <th class="text-center">{{ $data->jml_perempuan }}</th>
                    <th class="text-center">
                        <a href="{{ $data->file }}" class="btn btn-outline-success rounded-pill"
                            target="_blank">Download</a> |
                        <a href="{{ $data->id }}" class="btn btn-outline-info rounded-pill">View</a>
                    </th>
                    <th class="text-center">
                        <a href="{{ route('edit-dpt', $data->id) }}" class="btn btn-outline-primary"><i
                                class="bi bi-gear-fill"></i></a> |
                        <a href="{{ route('delete-dpt', $data->id) }}" class="btn btn-outline-danger"><i
                                class="bi bi-trash-fill"></i></a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('sweetalert::alert')
@endsection