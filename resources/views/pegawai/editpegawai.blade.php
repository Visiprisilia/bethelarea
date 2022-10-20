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
                                    @foreach($pegawai as $item)
                                    <form action="/updatepegawai/{{$item->kode_pegawai}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode</label>
                                                <input class="form-control" id="kode_pegawai" name="kode_pegawai" value="{{$item->kode_pegawai}}" placeholder="Kode pegawai" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input class="form-control" id="nama_pegawai" name="nama_pegawai" value="{{$item->nama_pegawai}}" placeholder="Nama pegawai" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Jabatan</label>
                                                <input class="form-control" id="jabatan_pegawai" name="jabatan_pegawai" value="{{$item->jabatan_pegawai}}" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Pendidikan</label>
                                                <input class="form-control" id="pendidikan" name="pendidikan" value="{{$item->pendidikan}}" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Masuk</label>
                                                <input class="form-control" type="date" id="tanggal_masuk" name="tanggal_masuk" value="{{$item->tanggal_masuk}}" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Status Kepegawaian</label>
                                                <input class="form-control" id="status_kepegawaian" name="status_kepegawaian" value="{{$item->status_kepegawaian}}" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Penetapan Pegawai Tetap</label>
                                                <input class="form-control" type="date" id="tanggal_ppt" name="tanggal_ppt" value="{{$item->tanggal_ppt}}" placeholder="Status" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
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
@endforeach
@endsection