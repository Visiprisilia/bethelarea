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
                            <div class="card-header">Evaluasi</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($evaluasi as $item)
                                        <form action="/updateevaluasi/{{$item->kode_proker}}" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <input class="form-control" id="periode" name="periode" placeholder="Periode" readonly value="{{$item->periode}}" required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kode Program Kerja</label>
                                                    <input class="form-control" id="kode_proker" name="kode_proker" placeholder="Masukkan Kode Proker" readonly value="{{$item->kode_proker}}"required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Nama Program Kerja</label>
                                                    <input class="form-control" id="nama_proker" name="nama_proker" placeholder="Masukkan Nama Program Kerja" readonly value="{{$item->nama_proker}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawab" name="penanggungjawab" placeholder="Masukkan Penanggungjawab" readonly value="{{$item->penanggungjawab}}"required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Tujuan</label>
                                                    <input class="form-control" id="tujuan" name="tujuan" placeholder="Masukkan Tujuan" readonly value="{{$item->tujuan}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Akun Biaya</label>
                                                    <input class="form-control" id="akun_beban" name="akun_beban" placeholder="Masukkan Akun Biaya" readonly value="{{$item->akun_beban}}" required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Rencana Anggaran</label>
                                                    <input class="form-control" id="rencana_anggaran" readonly name="rencana_anggaran" placeholder="Masukkan Rencana Anggaran" value="{{$item->rencana_anggaran}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Realisasi Anggaran</label>
                                                    <input class="form-control" id="realisasi_anggaran" readonly name="realisasi_anggaran" placeholder="Masukkan Realisasi Anggaran" value="{{$item->realisasi_anggaran}}"required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Rencana Waktu</label>
                                                    <input class="form-control" type="date" id="rencana_waktu" readonly name="rencana_waktu" placeholder="Masukkan Rencana Waktu" value="{{$item->rencana_waktu}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Realisasi Waktu</label>
                                                    <input class="form-control" type="date" id="realisasi_waktu" readonly name="realisasi_waktu" placeholder="Masukkan Realisasi Waktu" value="{{$item->realisasi_waktu}}"required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Indikator Pencapaian</label>
                                                    <input class="form-control" id="indikator_pencapaian" name="indikator_pencapaian" readonly placeholder="Masukkan Indikator Pencapaian" value="{{$item->indikator_pencapaian}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Kinerja Pencapaian</label>
                                                    <input class="form-control" id="kinerja_pencapaian" name="kinerja_pencapaian" placeholder="Masukkan Kinerja Pencapaian" value="{{$item->kinerja_pencapaian}}"required />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Faktor Pendorong</label>
                                                    <input class="form-control" id="faktor_pendorong" name="faktor_pendorong" placeholder="Masukkan Faktor Pendorong" value="{{$item->faktor_pendorong}}"required />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Faktor Penghambat</label>
                                                    <input class="form-control" id="faktor_penghambat" name="faktor_penghambat" placeholder="Masukkan Faktor Penghambat" value="{{$item->faktor_penghambat}}"required />
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tindak Lanjut</label>
                                                <input class="form-control" id="tindaklanjut" name="tindaklanjut" value="{{$item->tindaklanjut}}" required />
                                            </div>
                                            
                                    <div class="mb-3"> 
                                        <button type="submit" class="btn btn-success">Simpan</button>
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
@endforeach
@endsection