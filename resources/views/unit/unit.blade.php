@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Unit</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <h6 class="btn btn-success"><a href="tambahunit">Tambah Data</a></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Kode Unit</th>
                            <th>Nama Unit</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($unit as $item)
                        <tr>
                            <td>{{ $item->kode_unit}}</td>
                            <td>{{ $item->nama_unit}}</td>
                            <td>{{ $item->status_unit}}</td>
                            <td>
                                <a href="/editunit/{{$item->kode_unit}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapusunit/{{$item->kode_unit}}"><i class="fas fa-trash-alt" style="color:red"></i></a>
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