<?php

use Carbon\Carbon;

function penyebut($nilai) {
    $nilai = abs($nilai);
    $huruf = array("Nol", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
    $temp = "";
    if ($nilai < 12) {
        $temp = " ". $huruf[$nilai];
    } else if ($nilai <20) {
        $temp = penyebut($nilai - 10)." Belas";
    } else if ($nilai < 100) {
        $temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
    } else if ($nilai < 200) {
        $temp = " Seratus" . penyebut($nilai - 100);
    } else if ($nilai < 1000) {
        $temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
    } else if ($nilai < 2000) {
        $temp = " Seribu" . penyebut($nilai - 1000);
    } else if ($nilai < 1000000) {
        $temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
    } else if ($nilai < 1000000000) {
        $temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
    } else if ($nilai < 1000000000000) {
        $temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
    } else if ($nilai < 1000000000000000) {
        $temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
    }
    return $temp;
}

function terbilang($nilai) {
    if($nilai<0) {
        $hasil = "Minus ". trim(penyebut($nilai));
    } else {
        $hasil = trim(penyebut($nilai));
    }
    return $hasil;
}
function db_date($date){
    $convert = Carbon::createFromFormat('d/m/Y',  $date)->format('Y-m-d');
    return $convert;
}
function blade_date($date,$style){
    if($style === 'd/m/Y'){
        $convert = Carbon::createFromFormat('Y-m-d',  $date)->format('d/m/Y');
    }else if($style == 'd-m-Y'){
        $convert = Carbon::createFromFormat('Y-m-d',  $date)->format('d-m-Y');
    }else{
        $convert = $date;
    }
    return $convert;
}
function now_date_full(){
    $date = Carbon::now();
    return $date;
}
function now_date()
{
    $dt = Carbon::now();
    return $dt->toDateString();
}
function text_date($string){
    // contoh : 2019-01-30 10:20:20

    $bulanIndo = ['', 'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September' , 'Oktober', 'November', 'Desember'];

    $date = explode(" ", $string)[0];
    // $time = explode(" ", $string)[1];

    $tanggal = explode("-", $date)[2];
    $bulan = explode("-", $date)[1];
    $tahun = explode("-", $date)[0];

    // return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun . " " . $time;
    return $tanggal . " " . $bulanIndo[abs($bulan)] . " " . $tahun;
}
function count_date($date1, $date2)
{
    $date1_ts = strtotime($date1);
    $date2_ts = strtotime($date2);
    $diff = $date2_ts - $date1_ts;
    return round($diff / 86400);
}
