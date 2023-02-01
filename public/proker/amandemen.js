$(document).on("change","#kode_prokeramandemen",function(){
    var kode = $(this).val();
    $.ajax({
        url:"/pilihamandemen",
        method:"get",
        data:{
            kode:kode
        },
        success:function(data){
            $("#periode_amandemen").val(data.ubah.periode);
            $("#nama_proker").val(data.ubah.nama_proker);
            $("#penanggungjawab").val(data.ubah.penanggungjawab);
            $("#waktu_mulai").val(data.ubah.waktu_mulai);
            $("#waktu_selesai").val(data.ubah.waktu_selesai);
            $("#tujuan").val(data.ubah.tujuan);
            $("#indikator").val(data.ubah.indikator);          
            $("#keterangan_amandemen").val(data.ubah.keterangan);

            $.each(data.akun,function(x,i){
      
                $("#akun").append('<input class="form-control" id="akun" name="akun" readonly name="akun"  value="'+i.nama_akun+'" placeholder="Masukkan Akun Biaya" required />');
                $("#jumlah").append('<input class="form-control" id="jumlah" name="jumlah" readonly name="jumlah"  value="'+i.jumlah+'" placeholder="Masukkan Akun Biaya" required />');
                $("#anggaran_amandemen").append('<input class="form-control" id="anggaran_amandemen" name="anggaran_amandemen" name="anggaran_amandemen"  required />');
                
                
            })
        }
    })
    // alert(kode);
})
function anggarans() {
    var anggaran=0;
    $('.jumlah').each(function(){
        anggaran += parseFloat($(this).val());
        $('#anggaran_amandemen').val(anggaran);
    })
    
}
$(document).on('click','#tambah',function(){
    var $akun=$('#akun').clone();
    $("#selectakun").append($akun);
    anggarans();
    // alert($akun);
})
$(document).on('change','.jumlah',function(){
    if(isNaN(parseFloat($(this).val()))){
        // alert('ok');
        $(this).val(0);
    }
    
    anggarans();

   
    //  alert(parseFloat($(this).val()));

})


