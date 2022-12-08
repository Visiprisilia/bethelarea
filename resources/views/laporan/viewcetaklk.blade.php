<table class="table align-items-center table-flush">
    <thead class="thead-light">
        <br>
        Jumlah Kas Masuk : Rp.{{$tambah}} <br>
        Jumlah Kas Keluar : Rp.{{$kurang}}<br>
        --------------------------------------<br>
        Total Kas : Rp. {{$totalkas}}<br>

    </thead>
    </tbody>
</table><br><br><br><br><br>

<input class="no-print" type="button" value="Cetak" onclick="window.print()">
<input type="button" value="Kembali" onclick=self.history.back() class="no-print">