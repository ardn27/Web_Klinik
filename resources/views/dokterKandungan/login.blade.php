<!DOCTYPE html>
<html>
<head>
  <title>Login Card</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');
    *{
      font-family: Poppins;
    }
    body {
        background-image: url(assets/6301.jpg);
      background-repeat: no-repeat;
      background-size: 100vw;
    }

    .card {
      max-width: 400px;
      margin: 0 auto;
      margin-top: 100px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0,0,0,0.1);
      border-radius: 5px;
      background-color: #fff;
    }

    .card-title {
      text-align: center;
      margin-bottom: 20px;
    }

    .form-label {
      font-weight: bold;
    }

    .btn-primary {
      width: 100%;
    }

    .text-center {
      text-align: center;
    }
  </style>
</head>
<body>

    @if (session('pesan'))
        <script>
            alert(' email atau password salah')
        </script>
    @endif

<div class="row">
    <div class="col-md-4 offset-md-4 mt-5">
        <div class="card">
            <div class="card-header bg-dark text-light">
                KlinikUntag
            </div>
            <div class="card-body p-2">
                <form action="/login-sp-kandungan-aksi" method="post">
                    @csrf
                    <div class="form-group">
                      <input type="email"
                        class="form-control{{ $errors->has('email') ? ' is-invalid':'' }}"
                        name="email"
                        placeholder="Email" />
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group pt-2">
                      <input type="password"
                        class="form-control{{ $errors->has('password') ? ' is-invalid':'' }}"
                        name="password"
                        placeholder="Password" />
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-dark btn-block">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

  <script>
    function togglePage() {
      var loginPage = document.getElementById("login-page");
      var registrationPage = document.getElementById("registration-page");

      if (loginPage.style.display === "none") {
        loginPage.style.display = "block";
        registrationPage.style.display = "none";
      } else {
        loginPage.style.display = "none";
        registrationPage.style.display = "block";
      }
    }
  </script>
</body>
</html>
