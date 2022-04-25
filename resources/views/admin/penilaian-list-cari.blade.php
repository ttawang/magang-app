@extends('layouts.app')

@section('content')

<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
                    @if ((count_date(now_date(),$periode->tglmulai) <= 0) && (count_date(now_date(),$periode->tglselesai) >= 0))
                    <h5 class="text-danger"><b>Periode Sedang Berlangsung, Penilaian Belum Dapat Dilakukan</b></h5>
                    @elseif (count_date(now_date(),$periode->tglmulai) >= 0)
                    <h5 class="text-warning"><b>Periode Akan Berlangsung, Penilaian Belum Dapat Dilakukan</b></h5>
                    @else
                    <h5 class="text-success"><b>Periode Telah Selesai, Silahkan Lakukan Penilaian</b></h5>
                    @endif
                <br>
                <div class="row">
                    <div class="col"><p><b>Nama Periode </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $periode->nama_periode }}</p></div>
                    <div class="col-auto">
                        <p></p>
                    </div>
                    <div class="col"><p><b>Jumlah Kelompok</b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $jumlahkelompok }} Kelompok</p></div>
                </div>
                <div class="row">
                    <div class="col"><p><b>Tanggal Mulai </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ text_date($periode->tglmulai) }}</p></div>
                    <div class="col-auto">
                        <p></p>
                    </div>
                    <div class="col"><p><b>Jumlah Siswa</b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ $jumlahsiswa }} Siswa</p></div>
                </div>
                <div class="row">
                    <div class="col"><p><b>Tanggal Selesai </b></p></div>
                    <div class="col-auto"><b>:</b></div>
                    <div class="col"><p>{{ text_date($periode->tglselesai) }}</p></div>
                    <div class="col-auto">
                        <p></p>
                    </div>
                    <div class="col"><p><b></b></p></div>
                    <div class="col-auto"><b></b></div>
                    <div class="col"><p></p></div>
                </div>
                <br>
                <input type="hidden" name="cek" value="{{ $periode->id }}">
                <button type="button" class="btn btn-sm btn-info" id="btn_cari" style="margin-right: 5px;"><i class="fas fa-search"></i> Cari Periode</button>
                <a href="{{ url('admin_penilaian') }}">
                    <button type="button" class="btn btn-outline-danger btn-sm" id="btn_cari" style="margin-right: 5px;"><i class="fas fa-caret-square-left"></i> Kembali Ke Periode Saat Ini</button>
                </a>
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
                            <b>Daftar Kelompok</b>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel_perusahaan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Perusahaan</th>
                                    <th>Pendaftar</th>
                                    <th>Status</th>
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
<div class="modal fade" id="modal_nilai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_dataLabel">Penilaian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_nilai">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col"><p><b>Perusahaan </b></p></div>
                            <div class="col-auto"><b>:</b></div>
                            <div class="col"><p id="nama"></p></div>
                            <div class="col-auto">
                                <p></p>
                            </div>
                            <div class="col"><p><b>Email</b></p></div>
                            <div class="col-auto"><b>:</b></div>
                            <div class="col"><p id="email"></p></div>
                        </div>
                        <div class="row">
                            <div class="col"><p><b>Alamat</b></p></div>
                            <div class="col-auto"><b>:</b></div>
                            <div class="col"><p id="alamat"></p></div>
                            <div class="col-auto">
                                <p></p>
                            </div>
                            <div class="col"><p><b>No. Telp</b></p></div>
                            <div class="col-auto"><b>:</b></div>
                            <div class="col"><p id="notelp"></p></div>
                        </div>
                        <div class="row">
                            <div class="col"><p><b></b></p></div>
                            <div class="col-auto"><b></b></div>
                            <div class="col"><p></p></div>
                            <div class="col-auto">
                                <p></p>
                            </div>
                            <div class="col"><p><b></b></p></div>
                            <div class="col-auto"><b></b></div>
                            <div class="col"><p></p></div>
                        </div>
                        <table id="tabel_kelompok" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th >No</th>
                                    <th >Nama</th>
                                    <th>Email</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_simpan" class="btn btn-primary">Simpan</button>
            </div>
                </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_cari" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_dataLabel">Cari Periode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_cari">
                @csrf
                    {{-- <input type="hidden" name="id_periode"> --}}
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Periode</label>
                            <div class="col-sm-8">
                                <select class="form-control select-periode-modal" name="id_periode">
                                    @foreach($list_periode as $i)
                                        <option value="{{ $i->id }}">{{ $i->nama_periode." - ".text_date($i->tglmulai) ." - ".text_date($i->tglselesai) }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" id="btn_cari_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_cari_simpan" class="btn btn-primary">Cari</button>
            </div>
                </form>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function () {
    id = $('[name=cek]').val();
    tb = $('#tabel_perusahaan').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        // "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,

        ajax: "{{ url('admin_penilaian/get_data') }}"+"/"+id,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'pendaftar', name: 'pendaftar'},
            {data: 'status', name: 'status'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [0,2,3,4] },
        ],
    });

});
function kelompok(id,periode){
    tb2 = $('#tabel_kelompok').DataTable({
        // processing: true,
        // serverSide: true,
        paging: false,
        "lengthChange": false,
        searching: false,
        "ordering": false,
        "info": false,
        "autoWidth": false,
        "responsive": true,
        ajax: "{{ url('admin_penilaian/get_kelompok') }}"+"/"+id+"/"+periode,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'nama_kelas', name: 'nama_kelas'},
            {data: 'action', name: 'action', orderable: true, searchable: true},
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [0,4] },
        ],
    });
}
$("#modal_nilai").on("hidden.bs.modal", function(){
    $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
    tb2.destroy();
});
$('body').on('click', '#btn_modal_nilai', function () {
    var id = $(this).data('id');
    var periode = $(this).data('periode');
    $("#modal_nilai").modal("show");
    $.get("{{ url('admin_penilaian/get_perusahaan') }}"+'/'+id, function (data) {
        $('#nama').html(data.nama);
        $('#alamat').html(data.alamat);
        $('#email').html(data.email);
        $('#notelp').html(data.no_telp);
    });
    kelompok(id,periode);

});
$("#btn_simpan").click(function(){
    $.ajax({
        url: "{{ url('admin_penilaian/simpan')}} ",
        type:'POST',
        data: $("#form_nilai").serialize(),
        headers : {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function(respon){
            if(respon.status == 1 || respon.status == "1"){
                $("#modal_nilai").modal('hide');
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
$("#btn_cari").click(function(){
    $("#modal_cari").modal("show");
});
$("#btn_cari_simpan").click(function(){
    id = $('[name=id_periode]').val();
    window.location.href = "admin_penilaian/cari"+"/"+id;
});
</script>

@endsection
