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
                            <div class="card-header">Kas Keluar</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($kaskeluar as $item)
                                        <form action="/updatekaskeluar/{{$item->no_bukti}}" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti" disabled value="{{$item->no_bukti}}" />
                                            </div> -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode"  value="{{$item->periode}}"required/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan" value="{{$item->tanggal_pencatatan}}" required/>
                                            </div>  
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" value="{{$item->keterangan}}" required/>
                                            </div>      
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputLastName">Akun</label>
                                                    <input class="form-control" id="akun" name="akun" placeholder="Masukkan Akun" value="{{$item->akun}}" required />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jumlah</label>
                                                    <input class="form-control" id="jumlah" name="jumlah" placeholder="Masukkan Jumlah" value="{{$item->jumlah}}" required />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Bukti</label>
                                                    <input class="form-control" type="file" id="bukti" name="bukti"  placeholder="Masukkan Jumlah" value="{{$item->bukti}}" required />
                                                </div>
                                            </div>  
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kasir</label>
                                                <input class="form-control" id="kasir" name="kasir" value="{{$item->kasir}}" required />
                                            </div>           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/kaskeluar')}}" class="btn btn-danger">Batal</a>
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