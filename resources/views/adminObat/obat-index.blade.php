<!DOCTYPE html>
<html>
<head>
  <title>Admin</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <style>
    .container {
      margin-top: 50px;
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
    .card-buttons {
      margin-bottom: 10px;
      display: flex;
      justify-content: flex-end;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Daftar Obat</h2>
        <div class="card-buttons">
          <a class="btn btn-primary" href="/addObat">Tambah</a>
        </div>
      </div>
      <div class="card-body">
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Nama Obat</th>
              <th>Deskripsi Obat</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <!-- Isi tabel diambil dari database -->
            @foreach ($obats as $obat)
            <tr>
              <td>{{$obat->nama_obat}}</td>
              <td>{{$obat->keterangan}}</td>
              <td>
                <a class="btn btn-warning" href="/obatEdit/{{$obat->id}}">Edit</a>
                <a class="btn btn-danger" href="/delete/{{$obat->id}}">Hapus</a>
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
