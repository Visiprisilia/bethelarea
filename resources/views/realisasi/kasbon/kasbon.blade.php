@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kas Bon</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahkasbon" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Program Kerja</th>
                            <th>Anggaran</th>
                            <th>Penanggung Jawab</th>                              
                            <th>Tanggal Pertanggungjawaban</th>                              
                            <th>Status</th>                              
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($kasbon as $item)
                        <tr>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pengajuan}}</td>
                            <td>{{ $item->proker}}</td>
                            <td>{{ $item->anggaran}}</td>                            
                            <td>{{ $item->penanggungjawab}}</td>                              
                            <td>{{ $item->tanggal_ptj}}</td>                              
                            <td>{{ $item->status}}</td>                              
                            <td>
                                <a href="/editkasbon/{{$item->no_bukti}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapuskasbon/{{$item->no_bukti}}"><i class="fas fa-trash-alt" style="color:red"></i></a> |
                                <a href="/lihatkasbon/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
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