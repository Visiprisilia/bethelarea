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
                            <div class="card-header">Kas Masuk</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($kasmasuk as $km)
                                        <form action="/updatekasmasuk/{{$km->no_bukti}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                            <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode" name="periode" value="{{$km->periode}}">
                                                        <option  value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                            </div>
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Pencatatan</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan" value="{{$km->tanggal_pencatatan}}" required />
                                            </div>   -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" value="{{$km->keterangan}}" required/>
                                            </div>      
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Akun</label>
                                                    <select class="form-control" id="akun" name="akun">
                                                        <option  value>Pilih Akun</option>
                                                        @foreach ($akun as $item)
                                                        <option value="{{ $item->kode_akun}}">{{$item->nama_akun}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Sumber</label>
                                                    <input class="form-control" id="sumber" name="sumber" placeholder="Masukkan Sumber" value="{{$km->sumber}}"required />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Diterima dari :</label>
                                                    <select class="form-control" id="kasir" name="kasir" value="{{$km->kasir}}">
                                                        <option  value>Pilih Murid</option>
                                                        @foreach ($murid as $item)
                                                        <option value="{{ $item->nomor_induk}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>               
                                            <div class="col-md-4">
                                                <label for="exampleFormControlInput1">Jumlah</label>
                                                <input class="form-control" id="jumlah" name="jumlah" value="{{$km->jumlah}}"  required />
                                            </div>                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/kasmasuk')}}" class="btn btn-danger">Batal</a>
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