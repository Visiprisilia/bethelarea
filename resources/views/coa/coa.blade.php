@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Chart Of Account</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahcoa" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-upload fa-sm text-white-50"></i> Import Data</a> -->
            <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-warning shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Export Data</a> -->
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Kelompok Rekening</th>
                            <th>Saldo Normal</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>                      
                        <tbody>
                        @foreach ($coa as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_akun}}</td>
                            <td>{{ $item->nama_akun}}</td>
                            <td>{{ $item->kelompok_rek}}</td>
                            <td>{{ $item->saldo_normal}}</td>
                            <td>{{ $item->keterangan}}</td>      
                            <td>
                                <a href="/editcoa/{{$item->kode_akun}}"><i class="fas fa-edit" style="color:green"></i></a> | 
                                <a href="/hapuscoa/{{$item->kode_akun}}"><i class="fas fa-trash-alt" style="color:red"></i></a> 
                            </td>
                        </tr>  
                        @endforeach  
                        </tbody>                
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid
@include('sweetalert::alert') -->

@endsection