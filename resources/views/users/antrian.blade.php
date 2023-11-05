<!DOCTYPE html>
        <html>
        <head>
            <style>
                 @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700&display=swap');

                 *{
                    font-family: Poppins, sans-serif;
                 }

                 body {
                    background-image: url(assets/6301.jpg);
                    background-repeat: no-repeat;
                    background-size: cover;
                    margin: 20px;
                }

                .container{
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-family: Arial, sans-serif;
                    background-color: #fff;
                }

                .clock {
                    font-size: 20px;
                }

                h1 {
                    text-align: center;
                }

                table {
                    width: 100%;
                    border-collapse: collapse;
                    margin-bottom: 20px;
                }

                th, td {
                    border: 1px solid #ddd;
                    padding: 8px;
                }

                th {
                    background-color: #fff;
                    font-weight: bold;
                }

                .footer {
                    text-align: center;
                    font-size: 12px;
                }
            </style>
        </head>
        <body>
        <div class="container">
                    <div class="row">
                    <div class="col-md-10 offset-md-3 text-center">
                        <div class="clock" id="clock"></div>
                    </div>
                    </div>
                </div>
            <h1>Data Pendaftaran</h1>
            <body>
            <table>
                <tr>
                    <th>No Antrian</th>
                    <th>ID Pendaftaran</th>
                    <th>Nama</th>
                    <th>Dokter Spesialis</th>
                    <th>Jadwal Kunjungan</th>
                </tr>
                @foreach($userData as $dat)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>K-{{ $dat->id }}</td>
                        <td>{{ $dat->nama_lengkap }}</td>
                        <td>{{ $dat->dokter->spesialis }}</td>
                        <td>{{ $dat->jadwal_kedatangan }}</td>
                    </tr>
                    @endforeach

            </table>
            <script>
                function updateClock() {
                var now = new Date();
                var hours = now.getHours();
                var minutes = now.getMinutes();
                var seconds = now.getSeconds();

                hours = (hours < 10) ? "0" + hours : hours;
                minutes = (minutes < 10) ? "0" + minutes : minutes;
                seconds = (seconds < 10) ? "0" + seconds : seconds;

                var time = hours + ":" + minutes + ":" + seconds;
                document.getElementById("clock").innerText = time;
                 }
                setInterval(updateClock, 1000);
            </script>
        </body>
        </html>
