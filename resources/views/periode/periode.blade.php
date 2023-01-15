@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Periode</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        @if (auth()->user()->level=="super admin")
        <a href="tambahperiode" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th>Kode</th>
                            <th>Periode</th>
                            <th>Awal Periode</th>
                            <th>Akhir Periode</th>
                            <th>Status</th>
                            @if (auth()->user()->level=="super admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($periode as $item)
                        <tr>
                            <td>{{ $item->kode_periode}}</td>
                            <td>{{ $item->nama_periode}}</td>
                            <td>{{ $item->awal_periode}}</td>
                            <td>{{ $item->akhir_periode}}</td>
                            <td>{{ $item->status}}</td>
                            @if (auth()->user()->level=="super admin")
                            <td>
                                <a href="/editperiode/{{$item->kode_periode}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapusperiode/{{$item->kode_periode}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="hapuss" data-id="{{$item->kode_periode}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
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
<script>
    $('#hapuss').click( function(){
        var kodeperiode = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusperiode/"+kodeperiode+""
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