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
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahmurid" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
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
                            <th>Nomor Induk Siswa</th>
                            <th>Nomor Induk Siswa Nasional</th>
                            <th>Nama</th>
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
                            <th>Aksi</th>
                            @endif
                        </tr>  
                    <tbody>
                        @foreach ($murid as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->nomor_induk}}</td>
                            <td>{{ $item->nomor_isn}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->ttl}}</td>
                            <td>{{ $item->jk}}</td>
                            <td>{{ $item->alamat}}</td>
                            <td>{{ $item->agama}}</td>
                            <td>{{ $item->nama_ayah}}</td>
                            <td>{{ $item->nama_ibu}}</td>
                            <td>{{ $item->pekerjaan_ayah}}</td>
                            <td>{{ $item->pekerjaan_ibu}}</td>
                            <td>{{ $item->pendidikan_ayah}}</td>
                            <td>{{ $item->pendidikan_ibu}}</td>
                            <td>{{ $item->anak_keberapa}}</td>
                            <td>{{ $item->no_akte}}</td>
                            <td>{{ $item->foto_murid}}</td>
                            <td>{{ $item->file_kk}}</td>
                            <td>{{ $item->kontak}}</td>
                            @if (auth()->user()->level=="super admin")
                            <td>
                                <a href="/editmurid/{{$item->nomor_induk}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapusmurid/{{$item->nomor_induk}}" onclick="return confirm('Yakin hapus data?')"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <!-- <a href="#" id="del" data-id="{{$item->nomor_induk}}" ><i class="fas fa-trash-alt" style="color:red"></i></a> -->
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
    $('#del').click( function(){
        var murid = $(this).attr('data-id')
        swal({
            title: "Yakin?",
            text: "Data Anda akan dihapus!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
        .then((willDelete) => {
            if (willDelete) {
                window.location = "/hapusmurid/"+murid+""
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