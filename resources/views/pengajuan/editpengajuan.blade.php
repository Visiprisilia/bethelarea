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
                                Ubah Data
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
                            <div class="card-header">Pegawai</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($pengajuan as $item)
                                        <form action="/updatepengajuan/{{$item->kode_proker}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Program Kerja</label>
                                                <input class="form-control" type="hidden" id="kode_proker" name="kode_proker" value="{{$item->kode_proker}}" placeholder="Kode Program Kerja" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Program Kerja</label>
                                                <input class="form-control" id="proker" name="proker" value="{{$item->proker}}" placeholder="Program Kerja" />
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Penanggung Jawab</label>
                                                <select class="form-control select2" id="pegawai_id" name="pegawai_id" value="{{$item->pegawai_id">
                                                    <option disabled value>Pilih Penanggung Jawab</option>
                                                    <option value="{{ $item->pegawai_id}}">{{$item->nama_pegawai}}</option>

                                                    @foreach ($pegawai as $item)
                                                    <option value="{{ $item->kode_pegawai}}">{{$item->nama_pegawai}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                <input class="form-control" id="tujuan" name="tujuan" value="{{$item->tujuan}}" placeholder="Tujuan" />
                                            </div>
                                            <label for="exampleFormControlSelect1">Akun Biaya</label>
                                                <select class="form-control select2" id="akun_kode" name="akun_kode" value="{{$item->pegawai_id"s>
                                                    <option disabled value>Pilih Akun</option>
                                                    <option value="{{ $item->akun_kode}}">{{$item->nama_akun}}</option>

                                                    @foreach ($coa as $item)
                                                    <option value="{{ $item->kode_akun}}">{{$item->nama_akun}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Anggaran</label>
                                                <input class="form-control" id="anggaran" name="anggaran" value="{{$item->anggaran}}" placeholder="Anggaran" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Waktu</label>
                                                <input class="form-control" type="date" id="waktu" name="waktu" value="{{$item->waktu}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Indikator Pencapaian</label>
                                                <input class="form-control" id="indikator" name="indikator" value="{{$item->indikator}}" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/pengajuan')}}" class="btn btn-danger">Batal</a>
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