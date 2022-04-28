@extends('layouts.app')

@section('content')

<div class="content-header" style="padding-bottom: 3px;">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">

                @if (!$akun)
                <div class="callout callout-info">
                    <h5><i class="fas fa-info"></i> Perhatian</h5>
                    Anda belum mendaftar prakerin. <br><br>
                    <a href="{{ url('siswa_perusahaan') }}"><button type="button" class="btn btn-sm btn-info" id="" style="margin-right: 5px;"><i class="fas fa-building"></i></i> Daftar Prakerin</button></a>
                </div>
                @else
                    @if ($akun->nilai != null)
                    <div class="callout callout-success">
                        <h5><i class="fas fa-info"></i> Selamat</h5>
                        Anda telah lulus prakerin, silahkan cetak sertifikat anda. <br><br>
                        <a href="{{ url('siswa_sertifikat/cetak') }}" target="_blank"><button type="button" class="btn btn-sm btn-success" id="btn_cetak_laporan" style="margin-right: 5px;"><i class="fas fa-print"></i></i> Cetak Sertifikat</button></a>
                    </div>
                    @else
                    <div class="callout callout-warning">
                        <h5><i class="fas fa-info"></i> Perhatian</h5>
                        Anda belum lulus prakerin, cetak sertifikat belum dapat dilakukan. <br><br>
                    </div>
                    @endif

                @endif

          </div>
        </div>
      </div>
</div>

@endsection
