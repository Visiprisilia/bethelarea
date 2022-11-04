@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kebijakan Yayasan</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahkebijakan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>File Kebijakan</th>
                            <th>Keterangan</th>                          
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($kebijakan as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_kebijakan}}</td>
                            <td>{{ $item->file_kebijakan}}</td>
                            <td>{{ $item->keterangan}}</td>
                            
                            <td>
                                <a href="/editkebijakan/{{$item->kode_kebijakan}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapuskebijakan/{{$item->kode_kebijakan}}"><i class="fas fa-trash-alt" style="color:red"></i></a>
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