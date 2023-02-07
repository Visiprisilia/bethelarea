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
            $("#id").val(data.proker.id);
            $("#penanggungjawab").val(data.proker.penanggungjawab);
           
            $.each(data.lappa,function(x,i){
      
                $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran" value="'+i.posisi_anggaran+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
            $.each(data.lappa,function(x,i){
      
                $("#akun").append('<input class="form-control" id="akun" name="akun" readonly name="akun" value="'+i.kode_akun+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
            $.each(data.lappa,function(x,i){
      
                $("#id").append('<input class="form-control" id="id" name="id" readonly name="id" value="'+i.id+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
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
        
            $.each(data.bon,function(x,i){
      
                $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran" value="'+i.anggaran_bon+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
        }

    })
    // alert(kode);
})
