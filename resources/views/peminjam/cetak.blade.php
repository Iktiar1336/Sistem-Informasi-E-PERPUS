<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bukti Pengembalian</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .container{
            border: 3px solid black;
            width: 100%;
            margin-top: 10%;
        }
    </style>
</head>
<body>
    <div class="container">
        <center>
            <h1 style="font-family: Arial"><b>Sistem Informasi E-PERPUS</b></h1>
            <h2 style="font-family: Arial"><b>Bukti Pengembalian Buku</b></h2>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <center>
                    <!-- Menampilkan Jam (Aktif) -->
                <b style="font-family: Arial">
                <script type="text/javascript">
                    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
                    var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu'];
                    var date = new Date();
                    var day = date.getDate();
                    var month = date.getMonth();
                    var thisDay = date.getDay(),
                        thisDay = myDays[thisDay];
                    var yy = date.getYear();
                    var year = (yy < 1000) ? yy + 1900 : yy;
                    document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
                    //-->
                </script>
                </b>
                <h5 style="font-family: Arial"><b>Nama Petugas : {{$pinjam->nama_petugas}}</b></h5>
            </center>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
        </center>
        <table class="table table-striped text-center">
            <thead>
              <tr>
                <th scope="col">Nama Peminjam</th>
                <th scope="col">Nama Buku</th>
                <th scope="col">Tgl Pinjam</th>
                <th scope="col">Waktu Pinjam</th>
                <th scope="col">Tgl Pengembalian</th>
                <th scope="col">Denda Pengembalian</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td scope="row">{{$pinjam->nama_peminjam}}</td>
                <td>{{$pinjam->nama_buku}}</td>
                <td>{{$pinjam->tgl_pinjam}}</td>
                <td>{{$pinjam->waktu_pinjam}}</td>
                <td>{{$pinjam->tgl_pengembalian}}</td>
                <td>Rp.{{$pinjam->denda}}</td>
              </tr>
            </tbody>
        </table>
        
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
    </div>
    <script>
        window,print();
    </script>
</body>
</html>