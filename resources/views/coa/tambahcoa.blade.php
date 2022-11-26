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
                                                <input class="form-control" id="kode_akun" name="kode_akun" required/>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Nama Akun</label>
                                                <input class="form-control" id="nama_akun" name="nama_akun" required/>
                                            </div>                                         
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1">Kelompok Rekening</label>
                                                <select class="form-control" id="kelompok_rek" name="kelompok_rek" required>
                                                <option  value>Pilih Kelompok Rekening</option>    
                                                <option>Aktiva</option>
                                                    <option>Utang</option>
                                                    <option>Modal</option>
                                                    <option>Pendapatan</option>
                                                    <option>Biaya</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlSelect1">Saldo Normal</label>
                                                <select class="form-control" id="saldo_normal" name="saldo_normal" required>
                                                <option  value>Pilih Kelompok Rekening</option>  
                                                    <option>Debit</option>
                                                    <option>Kredit</option>
                                                </select>
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1">Keterangan</label>
                                                <input class="form-control" id="keterangan" name="keterangan" required/>
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
@endsection