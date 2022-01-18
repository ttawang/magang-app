<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;

class SiswaPerusahaanController extends Controller
{
    //
    public function index()
    {
        $cek = DB::table('kelompok')->where('id_user', Auth::user()->id)->count();

        $data['judul'] = 'Daftar Perusahaan';

        if($cek > 0){
            $data['perusahaan'] = DB::table('kelompok as k')
                                    ->join('perusahaan as p','k.id_perusahaan','p.id')
                                    // ->select(DB::raw('p.*'))
                                    ->where('id_user', Auth::user()->id)->first();
            $kuota = $data['perusahaan']->kuota;

            $data['sisakuota'] = $kuota - DB::table('kelompok')->where('id_perusahaan',$data['perusahaan']->id_perusahaan)->count();
            $data['periode'] = DB::table('periode')->where('status','on')->first();

            return view('siswa.perusahaan', $data);
        }else{
            $data['periode'] = DB::table('periode')->where('status','on')->first();

            return view('siswa.perusahaan-list', $data);
        }
    }
    public function get_data()
    {
        $data = DB::table('perusahaan')->orderBy('id','desc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                if($row->recommended == 1){
                    $status = '<span class="badge bg-success">Recommended</span>';
                }else{
                    $status = '<span class="badge bg-warning">Underated</span>';
                }

                return $status;
            })
            ->addColumn('action', function($row){
                $sisakuota = $row->kuota - DB::table('kelompok')->where('id_perusahaan',$row->id)->count();
                if($sisakuota < 1){
                    $actionBtn = '<button type="button" class="edit btn btn-danger btn-sm" disabled>Penuh</button>';
                }else{
                    $tglmulai = DB::table('periode')->where('status','on')->pluck('tglmulai')->first();

                    if(count_date(now_date(),$tglmulai) < 0){
                        $actionBtn = '<button type="button" class="edit btn btn-danger btn-sm" id="btn_daftar" data-id="'.$row->id.'" disabled>Daftar</button>'.
                        '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                    }else{
                        $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_daftar" data-id="'.$row->id.'">Daftar</button>'.
                        '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                    }
                }
                return $actionBtn;
            })
            ->addColumn('sisakuota', function($row){
                $sisakuota = $row->kuota - DB::table('kelompok')->where('id_perusahaan',$row->id)->count();

                return $sisakuota;
            })
            ->rawColumns(['action','status','sisakuota'])
            ->make(true);
    }
    public function daftarkelompok()
    {
        $cek = DB::table('kelompok')->where('id_user', Auth::user()->id)->pluck('id_perusahaan');
        $data = DB::table('kelompok as kel')
            ->join('siswa as s','kel.id_user','s.id_user')
            ->join('users as u','kel.id_user','u.id')
            ->leftjoin('kelas as k','s.id_kelas','k.id')
            ->select(DB::raw('
                s.*,kel.*,
                u.name nama,
                u.email email,
                k.nama nama_kelas
            '))
            ->where('id_perusahaan',$cek)
            ->orderBy('nama','asc')
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if(Auth::user()->id == $row->id_user){
                    $actionBtn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>'.
                    '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }else{
                    $actionBtn = '';
                }
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function daftar($id)
    {
        $periode = DB::table('periode')->where('status','on')->pluck('id')->first();

        $data['id_user'] = Auth::user()->id;
        $data['id_perusahaan'] = $id;
        $data['id_periode'] = $periode;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        DB::table('kelompok')->insert($data);
    }
    public function keluar($id)
    {
        DB::table('kelompok')->where('id_user', $id)->delete();
    }
}
