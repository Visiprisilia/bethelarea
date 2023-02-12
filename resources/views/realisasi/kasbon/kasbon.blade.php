@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kas Bon</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        @if (auth()->user()->level=="unit")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahkasbon" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th>Tanggal Pengajuan</th>
                            <th>Keterangan</th>
                            <th>Program Kerja</th>
                            <th>Akun</th>
                            <th>Anggaran</th>
                            <th>Jumlah</th>
                            <th>Jumlah Pertanggungjawaban</th>
                            <th>Penanggung Jawab</th>                              
                            <th>Status</th>                              
                            <th>Tanggal Pertanggungjawaban</th>    
                            @if (auth()->user()->level=="unit")                          
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($kasbon as $item)
                        <tr>
                            <td>{{ $item->no_buktibon}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->tanggal_pengajuan}}</td>
                            <td>{{ $item->keterangan_bon}}</td>
                            <td>{{ $item->proker_bon}}</td>
                            <td>{{ $item->akun_bon}}</td>
                            <td>{{ Str::rupiah($item->anggaran_bon)}}</td>                            
                            <td>{{ Str::rupiah($item->jumlah_bon)}}</td>                            
                            <td>{{ Str::rupiah($item->jumlah_ptj)}}</td>                            
                            <td>{{ $item->nama}}</td>                              
                            <td>{{ $item->status_bon}}</td>                              
                            <td>{{ $item->tanggal_ptj}}</td>      
                            @if (auth()->user()->level=="unit")                        
                            <td>
                                <!-- <a href="/editkasbon/{{$item->no_buktibon}}"><i class="fas fa-edit" style="color:green"></i></a> | -->
                                <a href="/hapuskasbon/{{$item->no_buktibon}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a> 
                                <!-- <a href="#" id="bon" data-id="{{$item->no_buktibon}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                                <!-- <a href="/lihatkasbon/{{$item->no_bukti}}"><i class="fas fa-print" style="color:blue"></i></a> -->
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
    $('#bon').click( function(){
        var anak_keberapa = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapuskasbon/"+kb+""
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