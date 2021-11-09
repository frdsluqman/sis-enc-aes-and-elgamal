@extends('layouts.template')
@section('title', 'Tambah DPT')

@section('content')
<div class="page-title">
    <div class="row">
        <div class="col-12 col-md-6 order-md-1 order-last">

        </div>
        <div class="col-12 col-md-6 order-md-2 order-first">
            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('index-dpt') }}">DPT</a></li>
                    <li class="breadcrumb-item"><a href="#">Tambah DPT</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<section id="basic-horizontal-layouts">
    <div class="row match-height">


        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Tambah DPT</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form form-vertical" method="post" action="{{ route('simpan-dpt') }}"
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
                                                <input type="number" class="form-control" placeholder="..." id="jml_tps"
                                                    name="jml_tps" required>
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
                                                <input type="number" class="form-control" placeholder="..."
                                                    id="jml_laki" name="jml_laki" required>
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
                                                <input type="number" class="form-control" placeholder="..."
                                                    id="jml_perempuan" name="jml_perempuan" required>
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
                                    <div class="col-12">
                                        <div class="form-group">
                                            <div class="position-relative">
                                                <label for="key" class="form-label">Masukkan Password AES</label>
                                                <input class="form-control" type="password" name="key" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 d-grid gap-2 d-md-block">
                                        <button type="submit" class="btn btn-outline-primary rounded-pill"><i
                                                class="icon-mid bi bi-arrow-down-circle-fill me-1"></i>Simpan</button>
                                        <a href="{{ route('index-dpt') }}"
                                            class="btn btn-outline-secondary rounded-pill"><i
                                                class="icon-mid bi bi-arrow-left-circle-fill me-1"></i>Kembali</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6 col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Generate Key</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <div class="mb-3" style="display: none;" id="alert">
                            <div class="alert alert-danger" role="alert" id="msg">

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <label for="input" class="form-label">Bilangan prima (p)</label>
                                    <input type="text" class="form-control" id="input" placeholder="...">
                                    <div class="mt-3">
                                        <a href="javascript:void(0);" class="btn btn-primary"
                                            id="btnGenerate">Generate</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <div class="row">
                                        <label class="form-label">Public Key (p,y,g)</label>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="p" readonly>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="y" readonly>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="g" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <div class="position-relative">
                                    <div class="row">
                                        <label class="form-label">Private Key (p,x)</label>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="p1" readonly>
                                        </div>
                                        <div class="col-4">
                                            <input type="number" class="form-control" id="x" readonly>
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
</section>

<script>
    let btnGenerate = document.querySelector('#btnGenerate');
    let g = document.getElementById('g');
    let p = document.getElementById('p');
    let y = document.getElementById('y');
    let x = document.getElementById('x');
    let p1 = document.getElementById('p1');
    let alert = document.getElementById('alert');
    let msg = document.getElementById('msg');

    btnGenerate.addEventListener('click', () => {
        alert.style.display = "none";
        g.value = "";
        p.value = "";
        y.value = "";
        x.value = "";
        p1.value = "";
        let input =  document.getElementById('input').value;
        let url = "http://localhost:8000/api/cek-bilangan-prima";
        fetch(`${url}/${input}`, {
        method: 'get'
            })
                .then(response => response.json())
                .then(jsonData => {
                    if (jsonData.status === "berhasil") {
                        g.value = jsonData.data.g;
                        p.value = jsonData.data.p;
                        y.value = jsonData.data.y;
                        x.value = jsonData.data.x;
                        p1.value = jsonData.data.p1;
                    } else {
                        msg.innerHTML = jsonData.msg;
                        alert.style.display = "block";
                    }
                })
                .catch(err => {
                    console.log("ada error");
            });
    });
</script>
@endsection