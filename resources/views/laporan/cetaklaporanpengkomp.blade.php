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
            min-width: 600px;
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

                <div id="print-area">
                    <div class="box-body">
                        <div id="wrapper">
                            <div id="receiptData" style="width: auto; max-width: 580px; min-width: 250px; margin: 0 auto;">
                                <div id="receipt-data">
                                    <div>
                                        <div style="text-align:center;">
                                            <h3>Yayasan Bethel Area</h3>
                                            <h3>Sekolah KB/TK "Satria Tunas Bangsa"</h3>
                                            <div class="h6 text-white mb-0">Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti,Kota Salatiga, Jawa Tengah </div>
                                            <div class="h6 text-white mb-0">----------------------------------------------------------------------------------------------------------</div>

                                            <p style="text-align:center;"><strong>LAPORAN PENGHASILAN KOMPREHENSIF</strong><br>
                                            <p></p>
                                        </div>
                                        <form method='post' class="no-print" href="{{url('/laporankas')}}">Bulan <input type="number" class="no-print" name="bulan" id="bulan" min="1" max="12"> Tahun <input type="number" name="tahun" id="tahun" min="2021" max="2030"> <input type="submit" name="filterperiod" id="filterperiod" class="no-print" value="Tampilkan"> </form>
                                    </div>
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                            <tr>
                                                <th class="text-center" style="width: 20%; border-bottom: 2px solid #ddd;">No</th>
                                                <th class="text-center" style="width: 20%; border-bottom: 2px solid #ddd;">Kode</th>
                                                <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Tanggal Pencatatan</th>
                                                <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Pendapatan</th>
                                                <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Biaya</th>
                                                <th class="text-center" style="width: 50%; border-bottom: 2px solid #ddd;">Saldo</th>
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
                                        </tbody>
                                    </table><br><br><br><br><br>
                                    <input class="no-print" type="button" value="Cetak" onclick="window.print()">
                                    <input type="button" value="Kembali" onclick=self.history.back() class="no-print">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>