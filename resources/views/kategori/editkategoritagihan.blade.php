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
                            <div class="card-header">Jenis Tagihan</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($kategori as $item)
                                        <form action="/updatekategoritagihan/{{$item->id_kategoritagihan}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Tagihan</label>
                                                <input class="form-control" id="id_kategoritagihan" readonly name="id_kategoritagihan" value="{{$item->id_kategoritagihan}}" placeholder="Masukkan Kode Tagihan, Urut Sesuai Kode Tagihan Sebelumnya"  />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Jenis Tagihan</label>
                                                <input class="form-control" id="nama_kategoritagihan" name="nama_kategoritagihan" value="{{$item->nama_kategoritagihan}}" placeholder="Masukkan Jenis Tagihan" />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/kategoritagihan')}}" class="btn btn-danger">Batal</a></div>
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