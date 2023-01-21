<!DOCTYPE html>
<html>

<head>
 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
<div id="print-area">
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 11pt;
        }
    </style>
    <center>
        <img align="bottom" src="{{asset('template/img/logo4.png') }}" style="max-width:100px;">
        <h6>Yayasan Bethel Area</h6>
        <h6>Sekolah KB/TK "Satria Tunas Bangsa"</h6>
        <h6>Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti, Kota Salatiga, Jawa Tengah </h6> <br>
        <p style="text-align:center;"><strong>LAPORAN POSISI ANGGARAN</strong><br>
    </center>
    Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="lappa" require name="lappa">
        <option value>Pilih Periode</option>
        @foreach ($lappa as $item)
        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
        @endforeach
    </select><br><br>
    <table class='table table-bordered' id="tablecetaklpa">
        <thead>
        <tr>
            <th>No</th>
            <th>Kode Akun</th>
            <th>Nama Akun</th>
            <th>Anggaran</th>
            <th>Posisi Anggaran</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
</body>
</html>

<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script>
    $(document).on('change', '#lappa', function() {
        var id = $(this).val();
        $.ajax({
            url: "/viewcetaklpa",
            data: {
                id: id
            },
            method: "get",
            success: function(data) {
                $('#tablecetaklpa').html(data);
            }
        })
    })
</script>


















<!-- <style type="text/css" media="all">
    body {
        color: #000;
    }

    #wrapper {
        max-width: 780px;
        margin: 0 auto;
        padding-top: 20px;
    }

    .btn {
        margin-bottom: 5px;
    }


    .table th {
        background: #f5f5f5;
    }

    

    h3 {
        margin: 5px 0;
    }

    @media print {
        .no-print {
            display: none;
        }

      
    }

    tfoot tr th:first-child {
        text-align: right;
    }
</style> -->
<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>
<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>

                <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                        <img align="bottom" src="{{asset('template/img/logo4.png') }}" style="max-width:100px;">
                                            <h3>Yayasan Bethel Area</h3>
                                            <h3>Sekolah KB/TK "Satria Tunas Bangsa"</h3>
                                            <div class="h6 text-white mb-0">Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti, Kota Salatiga, Jawa Tengah </div>
                                            <div class="h6 text-white mb-0">----------------------------------------------------------------------------------------------------------</div>

                                            <p style="text-align:center;"><strong>LAPORAN POSISI ANGGARAN</strong><br>
                                            <p></p>
                                        </div></div>
                                        Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="lappa" require name="lappa">
                                            <option value>Pilih Periode</option>
                                            @foreach ($lappa as $item)
                                            <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                            @endforeach
                                        </select><br><br>
                                  
                                    <div class="card-body">
                                    <div class="table-responsive" id="tablecetaklpa" id="wrapper">                                       
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Akun</th>
                                                    <th>Nama Akun</th>
                                                    <th>Anggaran</th>
                                                    <th>Posisi Anggaran</th>
                                                </tr>
                                            <tbody>
                                            </tbody>
                                            </thead>
                                        </table><br><br><br>
                                        
                                        <input class="no-print" type="button" value="Cetak" onclick="window.print()">
                                        <input type="button" value="Kembali" onclick=self.history.back() class="no-print">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                    <script>
                        $(document).on('change', '#lappa', function() {
                            var id = $(this).val();
                            $.ajax({
                                url: "/viewcetaklpa",
                                data: {
                                    id: id
                                },
                                method: "get",
                                success: function(data) {
                                    $('#tablecetaklpa').html(data);
                                }
                            })
                        })
                    </script> -->
