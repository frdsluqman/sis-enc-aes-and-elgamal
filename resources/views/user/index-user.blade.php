@extends('layouts.template')
@section('title', 'User')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>User</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">User</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead class="table-light">
                <tr>
                    <th class="text-center">Nama</th>
                    <th class="text-center">Email</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($user as $data)
                <tr>
                    <th class="text-center">{{ $data->name }}</th>
                    <th class="text-center">{{ $data->email }}</th>
                    <th class="text-center"><img src="{{ asset('foto') }}/{{ $data->foto }}" alt="" width="70px"></th>
                    <th class="text-center">
                        <a href="{{ route('delete-user', $data->id) }}" class="btn btn-outline-danger"><i
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