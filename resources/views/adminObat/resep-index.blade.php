<!DOCTYPE html>
<html>
<head>
  <title>Resep</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
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
                <a class="nav-link text-dark" href="/index-resep">Resep</a>
            </ul>
          </div>
        </div>
      </nav>
  <div class="container mt-5">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Resep</h2>
        <a class="btn btn-primary btn-add" href="/tambah-resep">Tambah</a>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Obat</th>
              <th>Deskripsi Obat</th>
              <th>Resep</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi tabel diambil dari database -->
            @foreach ($reseps as $resep)
            <tr>
              <td>{{$resep->obat->nama_obat}}</td>
              <td>{{$resep->obat->keterangan}}</td>
              <td>{{$resep->resep}}</td>
              <td>
                <a class="btn btn-warning" href="/edit-resep/{{$resep->id}}">Edit</a>
                <a class="btn btn-danger" href="/resep-delete/{{$resep->id}}">Hapus</a>
              </td>
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
