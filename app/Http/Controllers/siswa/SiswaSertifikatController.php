<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiswaSertifikatController extends Controller
{
    //
    public function index(){
        $periode = DB::table('periode')->where('status','on')->orderBy('created_at')->pluck('id');

    }
    public function cetak(){

    }
}
