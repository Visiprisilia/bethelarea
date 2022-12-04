@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku Besar Kas</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="cetaklaporankas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
            <select class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="periode" require name="periode">
                <option value>Pilih Periode</option>
                @foreach ($periode as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Bertambah</th>
                        <th>Berkurang</th>
                        <th>Saldo</th>
                    </tr>
                <tbody>
                    @foreach ($bbkas as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->kode}}</td>
                        <td>{{ $item->keterangan}}</td>
                        <td>{{ $item->bertambah}}</td>
                        <td>{{ $item->berkurang}}</td>
                        <td>{{$saldo = $saldo + $item->bertambah - $item->berkurang}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <th>Total</th>
                <th></th>
                <th></th>
                <th>{{$tambah}}</th>
                <th>{{$kurang}}</th>
                <th>{{$totalbbkas}}</th>
                </thead>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid
@include('sweetalert::alert') -->
@endsection