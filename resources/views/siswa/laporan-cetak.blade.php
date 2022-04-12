<!DOCTYPE html>
<html>
<head>
    <style>
        @page { size: 21cm 29.7cm potrait; }
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
        }

      </style>
    <title>Laporan Kegiatan</title>
</head>
<body>
    <h2 align="center">Laporan Kegiatan</h2>
    <table border="1">
        <thead>
            <tr>
                <th style="width: 7%">No</th>
                <th style="width: 18%">Tanggal</th>
                <th style="width: 30%">Anggota</th>
                <th style="width: 25%">Kegiatan</th>
                <th style="width: 30%">Detail Kegiatan</th>
            </tr>
        </thead>

        @php($no=1)
        @foreach($data as $i)
        <tr>
            <td align="center">{{ $no }}</td>
            <td align="center">{{ text_date($i->tanggal) }}</td>
            <td>{{ $i->anggota }}</td>
            <td>{{ $i->kegiatan }}</td>
            <td >{{ $i->detail_kegiatan }}</td>
        </tr>
        @php($no++)
        @endforeach


    </table>
</body>
</html>
