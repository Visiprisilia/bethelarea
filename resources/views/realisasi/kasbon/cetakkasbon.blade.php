<style type="text/css" media="all">
    body {
        color: #000;
    }

    table,
    th,
    tr {
        text-align: center;
    }

    #wrapper {
        max-width: 650px;
        margin: 0 auto;
        padding-top: 20px;
    }

    .btn {
        margin-bottom: 5px;
    }

    .table {
        border-radius: 3px;
    }

    .table th {
        background: #f5f5f5;
    }

    .table th,
    .table td {
        vertical-align: middle !important;
    }

    h3 {
        margin: 5px 0;
    }

    @media print {
        .no-print {
            display: none;
        }

        #wrapper {
            max-width: 480px;
            width: 100%;
            min-width: 250px;
            margin: 0 auto;
        }
    }

    tfoot tr th:first-child {
        text-align: right;
    }
</style>



<section class='content'>
    <div class='row'>
        <div class='col-xs-12'>
            <div class='box box-primary'>
                <div class='box-header  with-border'>

                </div>
                <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                            @foreach($kasbon as $item)
                                            <form action="/updatekasbon/{{$item->no_bukti}}" method="post">
                                                @csrf
                                                <img align="bottom" src="{{asset('template/img/logo4.png') }}" style="max-width:100px;">
                                                <br style="text-align:center;"><strong>YAYASAN BETHEL AREA</strong>
                                                <br style="text-align:center;"><strong>Sekolah KB/TK "Satria Tunas Bangsa"</strong>
                                                <br> Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti,Kota Salatiga, Jawa Tengah <br>
                                                ------------------------------------------------------------------------------------------
                                                <p style="text-align:center;"><strong>BUKTI KAS BON</strong><br><br>

                                        </div>

                                    </div>
                                    <p>
                                        <b>No. Bukti &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;{{ $item->no_bukti}}&emsp;&emsp;&emsp;&emsp;&emsp;<b>Tanggal : </b> {{$item->tanggal_pengajuan}} <br><br>
                                        <b>Dibayar Kepada &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;{{$item->dibayarkepada}}
                                    <p>
                                        <b>Keterangan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;{{$item->keterangan_bon}}
                                        <p>
                                        <b>Jumlah  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;{{Str::rupiah($item->jumlah_bon)}}
                                    <p>
                                        <b>Terbilang &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>{{Terbilang::angka($item->jumlah_bon)}}Rupiah
                                    <p>
                                    <p>
                                    </p>
                                    <div style="text-align:center;">
                                        -----------------------------------------------------------------------------------------
                                    </div>
                                    <br>

                                    <div style="clear:both;"></div>
                                    <table>
                                        <thead>
                                            <tr>                                               
                                                <th>Disetujui Oleh <br>Kepala Sekolah</th>                                                                                          
                                                <th>Dikeluarkan Oleh <br> Bendahara Sekolah</th>                                          
                                                <th>Diterima Oleh</th>                                                                                          
                                                                                                                                    
                                            </tr>
                                        <tbody>
                                            <tr>
                                                <th></th>                                           
                                            </tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                            <tr></tr>
                                     
                                            <tr>
                                            <th style="width: 30%; ">{{$ttd->kepala_sekolah ?? '' }}</th>
                                                <th style="width: 50%; ">{{$ttd->bendahara_sekolah ?? '' }}</th>
                                                <th style="width: 40%; ">{{$item->dibayarkepada}}</th>

                                            </tr>

                                        </tbody>
                                        </thead>
                                        </tfoot>
                                    </table>
                                    @endforeach
                                    <br><br>
                                    <!-- <div class="well well-sm" style="margin-top:10px;">
                                        <div style="text-align: left;">Catatan :</div>
                                    </div> -->
                                </div>
                                <div style="clear:both;"></div>
                            </div>
                        </div>

                        <span class="pull-right col-xs-12">
                            <input class="no-print" type="button" value="Cetak" onclick="window.print()">
                            <input type="button" value="Kembali" onclick=self.history.back() class="no-print">

                            <div style="clear:both;"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
</section>
<script src="jquery-1.11.2.min.js"></script>
<script src="jquery.mask.min.js"></script>
<script src="terbilang.js"></script>
<script type="text/javascript">
    function inputTerbilang() {
        //membuat inputan otomatis jadi mata uang
        $('.mata-uang').mask('0.000.000.000', {
            reverse: true
        });

        //mengambil data uang yang akan dirubah jadi terbilang
        var input = document.getElementById("terbilang-input").value.replace(/\./g, "");

        //menampilkan hasil dari terbilang
        document.getElementById("terbilang-output").value = terbilang(input).replace(/  +/g, ' ');
    }
</script>