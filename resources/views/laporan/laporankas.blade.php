@extends('template')
@section('container')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Kas</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        <!-- <form method='post' class="no-print" href="{{url('/laporankas')}}">Bulan <input type="number" class="no-print" name="bulan" id="bulan" min="1" max="12"> Tahun <input type="number" name="tahun" id="tahun" min="2021" max="2030"> <input type="submit" name="filterperiod" id="filterperiod" class="no-print" value="Tampilkan"> </form> <p></p> -->
            <a href="cetaklaporankas" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-print fa-sm text-white-50"></i>Cetak</a>
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="periode" name="periode">
                <option value>Pilih Periode</option>
      
            </select>
        </div> 
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Default Bootstrap Form Controls-->
                    <div id="default">
                        <!-- <div class="card mb-4">
                            <div class="card-header">Kebijakan Yayasan</div> -->
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content">
                                    <!-- <h1 class="h4 mb-2 text-gray-800">Buku Besar Anggaran Biaya</h1> -->

                                    <p style="text-align:center;"><strong>LAPORAN KAS</strong><br></p>
                                           Jumlah Kas Masuk : Rp.  {{$tambah}}<br>
                                           Jumlah Kas Keluar : Rp. {{$kurang}}<br>
                                           -------------------------------<br>
                                           Total Kas : Rp. {{$totalkas}}<br>                               
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid
@include('sweetalert::alert') -->
@endsection