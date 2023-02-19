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
            <p style="text-align:center;"><strong>PEMBAYARAN MURID</strong><br>
        </center>
        <!-- Periode : <select class="d-none d-sm-inline-block btn btn-sm btn-danger shadow-sm" id="pembayaran" name="pembayaran">
            <option value>Pilih Periode</option>
            @foreach ($pembayaran as $item)
            <option value="{{ $item->kode_periode}}">{{$item->nama_periode}}</option>
            @endforeach
        </select> -->
        <br><br>
        <b> &nbsp;&nbsp; Nomor Induk : {{$pembayarans->rincian_nis}} <br>
            &nbsp;&nbsp; Nama Murid : {{$pembayarans->nama}}
            <br><br>
        <div class="table-responsive" id="tablecetakpembayarans">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <!-- <th>Nomor Induk</th>
                        <th>Nama Murid</th> -->
                        <th>Detail</th>
                    </tr>
                <tbody>
                    @foreach ($pembayaran as $item)
                    <tr>
                        <td>{{ $loop->iteration}}</td>
                        <td>{{ $item->rincian_periode}}</td>
                        <!-- <td>{{ $item->rincian_nis}}</td>
                        <td>{{ $item->nama}}</td> -->
                        <!-- <td>{{ Str::rupiah ($item->rincian_nominal)}}</td>
                            <td>{{ Str::rupiah ($item->pembayaran)}}</td>
                            <td>{{ Str::rupiah ($item->sisapembayaran)}}</td> -->


                        <td>
                            <a href="/cetaklihatpembayaranmurids/{{$item->rincian_id}}" class="d-none d-sm-inline-block btn btn-sm btn-info shadow-sm">Lihat Detail</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </thead>
            </table>
            <br><br><br><br><br><br><br><br><br>
            <input type="button" value="Kembali" onclick=self.history.back() class="no-print">
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <script>
        $(document).on('change', '#pembayaran', function() {
            var id = $(this).val();
            $.ajax({
                url: "/viewcetakpembayaranmurids",
                data: {
                    id: id
                },
                method: "get",
                success: function(data) {
                    $('#tablecetakpembayarans').html(data);
                }
            })
        })
    </script>