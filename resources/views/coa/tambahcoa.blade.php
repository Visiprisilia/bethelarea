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
                            <div class="card-header">Chart of Accounts</div>
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                        <form action="/simpancoa" method="post">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Kode Akun</label>
                                                <input class="form-control" id="kode_akun" name="kode_akun" placeholder="Masukkan Kode Akun" />
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Akun</label>
                                                <input class="form-control" id="nama_akun" name="nama_akun" placeholder="Masukkan Nama Akun" />
                                            </div>                                         
                                            <!-- <div class="row gx-3 mb-3"> -->
                                            <!-- <div class="col-md-6"> -->
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1">Kelompok Rekening</label>
                                                <select class="form-control" id="kelompok_rek" name="kelompok_rek" >
                                                <option  value>Pilih Kelompok Rekening</option>    
                                                <option>Aktiva</option>
                                                    <option value="utang">Utang</option>
                                                    <option value="biaya">Biaya</option>
                                                    <option value="modal">Modal</option>
                                                    <option value="pendapatan">Pendapatan</option>
                                                </select>
                                            </div>
                                            <!-- <div class="col-md-6" id="cek" style="display: none;">
                                                <label for="exampleFormControlInput1">Pendapatan</label>
                                                <select class="form-control" id="status_coa" name="status_coa" >
                                                <option  value>Pilih Saldo Normal</option>  
                                                    <option>Debit</option>
                                                    <option>Kredit</option>
                                                </select>
                                            </div></div> -->
                                            <div class="mb-3" id="cek" style="display: none;">
                                                <label for="exampleFormControlSelect1">Status COA</label>
                                                <select class="form-control" id="status_coa" name="status_coa" >
                                                <option  value>Pilih Status</option>  
                                                    <option value="tagihan">Tagihan Murid</option>
                                                    <option value="NULL">Non Tagihan Murid</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1">Saldo Normal</label>
                                                <select class="form-control" id="saldo_normal" name="saldo_normal" >
                                                <option  value>Pilih Saldo Normal</option>  
                                                    <option>Debit</option>
                                                    <option>Kredit</option>
                                                </select>
                                            </div>
                                       
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan_coa" name="keterangan_coa" placeholder="Masukkan Keterangan" />
                                            </div>
                                            <div class="mb-3">
                                                <button type="submit" class="btn btn-success">Tambah</button>
                                                <a href="{{url('/coa')}}" class="btn btn-danger">Batal</a>                                            </div>
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
<script>
    $(document).on('change', '#kelompok_rek', function() {
        var val = $('#kelompok_rek option').filter(':selected').val() == "pendapatan" ? $('#cek').show() : $('#cek').hide();

        //   if(val=="murid"{})  
        // alert(val);
    })
</script>
@endsection