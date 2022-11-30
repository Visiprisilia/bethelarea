@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Penghasilan Komprehensif</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <form method='post' class="no-print" href="{{url('/laporanpengkomp')}}">Bulan <input type="number" class="no-print" name="bulan" id="bulan" min="1" max="12"> Tahun <input type="number" name="tahun" id="tahun" min="2021" max="2030"> <input type="submit" name="filterperiod" id="filterperiod" class="no-print" value="Tampilkan"> </form> <p></p>
            <a href="cetaklaporanpengkomp" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
    
    </div> 
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Tanggal Pencatatan</th>
                            <th>Pendapatan</th>
                            <th>Biaya</th>
                            <th>Saldo</th>
                        </tr>                      
                        <tbody>
                        @foreach ($laporanpk as $item)
                        <tr>
                            <td>{{ $loop->iteration}}</td>
                            <td>{{ $item->kode}}</td>
                            <td>{{ $item->tanggal_pencatatan}}</td>
                            <td>{{ $item->uraian}}</td>
                            <td>{{ $item->jumlah}}</td>
                            <td>{{ $item->saldo}}</td>
                           
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