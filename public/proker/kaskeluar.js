$(document).on("change","#prokers",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihproker",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#anggaran").val(data.proker.jumlah);
            $("#akun").val(data.proker.kode_akun);
        
        }
    })
    // alert(kode);
})
$(document).on("change","#bons",function(){
    var no = $(this).val();
    $.ajax({
        url:"/pilihbon",
        method:"get",
        data:{
            no:no
        },
        success:function(data){
            $("#periode").val(data.bon.periode_bon);
            $("#keterangan").val(data.bon.keterangan_bon);
            $("#prokers").val(data.bon.proker_bon);
            $("#akun").val(data.bon.akun_bon);
            $("#anggaran").val(data.bon.anggaran_bon);
            $("#jumlah").val(data.bon.jumlah_bon);
            $("#kasir").val(data.bon.penanggungjawab_bon);
        
        }

    })
    // alert(kode);
})
