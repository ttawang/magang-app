<!DOCTYPE html>
<html>
<head>
    <title>Laporan Kegiatan</title>
</head>
<body>
    <table border="1">
        <tr>
            <td>no</td>
            <td>nama barang</td>
            <td>nama_gudang</td>
            <td>kuntitas</td>
        </tr>
        @if(!$data)
        <tr>
            <td colspan="4" align="center">Tidak ada barang</td>
        </tr>
        @endif
        @php
            $no = 1;
        @endphp
        @foreach ($data as $key => $val)

            @foreach ($val as $k => $v)
            <tr>
            @if ($k == 0)
                <td rowspan="{{ count($val) }}">{{ $no }}</td>
                <td rowspan="{{ count($val) }}">{{ $v['nama_barang'] }}</td>

            @endif
                <td>{{ $v['nama_gudang'] }}</td>
                <td>{{ $v['qty'] }}</td>

            </tr>
            @endforeach
            @php
                $no++
            @endphp
        @endforeach
    </table>
</body>
</html>
