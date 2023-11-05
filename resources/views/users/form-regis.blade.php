<!DOCTYPE html>
<html>
<head>
    <title>Form Registrasi</title>
    <!-- Memanggil file Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{
            background-image: url(assets/6301.jpg);
            background-repeat: no-repeat;
            background-size: 100%;
        }

        .logo{
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5">
                <div class="card">
                    <div class="card-header logo text-center bg-info">
                        <h2>Form Registrasi</h2>
                    </div>
                    <div class="card-body">
                        <form action="/form-regis-aksi" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="username">Username:</label>
                                <input type="text" class="form-control" name="nama" id="username" placeholder="Masukkan Nama" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" name="email" id="email" placeholder="Masukkan Email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password:</label>
                                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Register</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        Sudah memiliki akun? <a href="/login">Login di sini</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Memanggil file Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
