@extends('layouts.app')

@section('content')

<div class="content-header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">
                            <i class="mr-1"></i>Daftar Kelas
                        </div>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary" id="btn_tambah">Tambah</button>
                        <p>
                        <table id="tabel_kelas" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th width="5%">No</th>
                                    <th>Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th width="10%">Aksi</th>
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

<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Data Kelas</h5>
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
                            <label class="col-sm-4 col-form-label  text-secondary">Nama Kelas</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama" placeholder="Nama Kelas">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label  text-secondary">Wali Kelas</label>
                            <div class="col-sm-8">
                                <select class="form-control select-cari-modal" name="walikelas">
                                    <option value="0">-- Piih Wali Kelas --</option>
                                    @foreach ($guru as $i)
                                        <option value="{{ $i->id }}">{{ $i->name }}</option>
                                    @endforeach
                                </select>
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
    $("#modal_tambah_data").on("hidden.bs.modal", function(){
        $(this).find("input,textarea").val('').end().find("input[type=checkbox], input[type=radio]").prop("checked", "").end();
        $(".select-cari-modal").val(0).trigger('change') ;
    });

    //MENAMPILKAN DATA DENGAN DATATABLES
    var tb = $('#tabel_kelas').DataTable({
        processing: true,
        serverSide: false,
        responsive: true,
        "paging": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        ajax: "{{ url('admin_kelas/get_data') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nama', name: 'nama'},
            {data: 'nama_walikelas', name: 'nama_walikelas'},
            {data: 'action', name: 'action', orderable: true, searchable: true
            },
        ],
        columnDefs: [
            { className: 'text-right', targets: [] },
            { className: 'text-center', targets: [3] },
	    ],
    });

    //SHOW MODAL/FORM
    $("#btn_tambah").click(function(){
        $("#modal_tambah_data").modal("show");
    });

    //ShOW MODAL/FORM DENGAN GETTING DATA BERDASARKAN ID
    $('body').on('click', '#btn_edit', function () {
        var id = $(this).data('id');
        $.get("{{ url('admin_kelas/edit') }}"+'/'+id, function (data) {
            $("#modal_tambah_data").modal("show");
            $('[name=id]').val(data.id);
            $('[name=nama]').val(data.nama);
            $('[name=walikelas]').val(data.id_walikelas).trigger('change');
        })
    });

    //MELAKUKAN CONTROLLER SIMPAN
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('admin_kelas/simpan')}} ",
            type:'POST',
            data: $("#form_tambah").serialize(),
            headers : {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(respon){
				if(respon.status == 1 || respon.status == "1"){
					$("#modal_tambah_data").modal('hide');
                    Swal.fire({
                        title: 'Berhasil',
                        text: 'Data berhasil diperbarui.',
                        type: "success"
                    }).then((result) => {
                        tb.ajax.reload();
                    })
				}else if(respon.status == 2 || respon.status == "2"){
                    var values = '';
                    jQuery.each(respon.errors, function (key, value) {
                        values += value+"<br>"
                    });
                    Swal.fire({
                        title: "Perhatian !!",
                        icon: 'warning',
                        html: values,
                        timer: 5000,
                        showConfirmButton: false,
                        type: "error",
                        width: '300px'
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
                $.get("{{ url('admin_kelas/hapus') }}"+'/'+id);
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


});

</script>

@endsection
