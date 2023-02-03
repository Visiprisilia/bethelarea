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
                                Amandemen
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
                            <div class="card-header">Amandemen Program Kerja</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanamandemen" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="mb-1" for="inputLastName">Ubah Program Kerja</label>
                                                    <select class="form-control" id="kode_prokeramandemen" require name="kode_prokeramandemen">
                                                        <option value>Pilih Proker</option>
                                                        @foreach ($amandemen as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker" required />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-8">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <input class="form-control" readonly id="periode_amandemen" require name="periode_amandemen">
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker" required />
                                                </div> -->
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Nama Program Kerja</label>
                                                    <input class="form-control" readonly id="nama_proker" name="nama_proker" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <input class="form-control" readonly id="penanggungjawab" name="penanggungjawab">
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Waktu Mulai</label>
                                                    <input class="form-control" readonly type="date" id="waktu_mulai" name="waktu_mulai" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Waktu Selesai</label>
                                                    <input class="form-control" readonly type="date" id="waktu_selesai" name="waktu_selesai" required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tujuan</label>
                                                    <input class="form-control" readonly id="tujuan" name="tujuan" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" readonly id="indikator" name="indikator" required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Akun</label>
                                                        <div class="form-group" id="akunss" name="akunss">
                                                                                                                       
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                        <div class="form-group" id="jumlah" name="jumlah">
                                                                                                                       
                                                    </div>
                                                </div>                                                                                                                                        
                                                <!-- <div class="col-md-4">
                                                    <label for="exampleFormControlInput1">Jumlah Anggaran</label>
                                                        <div class="form-control" readonly id="anggaran" name="anggaran">
                                                                                                                       
                                                    </div>
                                                </div>       -->
                                              
                                            </div>
                                            
                                           <b> Ubah Anggaran</b>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Akun</label>
                                                    <button type="button" class="btn btn-primary ml-2" id="tambah">+</button>
                                                    <div id="selectakun">
                                                        <div class="form-group" id="akun" name="akun">
                                                            <select class="form-control select2 mb-1" style="width: 100%;" name="akun[]">
                                                                <option  value>Pilih Akun</option>
                                                                @foreach ($coa as $item)
                                                                <option value="{{ $item->kode_akun}}">{{$item->kode_akun}} - {{$item->nama_akun}}</option>
                                                                @endforeach
                                                            </select>
                                                            <div>
                                                                <input type="text" class="form-control mb-1 jumlah" name="jumlah[]" placeholder="Masukkan Jumlah" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Anggaran</label>
                                                    <input class="form-control"  id="anggaran_amandemen" name="anggaran_amandemen" required />
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_amandemen" name="keterangan_amandemen" required />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/amandemen')}}" class="btn btn-danger">Batal</a>
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
<!-- <script src="/proker/proker.js"></script> -->
<script src="/proker/amandemen.js"></script>
@endsection