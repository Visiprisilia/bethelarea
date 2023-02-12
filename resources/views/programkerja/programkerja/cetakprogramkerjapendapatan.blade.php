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
            <p style="text-align:center;"><strong>PROGRAM KERJA ANGGARAN PENDAPATAN</strong><br>
        </center>
        Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="programkerja" name="programkerja">
            <option value>Pilih Periode</option>
            @foreach ($programkerja as $item)
            <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
            @endforeach
        </select>


        <div class="table-responsive" id="tablecetakprokerpendapatan">
            <table>
                <thead>
                    <br>


                </thead>
                </tbody>
            </table>
            <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
            <script>
                $(document).on('change', '#programkerja', function() {
                    var id = $(this).val();
                    $.ajax({
                        url: "/viewcetakprogramkerjapendapatan",
                        data: {
                            id: id
                        },
                        method: "get",
                        success: function(data) {
                            $('#tablecetakprokerpendapatan').html(data);
                        }
                    })
                })
            </script>