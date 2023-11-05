<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title>Welcome</title>
</head>
    <div class="container">
        <img class="bg-klinik" src="assets/3568984.jpg" alt="">
        <h1 class="desc">UNTAG<span style="font-size: 50px;"> MEDICAL <br> CENTER</span></h1>
        <p class="location">
            <i class="fa-sharp fa-solid fa-location-dot"></i> Jalan Semolowaru 45, Surabaya 60118, East Java, Indonesia
            <br><i class="fa-solid fa-envelope"></i> klinikuntag.sby.ac.id
        </p>
        <a class="button" href="/form-regis">Daftar</a>
    </div>
    <div class="box">
        <div class="layanan">
            <img class="logo-layanan" src="assets/dokter.png" alt="">
            <div class="box-desk">
                <h4 class="nama-layanan">Poli Umum</h4>
                <p class="desk-layanan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt
                    magni perferendis, sunt nulla iusto iure modi, asperiores laudantium laboriosam non, dolorum
                    suscipit. Facere provident et laborum! Illum, sapiente sint?</p>
            </div>
        </div>
        <div class="layanan">
            <img class="logo-layanan" src="assets/dokter.png" alt="">
            <div class="box-desk">
                <h4 class="nama-layanan">Poli Kandungan</h4>
                <p class="desk-layanan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt
                    magni perferendis, sunt nulla iusto iure modi, asperiores laudantium laboriosam non, dolorum
                    suscipit. Facere provident et laborum! Illum, sapiente sint?</p>
            </div>
        </div>
        <div class="layanan">
            <img class="logo-layanan" src="assets/dokter.png" alt="">
            <div class="box-desk">
                <h4 class="nama-layanan">KIA</h4>
                <p class="desk-layanan">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus incidunt
                    magni perferendis, sunt nulla iusto iure modi, asperiores laudantium laboriosam non, dolorum
                    suscipit. Facere provident et laborum! Illum, sapiente sint?</p>
            </div>
        </div>
    </div>
    <h1 class="desc-dokter">Dokter Kami</h1>
    <div class="card-list">
        @foreach ($data as $dokter)
        <div class="card">
            <div class="dokter">
                <img class="foto-dokter" src="assets/dokter.png" alt="gambardokter">
                <h4 class="nama-dokter">{{$dokter->nama_dokter}}</h4>
                <p>Dokter {{$dokter->spesialis}}</p>
                <p>{{$dokter->jadwal_dokter}}</p>
            </div>
        </div>
        @endforeach
    </div>
    <footer>
    <div class="foot-card">
        <h3 class="">Lokasi Kami</h3><br>
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2255.491377425223!2d112.76561133409919!3d-7.298343794326158!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7fa53bc20b1a1%3A0xabd54bc4c61087af!2sUniversitas%2017%20Agustus%201945%20Surabaya!5e0!3m2!1sid!2sid!4v1687753485463!5m2!1sid!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
    <div class="foot-card">
        <h3 class="">Jam Kerja</h3><br>
        <p>Senin - Kamis : 08.00-18.00</p><br>
        <p>Jumat : 08.00-17.00</p><br>
        <p>Minggu Libur</p>
    </div>
    <div class="foot-card">
        <h3 class="">Contact Center</h3><br>
        <h4>021-328-982-178</h4><br>
        <p>Hubungi nomer kami diatas</p>
        <p>jika ada kasus emergency</p>
        <p>yang butuh penanganan cepat</p>
    </div>
    </footer>
</body>

</html>
