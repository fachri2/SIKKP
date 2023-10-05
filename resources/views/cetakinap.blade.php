<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Hasil</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px;
            margin-bottom: 20px;
            border-bottom: 1px solid #ccc;
        }
        .logo {
            max-width: 200px;
            height: auto;
        }
        .title {
            text-align: center;
            margin: 0;
            padding: 0;
        }
        .card {
            width: 90%;
            margin: 0 auto;
            padding: 10px;
            border: 1px solid #ccc;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        .table th,
        .table td {
            padding: 8px;
            border: 1px solid #ccc;
        }
        .table th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img class="logo" src="{{ URL::asset('image/logo kesehatan.png'); }}" alt="Logo Kesehatan">
        <h2 class="title"><center>Data Kebutuhan Kalori<br>Pasien Rawat Inap</center></h2>
        <img class="logo" src="{{ URL::asset('image/bakti husada.png'); }}" alt="Logo Bakti Husada">
    </div>
                <table class="table" align="center" border="ipx" rules="all" style="width: 90%;" >
                  @if ($cetak)
                  <ul>
                      @csrf
                      <tr height ="50px">
                      <td>Kamar</td> 
                      <td>{{ $cetak->kamars->nama_kamar }} Kelas {{$cetak->kamars->kelas_kamar}}</td>
                      </tr><tr height ="50px">
                    <td>Nama Lengkap</td>
                    <td>{{ $cetak->nama_lengkap }}</td>
                </tr><tr height ="50px">
                <td>No Rekam Medik</td>
                <td>{{ $cetak->nik }}</td>
                  </tr><tr height ="50px">
                    <td>Jenis Konsultasi</td>
                    <td>{{ $cetak->jenis_konsultasi }}</td>
                    </tr><tr height ="50px">
                    <td>Jenis Kelamin</td>
                    <td>{{ $cetak->jenis_kelamin }}</td>
                    </tr><tr height ="50px">
                    <td>Umur</td>    
                    <td>{{ $cetak->umur }}</td>
                    </tr><tr height ="50px">
                    <td>Jumlah Kalori</td> 
                    <td>{{ $cetak->kalori }} KKAL</td>
                    </tr><tr height ="50px">
                    <td>Riwayat Penyakit</td> 
                    <td>{{ $cetak->riwayat_penyakit }}</td>
                    </tr><tr height ="50px">
                    <td>Keterangan</td> 
                    <td>{{ $cetak->keterangan }}</td>
                  @else
                  <tr>
                    <td>Tidak ada data konsultasi.</td>
                  </tr>
                  @endif  
                </table>
                </form>
                <script type="text/javascript">
                window.print();
                </script> 
</body>
</html>