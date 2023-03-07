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
                            <div class="card-header">Sumber Dana</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        @foreach($sumber as $item)
                                        <form action="/updatesumber/{{$item->id_sumber}}" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Sumber</label>
                                                <input class="form-control" id="id_sumber" name="id_sumber" readonly value="{{$item->id_sumber}}" placeholder="Kode Unit" required />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Sumber</label>
                                                <input class="form-control" readonly id="nama_sumber" name="nama_sumber" value="{{$item->nama_sumber}}" placeholder="Nama Unit" required />
                                            </div>
                                           
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/sumber')}}" class="btn btn-danger">Batal</a></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h5 style="color:blue;" >Panduan : </h5>
                        <h6 style="color:blue;" >Kode Sumber : 1 -> Nama Sumber : Murid </h6>
                        <h6 style="color:blue;" >Kode Sumber : 2 -> Nama Sumber : Yayasan </h6>
                        <h6 style="color:blue;" >Kode Sumber : 3 -> Nama Sumber : Donatur </h6>
                        <h6 style="color:blue;" >Kode Sumber Selanjutnya Diinput Urut Dengan Kode Sumber Sebelumnya</h6>
                        <h6 style="color:Tomato;" >Pastikan Kode dan Nama harus sesuai!</h6>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endforeach
@endsection