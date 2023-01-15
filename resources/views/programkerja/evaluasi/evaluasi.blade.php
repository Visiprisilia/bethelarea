@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Evaluasi Program Kerja</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        @if (auth()->user()->level=="unit")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahevaluasi" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th>No</th>                                    
                            <th>Periode</th>
                            <th>Kode Program Kerja</th>
                            <th>Nama Program Kerja</th>
                            <th>Penanggung Jawab</th>                                           
                            <th>Tujuan</th>   
                            <th>Akun Biaya</th>
                            <th>Rencana Anggaran</th>                                                     
                            <th>Realisasi Anggaran</th>                                                     
                            <th>Rencana Waktu</th>                                                     
                            <th>Realisasi Waktu</th>                                                     
                            <th>Indikator Pencapaian</th>                                                     
                            <th>Kinerja Pencapaian</th>                                                     
                            <th>Faktor Pendorong</th>                                                     
                            <th>Faktor Penghambat</th>                                                     
                            <th>Tindak Lanjut</th>
                            @if (auth()->user()->level=="unit")                                                     
                            <th>Aksi</th>		
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($evaluasi as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->kode_proker}}</td>
                            <td>{{ $item->nama_proker}}</td>
                            <td>{{ $item->penanggungjawab}}</td>                                                         
                            <td>{{ $item->tujuan}}</td>                            
                            <td>{{ $item->akun_beban}}</td>                             
                            <td>{{Str::rupiah ($item->rencana_anggaran)}}</td>                        
                            <td>{{Str::rupiah ($item->realisasi_anggaran)}}</td>                        
                            <td>{{ $item->rencana_waktu}}</td>                            
                            <td>{{ $item->realisasi_waktu}}</td>                            
                            <td>{{ $item->indikator_pencapaian}}</td>                            
                            <td>{{ $item->kinerja_pencapaian}}</td>                            
                            <td>{{ $item->faktor_pendorong}}</td>                            
                            <td>{{ $item->faktor_penghambat}}</td>                            
                            <td>{{ $item->tindaklanjut}}</td>                            
                            @if (auth()->user()->level=="unit")
                            <td>
                                <a href="/editevaluasi/{{$item->kode_proker}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapusevaluasi/{{$item->kode_proker}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="eval" data-id="{{$item->kode_proker}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
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
    $('#eval').click( function(){
        var ev = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusevaluasi/"+ev+""
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