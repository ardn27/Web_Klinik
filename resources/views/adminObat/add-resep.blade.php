<!DOCTYPE html>
<html>
<head>
  <title>Tambah Obat</title>
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
  <h2 class="text-center mt-4">Tambah Resep</h2>
  <div class="container">
    <div class="card center bg-light" style="width: 30rem;">
      <div class="card-body">
        <form action="/resep-add">
          <div class="form-group">
            <label for="id_obat">Obat:</label>
            <select name="id_obat" id="id_obat" class="form-control">
              @foreach ($reseps as $resep)
                <option value="{{$resep->id}}">{{$resep->nama_obat}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label for="resep">Resep Anjuran Pemakaian:</label>
            <textarea class="form-control" name="resep" id="resep" rows="3"></textarea>
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
