@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku Besar Anggaran</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="bbanggaran" require name="bbanggaran">
                <option value>Pilih Akun</option>
                @foreach ($bbanggaran as $item)
                <option value="{{ $item->kode_akun}}">{{$item->kode_akun}}-{{$item->nama_akun}}</option>
                @endforeach
            </select>
            <!-- <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="bbanggaran2" require name="bbanggaran2">
                <option value>Pilih Periode</option>
                @foreach ($bbanggaran2 as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select> -->
        </div>

        <div class="card-body">
            <div class="table-responsive" id="table">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Anggaran</th>
                            <th>Realisasi</th>
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
    $(document).on('change', '#bbanggaran', function() {
        var id = $(this).val();
        $.ajax({
            url: "/anggaran",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#table').html(data);
            }
        })
    })
</script>
<script>
    $(document).on('change', '#bbanggaran2', function() {
        var kode = $(this).val();
        $.ajax({
            url: "/anggaran",
            data: {
                kode: kode
            },
            method: "get",
            success: function(data) {
                $('#table').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid
@include('sweetalert::alert') -->
@endsection