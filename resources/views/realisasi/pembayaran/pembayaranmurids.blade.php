@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"> Pembayaran Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="cetakpembayaranmurids/{{$pembayarans->rincian_nis ?? ''}}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
            <!-- <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="pembayaran" name="pembayaran">
                <option value>Pilih Periode</option>
                @foreach ($pembayaran as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select> -->
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
        <b> &nbsp;&nbsp; Nomor Induk : {{$pembayarans->rincian_nis ?? '' }} <br>
            &nbsp;&nbsp; Nama Murid : {{$pembayarans->nama ?? '' }}
        <div class="card-body">
            <div class="table-responsive" id="tablepembayarans">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Periode</th>
                            <!-- <th>Nomor Induk</th>
                            <th>Nama Murid</th>                            -->
                            <th>Detail</th>
                        </tr>
                    <tbody>
                        @foreach ($pembayaran as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->rincian_periode}}</td>
                            <!-- <td>{{ $item->rincian_nis}}</td>
                            <td>{{ $item->nama}}</td> -->
                            <!-- <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                            <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                            <td>{{ Str::rupiah ($item->sisapembayaran)}}</td> -->


                            <td>
                                <a href="/lihatpembayaranmurids/{{$item->rincian_id}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Lihat Detail</a>
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
<script>
    $(document).on('change', '#pembayaran', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewpembayaranmurids",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablepembayarans').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid -->
@endsection