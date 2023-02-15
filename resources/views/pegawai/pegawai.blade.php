@extends('template')
@section('container')
<!-- Begin Page Content -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Pegawai</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            @if (auth()->user()->level=="super admin")
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahpegawai" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            @endif
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
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Induk Yayasan</th>
                            <th>Nama</th>
                            <th>Tempat Lahir</th>
                            <th>TTL</th>
                            <th>Agama</th>
                            <th>Pendidikan</th>
                            <th>Alamat</th>
                            <th>Penempatan</th>
                            <th>Tanggal Masuk</th>
                            <th>Status Kepegawaian</th>
                            <th>Tanggal Penetapan Pegawai Tetap</th>
                            <!-- <th>Foto Pegawai</th>
                            <th>File KTP</th>
                            <th>Surat Keterangan</th> -->
                            <th>Status</th>
                            <th>Termin</th>
                            <th>Keterangan</th>
                            <th>Tanggal Update</th>
                            @if (auth()->user()->level=="super admin")
                            <th>Aksi</th>
                            @endif
                        </tr>
                    <tbody>
                        @foreach ($pegawai as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->niy}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->tempat_lahir}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->pendidikan}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->penempatan}}</td>
                            <td>{{ $item->tanggal_masuk}}</td>
                            <td>{{ $item->status_kepegawaian}}</td>
                            <td>{{ $item->tanggal_ppt}}</td>
                            <!-- <td>{{ $item->foto_pegawai}}</td>
                            <td>{{ $item->file_ktp}}</td>
                            <td>{{ $item->file_suket}}</td> -->
                            <td>{{ $item->status}}</td>
                            <td>{{ $item->tanggal_terminasi}}</td>
                            <td>{{ $item->keterangan_pegawai}}</td>
                            <td>{{ $item->updated_at}}</td>
                            @if (auth()->user()->level=="super admin")
                            <td>
                                <a href="/editpegawai/{{$item->niy}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapuspegawai/{{$item->niy}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="cut" data-id="{{$item->niy}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
<script>
    $('#cut').click(function() {
        var kodepeg = $(this).attr('data-id')
        swal({
                title: "Yakin?",
                text: "Data Anda akan dihapus!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/hapuspegawai/" + kodepeg + ""
                    swal("Data berhasil dihapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Data batal dihapus");
                }
            });
    });
</script>
@endsection