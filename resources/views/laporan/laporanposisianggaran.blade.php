@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Posisi Anggaran</h1>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="cetaklaporanposisianggaran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="lapposisianggaran" require name="lapposisianggaran">
                <option value>Pilih Periode</option>
                @foreach ($lapposisianggaran as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
        </div>
        <div class="card-body">
            <div class="table-responsive" id="tablelpa">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Nama Akun</th>
                            <th>Anggaran</th>
                            <th>Posisi Anggaran</th>
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
    $(document).on('change', '#lapposisianggaran', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewlpa",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablelpa').html(data);
            }
        })
    })
</script>
@endsection