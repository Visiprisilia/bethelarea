@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tagihan Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
   
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        @if (session('status'))
        <div class="alert alert-danger">
            {{ session('status') }}
        </div>
        @endif
        <br>
        @foreach ($tagihan as $item)
       <b> &nbsp; Nomor Induk : {{$item->nis_tagihan}} <br>
       &nbsp; Nama Murid : {{$item->nama}} 
       @endforeach
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Jenis Tagihan</th>
                            <th>Jumlah Tagihan</th>
                            <th>Sudah Terbayar</th>
                            <th>Sisa Bayar</th>
                        </tr>
                    <tbody>
                        @foreach ($tagihan as $item)
                        <tr>
                            <td>{{ $item->nis_tagihan}}</td>
                            <td>{{ $item->nama}}</td>                           
                            <td>{{ $item->nama}}</td>                           
                            <td>{{ $item->nama}}</td>                           
                        </tr>
                        @endforeach
                    </tbody>
                    <th>Total</th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <!-- <th></th> -->

                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
@endsection