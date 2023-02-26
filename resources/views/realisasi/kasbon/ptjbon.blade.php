@extends('template')
@section('container')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
                                Pertanggungjawaban Bon
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
                                        <form action="/simpankasbon" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
                                            
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputLastName">Periode</label>
                                                <select class="form-control" id="periode" name="periode">
                                                    <option value>Pilih Periode</option>
                                                    @foreach ($periode as $item)
                                                    <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Tanggal Pengajuan</label>
                                                    <input class="form-control"  type="date" id="tanggal_pengajuan" name="tanggal_pengajuan"  required />
                                                </div> -->
                                            <div class="mb-3">
                                                <label class="mb-1" for="inputFirstName">Keterangan</label>
                                                <input class="form-control" id="keterangan_bon" name="keterangan_bon" placeholder="Masukkan Keterangan" />
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-select" id="proker_bon" name="proker_bon">
                                                        <!-- <option value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div>
                                                <div class="col-md-6" >
                                                    <label class="mb-1" for="inputLastName">Akun</label>
                                                    <select class="form-control" id="akun_bon" name="akun_bon">
                                                        <!-- <option  value>Pilih Akun</option>
                                                        @foreach ($akun as $item)
                                                        <option value="{{ $item->kode_akun}}">{{$item->kode_proker}} - {{$item->kode_akun}}</option>
                                                        @endforeach -->
                                                    </select>
                                                </div></div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Akun</label>
                                                    <input class="form-control" readonly id="akun_bon" name="akun_bon"  />
                                                </div></div> -->
                                                <div class="row gx-3 mb-3">
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Anggaran</label>
                                                    <input class="form-control" readonly id="anggaran_bon" name="anggaran_bon" placeholder="Masukkan Anggaran"  />
                                                </div> -->
                                                <div class="col-md-4">
                                                        <label class="mb-1" for="inputFirstName">Saldo Kas</label>
                                                        <input class="form-control" readonly id="totalkas" name="totalkas" value="{{$totalkas}}"  />
                                                    </div>
                                                <div class="col-md-4" id="anggaran_bon">
                                                    <label class="mb-1" for="inputFirstName">Anggaran</label>
                                                    <!-- <input class="form-control" readonly id="anggaran" name="anggaran"   /> -->
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Jumlah</label>
                                                    <input class="form-control" id="jumlah_bon" name="jumlah_bon" placeholder="Masukkan Jumlah"  />
                                                </div>
                                            </div>
                                            <div class="row gx-3 mb-3">
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputFirstName">Penanggung Jawab</label>
                                                    <input class="form-control" id="penanggungjawab_bon" name="penanggungjawab_bon" placeholder="Masukkan penanggung jawab"  />
                                                </div> -->
                                                <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Penanggung Jawab</label>
                                                    <select class="form-control" id="penanggungjawab_bon" name="penanggungjawab_bon">
                                                        <option  value>Pilih Penanggung Jawab</option>
                                                        @foreach ($pegawai as $item)
                                                        <option value="{{ $item->niy}}">{{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <label class="mb-1" for="inputLastName">Tanggal Pertanggungjawaban</label>
                                                    <input class="form-control" type="date" id="tanggal_ptj" name="tanggal_ptj" placeholder="Masukkan Proker" required />
                                                </div> -->
                                            </div>
                                            <!-- <div class="mb-3">
                                            <label for="inputLastName">Status</label>
                                                <select class="form-control" id="status_bon" name="status_bon" required>
                                                    <option  value>Pilih Status</option>
                                                    <option>Sudah Dipertanggungjawabkan</option>
                                                    <option>Belum Dipertanggungjawabkan</option>
                                                </select>                                              
                                            </div> -->
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
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
<script src="/proker/kasbon.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
        $(document).ready(function(){
            $("#proker_bon").select2({
                placeholder:'Pilih Proker',
                ajax: {
                    url:"{{route('pilihprokerbon.index')}}",
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.kode_proker,
                                    text: item.nama_proker
                                }
                            })
                        }
                    }
                }
            });
            $("#proker_bon").change(function(){
                let kode_proker = $('#proker_bon').val();

                $("#akun_bon").select2({
                placeholder:'Pilih Akun',
                ajax: {
                    url: "{{url('pilihprokerbonakun')}}/"+kode_proker,
                    processResults: function({data}){
                        return {
                            results: $.map(data, function(item){
                                return {
                                    id: item.kode_akun,
                                    text: item.nama_akun
                                }
                            })
                        }
                    }
                }
            });
            });
        });
            </script>

@endsection