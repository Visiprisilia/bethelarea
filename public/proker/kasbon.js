$(document).on("change","#akun_bon",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihprokerbonakuns",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            // $("#anggaran_bon").val(data.proker.jumlah);
            $("#akun_bon").val(data.proker.kode_akun);
      
            $.each(data.lappa,function(x,i){
      
                $("#anggaran_bon").val(i.posisi_anggaran);                
            })
            $.each(data.prokers, function (x, i) {

                $("#penanggungjawabs").val(i.nama);
                $("#penanggungjawab_bon").val(i.niy);

            })
        }
    })
    // alert(kode);
})

$(document).on("change", "#proker_bon", function () {
    var id = $(this).val();
    $.ajax({
        url: '/pilihprokerz',
        method: "get",
        data: {
            id: id
        },
        success: function (data) {
            // $("#akun").val(data.proker.kode_akun);
            // $("#id").val(data.proker.id);
            // $("#anggarans").val(data.data.anggaran);

            $.each(data.data, function (x, i) {

                $("#anggarans").val(i.jumlah);

            })
          
        }
    })


})

$(document).on("change", "#no_bukti", function () {
    var no = $(this).val();
    $.ajax({
        url: "/pilihptj",
        method: "get",
        data: {
            no: no
        },
        success: function (data) {
            $("#periode").val(data.bon.periode);
            $("#keterangan_bon").val(data.bon.keterangan_bon);
            $("#proker_bon").val(data.coba2.proker_bon);
            $("#akun_bon").val(data.coba3.akun_bon);             
            $("#jumlah_bon").val(data.bon.jumlah_bon);             
            $("#penanggungjawab_bon").val(data.bon.penanggungjawab_bon);

                     
            $.each(data.coba2, function (x, i) {

                $("#proker_bon").append('<input class="form-control" id="proker_bon" name="proker_bon" readonly name="proker_bon" value="' + i.nama_proker + '" placeholder="Masukkan Akun Biaya" required />');

            })    
            $.each(data.coba3, function (x, i) {

                $("#akun_bon").append('<input class="form-control" id="akun_bon" name="akun_bon" readonly name="akun_bon" value="' + i.nama_akun + '" readonly placeholder="Masukkan Akun Biaya" required />');

            })  
            // $.each(data.coba4, function (x, i) {

            //     $("#penanggungjawab").append('<input class="form-control" id="penanggungjawab" name="penanggungjawab" readonly name="penanggungjawab" value="' + i.niy + '" placeholder="Masukkan Akun Biaya" required />');
            //     $("#penanggungjawabs").append('<input class="form-control" id="penanggungjawabs" name="penanggungjawabs" readonly name="penanggungjawabs" value="' + i.nama + '" placeholder="Masukkan Akun Biaya" required />');

            // })  
            
        }

    })
    // alert(kode);
})
