$(document).on("change","#progja",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihprokerkm",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#akun").val(data.progja.kode_akun);
        
        }
    })
    // alert(kode);
})