@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Program Kerja</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    <div class="card-header py-3">
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="programkerja" name="programkerja">
                <option value>Pilih Periode</option>
                @foreach ($programkerja as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
        </div>
        @if (auth()->user()->level=="unit")
        <div class="card-header py-3">       
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahprogramkerjapendapatan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Program Kerja Anggaran Pendapatan</a>
            <a href="tambahprogramkerjabiaya" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Program Kerja Anggaran Biaya </a>
            <a href="cetakprogramkerjapendapatan" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak Program Kerja Anggaran Pendapatan</a>
            <a href="cetakprogramkerja" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak Program Kerja Anggaran Biaya</a>
            </div>@endif
         
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
            <div class="table-responsive" id="tableproker">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Program Kerja</th>
                            <th>Periode</th>
                            <th>Nama Program Kerja</th>
                            <th>Penanggung Jawab</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Tujuan</th>
                            <th>Indikator Pencapaian</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Catatan</th>
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
    $('#prok').click(function() {
        var proker = $(this).attr('data-id')
        swal({
                title: "Yakin?",
                text: "Data Anda akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapusprogramkerja/" + proker + ""
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
    $(document).on('change', '#programkerja', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewprogramkerja",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tableproker').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid -->
@endsection