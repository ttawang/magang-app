@extends('layouts.app')

@section('content')
<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">

              {{-- <h5> Periode : {{ $periode->nama_periode }}</h5>
                <h5>{{ text_date($periode->tglmulai) ." - ".text_date($periode->tglselesai) }}</h5><br> --}}
                <div class="row">
                    @if ((count_date(now_date(),$periode->tglmulai) <= 0) && (count_date(now_date(),$periode->tglselesai) >= 0))
                    <div class="col"><h5 class="text-success"><b>Periode Sedang Berlangsung</b></h5></div>
                    @elseif (count_date(now_date(),$periode->tglmulai) >= 0)
                    <div class="col"><h5 class="text-warning"><b>Periode Akan Berlangsung</b></h5></div>
                    @else
                    <div class="col"><h5 class="text-danger"><b>Periode Telah Selesai</b></h5></div>
                    @endif
                    <div class="col-auto"><b></b></div>
                    <div class="col"><h5></h5></div>
                    <div class="col-auto">
                        <h5></h5>
                    </div>
                    <div class="col"><p><b></b></p></div>
                    <div class="col-auto"><b></b></div>
                    <div class="col"><p></p></div>
                </div>
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
                <a href="{{ url('admin_kelompok') }}">
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
                            <i class="mr-1"></i>Daftar Kelompok

                        </div>
                    </div>
                    <div class="card-body">
                        <table id="tabel_perusahaan" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kelompok Perusahaan</th>
                                    <th>Email</th>
                                    <th>No Telp</th>
                                    <th>Alamat</th>
                                    <th>Pendaftar</th>
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
<div class="modal fade" id="modal_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_dataLabel">Tambah Data Perusahaan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <p class="col-sm-3 text-secondary"><b>Perusahaan :</b></p>
                                <div class="col-sm-8">
                                    <p class="text-secondary text-justify" id="nama"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <p class="col-sm-3 text-secondary"><b>Email :</b></p>
                                <div class="col-sm-8">
                                    <p class="text-secondary text-justify" id="email"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <p class="col-sm-3 text-secondary"><b>No. Telp :</b></p>
                                <div class="col-sm-8">
                                    <p class="text-secondary text-justify" id="no_telp"></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <p class="col-sm-3 text-secondary"><b>Alamat :</b></p>
                                <div class="col-sm-8">
                                    <p class="text-secondary text-justify" id="alamat"></p>
                                </div>
                            </div>
                        </div>
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
            <div class="modal-footer">
                <button type="button" id="btn_close" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_acc" data-id="" class="btn btn-primary">Konfirmasi Pendaftaran</button>
                <button type="button" id="btn_batal" data-id="" class="btn btn-warning">Batal Konfirmasi</button>
            </div>
                </form>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function () {
    //MENAMPILKAN DATA DENGAN DATATABLES
    id_periode = $('[name=cek]').val();
    var tb = $('#tabel_perusahaan').DataTable({
        processing: true,
        serverSide: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        // "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        ajax: "{{ url('admin_kelompok/get_data_cari') }}"+"/"+id_periode,
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'email', name: 'email'},
            {data: 'no_telp', name: 'no_telp'},
            {data: 'alamat', name: 'alamat'},
            {data: 'pendaftar', name: 'pendaftar'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ],
        // columnDefs: [
        //     { className: 'text-right', targets: [] },
        //     { className: 'text-center', targets: [5,6] },
        //     // { width:500, target:[0]},
	    // ],
        // "order": [[ 6, "asc" ]],
        // "rowCallback": function( row, data ) {
        //     if ( data.pendaftar == 0 ) {
        //         $(row).hide();
        //     }
        // }

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
            ajax: "{{ url('admin_kelompok/get_data_kelompok') }}"+"/"+id+"/"+periode,
            columns: [
                {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                {data: 'nama', name: 'nama'},
                {data: 'email', name: 'email'},
                {data: 'nama_kelas', name: 'nama_kelas'},{data: 'action', name: 'action', orderable: true, searchable: true},
            ],
            columnDefs: [
                { className: 'text-right', targets: [] },
                { className: 'text-center', targets: [0,4] },
            ],
        });
        $('body').on('click', '#btn_hapus_siswa', function () {
            Swal.fire({
            title: 'Data siswa akan dihapus !',
            text: "Data yang telah dihapus tidak dapat dikembalikan",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
            }).then((result) => {
                if (result.isConfirmed) {
                    var id = $(this).data('id');
                    var periode = $(this).data('periode');
                    $.get("{{ url('admin_kelompok/hapus_siswa') }}"+'/'+id);
                    Swal.fire({
                        title: 'Deleted!',
                        text: 'Data telah dihapus.',
                        type: "success"
                    }).then((result) => {
                        $("#modal_data").modal("hide");
                        tb2.ajax.reload();
                        tb.ajax.reload();
                    })
                }
            })
        });
    }
    $("#modal_data").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".select-cari-modal").val(0).trigger('change') ;
        tb2.destroy();
    });
    $("#modal_cari").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".select-cari-modal").val(0).trigger('change') ;
    });

    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_data").modal("show");
    });
    $("#btn_cari").click(function(){
        $("#modal_cari").modal("show");
    });

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_konfirmasi', function () {
        var id = $(this).data('id');
        var periode = $(this).data('periode');
        $('#btn_acc').show();
        $('#btn_batal').hide();

        $.get("{{ url('admin_kelompok/show') }}"+'/'+id, function (data) {
            $("#modal_data").modal("show");
            // $('[name=id]').val(data.id);
            $('#nama').html(data.nama);
            $('#email').html(data.email);
            $('#no_telp').html(data.no_telp);
            $('#alamat').html(data.alamat);
            $('#btn_acc').data('id',data.id).data('periode',periode);
        });
        kelompok(id,periode);

    });
    $('body').on('click', '#btn_batal_konfirmasi', function () {
        var id = $(this).data('id');
        var periode = $(this).data('periode');
        $('#btn_acc').hide();
        $('#btn_batal').show();

        $.get("{{ url('admin_kelompok/show') }}"+'/'+id, function (data) {
            $("#modal_data").modal("show");
            // $('[name=id]').val(data.id);
            $('#nama').html(data.nama);
            $('#email').html(data.email);
            $('#no_telp').html(data.no_telp);
            $('#alamat').html(data.alamat);
            $('#btn_batal').data('id',data.id).data('periode',periode);
        });
        kelompok(id,periode);

    });
    $('body').on('click', '#btn_acc', function () {
        var id = $(this).data('id');
        var periode = $(this).data('periode');
        $.get("{{ url('admin_kelompok/konfirmasi') }}"+'/'+id+"/"+periode);
        $("#modal_data").modal('hide');
        tb.ajax.reload();
    });
    $('body').on('click', '#btn_batal', function () {
        var id = $(this).data('id');
        var periode = $(this).data('periode');
        $.get("{{ url('admin_kelompok/batal_konfirmasi') }}"+'/'+id+"/"+periode);
        $("#modal_data").modal('hide');
        tb.ajax.reload();
    });

    $('body').on('click', '#btn_hapus', function () {
        Swal.fire({
        title: 'Data akan dihapus !',
        text: "Data yang telah dihapus tidak dapat dikembalikan",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $(this).data('id');
                var periode = $(this).data('periode');
                $.get("{{ url('admin_kelompok/hapus') }}"+'/'+id+"/"+periode);
                Swal.fire({
                    title: 'Deleted!',
                    text: 'Data telah dihapus.',
                    type: "success"
                }).then((result) => {
                    tb.ajax.reload();
                })
            }
        })
    });
    $('.select-periode-modal').select2({
        theme: 'bootstrap4',
        dropdownParent : $('#modal_cari'),
    });

});
$("#btn_cari_simpan").click(function(){
    id = $('[name=id_periode]').val();
    window.location.href = id;
});

$('body').on('click', '#btn_detail', function () {
    var id = $(this).data('id');
    var periode = $(this).data('periode');
    // window.location.href = "/admin_kelompok/detail"+"/"+id+"/"+periode;
    window.open("/admin_kelompok/detail"+"/"+id+"/"+periode, '_blank');
});

</script>


@endsection
