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
                            <div class="card-header">Mutasi Kas</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpanmutasi" method="post">
                                            @csrf
                                            <!-- <div class="mb-3">
                                                <label for="exampleFormControlInput1">No Bukti</label>
                                                <input class="form-control" id="no_bukti" name="no_bukti"/>
                                            </div> -->
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
                                                <label for="exampleFormControlInput1">Tanggal Pencatatan</label>
                                                <input class="form-control" type="date" id="tanggal_pencatatan" name="tanggal_pencatatan"  />
                                            </div>   -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" />
                                            </div>      
                                            <!-- <div class="row gx-3 mb-3">
                                                <div class="col-md-4">
                                                <label class="mb-1" for="inputLastName">Program Kerja</label>
                                                    <select class="form-control" id="progja" name="progja"> -->
                                                        <!-- <option  value>Pilih Program Kerja</option>
                                                        @foreach ($programkerja as $item)
                                                        <option value="{{ $item->kode_proker}}">{{$item->kode_proker}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="mb-1" for="inputFirstName">Akun</label>
                                                    <input class="form-control" readonly id="akun" name="akun"  />
                                                </div>
                                                <div class="col-md-4">
                                                <label class="mb-1" for="inputFirstName">Sumber</label>
                                                <select class="form-control" id="sumber" name="sumber">
                                                        <option  value>Pilih Sumber</option>
                                                        @foreach ($sumber as $item)
                                                        <option value="{{ $item->id_sumber}}">{{$item->nama_sumber}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-4" id="murid" style="display: none;">
                                                    <label class="mb-1" for="inputFirstName">Diterima dari :</label>
                                                    <select class="form-control" id="kasir" name="kasir">
                                                        <option  value>Pilih Murid</option>
                                                        @foreach ($murid as $item)
                                                        <option value="{{ $item->nomor_induk}}">{{$item->nomor_induk}}  {{$item->nama}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>                -->
                                            <div class="row gx-3 mb-3">
                                            <div class="col-md-4">
                                                <label for="exampleFormControlInput1">Jumlah</label>
                                                <input class="form-control" id="jumlah" name="jumlah"   />
                                            </div></div>                                                                                                                                                   
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
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
<script src="/proker/kasmasuk.js"></script>

<script>
    $(document).on('change','#sumber',function(){
      var val=$('#sumber option').filter(':selected').val()=="1"?  $('#murid').show():  $('#murid').hide();
    
      //   if(val=="murid"{})  
      // alert(val);
    })
</script>
@endsection