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
            <p style="text-align:center;"><strong>DATA MURID TAHUN AKADEMIK {{$periode->nama_periode}}</strong><br>
        </center>
        &nbsp;   Kelas : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="kelas" name="kelas">
            <option value>Pilih Kelas</option>
            @foreach ($kelas as $item)
            <option value="{{ $item->nama_kelas}}">{{$item->nama_kelas}}</option>
            @endforeach
        </select><br><br>
        <div class="table-responsive" id="tablemurid">
            <table>
                <thead>
                


                </thead>
                </tbody>
            </table>
				<!-- <input class="no-print" type="button" value="Cetak" onclick="window.print()"> -->
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">



            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script>
                $(document).on('change', '#kelas', function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "/viewcetakmurid",
                        data: {
                            id: id
                        },
                        method: "get",
                        success: function(data) {
                            $('#tablemurid').html(data);
                        }
                    })
                })
            </script>