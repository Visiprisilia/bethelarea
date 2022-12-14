$(document).on("change","#proker_bon",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihprokerbon",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#anggaran_bon").val(data.proker.jumlah);
            $("#akun_bon").val(data.proker.kode_akun);
      
        
        }
    })
    // alert(kode);
})
