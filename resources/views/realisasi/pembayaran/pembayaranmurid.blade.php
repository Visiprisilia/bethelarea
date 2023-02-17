@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Tagihan Murid</h1>


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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk</th>
                            <th>Nama Murid</th>
                            <!-- <th>Total Tagihan</th>
                            <th>Total Pembayaran</th>
                            <th>Total Sisa Pembayaran</th> -->
                            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($pembayaran as $item)
                        <tr>
                        <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->rincian_nis}}</td>
                            <td>{{ $item->nama}}</td>
                            <!-- <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                            <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                            <td>{{ Str::rupiah ($item->sisapembayaran)}}</td> -->
                            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")

                            <td>
                                <a href="/lihatpembayaranmurid/{{$item->rincian_nis}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Detail</a> 
                            </td>
                                @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>

<!-- /.container-fluid -->
@endsection