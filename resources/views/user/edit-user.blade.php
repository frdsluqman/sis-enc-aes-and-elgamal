@extends('layouts.template')
@section('title', 'Edit Profil')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">
            <h3>Edit Profil</h3>
        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Edit Profil</a></li>
                </ol>
            </nav>
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
                                    <form class="form form-vertical" method="post" action="">
                                        {{ csrf_field() }}
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group has-icon-left">
                                                        <label for="name">Nama</label>
                                                        <div class="position-relative">
                                                            <input type="text" class="form-control" placeholder="..."
                                                                id="name" name="name" value="" required>
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
                                                                id="email" name="email" value="" required>
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
                                                                name="foto" value=""
                                                                accept="image/png,image/jpg,image/jpeg">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 d-grid gap-2 d-md-block">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Simpan</button>
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