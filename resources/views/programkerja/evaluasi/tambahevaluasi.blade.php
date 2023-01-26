@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
@if($errors->any())
   <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
         <li> {{$error}} </li>
      @endforeach
   </ul>
@endif
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
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <input class="form-control" id="periode" readonly id="nama_proker" name="periode" placeholder="Periode"  />
                                                </div>
                                                <div class="col-md-6">
                                                <label class="mb-1" for="inputLastName">Kode Program Kerja</label>
                                                    <select class="form-control" id="kode_proker" name="kode_proker">
                                                        <option value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Nama Program Kerja</label>
                                                    <input class="form-control" readonly id="nama_proker" name="nama_proker"   />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab</label>
                                                    <input class="form-control" readonly id="penanggungjawab" name="penanggungjawab"   />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" readonly name="tujuan"  />
                                                </div>
                                                <div class="col-md-6" id="akunbeban">
                                                    <label class="mb-1" for="inputFirstName">Akun Biaya</label>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Rencana Anggaran</label>
                                                    <input class="form-control" readonly id="rencana_anggaran" name="rencana_anggaran"   />
                                                </div>
                                               <div class="col-md-6" id="realisasianggaran">
                                                    <label class="mb-1" for="inputFirstName">Realisasi Anggaran</label>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Realisasi Anggaran</label>
                                                    <input class="form-control" readonly id="realisasi_anggaran" name="realisasi_anggaran"  />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Rencana Waktu</label>
                                                    <input class="form-control" readonly type="date" id="rencana_waktu" name="rencana_waktu" />
                                                </div>
                                                <div class="col-md-6" id="realisasiwaktu">
                                                    <label class="mb-1" for="inputFirstName">Realisasi Waktu</label>
                                                    <!-- <input class="form-control" type="date" readonly id="realisasi_waktu" name="realisasi_waktu"  /> -->
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" readonly id="indikator_pencapaian" name="indikator_pencapaian"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kinerja Pencapaian</label>
                                                    <input class="form-control" id="kinerja_pencapaian" name="kinerja_pencapaian" placeholder="Masukkan Kinerja Pencapaian"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Faktor Pendorong</label>
                                                    <input class="form-control" id="faktor_pendorong" name="faktor_pendorong" placeholder="Masukkan Faktor Pendorong"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Faktor Penghambat</label>
                                                    <input class="form-control" id="faktor_penghambat" name="faktor_penghambat" placeholder="Masukkan Faktor Penghambat"  />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tindak Lanjut</label>
                                                <input class="form-control" id="tindaklanjut" name="tindaklanjut" placeholder="Masukkan Faktor Penghambat" />
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
<script src="/proker/evaluasi.js"></script>
@endsection