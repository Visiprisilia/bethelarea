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

<style>
h2,h1,h3{ padding:0;margin:0;}
h1 {font-size:22px;font-weight:bold}
h2 {font-size:22px;font-weight:normal}
#wrapper {width:750px;
margin:0 auto;font-size:15px; align-items: center;}
#ol {margin:0}
#header {clear:both;text-align:center;}
#garis1{border-top:solid 1px #fff;border-right:1px solid #fff}
#garis2 {border-bottom:1px solid #000}
#g4{border-right:1px solid #000}
#table {font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 10pt;border-width: 1px;
border-style: solid;border-color: #fff;
border-collapse: collapse; margin: 10px 0px; }
#table td{padding: 0.5em;}
th{ text-align: center;
padding: 0.5em;border-width: 1px;
border-style: solid;border-color: #000;
border-collapse: collapse;}
td{padding: 0.5em;
vertical-align: top;
border-width: 1px;
border-style: solid;
border-color: #000;
border-collapse: collapse;
} @media print {
        .no-print {
            display: none;
        }}
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
                                        <img align="bottom" src="{{asset('template/img/logo2.png') }}" style="max-width:100px;">
                                            <h3>Yayasan Bethel Area</h3>
                                            <h3>Sekolah KB/TK "Satria Tunas Bangsa"</h3>
                                            <div class="h6 text-white mb-0">Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti,Kota Salatiga, Jawa Tengah </div>
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
                    </script>