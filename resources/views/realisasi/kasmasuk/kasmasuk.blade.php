@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kas Masuk</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahkasmasuk" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Akun</th>
                            <th>Sumber</th>
                            <th>Jumlah</th>                              
                            <th>Diterima Dari</th>                              
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($kasmasuk as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td>{{ $item->akun}}</td>                            
                            <td>{{ $item->sumber}}</td>                            
                            <td>{{ $item->jumlah}}</td>                              
                            <td>{{ $item->nama}}</td>                              
                            <td>
                                <a href="/editkasmasuk/{{$item->no_bukti}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <!-- <a href="/hapuskasmasuk/{{$item->no_bukti}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> | -->
                                <a href="#" id="del" data-id="{{$item->no_bukti}}" ><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <a href="/lihatkasmasuk/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
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
    $('#del').click( function(){
        var km = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapuskasmasuk/"+km+""
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