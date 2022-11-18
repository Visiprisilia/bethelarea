function anggarans() {
    var anggaran=0;
    $('.jumlah').each(function(){
        anggaran += parseFloat($(this).val());
        $('#anggaran').val(anggaran);
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

