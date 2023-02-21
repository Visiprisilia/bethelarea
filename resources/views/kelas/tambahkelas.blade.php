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
                            <div class="card-header">Kelas</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpankelas" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Kelas</label>
                                                <input class="form-control" id="kode_kelas" name="kode_kelas" placeholder="Masukkan Kode Kelas"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Kelas</label>
                                                <input class="form-control" id="nama_kelas" name="nama_kelas" placeholder="Masukkan Sumber Dana" />
                                            </div>
                                            
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kelas')}}" class="btn btn-danger">Kembali</a>
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                        <h6 style="color:Tomato;">Catatan : </h6>
                        <h6 style="color:Tomato;">Kode Kelas : Digit Pertama Kode unit, digit kedua kode sub unit, digit 3 kode kelas, digit keempat dan lima kode sub kelas (Cth untuk Kelas TK B1 : 22201) </h6>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection