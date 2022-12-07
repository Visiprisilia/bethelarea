@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Sub Unit</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahsubunit" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Sub Unit</th>
                            <th>Nama Sub Unit</th>                        
                            <th>Nama Unit</th>                        
                            <th>Status</th>                        
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($subunit as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_subunit}}</td>
                            <td>{{ $item->nama_subunit}}</td>                         
                            <td>{{ $item->nama_unit}}</td>                         
                            <td>{{ $item->status}}</td>                      
                            <td>
                                <a href="/editsubunit/{{$item->kode_subunit}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <!-- <a href="/hapussubunit/{{$item->kode_subunit}}"onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <a href="#" id="hapus" data-id="{{$item->kode_subunit}}" ><i class="fas fa-trash-alt" style="color:red"></i></a>

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
<script>
    $('#hapus').click( function(){
        var kodesubunit = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapussubunit/"+kodesubunit+""
                swal("Data berhasil dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Data batal dihapus");
            }
        });
    });
    
</script>
@endsection