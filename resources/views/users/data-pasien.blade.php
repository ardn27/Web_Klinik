<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pendaftaran</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');
        *{
            margin: 0;
            padding: 0;
        }
        .daftar{
            background-image: url(assets/6301.jpg);
            background-repeat: repeat;
            background-size:contain;
            font-family: Poppins, sans-serif;
            width: 100vw;
        }
        .center{
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100%;
            padding-top: 4rem;
            gap: 8rem;
        }
    </style>
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark bg-info">
        <div class="container">
          <a class="navbar-brand" href="/home">KlinikUntag</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse text-dark" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link text-dark" href="/registrasi">Pendaftaran</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/antrian">Antrian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/logout-user">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
            @if(session('success'))
            <div class="alert alert-success text-center position-relative" style="z-index: 9999; background-color: #c3e6cb; color: #155724; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
  <div class="container daftar bg-body-tertiary text-emphasis-info">
    <div class="col center">
      <div class="col-md-8">
        <div class="card text-bg-light mb-3">
          <div class="card-header bg-info">
            <h2 class="text-center text-white">Form Pendaftaran</h2>
          </div>
          <div class="card-body">
            <form action="/add-pasien" class="row g-3">
              @csrf
              <div class="col-md-6">
                <label for="spesialis" class="form-label">Spesialis:</label>
                <select class="form-select" id="id_spesialis" name="id_spesialis">
                  @foreach($spesialis as $dt)
                  <option value="{{$dt->id}}">{{$dt->spesialis}} ({{$dt->nama_dokter}})</option>
                  @endforeach
                </select>
              </div>
              <div class="col-md-6">
                <label for="jadwal" class="form-label">Jadwal Kedatangan:</label>
                <input type="date" class="form-control" id="jadwal_kedatangan" name="jadwal_kedatangan">
              </div>
              <div class="mb-3">
                <label for="keluhan" class="form-label">Keluhan:</label>
                <textarea class="form-control" id="keluhan" name="keluhan" rows="4"></textarea>
              </div>
              <a href="#form-pasien" class="btn btn-primary">Next</a>

          </div>
        </div>
      </div>
      <div class="col-md-9">
        <div class="card text-bg-light mb-3">
          <div class="card-header bg-info">
            <h2 class="text-center text-white" id="form-pasien">Data Pasien</h2>
          </div>
          <div class="card-body bg-light-subtle">
            <div class="col-mb-3">
                <label for="tanggalLahir" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required>
              </div>
              <div class="col-mb-3">
                <label for="jenisKelamin" class="form-label">Jenis Kelamin:</label>
                <select class="form-select" id="jns_kelamin" name="jns_kelamin" required>
                  <option value="">Pilih Jenis Kelamin</option>
                  <option value="pria">Pria</option>
                  <option value="wanita">Wanita</option>
                </select>
              </div>
              <div class="col-mb-3">
                <label for="tanggalLahir" class="form-label">Tanggal Lahir:</label>
                <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
              </div>
              <div class="col-mb-3">
                <label for="nomorKTP" class="form-label">Nomor KTP:</label>
                <input type="text" class="form-control" id="nik" name="nik" required>
              </div>
              <div class="col-mb-3">
                <label for="nomorTelepon" class="form-label">Nomor Telepon:</label>
                <input type="tel" class="form-control" id="no_telp" name="no_telp" required>
              </div>
              <div class="col-mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="2" required></textarea>
              </div>
              <div class="col-mb-3">
                <label for="pembayaran" class="form-label">Pembayaran:</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pembayaran" id="pembayaranSendiri" value="sendiri">
                  <label class="form-check-label" for="pembayaranSendiri">
                    Sendiri
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="pembayaran" id="pembayaranAsuransi" value="asuransi">
                  <label class="form-check-label" for="pembayaranAsuransi">
                    Asuransi
                  </label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
