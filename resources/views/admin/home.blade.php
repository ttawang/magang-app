@extends('layouts.app')

@section('content')
<style type="text/css">
	.datepicker {
	    z-index: 9999 !important;
	}
</style>
<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Perhatian:</h5>
              @if (!$periode)
                @if (Auth::user()->role == 'admin')
                    Periode belum ditambahkan. Harap tambahkan periode terlebih dahulu. <br>
                    <button type="button" class="btn btn-sm btn-info" id="btn_tambah_periode" style="margin-right: 5px;"><i class="far fa-calendar-plus"></i> Tambah Periode</button>
                @else
                    Periode belum ditambahkan.
                @endif
              @else
                Harap laksanakan prakerin sesuai tanggal yang telah ditentukan.
              @endif
            </div>

            @if ($periode)
                @if ($detail)
                <div class="invoice p-3 mb-3" id="periode">
                    <div class="row">

                    </div>
                    <div class="row invoice-info">
                        <div class="col-sm-8 invoice-col">
                            <address>
                                <h1><b>Selamat Datang </b></h1><br>
                                <h1>{{ $detail->nama_siswa }}</h1>
                                <h5 class="text-success "><b>Anda telah mendaftar prakerin pada {{ $detail->nama_periode }}</b></h5>
                                <div class="row">
                                    <div class="col"><b> Nama Perusahaan </b></div>
                                    <div class="col-auto"><b>:</b></div>
                                    <div class="col">{{ $detail->nama_perusahaan }}</div>

                                    <div class="col"><p><b></b></p></div>
                                    <div class="col-auto"><b></b></div>
                                    <div class="col"><p> </p></div>
                                </div>
                                <div class="row">
                                    <div class="col"><b> Email Perusahaan </b></div>
                                    <div class="col-auto"><b>:</b></div>
                                    <div class="col">{{ $detail->email }}</div>

                                    <div class="col"><p><b></b></p></div>
                                    <div class="col-auto"><b></b></div>
                                    <div class="col"><p></p></div>
                                </div>
                                <div class="row">
                                    <div class="col"><b> No.Telp Perusahaan </b></div>
                                    <div class="col-auto"><b>:</b></div>
                                    <div class="col">{{ $detail->no_telp }}</div>

                                    <div class="col"><p><b></b></p></div>
                                    <div class="col-auto"><b></b></div>
                                    <div class="col"><p></p></div>
                                </div>
                            </address>
                        </div>

                      <div class="col-sm-4 invoice-col">
                        <address>
                            <br><br>
                            <strong>Tanggal Dimulai:</strong><br>
                            <h1>{{ text_date($detail->tglmulai) }}</h1><br>
                            <strong>Tanggal Berakhir:</strong><br>
                            <h1>{{ text_date($detail->tglselesai) }}</h1><br>
                        </address>
                      </div>
                    </div>
                  </div>
                @endif
            <!-- Main content -->
            <div class="invoice p-3 mb-3" id="periode">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="far fa-calendar-alt"></i> Periode Prakerin Berlangsung
                    <input type="hidden" name="id" value="{{ ($periode != null) ? $periode->id : '' }}">
                    {{-- <small class="float-right">Date: 2/10/2014</small> --}}
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  <address>
                      <br>
                      <strong>Tanggal Dimulai:</strong><br>
                      <h1>{{ text_date($periode->tglmulai) }}</h1><br>
                      <strong>Tanggal Berakhir:</strong><br>
                      <h1>{{ text_date($periode->tglselesai) }}</h1><br>
                      {{-- <code class="">Harap laksanakan prakerin sesuai tanggal yang telah ditentukan</code> --}}
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <br>
                  <address>
                    <strong>Contact us:</strong><br>
                    Jl. Kusuma Bangsa No.48<br>
                    Malang, Jawa Timur<br>
                    <b>Phone:</b> (555) 539-1037<br>
                    <b>Email:</b> john.doe@example.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  <b>Durasi Prakerin:</b><br>
                  <h1>{{ count_date($periode->tglmulai,$periode->tglselesai) }} Hari</h1>
                  <br>
                  <b>Durasi Tersisa:</b>
                    @if (count_date(now_date(),$periode->tglselesai) < 0)
                        <h1 class="text-danger">Periode telah selesai</h1>
                    @elseif(count_date(now_date(),$periode->tglselesai) == 0)
                        <h1 class="text-danger">Hari terakhir</h1>
                    @else
                        <h1 class="text-danger">{{ count_date(now_date(),$periode->tglselesai) }} Hari</h1>
                    @endif
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->


              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                    @if (Auth::user()->role == "admin")
                        <button type="button" id="btn_akhiri" class="btn btn-danger float-right" style="margin-right: 5px;"><i class="far fa-clock"></i> Akhiri Periode</button>
                        <button type="button" id="btn_mulaibaru" class="btn btn-warning float-right" style="margin-right: 5px;"><i class="far fa-clock"></i> Mulai Periode Baru</button>
                        <button type="button" id="btn_edit" class="btn btn-success float-right" style="margin-right: 5px;"><i class="far fa-credit-card"></i> Edit Periode</button>
                    @endif
                </div>
              </div>
            </div>
            @endif
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div>
</div>
<div class="content" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Chart Perusahaan</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> --}}
              </div>
            </div>
            <div class="card-body">
              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="chartperusahaan" height="200" width="600"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

