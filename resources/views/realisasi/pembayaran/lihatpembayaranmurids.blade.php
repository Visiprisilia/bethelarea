@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Rincian Tagihan Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <!-- <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="periode" name="periode">
                <option value>Pilih Periode</option>
                @foreach ($periode as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>     -->
            <input type="button" value="Kembali" onclick=self.history.back() class="no-print">
        </div>
        <br>
        <b> &nbsp;&nbsp; Nomor Induk : {{$pembayarans->rincian_nis}} <br>
            &nbsp;&nbsp; Nama Murid : {{$pembayarans->nama}}
            <div class="card-body">
                <div class="table-responsive" id="tablerincianmurid">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis Tagihan</th>
                                <th>Jumlah Tagihan</th>
                                <th>Jumlah Pembayaran</th>
                                <th>Sisa Pembayaran</th>
                            </tr>
                        <tbody>
                            @foreach ($pembayaran as $item)
                            <tr>
                                <td>{{ $loop->iteration}}</td>
                                <td>{{ $item->nama_akun}}</td>
                                <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                                <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                                <td>{{ Str::rupiah ($item->sisapembayaran)}}</td>
                            </tr>
                            @endforeach
                            <th>Total</th>
                            <th></th>
                            <th>{{Str::rupiah($tagihan)}}</th>
                            <th>{{Str::rupiah($bayaran)}}</th>
                            <th>{{Str::rupiah($sisa)}}</th>

                            </thead>
                    </table>
                </div>
            </div>
            </form>
    </div>

</div>
<script>
    $(document).on('change', '#periode', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewlihatpembayaranmurids",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablerincianmurid').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid -->

@endsection