<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mb-5">Profile</h1>
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-body text-center">
                        <!-- users/profil.blade.php -->
                        <h1>Profil Pengguna</h1>
                        <p>Nama: {{ $user->name }}</p>
                        <p>Email: {{ $user->email }}</p>

                        @if ($pasien)
                            <h1>Profil Pasien</h1>
                            <p>Nama Lengkap: {{ $pasien->nama_lengkap }}</p>
                            <p>Jenis Kelamin: {{ $pasien->jns_kelamin }}</p>
                            <p>Tanggal Lahir: {{ $pasien->tgl_lahir }}</p>
                            <p>NIK: {{ $pasien->nik }}</p>
                            <p>Nomor Telepon: {{ $pasien->no_telp }}</p>
                            <p>Alamat: {{ $pasien->alamat }}</p>
                            <p>Pembayaran: {{ $pasien->pembayaran }}</p>
                            <p>Status: {{ $pasien->status }}</p>
                        @else
                            <p>Data pasien tidak ditemukan.</p>
                        @endif
                    </div>
                    <div class="card-footer">
                        <a href="#" class="btn btn-primary">Edit</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
