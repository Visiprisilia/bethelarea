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
                            <div class="card-header">Sub Unit</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpansubunit" method="post">
                                            @csrf
                                            <div class="form-group">
                                            <label class="mb-1" for="inputLastName">Unit</label>
                                                <select class="form-control select2" style="width: 100%;"name="unit_id" id="unit_id" >
                                                <option  value>Pilih Unit</option>
                                                @foreach ($unit as $item)
                                                <option value="{{ $item->kode_unit}}">{{$item->nama_unit}}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Sub Unit</label>
                                                <input class="form-control" id="kode_subunit" name="kode_subunit" placeholder="Masukkan Kode Sub Unit; Digit pertama untuk Kode Unit, digit kedua untuk Kode Sub Unit (Cth : 1.1) "  />
                                            </div>                                           
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Sub Unit</label>
                                                <input class="form-control" id="nama_subunit" name="nama_subunit" placeholder="Masukkan Nama Sub Unit"  />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <label for="inputLastName">Status</label>
                                                <select class="form-control" id="status" name="status" >
                                                    <option  value>Pilih Status</option>
                                                    <option>AKTIF</option>
                                                    <option>NON AKTIF</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/subunit')}}" class="btn btn-danger">Kembali</a>
                                            </div>
                                            <h6 style="color:Tomato;" >Pastikan data yang diinput sudah benar! Data yang telah diinput, tidak bisa diubah lagi.</h6>


                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6 style="color:blue;" >Panduan : </h6>
                        <h6 style="color:blue;" >Kode Sub Unit : 1.1 -> Nama Sub Unit : Pengurus Yayasan </h6>
                        <h6 style="color:blue;" >Kode Sub Unit : 2.1 -> Nama Sub Unit : Kelompok Bermain </h6>
                        <h6 style="color:blue;" >Kode Sub Unit : 2.2 -> Nama Sub Unit : Taman Kanak-kanak </h6>
                        <h6 style="color:blue;" >Kode Sub Unit Selanjutnya Diinput Urut Dengan Kode Sub Unit Sebelumnya</h6>
                        <h6 style="color:Tomato;" >Pastikan Kode dan Nama harus sesuai!</h6>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection