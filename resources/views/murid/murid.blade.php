@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Murid</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->level=="super admin")
            <h6 style="color:Tomato;">Perubahan data dilakukan sekali dalam satu tahun akademik!</h6>
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahmurid" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <a href="cetakmurid" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-sm text-white-50"></i>Cetak</a>
            @endif
          <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="kelas" name="kelas">
            <option value>Pilih Kelas</option>
            @foreach ($kelas as $item)
            <option value="{{ $item->nama_kelas}}">{{$item->nama_kelas}}</option>
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
            <div class="table-responsive" id="tablemurid">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Siswa</th>
                            <th>Nomor Induk Siswa Nasional</th>
                            <th>Kelas</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>Agama</th>
                            <th>Nama Ayah</th>
                            <th>Nama Ibu</th>
                            <th>Pekerjaan Ayah</th>
                            <th>Pekerjaan Ibu</th>
                            <th>Pendidikan Terakhir Ayah</th>
                            <th>Pendidikan Terakhir Ibu</th>
                            <th>Anak Ke Berapa</th>
                            <th>Nomor Akte Lahir</th>
                            <th>Foto Murid</th>
                            <th>File KK</th>
                            <th>Kontak</th>
                            @if (auth()->user()->level=="super admin")
                            <th>Perubahan Data</th>
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
<!-- /.container-fluid -->
<script>
    $(document).on('change', '#kelas', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewmurid",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablemurid').html(data);
            }
        })
    })
</script>
@endsection