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
                            <div class="card-header">Kas Keluar</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpankaskeluar" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
                                            <div class="mb-3">
                                                    <label class="mb-1" for="inputLastName">Kas Bon</label>
                                                    <select class="form-control" id="no_buktibon" name="no_buktibon">
                                                        <option  value>Pilih Kas Bon</option>
                                                        @foreach ($kasbon as $item)
                                                        <option value="{{ $item->no_buktibon}}">{{$item->no_buktibon}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode" name="periode">
                                                        <option  value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan" required/>
                                            </div>   -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" placeholder="Masukkan Keterangan"   />
                                            </div>      
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-control" id="prokers" name="prokers">
                                                        <option  value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Akun</label>
                                                    <input class="form-control" readonly id="akun" name="akun"   />
                                                </div>
                                                <div class="col-md-2">
                                                    <label class="mb-1" for="inputFirstName">ID</label>
                                                    <input class="form-control" readonly id="id" name="id"   />
                                                </div>                                              
                                            </div>
                                                <div class="row gx-3 mb-3">
                                                <div class="col-md-6" id="anggaran">
                                                    <label class="mb-1" for="inputFirstName">Anggaran</label>
                                                    <!-- <input class="form-control" readonly id="anggaran" name="anggaran"   /> -->
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Jumlah</label>
                                                    <input class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah"  />
                                                </div>
                                                </div>
                                            
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Bukti</label>
                                                    <input class="form-control" type="file" id="bukti" name="bukti"  placeholder="Masukkan Jumlah"  />
                                                </div>
                                                <div class="col-md-6">
                                                <label class="mb-1" for="inputFirstName">Penanggung Jawab :</label>
                                                <input class="form-control" readonly id="penanggungjawab" name="penanggungjawab"  placeholder="Penanggung jawab"  />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="mb-1" for="inputFirstName">Dibayar Kepada :</label>
                                                <input class="form-control" id="kasir" name="kasir"  placeholder="Dibayar Kepada"  />
                                            </div>        
                                         </div>                                                                                                                                                        
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/kaskeluar')}}" class="btn btn-danger">Batal</a>                                            </div>
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
<script src="/proker/kaskeluar.js"></script>

@endsection