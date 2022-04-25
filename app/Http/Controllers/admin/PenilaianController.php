<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class PenilaianController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Penilaian';
        $data['periode'] = DB::table('periode')->where('status','on')->first();
        $data['list_periode'] = DB::table('periode')->where('status','!=','on')->orderBy('id','desc')->get();
        $data['jumlahkelompok'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->groupBy('id_perusahaan')->get()->count();
        $data['jumlahsiswa'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->count();

        return view('admin.penilaian-list',$data);
    }
    public function cari($id){
        $data['judul'] = 'Cari Kelompok';
        $data['periode'] = DB::table('periode')->where('id',$id)->first();
        $data['list_periode'] = DB::table('periode')->where('status','!=','on')->where('id','!=',$id)->orderBy('id','desc')->get();
        $data['jumlahkelompok'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->groupBy('id_perusahaan')->get()->count();
        $data['jumlahsiswa'] = DB::table('kelompok')->where('id_periode',$data['periode']->id)->count();

        return view('admin.penilaian-list-cari',$data);
    }
    public function get_data($id)
    {
        if($id == 0){
            $periode = DB::table('periode')->where('status','on')->orderBy('created_at')->pluck('id');
        }else{
            $periode = $id;
        }

        $data = DB::table('kelompok as k')
        ->join('perusahaan as p','p.id','k.id_perusahaan')->join('periode as pe','pe.id','k.id_periode')
        ->where('k.id_periode',$periode)
        ->where('k.konfirmasi','yes')
        ->groupBy('k.id_perusahaan')
        ->selectRaw('
            k.id_perusahaan id,
            k.id_periode,
            pe.tglmulai,
            pe.tglselesai,
            p.nama,
            count(*) pendaftar
        ')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('status', function($row){
                $jum = $row->pendaftar - DB::table('kelompok')->where([['id_perusahaan',$row->id],['id_periode',$row->id_periode],['nilai','!=',null]])->count();
                if($jum == 0){
                    $st = '<span class="badge bg-success">Sudah Dinilai</span>';
                }elseif($jum > 0 && $jum < $row->pendaftar){
                    $st = '<span class="badge bg-warning">Dinilai Sebagian</span>';
                }else{
                    $st = '<span class="badge bg-danger">Belum Dinilai</span>';
                }
                return $st;

            })
            ->addColumn('action', function($row){
                $btn = '';
                if((count_date(now_date(),$row->tglmulai) <= 0) && (count_date(now_date(),$row->tglselesai) >= 0)){
                    $btn .= '<button type="button" class="edit btn btn-info btn-sm" id="btn_modal_nilai" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Beri Penilaian" disabled><i class="fas fa-pen-nib"></i></button>';
                }elseif(count_date(now_date(),$row->tglmulai) >= 0){
                    $btn .= '<button type="button" class="edit btn btn-info btn-sm" id="btn_modal_nilai" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Beri Penilaian" disabled><i class="fas fa-pen-nib"></i></button>';
                }else{
                    $btn .= '<button type="button" class="edit btn btn-info btn-sm" id="btn_modal_nilai" data-id="'.$row->id.'" data-periode="'.$row->id_periode.'" data-toggle="tooltip" data-placement="top" title="Beri Penilaian"><i class="fas fa-pen-nib"></i></i></button>';
                }

                return $btn;
            })
            ->addColumn('pendaftar', function($row){
                $sisakuota = $row->pendaftar;

                return $sisakuota;
            })
            ->rawColumns(['action','status','pendaftar'])
            ->make(true);
    }
    public function simpan(Request $req)
    {
        $nilai = $req->get('nilai');
        foreach($nilai as $i => $val){
            DB::table('kelompok')->where('id_kelompok',$i)->update(['nilai' => $val]);
        }
        return response()->json(['status' => '1']);
    }
    public function get_perusahaan($id){
        $data = DB::table('perusahaan')->where('id',$id)->first();

        return response()->json($data);
    }
    public function get_kelompok($id,$periode){
        $data = DB::table('kelompok as kel')
            ->where('kel.id_periode',$periode)
            ->join('siswa as s','kel.id_user','s.id_user')
            ->join('users as u','kel.id_user','u.id')
            ->join('periode as p','p.id','kel.id_periode')
            ->leftjoin('kelas as k','s.id_kelas','k.id')
            ->select(DB::raw('
                kel.id_kelompok,
                kel.nilai,
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
                $val = ['A','B','C','D','E'];
                $btn = '<select class="form-control select-periode-modal" name="nilai['.$row->id_kelompok.']">';
                $btn .= '<option value="">Pilih Nilai</option>';
                foreach($val as $i){
                    if($row->nilai == $i){
                        $btn .= '<option value="'.$i.'" selected>'.$i.'</option>';
                    }else{

                        $btn .= '<option value="'.$i.'">'.$i.'</option>';
                    }

                }
                $btn .= '</select>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }


}
