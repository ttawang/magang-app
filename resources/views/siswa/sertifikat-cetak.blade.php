<!DOCTYPE html>
<html>
<head>
    <style>
        @page { size: 21cm 29.7cm landscape; }
        table {
            border-left: 0.01em solid rgb(0, 0, 0);
            border-right: 0;
            border-top: 0.01em solid rgb(0, 0, 0);
            border-bottom: 0;
            border-collapse: collapse;
            width: 100%;
            height:auto;
            page-break-inside: auto;
        }
        table td {
            border-left: 0;
            border-right: 0.01em solid rgb(0, 0, 0);
            border-top: 0;
            border-bottom: 0.01em solid rgb(0, 0, 0);
            padding: 5px;
        }
        table th {
            border-left: 0;
            border-right: 0.01em solid rgb(0, 0, 0);
            border-top: 0.01em solid rgb(0, 0, 0);
            border-bottom: 0.01em solid rgb(0, 0, 0);
            padding: 5px;
        }body {
            background-image: url('template-sertifikat_page-0001.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }

      </style>
    <title>Laporan Kegiatan</title>
</head>
<body>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <h1 align="center" style="text-transform:uppercase">{{ $data['nama_siswa'] }}</h1>
    <br><br>
    <h2 align="center" style="text-transform:uppercase">{{ $data['nilai'] }}</h2>
</body>
</html>
