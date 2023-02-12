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
                        @foreach ($kaskeluar as $item)
                        <tr>
                            <td>{{ $item->no_bukti}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->keterangan}}</td>                       
                            <td>{{ Str::rupiah($item->jumlah)}}</td>                              
                            <td>{{ $item->bukti}}</td>      
                            @if (auth()->user()->level=="unit")                             
                            <td>
                                <!-- <a href="/editkaskeluar/{{$item->no_bukti}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapuskaskeluar/{{$item->no_bukti}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> |
                                <!-- <a href="#" id="kk" data-id="{{$item->no_bukti}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <a href="/lihatkaskeluar/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a>
                                <a href="/downloadbkk/{{($item->no_bukti) }}" download=""><i class="fas fa-download" style="color:orange"></i></a>

                            </td>
                            @endif 
                            @if (auth()->user()->level=="yayasan")                             
                            <td>
                               <a href="/downloadbkk/{{($item->no_bukti) }}" download=""><i class="fas fa-download" style="color:orange"></i></a>
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
<!-- /.container-fluid -->
@endsection