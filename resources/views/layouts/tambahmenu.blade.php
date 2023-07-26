@extends('layouts.template')

@section('konten')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title"> Form elements </h3>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Forms</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form elements</li>
                    </ol>
                </nav>
            </div>
            <div class="row">

                <div class="col-md-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            {{-- include pesan --}}
                            @include('layouts/pesan')
                            <h4 class="card-title">Details Data Makanan</h4>
                            {{-- <p class="card-description"> Horizontal form layout </p> --}}
                            {{-- ditambahi encypte multiplatform  agar bisa menerima inputan berupa file --}}
                            <form class="forms-sample" method="POST" action="/menu" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="nama" class="col-sm-3 col-form-label">Nama Makanan</label>
                                    <div class="col-sm-9">
                                        {{-- jangan lupa kasis properti name="nama kolom" --}}
                                        {{-- session untuk menaplikan data yang udah diinputin di controller --}}
                                        <input type="text" class="col-sm-3 col-form-label" name="nama" id="nama"
                                            value="{{ Session::get('nama') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="deskripsi" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="deskripsi"
                                            id="deskripsi" value="{{ Session::get('deskripsi') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="kategori" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="kategori" id="kategori"
                                            value="{{ Session::get('kategori') }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="harga" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="harga" id="harga"
                                            value="{{ Session::get('harga') }}">
                                    </div>
                                </div>
                                <div class="form-group  row">
                                    <label for="foto" class="col-sm-3 col-form-label">Foto</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="foto" id="foto" class="col-sm-3 col-form-label">

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Tambah</button>

                            </form>
                        </div>
                    </div>
                </div>

            </div>
            <!-- content-wrapper ends -->
            <!-- partial:../../partials/_footer.html -->
            <footer class="footer">
                <div class="d-sm-flex justify-content-center justify-content-sm-between">
                    <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright ©
                        bootstrapdash.com 2020</span>
                    <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"> Free <a
                            href="https://www.bootstrapdash.com/bootstrap-admin-template/" target="_blank">Bootstrap admin
                            templates</a> from Bootstrapdash.com</span>
                </div>
            </footer>
            <!-- partial -->
        </div>
    @endsection
