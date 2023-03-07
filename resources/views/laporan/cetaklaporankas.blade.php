<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<style type="text/css" media="all">
    @media print {
        .no-print {
            display: none;
        }
    }
</style>
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
            <p style="text-align:center;"><strong>LAPORAN KAS</strong><br>
        </center>
        Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="laporankas" require name="laporankas">
            <option value>Pilih Periode</option>
            @foreach ($laporankas as $item)
            <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
            @endforeach
        </select><br><br>
        <!-- <table class='table table-bordered' id="tablecetaklk"> -->
        <div class="table-responsive" id="tablecetaklk">
            <table>
                <tbody>
                </tbody>
            </table>
            <input type="button" value="Kembali" onclick=self.history.back() class="no-print">

            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script>
                $(document).on('change', '#laporankas', function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "/viewcetaklk",
                        data: {
                            id: id
                        },
                        method: "get",
                        success: function(data) {
                            $('#tablecetaklk').html(data);
                        }
                    })
                })
            </script>