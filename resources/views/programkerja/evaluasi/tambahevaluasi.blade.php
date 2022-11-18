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
                            <div class="card-header">Program Kerja</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanevaluasi" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Program Kerja</label>
                                                <input class="form-control" id="kode_proker" name="kode_proker" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Program Kerja</label>
                                                <input class="form-control" id="nama_proker" name="nama_proker" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Penanggung Jawab</label>
                                                <input class="form-control" id="penanggungjawab" name="penanggungjawab" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                <input class="form-control" id="tujuan" name="tujuan" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Akun Biaya</label>
                                                <input class="form-control" id="akun_beban" name="akun_beban" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Rencana Anggaran</label>
                                                <input class="form-control" id="rencana_anggaran" name="rencana_anggaran" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Realisasi Anggaran</label>
                                                <input class="form-control" id="realisasi_anggaran" name="realisasi_anggaran" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Rencana Waktu</label>
                                                <input class="form-control" id="rencana_waktu" name="rencana_waktu" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Realisasi Waktu</label>
                                                <input class="form-control" id="realisasi_waktu" name="realisasi_waktu" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Indikator Pencapaian</label>
                                                <input class="form-control" id="indikator_pencapaian" name="indikator_pencapaian" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kinerja Pencapaian</label>
                                                <input class="form-control" id="kinerja_pencapaian" name="kinerja_pencapaian" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Faktor Pendorong</label>
                                                <input class="form-control" id="faktor_pendorong" name="faktor_pendorong" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Faktor Penghambat</label>
                                                <input class="form-control" id="faktor_penghambat" name="faktor_penghambat" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tindak Lanjut</label>
                                                <input class="form-control" id="tindaklanjut" name="tindaklanjut" />
                                            </div>
                                            
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/evaluasi')}}" class="btn btn-danger">Batal</a>
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