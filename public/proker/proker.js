function anggarans(iJumlah, jml) {
    console.info("Jml : " + jml);
    var anggaran = 0;
    $('#jumlah' + iJumlah).each(function(){
        console.info("anggaran : " + anggaran);
        anggaran += parseInt($(this).val().split('.').join(""));
        $('#anggaran').val(anggaran);
    })
}

let iJumlah = 0;



function test_rp(jumlah){
    console.log((document.getElementById('jumlah'+jumlah).value.replaceAll('.','')));
    var jumlah_input = (parseInt(document.getElementById('jumlah'+jumlah).value.replaceAll('.',''))).toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
    document.getElementById('jumlah'+jumlah).value=jumlah_input.substring(2).replaceAll(',','.').slice(0, -3);
    tambah_anggaran();
}

function tambah_anggaran(){
    let jumlahs = document.getElementsByName('jumlah[]');
    let sum = 0;
    for (let index = 0; index < jumlahs.length; index++) {
        sum+=parseInt(jumlahs[index].value.replaceAll('.',''));
    }
    var sum_rupiah = sum.toLocaleString('id-ID', {
        style: 'currency',
        currency: 'IDR',
    });
    document.getElementById('anggaran').value=sum_rupiah.substring(2).replaceAll(',','.').slice(0, -3);
}



// function anggaransss() {
//     var anggaran=0;
//     $('.jumlah').each(function(){
//         anggaranss += parseFloat($(this).val());
//         $('#anggaranss').val(anggaranss);
//     })   
// }
// $(document).on('click','#tambah',function(){
//     var $akun=$('#akun').clone();
//     $("#selectakun").append($akun);
//     anggaransss();
//     // alert($akun);
// })
// $(document).on('change','.jumlah',function(){
//     if(isNaN(parseFloat($(this).val()))){
//         // alert('ok');
//         $(this).val(0);
//     }
    
//     // anggaransss();

   
//     //  alert(parseFloat($(this).val()));

// })
