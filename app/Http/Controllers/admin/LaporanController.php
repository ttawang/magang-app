<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    //
    public function index(){
        $data['judul'] = 'Laporan Kegiatan Kelompok';
        $data['periode'] = DB::table('periode')->where('status','on')->first();
        $data['list_periode'] = DB::table('periode')->where('status','!=','on')->orderBy('id','desc')->get();

        return view('admin.kelompok-list',$data);
    }
}
