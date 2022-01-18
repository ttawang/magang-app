@extends('layouts.app')

@section('content')
@if (count_date(now_date(),$periode->tglmulai) < 0)
<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-danger">
              <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Prakerin telah dimuali anda sudah tidak dapat mendaftar.
            </div>
          </div>
        </div>
    </div>
</div>
@else
<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Harap mendaftar sebelum tanggal mulai prakerin.
            </div>
          </div>
        </div>
    </div>
</div>
@endif

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1 text-secondary"><b></b></i>Daftar Perusahaan

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel_perusahaan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Nama</th>
                                    <th>Email</th>
                                    <th >No Telp</th>
                                    <th >Alamat</th>
                                    <th>Kuota</th>
                                    <th >Sisa Kuota</th>
                                    <th >Status</th>
                                    <th >Aksi</th>
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
    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_perusahaan').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{ url('siswa_perusahaan/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'no_telp', name: 'no_telp'},
            {data: 'alamat', name: 'alamat'},
            {data: 'kuota', name: 'kuota'},
            {data: 'sisakuota', name: 'sisakuota'},
            {data: 'status', name: 'sttaus', orderable: true, searchable: true},
            {data: 'action', name: 'action', orderable: false, searchable: true},
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [0,5,6,7,8] },
            // { width:500, target:[0]},
	    ],
    });
    $('body').on('click', '#btn_daftar', function () {
        Swal.fire({
        title: 'Daftar Prakerin',
        text: "Anda yakin mendaftar pada perusahaan ini ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Daftar'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                $.get("{{ url('siswa_perusahaan/daftar') }}"+'/'+id);
                Swal.fire({
                    title: 'Berhasil Mendaftar',
                    text: 'Silahkan Tungu Konfirmasi.',
                    type: "success"
                }).then((result) => {
                    location.reload();
                })
            }
        })
    });
});
</script>
@endsection
