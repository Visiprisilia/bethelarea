$(document).on("change","#kodeproker",function(){
    var no = $(this).val();
    $.ajax({
        url:"/pilihprokerss",
        method:"get",
        data:{
            no:no 
        },
        success:function(data){
            $("#periode").val(data.amandemen.periode);
            $("#nama_proker").val(data.amandemen.nama_proker);
            $("#penanggungjawab").val(data.amandemen.penanggungjawab);
            $("#waktu_mulai").val(data.amandemen.waktu_mulai);
            $("#waktu_selesai").val(data.amandemen.waktu_selesai);
            $("#tujuan").val(data.amandemen.tujuan);
            $("#indikator").val(data.amandemen.indikator);
            $("#anggaran").val(data.amandemen.anggaran);
            $("#keterangan_proker").val(data.amandemen.keterangan_proker);
        
        }

    })
    // alert(kode);
})
