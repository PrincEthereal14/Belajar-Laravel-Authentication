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
                        @include('layouts/pesan')
                        <div class="card-body">
                            <h4 class="card-title">Edit Data Makanan</h4>
                            {{-- <p class="card-description"> Horizontal form layout </p> --}}
                            <form class="forms-sample" method="POST" action="{{ '/menu/' . $variabelblade->id }}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="form-group row">
                                    <label for="id" class="col-sm-3 col-form-label">ID</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" disabled
                                            value="{{ $variabelblade->id }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputEmail2" class="col-sm-3 col-form-label">Nama Makanan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="nama"
                                            value="{{ $variabelblade->nama }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Deskripsi</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="deskripsi"
                                            value="{{ $variabelblade->deskripsi }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Kategori</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="kategori"
                                            value="{{ $variabelblade->kategori }}">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="exampleInputMobile" class="col-sm-3 col-form-label">Harga</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="col-sm-3 col-form-label" name="harga"
                                            value="{{ $variabelblade->harga }}">
                                    </div>
                                </div>
                                {{-- cek dulu ada fotone tidak,kalo tidak ya gapapa--}}
                                @if ($variabelblade->foto)
                                    <div class="form-group row">
                                        <label for="exampleInputMobile" class="col-sm-3 col-form-label">Foto</label>
                                        <div class="col-sm-9">
                                            <img style="max-height: 200px;max-width: 250px"
                                                src="{{ url('foto') . '/' . $variabelblade->foto }}" alt="">
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group  row">
                                    <label for="foto" class="col-sm-3 col-form-label"> Ganti Foto</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="foto" id="foto" class="col-sm-3 col-form-label">

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary mr-2">Update</button>
                                <a href="{{ url('/menu') }}" type="submit" class="btn btn-primary mr-2">Back</a>
                                {{-- <a href="{{ url('/menu') }}" type="submit" class="btn btn-info mr-2">Update</a> --}}
                                {{-- <button class="btn btn-dark">Cancel</button> --}}
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
