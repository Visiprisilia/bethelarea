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
                            <div class="card-header">Tagihan Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($tagihan as $itemss)
                                        <form action="/updatetagihan/{{$itemss->nis_tagihan}}" method="post">
                                            @csrf
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode_tagihan" name="periode_tagihan">
                                                        <option value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Murid</label>
                                                    <select class="form-control" id="nis_tagihan" name="nis_tagihan">
                                                        <option value>Pilih Murid</option>
                                                        @foreach ($murid as $item)
                                                        <option value="{{ $item->nomor_induk}}">{{$item->nomor_induk}} {{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Pendaftaran</label>
                                                    <input class="form-control" id="uang_pendaftaran" name="uang_pendaftaran" value="{{ $itemss->uang_pendaftaran}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Pengembangan Pendidikan</label>
                                                    <input class="form-control" id="uang_pengembanganpendidikan" name="uang_pengembanganpendidikan" value="{{ $itemss->uang_pengembanganpendidikan}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Peralatan</label>
                                                    <input class="form-control" id="uang_peralatan" name="uang_peralatan"  value="{{ $itemss->uang_peralatan}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Seragam</label>
                                                    <input class="form-control" id="uang_seragam" name="uang_seragam"  value="{{ $itemss->uang_seragam}}"/>
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Parenting</label>
                                                    <input class="form-control" id="uang_parenting" name="uang_parenting"  value="{{ $itemss->uang_parenting}}" />
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang SPP</label>
                                                    <input class="form-control" id="uang_spp" name="uang_spp"  value="{{ $itemss->uang_spp}}" />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Kegiatan</label>
                                                    <input class="form-control" id="uang_kegiatan" name="uang_kegiatan"  value="{{ $itemss->uang_kegiatan}}" />
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label for="exampleFormControlInput1">Uang Lain-lain</label>
                                                    <input class="form-control" id="uang_lainlain" name="uang_lainlain" />
                                                </div> -->
                                            </div>

                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/tagihan')}}" class="btn btn-danger">Batal</a>
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