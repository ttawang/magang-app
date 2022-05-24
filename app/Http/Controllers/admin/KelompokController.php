<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class KelompokController extends Controller
{
    //
    public function index(){
        $data['judul'] = 'Kelompok';
        $data['periode'] = DB::table('periode')->where('status','on')->first();
        $data['list_periode'] = DB::table('periode')->where('status','!=','on')->orderBy('id','desc')->get();
        if($data['periode']){
            $data['jumlahkelompok'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->groupBy('id_perusahaan')->get()->count();
            $data['jumlahsiswa'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->count();
        }else{
            $data['jumlahkelompok'] = 0;
            $data['jumlahsiswa'] = 0;
        }


        return view('admin.kelompok-list',$data);
    }
    public function cari($id){
        $data['judul'] = 'Cari Kelompok';
        $data['periode'] = DB::table('periode')->where('id',$id)->first();
        $data['list_periode'] = DB::table('periode')->where('status','!=','on')->where('id','!=',$id)->orderBy('id','desc')->get();
        $data['jumlahkelompok'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->groupBy('id_perusahaan')->get()->count();
        $data['jumlahsiswa'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->count();

        return view('admin.kelompok-list-cari',$data);
    }
    public function get_data()
    {
        $cek = DB::table('periode')->where('status','on')->orderBy('created_at')->first();
        if($cek){
            $periode = $cek->id;
        }else{
            $periode = 0;
        }

        $data = DB::table('kelompok as k')
        ->join('perusahaan as p','p.id','k.id_perusahaan')->join('periode as pe','pe.id','k.id_periode')
        ->where('k.id_periode',$periode)
        ->groupBy('k.id_perusahaan')
        ->selectRaw('
            k.id_perusahaan id,
            k.id_periode,
            pe.tglmulai,
            k.konfirmasi,
            p.nama,
            p.email,
            p.no_telp,
            p.alamat,
            p.recommended,
            p.kuota,
            count(*) pendaftar
        ')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $kelompok = DB::table('kelompok')->where('id_periode',$row->id_periode)->where('id_perusahaan',$row->id)->first();
                $durasi = count_date(now_date(),$row->tglmulai);
                if($kelompok->konfirmasi == "no"){
                    $actionBtn = '';
                    if($durasi >= 0){
                        $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_konfirmasi" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pendaftaran"><i class="fas fa-check"></i></button>';
                    }
                    $actionBtn .= '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>';
                    $actionBtn .= '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }else{
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_detail" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Detail Kelompok"><i class="far fa-clipboard"></i></button>';
                    if($durasi >= 0){
                        $actionBtn .= '<button type="button" class="edit btn btn-warning btn-sm" id="btn_batal_konfirmasi" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Batalkan Pendaftaran"><i class="fas fa-backward"></i></button>';
                    }
                    $actionBtn .= '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>';
                    $actionBtn .= '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }
                return $actionBtn;
            })
            ->addColumn('pendaftar', function($row){
                $sisakuota = $row->pendaftar;

                return $sisakuota;
            })
            ->rawColumns(['action','status','pendaftar'])
            ->make(true);
    }
    public function get_data_cari($id)
    {


        $data = DB::table('kelompok as k')
        ->join('perusahaan as p','p.id','k.id_perusahaan')
        ->join('periode as pe','pe.id','k.id_periode')
        ->where('k.id_periode',$id)
        ->groupBy('k.id_perusahaan')
        ->selectRaw('
            k.id_perusahaan id,
            k.id_periode,
            pe.tglmulai,
            k.konfirmasi,
            p.nama,
            p.email,
            p.no_telp,
            p.alamat,
            p.recommended,
            p.kuota,
            count(*) pendaftar
        ')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                // $periode = DB::table('periode')->where('status','on')->pluck('id');
                $kelompok = DB::table('kelompok')->where('id_periode',$row->id_periode)->where('id_perusahaan',$row->id)->first();
                $durasi = count_date(now_date(),$row->tglmulai);
                if($kelompok->konfirmasi == "no"){
                    if($durasi >= 0){
                        $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_konfirmasi" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pendaftaran"><i class="fas fa-check"></i></button>';
                    }
                    $actionBtn .= '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>';
                    $actionBtn .= '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }else{
                    $actionBtn = '<button type="button" class="edit btn btn-info btn-sm" id="btn_detail" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Detail Kelompok"><i class="far fa-clipboard"></i></button>';
                    if($durasi >= 0){
                        $actionBtn .= '<button type="button" class="edit btn btn-warning btn-sm" id="btn_batal_konfirmasi" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Batalkan Pendaftaran"><i class="fas fa-backward"></i></button>';
                    }
                    $actionBtn .= '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>';
                    $actionBtn .= '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }
                return $actionBtn;
            })
            ->addColumn('pendaftar', function($row){
                $sisakuota = $row->pendaftar;

                return $sisakuota;
            })
            ->rawColumns(['action','status','pendaftar'])
            ->make(true);
    }
    public function hapus($id,$periode){
        DB::table('kelompok')->where([['id_perusahaan',$id],['id_periode',$periode]])->delete();
    }
    public function konfirmasi($id,$periode){
        DB::table('kelompok')->where('id_periode', $periode)->where([['id_perusahaan',$id],['id_periode',$periode]])->update(["konfirmasi" => "yes"]);
    }
    public function batal_konfirmasi($id,$periode){
        DB::table('kelompok')->where('id_periode',$periode)->where([['id_perusahaan',$id],['id_periode',$periode]])->update(["konfirmasi" => "no"]);
    }
    public function get_data_kelompok($id,$periode){
        // $periode = DB::table('periode')->where('status','on')->pluck('id');
        $data = DB::table('kelompok as kel')->where('kel.id_periode',$periode)
            ->join('siswa as s','kel.id_user','s.id_user')
            ->join('users as u','kel.id_user','u.id')
            ->join('periode as p','p.id','kel.id_periode')
            ->leftjoin('kelas as k','s.id_kelas','k.id')
            ->select(DB::raw('
                kel.id_kelompok,
                p.id as id_periode,
                p.tglmulai,
                p.tglselesai,
                u.name nama,
                u.email email,
                k.nama nama_kelas
            '))
            ->where('kel.id_perusahaan',$id)
            ->orderBy('nama','asc')
            ->get();
            // dd($data);

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                if((count_date(now_date(),$row->tglmulai) <= 0) && (count_date(now_date(),$row->tglselesai) >= 0)){
                    $btn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_siswa" data-id="'.$row->id_kelompok.'" data-toggle="tooltip" data-placement="top" title="Hapus Siswa"><i class="fas fa-trash-alt"></i></button>';
                }elseif(count_date(now_date(),$row->tglmulai) >= 0){
                    $btn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_siswa" data-id="'.$row->id_kelompok.'" data-toggle="tooltip" data-placement="top" title="Hapus Siswa"><i class="fas fa-trash-alt"></i></button>';
                }else{
                    $btn = '<button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus_siswa" data-id="'.$row->id_kelompok.'" data-toggle="tooltip" data-placement="top" title="Hapus Siswa" disabled><i class="fas fa-trash-alt"></i></button>';
                }

                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
    public function hapus_siswa($id)
    {
        DB::table('kelompok')->where('id_kelompok',$id)->delete();
    }
    public function show($id){
        $data = DB::table('perusahaan')->where('id',$id)->first();

        return response()->json($data);
    }
    public function detail($id,$periode){

        $data['judul'] = "Detail Kelompok";
        $data['periode'] = $periode;
        $data['id'] = $id;
        $data['perusahaan'] = DB::table('perusahaan')->where('id',$id)->first();

        return view('admin.kelompok-detail',$data);
    }
    public function get_data_laporan($id,$periode){
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
        ->where('k.id_periode',$periode)->where('k.id_perusahaan',$id)
        ->orderBy('l.id')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tanggal', function($row){
                return blade_date($row->tanggal,'d/m/Y');
            })
            ->rawColumns(['tanggal'])
            ->make(true);
    }
}
