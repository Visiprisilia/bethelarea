@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tagihan Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->level=="unit")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahtagihan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            @endif
        </div>
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
                            <th>Nomor Induk</th>
                            <th>Nama Murid</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($tagihan as $item)
                        <tr>
                            <td>{{ $item->nis_tagihan}}</td>
                            <td>{{ $item->nama}}</td>
                            @if (auth()->user()->level=="unit")
                            <td>
                                <a href="/edittagihan/{{$item->nis_tagihan}}"><i class="fas fa-edit" style="color:green"></i></a> 
                                <a href="/hapustagihan/{{$item->nis_tagihan}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                @endif
                                <a href="/lihattagihan/{{$item->nis_tagihan}}"><i class="fas fa-eye" style="color:red"></i></a>
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

<!-- /.container-fluid -->
@endsection