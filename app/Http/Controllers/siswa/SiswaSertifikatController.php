<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiswaSertifikatController extends Controller
{
    //
    public function index(){
        $akun = DB::table('kelompok')->where('id_user',Auth::user()->id)->first();
        $data['akun'] = $akun;

        $data['judul'] = 'Sertifikat';

        return view('siswa.sertifikat',$data);
    }
    public function cetak(){
        $temp = DB::table('kelompok as k')
        ->join('users as u','u.id','k.id_user')
        ->join('perusahaan as p','p.id','k.id_perusahaan')
        ->selectRaw('
            u.name nama_siswa,
            p.nama nama_perusahaan,
            k.nilai
        ')
        ->where('k.id_user',Auth::user()->id)->orderBy('k.id_kelompok','desc')
        ->first();
        // dd($data);
        $data = [
            'nama_siswa' => $temp->nama_siswa,
            'nama_perusahaan' => $temp->nama_perusahaan,
            'nilai' => $temp->nilai

        ];

        $pdf = PDF::loadView('siswa.sertifikat-cetak',['data'=>$data]);

        return $pdf->stream('Sertifikat - '.$temp->nama_siswa.' - '.$temp->nama_perusahaan.'.pdf');

    }
}
