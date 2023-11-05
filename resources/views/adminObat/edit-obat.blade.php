<!DOCTYPE html>
<html>
<head>
  <title>Edit Obat</title>
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
  <h2 class="text-center mt-4">Edit Obat</h2>
  <div class="container">
    <div class="card center bg-light" style="width: 30rem;">
      <div class="card-body">
        <form action="/edit-obat">
            @csrf
            <input type="hidden" class="form-control" id="id" name="id" value="{{$obats->id}}"
            aria-describedby="emailHelp">
          <div class="form-group">
            <label for="namaObat">Nama Obat:</label>
            <input type="text" class="form-control" name="nama_obat" id="nama_obat" value="{{$obats->nama_obat}}">
          </div>
          <div class="form-group">
            <label for="deskripsiObat">Deskripsi Obat:</label>
            <input class="form-control" name="keterangan" id="keterangan" rows="3" value="{{$obats->keterangan}}"></textarea>
          </div>
          <button type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
