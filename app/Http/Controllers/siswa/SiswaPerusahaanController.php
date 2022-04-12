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
        $periode = DB::table('periode')->where('status','on')->pluck('id');
        $cek = DB::table('kelompok')->where('id_user', Auth::user()->id)->where('id_periode',$periode)->count();

        $data['judul'] = 'Daftar Perusahaan';

        if($cek > 0){
            $data['perusahaan'] = DB::table('kelompok as k')
                                    ->where('id_periode',$periode)
                                    ->join('perusahaan as p','k.id_perusahaan','p.id')
                                    // ->select(DB::raw('p.*'))
                                    ->where('id_user', Auth::user()->id)->first();
            $kuota = $data['perusahaan']->kuota;

            $data['sisakuota'] = $kuota - DB::table('kelompok')->where('id_periode',$periode)->where('id_perusahaan',$data['perusahaan']->id_perusahaan)->count();
            $data['periode'] = DB::table('periode')->where('status','on')->first();

            return view('siswa.perusahaan', $data);
        }else{
            $data['periode'] = DB::table('periode')->where('status','on')->first();

            return view('siswa.perusahaan-list', $data);
        }
        // $periode = DB::table('periode')->where('status','on')->pluck('id');
        // $cek = DB::table('kelompok_detail as kd')->selectRaw('*')->join('kelompok as k','k.id','kd.id_kelompok')->join('siswa as s','s.id','kd.id_siswa')->join('users as u','u.id','s.id_user')->where([['k.id_periode',$periode],['u.id',Auth::user()->id]])->pluck('kd.id_kelompok');

        // $data['judul'] = 'Daftar Perusahaan';
        // if(count($cek) > 0){
        //     $data['perusahaan'] = DB::table('kelompok as k')
        //                             ->join('perusahaan as p','k.id_perusahaan','p.id')
        //                             // ->select(DB::raw('p.*'))
        //                             ->where('k.id', $cek)->first();

        //     $kuota = $data['perusahaan']->kuota;

        //     $data['sisakuota'] = $kuota - DB::table('kelompok_detail as kd')->join('kelompok as k', 'k.id','kd.id_kelompok')->where('kd.id_kelompok',$cek)->count();
        //     $data['periode'] = DB::table('periode')->where('status','on')->first();

        //     return view('siswa.perusahaan', $data);
        // }else{
        //     $data['periode'] = DB::table('periode')->where('status','on')->first();

        //     return view('siswa.perusahaan-list', $data);
        // }



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
                $periode = DB::table('periode')->where('status','on')->pluck('id');
                $sisakuota = $row->kuota - DB::table('kelompok')->where('id_perusahaan',$row->id)->where('id_periode',$periode)->count();
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
                $periode = DB::table('periode')->where('status','on')->pluck('id');
                $sisakuota = $row->kuota - DB::table('kelompok')->where('id_perusahaan',$row->id)->where('id_periode',$periode)->count();

                return $sisakuota;
            })
            ->rawColumns(['action','status','sisakuota'])
            ->make(true);

        // $data = DB::table('perusahaan')->orderBy('id','desc')->get();

        // return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('status', function($row){
        //         if($row->recommended == 1){
        //             $status = '<span class="badge bg-success">Recommended</span>';
        //         }else{
        //             $status = '<span class="badge bg-warning">Underated</span>';
        //         }

        //         return $status;
        //     })
        //     ->addColumn('action', function($row){
        //         $periode = DB::table('periode')->where('status','on')->pluck('id');
        //         $kelompok = DB::table('kelompok')->where([['id_periode',$periode],['id_perusahaan',$row->id]])->pluck('id');
        //         if(count($kelompok) < 1) {
        //             $anggota = 0;
        //         }
        //         else{
        //             $anggota = DB::table('kelompok_detail')->where('id_kelompok',$kelompok)->count();
        //         }
        //         $sisakuota = $row->kuota - $anggota;
        //         if($sisakuota < 1){
        //             $actionBtn = '<button type="button" class="edit btn btn-danger btn-sm" disabled>Penuh</button>';
        //         }else{
        //             $tglmulai = DB::table('periode')->where('status','on')->pluck('tglmulai')->first();

        //             if(count_date(now_date(),$tglmulai) < 0){
        //                 $actionBtn = '<button type="button" class="edit btn btn-danger btn-sm" id="btn_daftar" data-id="'.$row->id.'" disabled>Daftar</button>'.
        //                 '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
        //             }else{
        //                 $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_daftar" data-id="'.$row->id.'">Daftar</button>'.
        //                 '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
        //             }
        //         }
        //         return $actionBtn;
        //     })
        //     ->addColumn('sisakuota', function($row){
        //         $periode = DB::table('periode')->where('status','on')->pluck('id');
        //         $kelompok = DB::table('kelompok')->where([['id_periode',$periode],['id_perusahaan',$row->id]])->pluck('id');
        //         if(count($kelompok) < 1) {
        //             $anggota = 0;
        //         }
        //         else{
        //             $anggota = DB::table('kelompok_detail')->where('id_kelompok',$kelompok)->count();
        //         }
        //         $sisakuota = $row->kuota - $anggota;

        //         return $sisakuota;
        //     })
        //     ->rawColumns(['action','status','sisakuota'])
        //     ->make(true);
    }
    public function daftarkelompok()
    {
        $cek = DB::table('kelompok')->where('id_user', Auth::user()->id)->pluck('id_perusahaan');
        $periode = DB::table('periode')->where('status','on')->pluck('id');
        $data = DB::table('kelompok as kel')
            ->where('id_periode',$periode)
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



        // $periode = DB::table('periode')->where('status','on')->pluck('id');


        // $data = DB::table('kelompok_detail as kd')
        // ->selectRaw('u.id id_user, u.name nama, kl.nama nama_kelas, u.email')
        // ->join('siswa as s','s.id','kd.id_siswa')
        // ->join('users as u','u.id','s.id_user')
        // ->join('kelompok as k','k.id','kd.id_kelompok')
        // ->join('kelas as kl','kl.id','s.id_kelas')
        // ->where([['k.id_periode',$periode],['u.id',Auth::user()->id]])
        // ->get();

        // return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action', function($row){
        //         if(Auth::user()->id == $row->id_user){
        //             $actionBtn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>'.
        //             '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
        //         }else{
        //             $actionBtn = '';
        //         }
        //         return $actionBtn;
        //     })
        //     ->rawColumns(['action'])
        //     ->make(true);
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


        // $periode = DB::table('periode')->where('status','on')->pluck('id')->first();

        // $data['id_perusahaan'] = $id;
        // $data['id_periode'] = $periode;

        // $data['created_at'] = Carbon::now();
        // $data['updated_at'] = Carbon::now();

        // DB::table('kelompok')->insert($data);

        // $detail['id_kelompok'] = DB::table('kelompok')->where([['id_periode',$periode],['id_perusahaan',$id]])->pluck('id')->first();
        // $detail['id_siswa'] = DB::table('siswa as s')->join('users as u','u.id','s.id_user')->where('u.id', Auth::user()->id)->pluck('s.id')->first();
        // $detail['created_at'] = Carbon::now();
        // $detail['updated_at'] = Carbon::now();

        // DB::table('kelompok_detail')->insert($detail);
    }
    public function keluar($id)
    {
        $periode = DB::table('periode')->where('status','on')->pluck('id');
        DB::table('kelompok')->where('id_user', $id)->where('id_periode',$periode)->delete();
    }
}
