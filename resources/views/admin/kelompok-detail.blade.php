@extends('layouts.app')

@section('content')

<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
                <button type="button" id="btn_kembali" class="btn btn-outline-danger btn-sm"><i class="fas fa-caret-square-left"></i> Kembali</button>
                <div class="row">
                    <br>
                </div>
                <div class="row">
                    <div class="col"><p><b> Nama Perusahaan </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $perusahaan->nama }}</p></div>
                    <div class="col-auto">
                        <h5></h5>
                    </div>
                    <div class="col"><p><b> Email Perusahaan </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p> {{ $perusahaan->email }}</p></div>
                </div>
                <div class="row">
                    <div class="col"><p><b> Alamat </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $perusahaan->alamat }}</p></div>
                    <div class="col-auto">
                        <h5></h5>
                    </div>
                    <div class="col"><p><b> No. Telp </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $perusahaan->no_telp }}</p></div>
                </div>
                <hr>
                <h5><b> Kelompok : </b></h5>
                <table id="tabel_kelompok" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th >No</th>
                            <th >Nama</th>
                            <th>Email</th>
                            <th>Kelas</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
          </div>
        </div>
      </div>
</div>

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <h5><b>Laporan Kegiatan</b></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel_laporan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Anggota</th>
                                    <th>Tanggal</th>
                                    <th>Kegiatan</th>
                                    <th>Detail Kegiatan</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        tb = $('#tabel_kelompok').DataTable({
            // processing: true,
            // serverSide: true,
            paging: false,
            "lengthChange": false,
            searching: false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            ajax: "{{ url('admin_kelompok/get_data_kelompok') }}"+"/"+{{ $id }}+"/"+{{ $periode }},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'nama_kelas', name: 'nama_kelas'},
            ],
        });
        tb2 = $('#tabel_laporan').DataTable({
            processing: true,
            serverSide: true,
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": true,
            "responsive": true,

            ajax: "{{ url('admin_kelompok/get_data_laporan') }}"+"/"+{{ $id }}+"/"+{{ $periode }},
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
                {data: 'anggota', name: 'anggota'},
                {data: 'tanggal', name: 'tanggal'},
                {data: 'kegiatan', name: 'kegiatan'},
                {data: 'detail_kegiatan', name: 'detail_kegiatan'},
            ],
            columnDefs: [
                { className: 'text-right', targets: [] },
                { className: 'text-center', targets: [0,2] },
            ],
        });
    });

    $('body').on('click', '#btn_kembali', function () {
        window.location.href = "/admin_kelompok";
    });

</script>
@endsection
