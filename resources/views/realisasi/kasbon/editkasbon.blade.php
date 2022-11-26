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
                                        @foreach($kasbon as $item)
                                        <form action="/updatekasbon/{{$item->no_bukti}}" method="post">
                                            @csrf
                                                           <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                <label class="mb-1" for="inputLastName">Periode</label>
                                                    <select class="form-control" id="periode" name="periode">
                                                        <option disabled value>Pilih Periode</option>
                                                        @foreach ($periode as $item)
                                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Pengajuan</label>
                                                    <input class="form-control"  type="date" id="tanggal_pengajuan" name="tanggal_pengajuan" value="{{$item->tanggal_pengajuan}}" required />
                                                </div>
                                            </div>        
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                     <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-control" id="proker" name="proker">
                                                        <option disabled value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->nama_proker}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Anggaran</label>
                                                    <input class="form-control" id="anggaran" name="anggaran" placeholder="Masukkan Anggaran" value="{{$item->anggaran}}"required />
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawab" name="penanggungjawab"  value="{{$item->penanggungjawab}}"  placeholder="Masukkan Penanggung Jawab" required />
                                                </div>
                                            </div>     
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <select class="form-control" id="penanggungjawab" name="penanggungjawab">
                                                        <option disabled value>Pilih Periode</option>
                                                        @foreach ($pegawai as $item)
                                                        <option value="{{ $item->niy}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Status</label>
                                                    <input class="form-control" id="status" name="status" value="{{$item->status}}"  required />
                                                </div>
                                            </div>             
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                                <a href="{{url('/kasbon')}}" class="btn btn-danger">Batal</a>
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