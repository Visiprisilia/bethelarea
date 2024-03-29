@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Buku Besar Kas</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <a href="cetaklaporankas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a> -->
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="bbkas" require name="bbkas">
                <option value>Pilih Periode</option>
                @foreach ($bbkas as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
        </div>
        @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif
        <div class="card-body">
            <div class="table-responsive" id="tablekas">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Uraian</th>
                        <th>Bertambah</th>
                        <th>Berkurang</th>
                        <th>Saldo</th>
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
    $(document).on('change', '#bbkas', function() {
        var id = $(this).val();
        $.ajax({
            url: "/kas",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablekas').html(data);
            }
        })
    })
</script>
@endsection