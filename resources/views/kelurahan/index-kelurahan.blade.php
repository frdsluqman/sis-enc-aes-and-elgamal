@extends('layouts.template')
@section('title', 'Kelurahan')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kelurahan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Kelurahan</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{ route('create-kelurahan') }}" class="btn btn-outline-primary rounded-pill"><i
                    class="icon-mid bi bi-plus-circle-fill me-1"></i>Tambah</a>
        </div>
        <table class="table table-striped" id="table1">
            <thead class="table-light">
                <tr>
                    <th>Asal Kecamatan</th>
                    <th>Nama Kelurahan</th>
                    <th>Kepala Lurah</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kelurahans as $kel)
                <tr>
                    <th>{{ $kel->kecamatan->nama_kec }}</th>
                    <th>{{ $kel->nama_kel }}</th>
                    <th>{{ $kel->kepala_kel }}</th>
                    <th>{{ $kel->alamat }}</th>
                    <th>
                        <a href="{{ route('edit-kelurahan', $kel->id) }}" class="btn btn-outline-primary"><i
                                class="bi bi-gear-fill"></i></a> |
                        <a href="{{ route('delete-kelurahan', $kel->id) }}" class="btn btn-outline-danger"><i
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