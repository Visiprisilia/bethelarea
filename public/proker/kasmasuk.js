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

$(document).on("change", "#akun", function () {
    var kode = $(this).val();
    $.ajax({
        url: '/pilihakunss',
        method: "get",
        data: {
            kode: kode
        },
        success: function (data) {
            $("#tagihan").val(data.rincian.sisapembayaran);

            // $.each(data.rincian, function (x, i) {

            //     $("#tagihan").append('<input class="form-control" id="tagihan" name="tagihan" readonly name="tagihan" value="' + i.rincian_nominal_tagihan + '" placeholder="Masukkan Akun Biaya" required />');

            // })
        }
    })
//     // alert(kode);
})