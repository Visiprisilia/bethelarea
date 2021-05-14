@extends('template')
@section('container')

@if($errors->any())
<ul class="alert alert-danger">
    @foreach($errors->all() as $error)
    <li> {{$error}} </li>
    @endforeach
</ul>
@endif
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
                                Pertanggungjawaban Bon
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
                            <div class="card-header">Kas Bon</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($kasbon as $itemss)
                                        <form action="/updatekasbon/{{$itemss->no_bukti}}" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputLastName">Kas Bon</label>
                                                <select class="form-control" id="no_bukti" name="no_bukti">
                                                    <option value>Pilih Kas Bon</option>
                                                    @foreach ($kasbon as $item)
                                                    <option value="{{ $item->no_bukti}}">{{$item->no_bukti}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputFirstName">Periode</label>
                                                <input class="form-control" id="periode" name="periode" readonly placeholder="Masukkan Keterangan" />
                                            
                                            </div>
                                            <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Pengajuan</label>
                                                    <input class="form-control"  type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"  required />
                                                </div> -->
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputFirstName">Keterangan</label>
                                                <input class="form-control" id="keterangan_bon" readonly name="keterangan_bon" placeholder="Masukkan Keterangan" />
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6" id="proker_bon" >
                                                    <label class="mb-1" for="inputFirstName">Program Kerja</label>
                                                    <!-- <input class="form-control" readonly id="proker_bon" name="proker_bon" /> -->
                                                </div>
                                                <div class="col-md-6" id="akun_bon">
                                                    <label class="mb-1" for="inputFirstName">Akun</label>
                                                    <!-- <input class="form-control" readonly id="akun_bon" name="akun_bon" /> -->
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Jumlah Bon</label>
                                                    <input class="form-control" id="jumlah_bon" readonly name="jumlah_bon" placeholder="Masukkan Jumlah" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Jumlah Pertanggungjawaban</label>
                                                    <input class="form-control"  id="jumlah_ptj" name="jumlah_ptj" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawab_bon" name="penanggungjawab_bon" placeholder="Masukkan penanggung jawab"  />
                                                </div> -->
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <select class="form-control" id="penanggungjawab_bon" readonly name="penanggungjawab_bon">
                                                        <option value>Pilih Penanggung Jawab</option>
                                                        @foreach ($pegawai as $item)
                                                        <option value="{{ $item->niy}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kasbon')}}" class="btn btn-danger">Batal</a>
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
<script src="/proker/kasbon.js"></script>
@endforeach

@endsection