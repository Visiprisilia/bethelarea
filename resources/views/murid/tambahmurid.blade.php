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
                            <div class="card-header">Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanmurid" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nomor Induk</label>
                                                <input class="form-control" id="nomor_induk" name="nomor_induk"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input class="form-control" id="nama" name="nama"  />
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                <select class="form-control" id="jk" name="jk">
                                                <option disabled value>Pilih Jenis Kelamin</option>   
                                                <option>Perempuan</option>
                                                    <option>Laki-laki</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                                <input class="form-control" type="date" id="ttl" name="ttl" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Alamat</label>
                                                <input class="form-control" id="alamat" name="alamat"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Agama</label>
                                                <input class="form-control" id="agama" name="agama" />
                                            </div>                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/pegawai')}}" class="btn btn-danger">Batal</a>                                           
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