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
                                Data Penanda Tangan
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
                            <div class="card-header">Laporan, Bukti Kas Masuk, Bukti Kas Keluar, Bukti Bon</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($ttd as $item)
                                        <form action="/updatettd/{{$item->id_ttd}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Ketua Yayasan</label>
                                                <input class="form-control" id="ketua_yayasan" name="ketua_yayasan" value="{{$item->ketua_yayasan}}" placeholder="Masukkan Nama Ketua Yayasan" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Bendahara Yayasan</label>
                                                <input class="form-control" id="bendahara_yayasan" name="bendahara_yayasan" value="{{$item->bendahara_yayasan}}" placeholder="Masukkan Nama Bendahara Yayasan" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kepala Sekolah</label>
                                                <input class="form-control" id="kepala_sekolah" name="kepala_sekolah" value="{{$item->kepala_sekolah}}" placeholder="Masukkan Nama Kepala Sekolah" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Bendahara Sekolah</label>
                                                <input class="form-control" id="bendahara_sekolah" name="bendahara_sekolah"  value="{{$item->bendahara_sekolah}}" placeholder="Masukkan Nama Bendahara Sekolah" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Staf Administrasi Sekolah</label>
                                                <input class="form-control" id="bagian_administrasi" name="bagian_administrasi" value="{{$item->bagian_administrasi}}" placeholder="Masukkan Nama Staf Administrasi Sekolah" required />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/ttd')}}" class="btn btn-danger">Batal</a></div>
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