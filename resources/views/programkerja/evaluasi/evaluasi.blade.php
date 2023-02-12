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
            <a href="cetakevaluasi" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>

            @endif
        <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="evaluasi" name="evaluasi">
                <option value>Pilih Periode</option>
                @foreach ($evaluasi as $item)
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
            <div class="table-responsive" id="tableevaluasi">
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
                            <th>Aksi</th>		
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
    $(document).on('change', '#evaluasi', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewevaluasi",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tableevaluasi').html(data);
            }
        })
    })
</script>
@endsection