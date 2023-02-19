@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kas Keluar</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            @if (auth()->user()->level=="unit")
            <a href="tambahkaskeluar" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <a href="setoran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Setoran</a>
            @endif
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="periode" name="periode">
                <option value>Pilih Periode</option>
                @foreach ($periode as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
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
            <div class="table-responsive" id="tablekaskeluar" >
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>                              
                            <th>Bukti Nota</th>          
                            @if (auth()->user()->level=="unit")                        
                            <th>Aksi</th>
                            @endif
                            @if (auth()->user()->level=="yayasan")                        
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                       
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    $('#kk').click( function(){
        var kaskel = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapuskaskeluar/"+kaskel+""
                swal("Data berhasil dihapus!", {
                    icon: "success",
                });
            } else {
                swal("Data batal dihapus");
            }
        });
    });
    
</script>
<script>
    $(document).on('change', '#periode', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewkaskeluar",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablekaskeluar').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid -->
@endsection