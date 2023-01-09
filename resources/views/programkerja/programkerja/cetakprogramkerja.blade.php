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
                                        <img align="bottom" src="{{asset('template/img/logo4.png') }}" style="max-width:100px;">
                                                <br style="text-align:center;"><strong>YAYASAN BETHEL AREA</strong>
                                                <br style="text-align:center;"><strong>Sekolah KB/TK "Satria Tunas Bangsa"</strong>
                                                <br> Alamat: Jl Hasanudin No.3B, Mangunsari, Kec.Sidomukti,Kota Salatiga, Jawa Tengah <br>
                                                ------------------------------------------------------------------------------------------

                                            <p style="text-align:center;"><strong>PROGRAM KERJA</strong><br>
                                            <p></p>
                                        </div>
                                    </div>
                                    <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="programkerja" name="programkerja">
                                        <option value>Pilih Periode</option>
                                        @foreach ($programkerja as $item)
                                        <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
                                        @endforeach
                                    </select>
                                    <div class="table-responsive" id="tablecetakproker">
                                        <table>
                                            <thead>
                                                <br>
                                                

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
                <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                <script>
                    $(document).on('change', '#programkerja', function() {
                        var id = $(this).val();
                        $.ajax({
                            url: "/viewcetakprogramkerja",
                            data: {
                                id: id
                            },
                            method: "get",
                            success: function(data) {
                                $('#tablecetakproker').html(data);
                            }
                        })
                    })
                </script>