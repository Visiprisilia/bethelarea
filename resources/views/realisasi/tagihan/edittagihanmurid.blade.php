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
                                        <form action="/updatetagihanmurid/{{$itemss->id_tagihan}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                    <label class="mb-1" for="inputLastName">Jenis Tagihan</label>
                                                    <select class="form-control" id="id_kategoritagihan" name="id_kategoritagihan">
                                                        <option value>Pilih Jenis Tagihan</option>
                                                        @foreach ($kategori as $item)
                                                        <option value="{{ $item->id_kategoritagihan}}">{{$item->nama_kategoritagihan}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="mb-3">
                                                <label for="exampleFormControlInput1">Jumlah Tagihan</label>
                                                <input class="form-control" id="nominal_tagihan" name="nominal_tagihan" value="{{$itemss->nominal_tagihan}}" placeholder="Masukkan Jumlah Tagihan" />
                                            </div>    
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">ID tagiha</label>
                                                <input class="form-control" id="id_tagihan" name="id_tagihan" value="{{$itemss->id_tagihan}}"  placeholder="Masukkan Jumlah Tagihan" />
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