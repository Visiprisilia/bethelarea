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
