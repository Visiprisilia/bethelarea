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
                            <div class="card-header">Periode</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanperiode" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode</label>
                                                <input class="form-control" id="kode_periode" name="kode_periode" placeholder="Kode periode" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="nama_periode" name="nama_periode" placeholder="Nama periode" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Awal Periode</label>
                                                <input class="form-control" id="awal_periode" name="awal_periode" placeholder="Awal Periode" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Akhir Periode</label>
                                                <input class="form-control" id="akhir_periode" name="akhir_periode" placeholder="Akhir Periode" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Status</label>
                                                <input class="form-control" id="stats" name="status" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/periode')}}" class="btn btn-danger">Batal</a>                                            </div>
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