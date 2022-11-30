@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Posisi Anggaran</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <form method='post' class="no-print" href="{{url('/laporanposisianggaran')}}">Bulan <input type="number" class="no-print" name="bulan" id="bulan" min="1" max="12"> Tahun <input type="number" name="tahun" id="tahun" min="2021" max="2030"> <input type="submit" name="filterperiod" id="filterperiod" class="no-print" value="Tampilkan"> </form> <p></p>
            <a href="cetaklaporanposisianggaran" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Akun</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Nama Akun</th>
                            <th>Anggaran</th>
                            <th>Realisasi</th>
                            <th>Sisa</th>

                        </tr>
                    <tbody>
                        @foreach ($laporanpa as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode_akun}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->nama_akun}}</td>
                            <td>{{ $item->anggaran}}</td>
                            <td>{{ $item->realisasi}}</td>
                            <td>{{ $item->sisa}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid
@include('sweetalert::alert') -->
@endsection