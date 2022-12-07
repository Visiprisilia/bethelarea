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
            <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="laporankas" require name="laporankas">
                <option value>Pilih Periode</option>
                @foreach ($laporankas as $item)
                <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                @endforeach
            </select>
        </div> 
        <div class="container-xl px-4 mt-n10">
            <div class="row">
                <div class="col-lg-9">
                    <!-- Default Bootstrap Form Controls-->
                    <div id="default">
                            <div class="card-body">
                                <!-- Component Preview-->
                                <div class="sbp-preview">
                                    <div class="sbp-preview-content" id="tablelk">
                               
                                    <p style="text-align:center;"><strong>LAPORAN KAS</strong><br></p>
                                           Jumlah Kas Masuk : <br>
                                           Jumlah Kas Keluar : <br>
                                           -------------------------------<br>
                                           Total Kas : <br>                               
                                      
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
        </div>
    </div>

</div>
<script>
    $(document).on('change', '#laporankas', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewlk",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablelk').html(data);
            }
        })
    })
</script>
@endsection