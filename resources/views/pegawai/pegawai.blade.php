@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pegawai</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahpegawai" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Pendidikan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Kepegawaian</th>
                            <th>Tanggal Penetapan Pegawai Tetap</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_pegawai}}</td>
                            <td>{{ $item->nama_pegawai}}</td>
                            <td>{{ $item->jabatan_pegawai}}</td>
                            <td>{{ $item->pendidikan}}</td>
                            <td>{{ $item->tanggal_masuk}}</td>
                            <td>{{ $item->status_kepegawaian}}</td>
                            <td>{{ $item->tanggal_ppt}}</td>
                            <td>
                                <a href="/editpegawai/{{$item->kode_pegawai}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapuspegawai/{{$item->kode_pegawai}}"><i class="fas fa-trash-alt" style="color:red"></i></a>
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