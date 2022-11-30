@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Program Kerja</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <a href="tambahprogramkerja" class="d-none d-sm-inline-block btn btn-sm btn-success shadow-sm"><i class="fas fa-plus fa-sm text-white-50"></i>Tambah Data</a>
            <a href="cetakprogramkerja" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="periode" name="periode">
                <option value>Pilih Periode</option>
                @foreach ($periode as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach  </select>
            </select>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Program Kerja</th>
                            <th>Periode</th>
                            <th>Nama Program Kerja</th>
                            <th>Penanggung Jawab</th>
                            <th>Waktu Mulai</th>
                            <th>Waktu Selesai</th>
                            <th>Tujuan</th>
                            <th>Indikator Pencapaian</th>
                            <th>Jumlah</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    <tbody>
                        @foreach ($programkerja as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_proker}}</td>
                            <td>{{ $item->periode}}</td>
                            <td>{{ $item->nama_proker}}</td>
                            <td>{{ $item->nama}}</td>
                            <td>{{ $item->waktu_mulai}}</td>
                            <td>{{ $item->waktu_selesai}}</td>
                            <td>{{ $item->tujuan}}</td>
                            <td>{{ $item->indikator}}</td>
                            <td>{{ $item->anggaran}}</td>
                            <td>{{ $item->keterangan}}</td>
                            <td>
                                <a href="/editprogramkerja/{{$item->kode_proker}}"><i class="fas fa-edit" style="color:green"></i></a> |
                                <a href="/hapusprogramkerja/{{$item->kode_proker}}"><i class="fas fa-trash-alt" style="color:red"></i></a>
                                <a href="/lihatprogramkerja/{{$item->kode_proker}}"><i class="fas fa-eye" style="color:red"></i></a>
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
<!-- /.container-fluid -->
@endsection