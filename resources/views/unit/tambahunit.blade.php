@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
<div id="layoutSidenav_content">
    <main>
        <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-10">
            <div class="container-xl px-4">
                <div class="page-header-content pt-4">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto mt-4">
                            <h1 class="page-header-title">
                                <div class="page-header-icon"><i data-feather="edit-3"></i></div>
                                Tambah Data
                            </h1>

                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main page content-->
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Default Bootstrap Form Controls-->
                    <div id="default">
                        <div class="card mb-4">
                            <div class="card-header">Unit</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanunit" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Unit</label>
                                                <input class="form-control" id="kode_unit" name="kode_unit" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Unit</label>
                                                <input class="form-control" id="nama_unit" name="nama_unit" required />
                                            </div>
                                            
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/unit')}}" class="btn btn-danger">Kembali</a>
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
    </main>
</div>
@endsection