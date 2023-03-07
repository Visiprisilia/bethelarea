@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Sumber</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahsumber" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>

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
                            <th>Kode Sumber</th>
                            <th>Nama Sumber</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($sumber as $item)
                        <tr>
                            <td>{{ $item->id_sumber}}</td>
                            <td>{{ $item->nama_sumber}}</td>
                            <td>
                                <!-- <a href="/editsumber/{{$item->id_sumber}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapussumber/{{$item->id_sumber}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="cutunit" data-id="{{$item->kode_unit}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
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
    $('#cutunit').click( function(){
        var kodeunit = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusunit/"+kodeunit+""
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