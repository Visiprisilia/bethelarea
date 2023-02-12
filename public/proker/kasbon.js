// $(document).on("change","#proker_bon",function(){
//     var kode = $(this).val();
//     $.ajax({
//         url:"/pilihprokerbon",
//         method:"get",
//         data:{
//             kode:kode
//         },
//         success:function(data){
//             // $("#anggaran_bon").val(data.proker.jumlah);
//             $("#akun_bon").val(data.proker.kode_akun);
      
//             $.each(data.lappa,function(x,i){
      
//                 $("#anggaran_bon").append('<input class="form-control" id="anggaran_bon" name="anggaran_bon" readonly name="anggaran_bon" value="'+i.posisi_anggaran+'" placeholder="Masukkan Akun Biaya" required />');
                
//             })
//         }
//     })
//     // alert(kode);
// })
$(document).on("change","#akun_bon",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihprokerbonakun",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            // $("#anggaran_bon").val(data.proker.jumlah);
            $("#akun_bon").val(data.proker.kode_akun);
      
            $.each(data.lappa,function(x,i){
      
                $("#anggaran_bon").append('<input class="form-control" id="anggaran_bon" name="anggaran_bon" readonly name="anggaran_bon" value="'+i.posisi_anggaran+'" placeholder="Masukkan Akun Biaya" required />');
                
            })
        }
    })
    // alert(kode);
})
