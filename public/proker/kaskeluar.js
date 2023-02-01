$(document).on("change","#prokers",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihproker",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#akun").val(data.proker.kode_akun);
            $("#anggaran").val(data.proker.jumlah);
            $("#penanggungjawab").val(data.proker.penanggungjawab);
           
            // $.each(data.proker,function(x,i){
      
            //     $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran"  value="'+i.kode_akun+'" placeholder="Masukkan Akun Biaya" required />');
                
            // })
        }
    })
    // alert(kode);
})
$(document).on("change","#no_buktibon",function(){
    var no = $(this).val();
    $.ajax({
        url:"/pilihbon",
        method:"get",
        data:{
            no:no 
        },
        success:function(data){
            $("#periode").val(data.bon.periode);
            $("#keterangan").val(data.bon.keterangan_bon);
            $("#prokers").val(data.bon.proker_bon);
            $("#akun").val(data.bon.akun_bon);
            $("#anggaran").val(data.bon.anggaran_bon);
            $("#jumlah").val(data.bon.jumlah_bon);
            $("#penanggungjawab").val(data.bon.penanggungjawab_bon);
        
        }

    })
    // alert(kode);
})
