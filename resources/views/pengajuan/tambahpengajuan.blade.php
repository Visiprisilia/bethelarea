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
                            <div class="card-header">Pengajuan</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanpengajuan" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Program Kerja</label>
                                                <input class="form-control" id="kode_proker" name="kode_proker"/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Program Kerja</label>
                                                <input class="form-control" id="proker" name="proker" />
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Penanggung Jawab</label>
                                                <select class="form-control select2" id="pegawai_id" name="pegawai_id">
                                                    <option disabled value>Pilih Penanggung Jawab</option>
                                                    @foreach ($pegawai as $item)
                                                    <option value="{{ $item->kode_pegawai}}">{{$item->nama_pegawai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                <input class="form-control" id="tujuan" name="tujuan" />
                                            </div>      
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Akun Biaya</label>
                                                <input class="form-control" id="akun_biaya" name="akun_biaya" />
                                            </div> 
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Anggaran</label>
                                                <input class="form-control" id="anggaran" name="anggaran"  />
                                            </div> 
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Waktu</label>
                                                <input class="form-control" type="date" id="waktu" name="waktu" />
                                            </div>      
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Indikator Pencapaian</label>
                                                <input class="form-control"  id="indikator" name="indikator" />
                                            </div>                                                                                                                              
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/pengajuan')}}" class="btn btn-danger">Batal</a>                                            </div>
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