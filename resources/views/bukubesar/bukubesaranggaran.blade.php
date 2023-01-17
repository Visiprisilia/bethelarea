@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku Besar Anggaran</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form action="/bukubesaranggaran" method="GET">
                <div class="input-group mb-3">
                    <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="akun" name="akun">
                        <option value>Pilih Akun</option>
                        @foreach ($coa as $item)
                        <option value="{{ $item->kode_akun}}">{{$item->kode_akun}}-{{$item->nama_akun}}</option>
                        @endforeach
                    </select>
                    <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="periode" name="periode">
                        <option value>Pilih Periode</option>
                        @foreach ($periode as $item)
                        <option value="{{ $item->kode_periode}}">{{$item->kode_periode}}</option>
                        @endforeach
                    </select>
                    <div class="input-group-append">
                        <button class="btn btn-secondary" type="submit">Search</button>
                    </div>
                </div>
            </form>
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
                        @foreach ($bbanggaran as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode}}</td>
                            <td>{{Str::rupiah ($item->anggaran)}}</td>
                            <td>{{Str::rupiah ($item->realisasi)}}</td>
                            <td>{{Str::rupiah ($saldo = $saldo + $item->anggaran - $item->realisasi)}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <th>Total</th>
                    <th></th>
                    <th>{{Str::rupiah($anggaran)}}</th>
                    <th>{{Str::rupiah($realisasi)}}</th>
                    <th>{{Str::rupiah($total)}}</th>

                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- <script>
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
</script> -->
@endsection