@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku Besar Anggaran Pendapatan</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Saldo</th>
                        </tr>                      
                        <tbody>
                        @foreach ($bukubesaranggaranpendapatan as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td>{{ $item->saldo}}</td>
                           
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