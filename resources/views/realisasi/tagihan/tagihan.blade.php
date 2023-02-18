@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tagihan Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->level=="unit")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahdaftartagihan" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            @endif
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="tagihan" name="tagihan">
                <option value>Pilih Periode</option>
                @foreach ($tagihan as $item)
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
        <div class="table-responsive" id="tabletagihan">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk</th>
                            <th>Nama Murid</th>
                            <th>Total</th>
                            @if (auth()->user()->level=="unit" or auth()->user()->level=="yayasan")
                            <th>Aksi</th>
                            @endif
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
    $(document).on('change', '#tagihan', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewtagihan",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tabletagihan').html(data);
            }
        })
    })
</script>
<!-- /.container-fluid -->
@endsection