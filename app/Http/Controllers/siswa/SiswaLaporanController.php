<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;

class SiswaLaporanController extends Controller
{
    public function index()
    {
        $periode = DB::table('periode')->where('status','on')->pluck('id');
        $perusahaan = DB::table('kelompok')->where('id_periode',$periode)->where('id_user',Auth::user()->id)->pluck('id_perusahaan');
        if(count($perusahaan) >0){
            $data['kelompok'] = DB::table('kelompok as k')->selectRaw('u.name as nama,k.konfirmasi')->join('users as u','u.id','k.id_user')->where([['k.id_periode',$periode],['k.id_perusahaan',$perusahaan]])->get();
        }else{
            $data['kelompok'] = [];
        }

        // dd($data['kelompok']);
        $data['judul'] = 'Laporan Kegiatan';

        return view('siswa.laporan', $data);
    }
    public function get_data()
    {
        $periode = DB::table('periode')->where('status','on')->pluck('id') ?? [];
        $perusahaan = DB::table('kelompok')->where('id_periode',$periode)->where('id_user',Auth::user()->id)->pluck('id_perusahaan') ?? [];

        $data = DB::table('laporan_kegiatan as l')
        ->selectRaw('
        l.id,
        l.id_kelompok,
        l.anggota,
        l.tanggal,
        l.kegiatan,
        l.detail_kegiatan
        ')
        ->join('kelompok as k','k.id_kelompok','l.id_kelompok')
        ->where('k.id_periode',$periode)->where('k.id_perusahaan',$perusahaan)
        ->orderBy('l.id')->get();

       return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                return blade_date($row->tanggal,'d/m/Y');
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'"><i class="fas fa-pen"></i></button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>'.
                        '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                return $actionBtn;
            })
            ->rawColumns(['tanggal','action'])
            ->make(true);

        // dd($data);
    }
    public function simpan(Request $req)
    {
        $id = $req->get('id');
        $periode = DB::table('periode')->where('status','on')->pluck('id');
        $kelompok = DB::table('kelompok')->where([['id_user',Auth::user()->id],['id_periode',$periode]])->first('id_kelompok');
        $data['id_kelompok'] = $kelompok->id_kelompok;
        $data['anggota'] = implode(',',$req->get('anggota'));
        $data['tanggal'] = db_date($req->get('tanggal'));
        $data['kegiatan'] = $req->get('kegiatan');
        $data['detail_kegiatan'] = $req->get('detail_kegiatan');

        if($id == ''){
            $data['created_at'] = now_date_full();
            $data['updated_at'] = now_date_full();
            DB::table('laporan_kegiatan')->insert($data);
            return response()->json(['status' => '1']);
        }else if($id != ''){
            $data['updated_at'] = now_date_full();
            DB::table('laporan_kegiatan')->where('id',$id)->update($data);
            return response()->json(['status' => '1']);
        }else{
            return response()->json(['status' => '0']);
        }
    }
    public function edit($id)
    {
        $data = DB::table('laporan_kegiatan')->where('id',$id)->first();
        // dd($data);
        return response()->json($data);
    }
    public function cetak(){
        $periode = DB::table('periode')->where('status','on')->pluck('id') ?? [];
        $perusahaan = DB::table('kelompok')->where('id_periode',$periode)->where('id_user',Auth::user()->id)->pluck('id_perusahaan') ?? [];

        $data['data'] = DB::table('laporan_kegiatan as l')
        ->selectRaw('
        l.id,
        l.id_kelompok,
        l.anggota,
        l.tanggal,
        l.kegiatan,
        l.detail_kegiatan
        ')
        ->join('kelompok as k','k.id_kelompok','l.id_kelompok')
        ->where('k.id_periode',$periode)->where('k.id_perusahaan',$perusahaan)
        ->orderBy('l.id')->get();

        $pdf = PDF::loadView('siswa.laporan-cetak',$data);
        // return $pdf->output();
        return $pdf->stream('test.pdf');
        // return $pdf->download('test.pdf');

        // return view('siswa.laporan-cetak', $data);
    }
}
