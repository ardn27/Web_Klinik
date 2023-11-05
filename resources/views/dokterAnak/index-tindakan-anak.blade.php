<!DOCTYPE html>
<html>
<head>
  <title>Tindakan</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .container {
      /* margin-top: 50px; */
    }
    .card {
      margin-bottom: 20px;
    }
    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .card-title {
      margin-bottom: 0;
    }
    .btn-add {
      margin-top: -5px;
    }
  </style>
</head>
<body>
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
                <a class="nav-link text-dark" href="/tindakan-anak-index">Tindakan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/index-resep">Resep</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-dark" href="/logout-sp-kandungan">logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Tindakan Dokter Anak</h2>
        <a class="btn btn-primary btn-add" href="/tindakan-anak-add">Tambah Tindakan</a>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Pasien Dokter Anak</th>
              <th>Keluhan</th>
              <th>Diagnosa</th>
              <th>Obat</th>
              <th>Resep</th>
              <th>status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
             <!-- Isi tabel diambil dari database -->
            @foreach ($tindakan as $data)
            <tr>
                <td>{{ $data->userklinik->nama_lengkap }}</td>
                <td>{{ $data->userklinik->keluhan }}</td>
                <td>{{ $data->diagnosa }}</td>
                <td>
                    {{ $data->resep_1->obat->nama_obat }},
                    {{ $data->resep_2->obat->nama_obat }},
                    {{ $data->resep_3->obat->nama_obat }}
                </td>
                <td>
                    {{ $data->resep_1->obat->nama_obat }} ({{ $data->resep_1->resep }}),<br>
                    {{ $data->resep_2->obat->nama_obat }} ({{ $data->resep_2->resep }}),<br>
                    {{ $data->resep_3->obat->nama_obat }} ({{ $data->resep_3->resep }})
                </td>
                <td>{{ $data->status }}</td>
                <td><a class="btn btn-warning" href="/tindakan-anak-edit/{{$data->id}}">Edit</a>
                    <a class="btn btn-danger" href="/delete-tindakan-anak/{{$data->id}}">Hapus</a></td>
            </tr>
            @endforeach
            <!-- End of database content -->


          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
