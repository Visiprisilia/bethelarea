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
                                Lihat Data
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
                            <div class="card-header">Kas Bon</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    @foreach($kasbon as $item)
                                        <form action="/updatekasbon/{{$item->no_bukti}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti" readonly value="{{$item->no_bukti}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Periode</label>
                                                <input class="form-control" id="periode" name="periode" readonly value="{{$item->periode}}" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Tanggal</label>
                                                <input class="form-control" type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" readonly value="{{$item->tanggal_pengajuan}}"/>
                                            </div>  
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_bon" name="keterangan_bon" readonly value="{{$item->keterangan_bon}}"/>
                                            </div>      
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">Akun</label>
                                                <input class="form-control"  id="akun_bon" name="akun_bon" readonly value="{{$item->nama_akun}}"/>
                                            </div>                                              -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Jumlah</label>
                                                <input class="form-control" id="jumlah_bon" name="jumlah_bon" readonly value="{{$item->jumlah_bon}}"  />
                                            </div>  
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Bukti</label>
                                                <input class="form-control" id="bukti_bon" name="bukti_bon" readonly value="{{$item->bukti_bon}}"  />
                                            </div>  
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Dibayar Kepada :</label>
                                                <input class="form-control" id="dibayarkepada" name="dibayarkepada" readonly value="{{$item->dibayarkepada}}"  />
                                            </div>   
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Penanggung Jawab :</label>
                                                <input class="form-control" id="penanggungjawab_bon" name="penanggungjawab_bon" readonly value="{{$item->nama}}"  />
                                            </div>           
                                            <div class="mb-3">
                                                <a href="/cetakkasbon/{{$item->no_bukti}}" class="btn btn-primary">Cetak</a>
                                                <!-- <a href="{{url('/kasbon')}}" class="btn btn-danger">Batal</a> -->
                                                <input type="button" value="Kembali" onclick=self.history.back() class="btn btn-success">

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