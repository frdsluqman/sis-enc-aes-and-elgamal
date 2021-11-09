@extends('layouts.template')
@section('title', 'Profil Saya')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Profile</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Profile</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <img src="{{ asset('foto') }}/{{ Auth::user()->foto }}" class="rounded-circle mx-auto d-block opacity-75"
            alt="">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="pricing">
                    <div class="row align-items-center">
                        <div class="col-md-12 px-0">
                            <div class="card">
                                <div class=" card-header text-center">
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">

                                            <input type="text" class="form-control" id="name" name="name"
                                                aria-label="readonly input example" value="{{ Auth::user()->name }}"
                                                readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-person"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group has-icon-left">
                                        <div class="position-relative">
                                            <input type="email" class="form-control" id="email" name="email"
                                                aria-label="readonly input example" value="{{ Auth::user()->email }}"
                                                readonly>
                                            <div class="form-control-icon">
                                                <i class="bi bi-envelope"></i>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Profile</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">

        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="pricing">
                    <div class="row align-items-center">
                        <div class="col-md-12 px-0">
                            <div class="card">
                                <div class=" card-header">
                                    <form class="form form-vertical" method="post" action="{{ route('update-user') }}">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="name">Nama</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="..."
                                                                id="name" name="name"
                                                                value="{{ old('name', Auth::user()->name) }}" required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-person"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <div class="form-group has-icon-left">
                                                        <label for="email">Email</label>
                                                        <div class="position-relative">
                                                            <input type="email" class="form-control" placeholder="..."
                                                                id="email" name="email"
                                                                value="{{ old('email', Auth::user()->email) }}"
                                                                required>
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <div class="form-group">
                                                        <div class="position-relative">
                                                            <label for="formFile" class="form-label">Foto</label>
                                                            <input class="form-control" type="file" id="foto"
                                                                name="foto"
                                                                value="{{ old('foto', Auth::user()->foto) }}"
                                                                accept="image/png,image/jpg,image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-grid gap-2 d-md-block">
                                                    <button type="submit"
                                                        class="btn btn-outline-primary rounded-pill"><i
                                                            class="icon-mid bi bi-arrow-down-circle-fill me-1"></i>Simpan</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Ubah Password</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">

        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-12 col-md-8 offset-md-2">
                <div class="pricing">
                    <div class="row align-items-center">
                        <div class="col-md-12 px-0">
                            <div class="card">
                                <div class=" card-header">
                                    <form class="form form-vertical" method="post"
                                        action="{{ route('update-password') }}">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="current_password">Current Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control"
                                                                placeholder="..." id="current_password"
                                                                name="current_password">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-shield-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12">

                                                    <div class="form-group has-icon-left">
                                                        <label for="password">New Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control"
                                                                placeholder="..." id="password" name="password">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-shield-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12">

                                                    <div class="form-group has-icon-left">
                                                        <label for="password_confirmation">Confirm Password</label>
                                                        <div class="position-relative">
                                                            <input type="password" class="form-control"
                                                                placeholder="..." id="password_confirmation"
                                                                name="password_confirmation">
                                                            <div class="form-control-icon">
                                                                <i class="bi bi-shield-lock"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-grid gap-2 d-md-block">
                                                    <button type="submit" class="btn btn-outline-info"><i
                                                            class="icon-mid bi bi-wrench me-1"></i>Update
                                                        Password</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection