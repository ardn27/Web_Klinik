<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>

<body>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');

    * {
      margin: 0;
      padding: 0;
      font-family: Poppins;
    }

    .daftar {
      background-image: url(assets/6301.jpg);
      background-repeat: repeat;
      background-size: contain;
      font-family: Poppins, sans-serif;
      width: 100vw;
    }
  </style>
 <nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-info">
    <div class="container">
      <a class="navbar-brand" href="/home">KlinikUntag</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-dark" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link text-dark" href="/registrasi">Data Pasien</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/form-pendaftaran">Pendaftaran</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="/antrian">Lihat Antrian</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="container daftar bg-body-tertiary text-emphasis-info mt-4">
    <div class="col d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card text-bg mb-3">
          <div class="card-header ">
            <h2 class="text-center bg-">Form Pendaftaran</h2>
          </div>
          <div class="card-body">
            <form action="/pendaftaran" class="row g-3">
            @csrf
            <div class="col-md-12">
                <label for="nama" class="form-label">Nama:</label>
                  <select class="form-select" id="id_pasien" name="id_pasien">
                    @foreach($user as $dat)
                    <option value="{{$dat->id}}">{{$dat->nama_lengkap}}</option>
                    @endforeach
                  </select>
              <div class="col-md-12">
                <label for="spesialis" class="form-label">Spesialis:</label>
                <select class="form-select" id="id_spesialis" name="id_spesialis">
                  @foreach($dokter as $dt)
                  <option value="{{$dt->id}}">{{$dt->spesialis}} ({{$dt->nama_dokter}})</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-12">
                <label for="jadwal" class="form-label">Jadwal Kedatangan:</label>
                <input type="date" class="form-control" id="tgl_berobat" name="tgl_berobat" required>
              </div>
              <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan:</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="4" required></textarea>
              </div>
              <button type="submit" class="btn btn-primary ">Submit</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
