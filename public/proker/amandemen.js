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
            $("#anggaran").val(data.ubah.anggaran);
            $("#waktu_mulai").val(data.ubah.waktu_mulai);
            $("#waktu_selesai").val(data.ubah.waktu_selesai);
            $("#tujuan").val(data.ubah.tujuan);
            $("#indikator").val(data.ubah.indikator);          
            $("#keterangan_amandemen").val(data.ubah.keterangan);

            $.each(data.akun,function(x,i){
      
                $("#akunss").append('<input class="form-control" id="akunss" name="akunss" readonly name="akunss"  value="'+i.kode_akun+' - '+i.nama_akun+'" placeholder="Masukkan Akun Biaya" required />');
                $("#jumlah").append('<input class="form-control" id="jumlah" name="jumlah" readonly name="jumlah"  value="'+i.jumlah+'" placeholder="Masukkan Akun Biaya" required />');
                
                
            })
            
            $.each(data.ubah,function(x,i){
      
                $("#anggaran").append('<input class="form-control" id="anggaran" name="anggaran" readonly name="anggaran"  value="'+i.anggaran+'" placeholder="Masukkan Akun Biaya" required />');
                
                
            })

        }
    })
    // alert(kode);
})
// function anggarans() {
//     var anggaran=0;
//     $('.jumlah').each(function(){
//         anggaran += parseFloat($(this).val());
//         $('#anggaran_amandemen').val(anggaran);
//     })
    
// }
// $(document).on('click','#tambah',function(){
//     var $akun=$('#akun').clone();
//     $("#selectakun").append($akun);
//     anggarans();
//     // alert($akun);
// })
// $(document).on('change','.jumlah',function(){
//     if(isNaN(parseFloat($(this).val()))){
//         // alert('ok');
//         $(this).val(0);
//     }
    
//     anggarans();

   
//     //  alert(parseFloat($(this).val()));

// })
function anggarans(iJumlah, jml) {
    console.info("Jml : " + jml);
    var anggaran = 0;
    $('#jumlah' + iJumlah).each(function(){
        console.info("anggaran_amandemen : " + anggaran);
        anggaran += parseInt($(this).val().split('.').join(""));
        $('#anggaran_amandemen').val(anggaran);
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
    document.getElementById('anggaran_amandemen').value=sum_rupiah.substring(2).replaceAll(',','.').slice(0, -3);
}




