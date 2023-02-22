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
            <p style="text-align:center;"><strong>AMANDEMEN PROGRAM KERJA</strong><br>
        </center>
        Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="amandemen" name="amandemen">
            <option value>Pilih Periode</option>
            @foreach ($amandemen as $item)
            <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
            @endforeach
        </select>


        <div class="table-responsive" id="tablecetakamandemen">
            <table>
                <thead>
                    <br>


                </thead>
                </tbody>
            </table>
            <!-- <input class="no-print" type="button" value="Cetak" onclick="window.print()"> -->
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script>
                $(document).on('change', '#amandemen', function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "/viewcetakamandemen",
                        data: {
                            id: id
                        },
                        method: "get",
                        success: function(data) {
                            $('#tablecetakamandemen').html(data);
                        }
                    })
                })
            </script>