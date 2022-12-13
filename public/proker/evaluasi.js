$(document).on("change","#kode_proker",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihprogramkerja",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#periode").val(data.programkerja.periode);
            $("#nama_proker").val(data.programkerja.nama_proker);
            $("#penanggungjawab").val(data.programkerja.penanggungjawab);
            $("#tujuan").val(data.programkerja.tujuan);
            $("#rencana_anggaran").val(data.programkerja.anggaran);
            $("#rencana_waktu").val(data.programkerja.waktu_selesai);
            $("#indikator_pencapaian").val(data.programkerja.indikator);
            
            $.each(data.akun,function(x,i){
      
                $("#akunbeban").append('<input class="form-control" id="akun_beban" name="akun_beban" readonly name="akun_beban"  value="'+i.nama_akun+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
            $.each(data.kaskeluar,function(x,i){
      
                $("#realisasianggaran").append('<input class="form-control" id="realisasi_anggaran" name="realisasi_anggaran" readonly name="realisasi_anggaran"  value="'+i.jumlah+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
        }
    })
    // alert(kode);
})
