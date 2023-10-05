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
    <table class="table" align="center">
        <tbody>
            @if ($cetakhasil)
            <tr>
                <td>Nama Lengkap</td>
                <td>{{ $cetakhasil->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>No Rekam Medik</td>
                <td>{{ $cetakhasil->nik }}</td>
            </tr>
            <tr>
                <td>Jenis Konsultasi</td>
                <td>{{ $cetakhasil->jenis_konsultasi }}</td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>{{ $cetakhasil->jenis_kelamin }}</td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>{{ $cetakhasil->umur }}</td>
            </tr>
            <tr>
                <td>Jumlah Kalori</td>
                <td>{{ $cetakhasil->kalori }} KKAL</td>
            </tr>
            <tr>
                <td>Jumlah BMI</td>
                <td>{{ $cetakhasil->bmi }}</td>
            </tr>
            <tr>
                <td>Stres Metabolik</td>
                <td>{{ $cetakhasil->tingkat_kesetresan }}%</td>
            </tr>
            <tr>
                <td>Riwayat Penyakit</td>
                <td>{{ $cetakhasil->riwayat_penyakit }}</td>
            </tr>
            <tr>
                <td>Keterangan</td>
                <td>{{ $cetakhasil->keterangan }}</td>
            </tr>
            @else
            <tr>
                <td colspan="2">Tidak ada data konsultasi.</td>
            </tr>
            @endif
        </tbody>
    </table>
    <script type="text/javascript">
        window.onload = function () {
            window.print();
        };
    </script>
</body>
</html>
