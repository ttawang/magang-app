@extends('layouts.app')

@section('content')


<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="card card-default">
            <div class="card-body">
                <div class="ribbon-wrapper ribbon-xl">
                    <div class="ribbon bg-danger">Menunggu Konfirmasi</div>
                    </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Perusahaan :</b></p>
                            <div class="col-sm-8">
                                <p class="text-secondary text-justify">{{ $perusahaan->nama }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Email :</b></p>
                            <div class="col-sm-8">
                                <p class="text-secondary text-justify">{{ $perusahaan->email }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>No. Telp :</b></p>
                            <div class="col-sm-8">
                                <p class="text-secondary text-justify">{{ $perusahaan->no_telp }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Alamat :</b></p>
                            <div class="col-sm-8">
                                <p class="text-secondary text-justify">{{ $perusahaan->alamat }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Kuota :</b></p>
                            <div class="col-sm-8">
                                <p class="text-secondary text-justify">{{ $perusahaan->kuota }} ( {{ terbilang($perusahaan->kuota) }} )</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Status :</b></p>
                            <div class="col-sm-8">
                                @if ($perusahaan->recommended == 1)
                                <span class="badge bg-success">Recommended</span>
                                @else
                                <span class="badge bg-warning">Underated</span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <p class="col-sm-3 text-secondary"><b>Sisa Kuota :</b></p>
                            <div class="col-sm-8">
                                @if ($sisakuota == 0)
                                    <p class="text-secondary text-justify">Kuota Telah Habis</p>
                                @else
                                    <p class="text-secondary text-justify">{{ $sisakuota }} ( {{ terbilang($sisakuota) }} )</p>
                                @endif
                            </div>
                        </div>
                    </div>
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
                            <i class="mr-1 text-secondary"><b>Kelompok</b></i>
                        </div>
                    </div>
                    <div class="card-body">
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
                            @if (count_date(now_date(),$periode->tglmulai) >= 0)
                            <div class="row">
                                <div class="col align-self-end text-right">
                                    <button type="button" class="delete btn btn-danger btn-sm" id="btn_keluar"><i class="fas fa-caret-square-left"></i> Keluar Dari Kelompok</button>
                                </div>
                            </div>
                            @endif

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{{-- <div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1 text-secondary"><b>Laporan</b></i>
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-sm btn-info" id="btn_tambah"><i class="fas fa-plus"></i> Tambah Kegiatan</button>
                        <br>
                        <table id="tabel_laporan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Tanggal</th>
                                    <th>Kegiatan</th>
                                    <th>Aksi</th>
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
</div> --}}
<script type="text/javascript">
    $(document).ready(function () {
        var tb = $('#tabel_kelompok').DataTable({
            processing: true,
            serverSide: true,
            "paging": false,
            "lengthChange": false,
            "searching": false,
            "ordering": false,
            "info": false,
            "autoWidth": false,
            "responsive": true,
            ajax: "{{ url('siswa_perusahaan/daftarkelompok') }}",
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'nama_kelas', name: 'nama_kelas'},
            ],
            columnDefs: [
                { className: 'text-right', targets: [] },
                { className: 'text-center', targets: [0] },
                { width:20, targets:[0]},
                { width:350, targets:[1]},
            ],
        });
    });
    $('body').on('click', '#btn_keluar', function () {
        Swal.fire({
        title: 'Keluar Kelompok',
        text: "Anda yakin akan keluar dari kelompok ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Keluar'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = {{ Auth::user()->id }};
                $.get("{{ url('siswa_perusahaan/keluar') }}"+'/'+id);
                Swal.fire({
                    title: 'Berhasil Keluar',
                    text: 'Anda Telah Keluar Dari Kelompok',
                    type: "success"
                }).then((result) => {
                    location.reload();
                })
            }
        })
    });
</script>

@endsection
