@extends('layouts.app')

@section('content')
<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
            @if(($kelompok) && $kelompok[0]->konfirmasi == 'yes')
                @if (count_date(now_date(),$periode->tglselesai) > 0)
                <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Periode sedang berlangsung, masukkan setiap kegiatan individu maupun kelompok. <br><br>
                <button type="button" class="btn btn-sm btn-info" id="btn_tambah_laporan" style="margin-right: 5px;"><i class="fas fa-plus-circle"></i></i> Tambah Laporan</button>
                @else
                <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Periode telah selesai, anda tidak dapat menambahkan kegiatan individu maupun kelompok. <br><br>
                <button type="button" class="btn btn-sm btn-info" id="btn_tambah_laporan" style="margin-right: 5px;" disabled><i class="fas fa-plus-circle"></i></i> Tambah Laporan</button>
                @endif
                <a href="{{ url('siswa_laporan/cetak') }}" target="_blank"><button type="button" class="btn btn-sm btn-warning" id="btn_cetak_laporan" style="margin-right: 5px;"><i class="fas fa-print"></i></i> Cetak laporan</button></a>
            @elseif(($kelompok) && $kelompok[0]->konfirmasi == 'no')
                <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Pendaftaran prakerin anda belum dikonfirmasi. <br><br>
            @else
                <h5><i class="fas fa-info"></i> Perhatian:</h5>
                Anda belum terdaftar dalam perusahaan prakerin. <br><br>
                <a href="{{ url('siswa_perusahaan') }}"><button type="button" class="btn btn-sm btn-info" style="margin-right: 5px;"><i class="fas fa-building"></i> Daftar Prakerin</button></a>
            @endif
            </div>
          </div>
        </div>
      </div>
</div>
{{-- @if(count($kelompok) >0  && $kelompok[0]->konfirmasi == 'yes' ) --}}
@if($kelompok)
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1 text-secondary"><b></b></i>Daftar Kegiatan

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
</div>
@endif
<div class="modal fade" id="modal_tambah_laporan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Laporan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Anggota</label>
                            <div class="col-sm-8">
                                <select class="select-cari-modal form-control" name="anggota[]" id="test" multiple>
                                    <option value="semua" selected>Semua</option>
                                    @foreach ($kelompok as $i)
                                        <option value="{{ $i->nama }}">{{ $i->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datetimepicker-input datepick" data-toggle="datetimepicker" data-target="datepick" name="tanggal"/>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Kegiatan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="kegiatan" placeholder="Kegiatan">
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Detail Kegiatan</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="detail_kegiatan" placeholder="Detail Kegiatan"></textarea>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_simpan" class="btn btn-primary">Save</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    tb = $('#tabel_laporan').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": true,
        "responsive": true,

        ajax: "{{ url('siswa_laporan/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: true, searchable: false},
            {data: 'anggota', name: 'anggota'},
            {data: 'tanggal', name: 'tanggal'},
            {data: 'kegiatan', name: 'kegiatan'},
            {data: 'detail_kegiatan', name: 'detail_kegiatan'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [0,2,5] },
            // { width:'10', target:[0]},
            // { width:'10', target:[1,2]},
            // { width:'10', target:[4]},
	    ],
    });
});

$("#btn_tambah_laporan").click(function(){
    $("#modal_tambah_laporan").modal("show");
    $('[name=tanggal]').val(now_date());
});
$("#modal_tambah_laporan").on("hidden.bs.modal", function(){
    $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
    $(".select-cari-modal").val('semua').trigger('change') ;
});
$("#btn_simpan").click(function(){
    $.ajax({
        url: "{{ url('siswa_laporan/simpan')}} ",
        type:'POST',
        data: $("#form_tambah").serialize(),
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(respon){
            if(respon.status == 1 || respon.status == "1"){
                $("#modal_tambah_laporan").modal('hide');
                Swal.fire({
                    title: 'Berhasil',
                    text: 'Data berhasil diperbarui.',
                    type: "success"
                }).then((result) => {
                    tb.ajax.reload();
                })
            }
            else{
                Swal.fire({
                    title: 'Gagal',
                    text: 'Data gagak diperbarui.',
                    type: "error"
                }).then((result) => {
                    tb.ajax.reload();
                })
            }
        }
    });
});
$('body').on('click', '#btn_edit', function () {
    var id = $(this).data('id');
    $.get("{{ url('siswa_laporan/edit') }}"+'/'+id, function (data) {
        $("#modal_tambah_laporan").modal("show");
        $('[name=id]').val(data.id);
        $('#test').val(data.anggota.split(',')).trigger('change.select2');
        $('[name=tanggal]').val(formattanggal(data.tanggal));
        $('[name=kegiatan]').val(data.kegiatan);
        $('[name=detail_kegiatan]').val(data.detail_kegiatan);
    })
});
</script>
@endsection
