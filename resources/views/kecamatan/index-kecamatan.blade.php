@extends('layouts.template')
@section('title', 'Kecamatan')

@section('content')

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Kecamatan</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-kecamatan') }}">Kecamatan</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="d-grid gap-2 d-md-block mb-3">
            <a href="{{ route('create-kecamatan') }}" class="btn btn-outline-primary rounded-pill"><i
                    class="icon-mid bi bi-plus-circle-fill me-1"></i>Tambah</a>
        </div>
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th class="text-center">Nama Kecamatan</th>
                    <th class="text-center">Kepala Camat</th>
                    <th class="text-center">Alamat Kecamatan</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($kecamatan as $data)
                <tr>
                    <th class="text-center">{{ $data->nama_kec }}</th>
                    <th class="text-center">{{ $data->kepala_kec }}</th>
                    <th class="text-center">{{ $data->alamat }}</th>
                    <th class="text-center">
                        <a href="{{ route('edit-kecamatan', $data->id) }}" class="btn btn-outline-primary"><i
                                class="bi bi-gear-fill"></i></a> |
                        <a href="{{ route('delete-kecamatan', $data->id) }}" class="btn btn-outline-danger"><i
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