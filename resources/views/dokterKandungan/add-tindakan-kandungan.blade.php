<!DOCTYPE html>
<html>
<head>
  <title>Tindakan</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
      display: flex;
      justify-content: center;
      align-items: center;
    }
  </style>
</head>
<body>
    @if(session('success'))
            <div class="alert alert-success text-center position-relative" style="z-index: 9999; background-color: #c3e6cb; color: #155724; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
  <h2 class="text-center mt-4">Dokter Kandungan</h2>
  <div class="container">
    <div class="card center bg-light" style="width: 70%;">
      <div class="card-body">
        <form action="/kandungan-add-action">
          <div class="form-group">
            <label for="id-pasien">Nama Pasien Dokter Kandungan :</label>
            <select name="id_pasien" id="id-pasien" class="form-control">
              @foreach ($pasiens as $pasien)
                <option value="{{$pasien->id}}">{{$pasien->nama_lengkap}}, Keluhan ({{$pasien->keluhan}})</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="diagnosa">Diagnosa:</label>
            <input type="text" class="form-control" id="diagnosa" name="diagnosa" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="form-group">
            <label for="tindakan">Tindakan:</label>
            <input type="text" class="form-control" id="tindakan" name="tindakan" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="form-group">
            <label for="status">Status:</label>
            <input type="text" class="form-control" id="status" name="status" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text"></div>
          </div>
          <div class="form-group">
            <label>Resep:</label>
            <select name="id_resep_1" id="id_resep_1" class="form-control">
              @foreach ($reseps as $resep)
                <option value="{{$resep->id}}">{{$resep->obat->nama_obat}}</option>
              @endforeach
            </select>
            <select name="id_resep_2" id="id_resep_2" class="form-control">
                @foreach ($reseps as $resep)
                  <option value="{{$resep->id}}">{{$resep->obat->nama_obat}}</option>
                @endforeach
              </select>
              <select name="id_resep_3" id="id_resep_3" class="form-control">
                @foreach ($reseps as $resep)
                  <option value="{{$resep->id}}">{{$resep->obat->nama_obat}}</option>
                @endforeach
              </select>
          </div>
          <button type="submit" class="btn btn-success">Tambah</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
