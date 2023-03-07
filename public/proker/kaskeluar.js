
  $(document).on("change", "#akun", function () {
    var kode = $(this).val();
    $.ajax({
        url: '/pilihakuns',
        method: "get",
        data: {
            kode: kode
        },
        success: function (data) {
            // $("#akun").val(data.proker.kode_akun);
            // $("#id").val(data.proker.id);
            $("#penanggungjawab").val(data.proker.penanggungjawab);

            $.each(data.lappa, function (x, i) {

                $("#anggaran").val(i.posisi_anggaran);

            })
            $.each(data.prokerz, function (x, i) {

                $("#penanggungjawabs").val(i.nama);
                $("#penanggungjawab").val(i.niy);

            })
          
        }
    })


    
//     // alert(kode);
})


$(document).on("change", "#prokers", function () {
    var id = $(this).val();
    $.ajax({
        url: '/pilihprokers',
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

//TIDAK DIPAKAI
// $(document).on("change", "#prokers", function () {
//     var kode = $(this).val();
//     $.ajax({
//         url: "/pilihproker",
//         method: "get",
//         data: {
//             kode: kode
//         },
//         success: function (data) {
//             $("#akun").val(data.proker.kode_akun);

//             // $.each(data.proker, function (x, i) {

//             //     $("#akun").append('<input class="form-control" id="akun" name="akun" readonly name="akun" value="' + i.kode_akun + '" placeholder="Masukkan Akun Biaya" required />');

//             // })
//             // $.each(data.lappa, function (x, i) 
            
//             // {

//             //     $("#daftarakun").append('<select class="form-control" id="daftarakun" name="daftarakun" readonly name="daftarakun" value="' + i.kode_akun + '" placeholder="Masukkan Akun Biaya" required />');

//             // })
     
//         }
//     })
//     // alert(kode);
// })
// $(document).on("change", "#prokers", function () {
//     var kode = $(this).val();
//     $.ajax({
//         url: "/pilihproker",
//         method: "get",
//         data: {
//             kode: kode
//         },
//         success: function (data) {
//             // $("#akun").val(data.proker.kode_akun);
//             $("#id").val(data.proker.id);
//             $("#penanggungjawab").val(data.proker.penanggungjawab);

//             $.each(data.lappa, function (x, i) {

//                 $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran" value="' + i.posisi_anggaran + '" placeholder="Masukkan Akun Biaya" required />');

//             })
//             $.each(data.lappa, function (x, i) {

//                 $("#akun").append('<input class="form-control" id="akun" name="akun" readonly name="akun" value="' + i.kode_akun + '" placeholder="Masukkan Akun Biaya" required />');

//             })
//             $.each(data.lappa, function (x, i) {

//                 $("#namaakun").append('<input class="form-control" id="namaakun" name="namaakun" readonly name="namaakun" value="' + i.nama_akun + '" placeholder="Masukkan Akun Biaya" required />');

//             })
//             // $.each(data.lappa,function(x,i){

//             //     $("#id").append('<input class="form-control" id="id" name="id" readonly name="id" value="'+i.id+'" placeholder="Masukkan Akun Biaya" required />');

//             // })
//         }
//     })
//     // alert(kode);
// })

$(document).on("change", "#no_bukti", function () {
    var no = $(this).val();
    $.ajax({
        url: "/pilihbon",
        method: "get",
        data: {
            no: no
        },
        success: function (data) {
            $("#periode").val(data.bon.periode);
            $("#keterangan").val(data.bon.keterangan_bon);
            // $("#prokers").val(data.coba2.proker_bon);
            // $("#akun").val(data.coba3.akun_bon);             
            // $("#anggaran").val(data.bon.jumlah_bon);             
            $("#penanggungjawabs").val(data.bon.penanggungjawab_bon);

            $.each(data.coba, function (x, i) {

                $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran" value="' + i.jumlah_bon+ '" placeholder="Masukkan Akun Biaya" required />');

            })                
            $.each(data.coba2, function (x, i) {

                $("#prok").append('<input class="form-control" id="prokers" name="prokers" hidden readonly name="prokers" value="' + i.kode_proker + '" placeholder="Masukkan Akun Biaya" required />');
                $("#prok").append('<input class="form-control" id="proks" name="proks" readonly name="proks" value="' + i.nama_proker + '" placeholder="Masukkan Akun Biaya" required />');

            })    
            $.each(data.coba3, function (x, i) {

                $("#akbon").append('<input class="form-control" id="akun" name="akun" hidden readonly name="akun" value="' + i.kode_akun + '" readonly placeholder="Masukkan Akun Biaya" required />');
                $("#akbon").append('<input class="form-control" id="akbons" name="akbons" readonly name="akbons" value="' + i.nama_akun + '" readonly placeholder="Masukkan Akun Biaya" required />');

            })  
            $.each(data.coba4, function (x, i) {

                $("#penanggungjawab").append('<input class="form-control" id="penanggungjawab" name="penanggungjawab" readonly name="penanggungjawab" value="' + i.niy + '" placeholder="Masukkan Akun Biaya" required />');
                $("#penanggungjawabs").append('<input class="form-control" id="penanggungjawabs" name="penanggungjawabs" readonly name="penanggungjawabs" value="' + i.nama + '" placeholder="Masukkan Akun Biaya" required />');

            })  
            
        }

    })
    // alert(kode);
})
