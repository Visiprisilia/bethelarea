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
                                        <form action="/simpanprogramkerja" method="post">
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
                                                <label for="exampleFormControlInput1">Waktu Mulai</label>
                                                <input class="form-control" type="date" id="waktu_mulai" name="waktu_mulai" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Waktu Selesai</label>
                                                <input class="form-control" type="date" id="waktu_selesai" name="waktu_selesai" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                <input class="form-control" id="tujuan" name="tujuan" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Indikator Pencapaian</label>
                                                <input class="form-control" id="indikator" name="indikator" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Akun</label> 
                                                <button type="button" class="btn btn-primary ml-2" id="tambah">+</button>
                                               <div id="selectakun">
                                               <div class="form-group" id="akun">
                                                   <select class="form-control select2 mb-1" style="width: 100%;"name="akun[]" >
                                                    <option disabled value>Pilih Akun</option>
                                                    @foreach ($coa as $item)
                                                    <option value="{{ $item->kode_akun}}">{{$item->nama_akun}}</option>
                                                    @endforeach
                                                </select>
                                                <div>
                                                    <input type="text" class="form-control mb-1 jumlah"  name="jumlah[]" placeholder="Masukkan Jumlah">
                                                </div>
                                            </div>
                                               </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Anggaran</label>
                                                <input class="form-control" readonly id="anggaran" name="anggaran" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/programkerja')}}" class="btn btn-danger">Batal</a>
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
<script src="/proker/proker.js"></script>
@endsection