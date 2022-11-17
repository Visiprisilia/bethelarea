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
                            <div class="card-header">Program Kerja</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($programkerja as $item)
                                        <form action="/updateprogramkerja/{{$item->kode_proker}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Program Kerja</label>
                                                <input class="form-control" type="hidden" id="kode_proker" name="kode_proker" disabled value="{{$item->kode_proker}}" placeholder="Kode Program Kerja" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode" value="{{$item->periode}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Program Kerja</label>
                                                <input class="form-control" id="proker" name="proker" value="{{$item->proker}}" placeholder="Program Kerja" />
                                            </div>

                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Penanggung Jawab</label>
                                                <input class="form-control" id="penanggungjawab" name="penanggungjawab" value="{{$item->penanggungjawab}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Waktu Mulai</label>
                                                <input class="form-control" type="date" id="waktu_mulai" name="waktu_mulai" value="{{$item->waktu_mulai}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Waktu Selesai</label>
                                                <input class="form-control" type="date" id="waktu_selesai" name="waktu_selesai" value="{{$item->waktu_selesai}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tujuan</label>
                                                <input class="form-control" id="tujuan" name="tujuan" value="{{$item->tujuan}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Indikator Pencapaian</label>
                                                <input class="form-control" id="indikator" name="indikator" value="{{$item->indikator}}" />
                                            </div>
                         
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1">Akun Biaya</label>
                                        <input class="form-control" id="akun" name="akun" value="{{$item->akun}}" />
                                    </div>
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1">Anggaran</label>
                                        <input class="form-control" id="anggaran" name="anggaran" value="{{$item->anggaran}}" />
                                    </div>

                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1">Keterangan</label>
                                        <input class="form-control" id="keterangan" name="keterangan" value="{{$item->keterangan}}" />
                                    </div>
                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-success">Simpan</button>
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
@endforeach
@endsection