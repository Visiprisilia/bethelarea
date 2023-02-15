@extends('template')
@section('container')
<!-- Default Bootstrap Form Controls-->
@if($errors->any())
   <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
         <li> {{$error}} </li>
      @endforeach
   </ul>
@endif
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
                            <div class="card-header">Periode</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanperiode" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode</label>
                                                <input class="form-control" id="kode_periode" name="kode_periode" readonly/>
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="nama_periode" name="nama_periode" placeholder="Masukkan Periode (Cth : 2020-2021)" />
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Awal Periode</label>
                                                    <input class="form-control" type="date" id="awal_periode" name="awal_periode"  />
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Akhir Periode</label>
                                                    <input class="form-control"  type="date" id="akhir_periode" name="akhir_periode" />
                                                </div>
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
                                                <a href="{{url('/periode')}}" class="btn btn-danger">Batal</a>
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
@endsection