</div>
<div class="content" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="card card-info">
            <div class="card-header">
              <h3 class="card-title">Chart Periode</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                  <i class="fas fa-minus"></i>
                </button>
                {{-- <button type="button" class="btn btn-tool" data-card-widget="remove">
                  <i class="fas fa-times"></i>
                </button> --}}
              </div>
            </div>
            <div class="card-body">
              <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                <canvas id="chartperiode" height="200" width="600"></canvas>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
    </div>

</div>

<div class="modal fade" id="modal_tambah_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal_tambah_dataLabel">Tambah Data Periode</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" id="form_tambah">
                @csrf
                    <input type="hidden" name="id" value="{{ ($periode != null) ? $periode->id : '' }}">
                    <input type="hidden" name="mulaibaru">
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Nama Periode</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_periode" placeholder="Nama Periode"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Tanggal Mulai</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datetimepicker-input datepick" data-toggle="datetimepicker" data-target="datepick" name="tglmulai"/>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label text-secondary">Tanggal Akhir</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control datetimepicker-input datepick" data-toggle="datetimepicker" data-target="datepick" name="tglselesai"/>
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
    chartperusahaan();
    chartperiode();
    var id = $("[name=id]");
    $("#modal_tambah_data").on("hidden.bs.modal", function(){
        $('[name=nama_periode]').val('');
        $('[name=tglmulai]').val(now_date());
        $('[name=tglselesai]').val(now_date());
    });
    $("#btn_tambah_periode").click(function(){
        $("#modal_tambah_data").modal("show");
    });
    $('body').on('click', '#btn_mulaibaru', function () {
        $('[name=mulaibaru]').val('yes');
        $("#modal_tambah_data").modal("show");
    });
    $('body').on('click', '#btn_akhiri', function () {
        Swal.fire({
        title: 'Akhiri Peridode',
        text: "Anda yakin akan mengakhiri periode ?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Akhiri'
        }).then((result) => {
            if (result.isConfirmed) {
                var id = $('[name=id]').val();
                $.get("{{ url('home/akhiri') }}"+'/'+id);
                Swal.fire({
                    title: 'Berhasil Mengakhiri',
                    text: 'Periode telah diakhiri, masukkan periode baru untuk memulai',
                    icon: "success"
                }).then((result) => {
                    location.reload();
                })
            }
        })
    });
    $('body').on('click', '#btn_edit', function () {
        var id = $("[name=id]").val();
        $.get("{{ url('home/edit') }}"+'/'+id, function (data) {
            $('[name=id]').val(data.id);
            $('[name=tglmulai]').val(formattanggal(data.tglmulai));
            $('[name=tglselesai]').val(formattanggal(data.tglselesai));
            $('[name=nama_periode]').val(data.nama_periode);
            $("#modal_tambah_data").modal("show");
        })
    });
    $("#btn_simpan").click(function(){
        $.ajax({
            url: "{{ url('home/simpan')}} ",
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
                        icon: "success"
                    }).then((result) => {
                        location.reload();
                    })
				}else{
                    Swal.fire({
                        title: 'Gagal',
                        text: 'Data gagal diperbarui.',
                        icon: "error"
                    }).then((result) => {
                        location.reload();
                    })
				}
			}
        });
    });

});
    function chartperiode(){
        var url = "{{url('home/chartperiode')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();

        $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.nama_periode);
                Labels.push(data.jumlah);
                Prices.push(data.jumlah);
            });
            var ctx = $('#chartperiode').get(0).getContext('2d')
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Years,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: Prices,
                        borderWidth: 1,
                        backgroundColor: "rgba(154, 208, 236)"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                },

            });
        });
    }
    function chartperusahaan(){
        var url = "{{url('home/chartperusahaan')}}";
        var Years = new Array();
        var Labels = new Array();
        var Prices = new Array();

        $.get(url, function(response){
            response.forEach(function(data){
                Years.push(data.nama_perusahaan);
                Labels.push(data.jumlah);
                Prices.push(data.jumlah);
            });
            var ctx = $('#chartperusahaan').get(0).getContext('2d')
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Years,
                    datasets: [{
                        label: 'Jumlah Siswa',
                        data: Prices,
                        borderWidth: 1,
                        backgroundColor: "rgba(154, 208, 236)"
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                },

            });
        });
    }

</script>
@endsection
