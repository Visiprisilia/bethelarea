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
                            <div class="card-header">Murid</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($murid as $item)
                                    <form action="/updatemurid/{{$item->nomor_induk}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nomor Induk</label>
                                                <input class="form-control" id="nomor_induk" name="nomor_induk" value="{{$item->nomor_induk}}"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama</label>
                                                <input class="form-control" id="nama" name="nama" value="{{$item->nama}}" />
                                            </div>
                                            <div class="mb-3">
                                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                                <select class="form-control" id="jk" name="jk" value="{{$item->jk}}">
                                                <option disabled value>Pilih Jenis Kelamin</option>   
                                                <option>Perempuan</option>
                                                    <option>Laki-laki</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                                <input class="form-control" type="date" id="ttl" name="ttl" value="{{$item->ttl}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Alamat</label>
                                                <input class="form-control" id="alamat" name="alamat" value="{{$item->alamat}}"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Agama</label>
                                                <input class="form-control" id="agama" name="agama" value="{{$item->agama}}" />
                                            </div>      
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/murid')}}" class="btn btn-danger">Batal</a>                                            </div>
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
