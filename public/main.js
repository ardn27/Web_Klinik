function konfirmasiSubmit(){
    var konfirmasi = confirm("Apakah anda yakin ingin mengirim data ini?");
    if (konfirmasi){
        document.getElementById("formDaftar").submit();
        showKonfirmasi();
    }else{
        return false;
    }
}

function showKonfirmasi(){
    var pesanKonfirmasi = document.createElement("p");
    pesanKonfirmasi.textContent ="Data telah berhasil dikirim";
    document.body.appendChild(pesanKonfirmasi);
}