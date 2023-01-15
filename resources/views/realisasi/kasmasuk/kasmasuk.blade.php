@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Kas Masuk</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
    
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            @if (auth()->user()->level=="unit")
            <a href="tambahkasmasuk" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <!-- <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="kasmasuk" require name="kasmasuk">
                <option value>Pilih Periode</option>
                @foreach ($kasmasuk as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select> --> 
            @endif
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="kasmasuk" require name="kasmasuk">
                <option value>Pilih Sumber</option>
                <option value="murid">Murid</option>
                <option value="yayasan">Yayasan</option>
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
            <div class="table-responsive" id="tablekasmasuk">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No.Bukti</th>
                            <th>Periode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Keterangan</th>
                            <th>Akun</th>
                            <th>Sumber</th>
                            <th>Jumlah</th>
                            <th>Diterima Dari</th>
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
<!-- /.container-fluid -->
<!-- <script>
    $(document).on('change', '#kasmasuk', function() {
        var id = $(this).val();
        $.ajax({
            url: "/sumberkasmasuk",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablekasmasuk').html(data);
            }
        })
    })
</script> -->
<script>
    $(document).on('change', '#kasmasuk', function() {
        var id = $(this).val();
        $.ajax({
            url: "/sumberkasmasuk",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablekasmasuk').html(data);
            }
        })
    })
</script>
@endsection