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
        $data['judul'] = 'Perusahaan';

        return view('admin.kelompok-list',$data);
    }
    public function get_data()
    {
        $data = DB::table('perusahaan')->orderBy('id','desc')->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $kelompok = DB::table('kelompok')->where('id_perusahaan',$row->id)->first();
                if($kelompok->konfirmasi == "no"){
                    $actionBtn =
                    '<button type="button" class="edit btn btn-info btn-sm" id="btn_konfirmasi" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Konfirmasi Pendaftaran"><i class="fas fa-check"></i>'.
                    '</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>'.
                    '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }else{
                    $actionBtn =
                    '<button type="button" class="edit btn btn-warning btn-sm" id="btn_batal_konfirmasi" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Batalkan Pendaftaran"><i class="fas fa-backward"></i>'.
                    '</button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'" data-toggle="tooltip" data-placement="top" title="Hapus Kelompok"><i class="fas fa-trash-alt"></i></button>'.
                    '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                }
                return $actionBtn;
            })
            ->addColumn('pendaftar', function($row){
                $sisakuota = DB::table('kelompok')->where('id_perusahaan',$row->id)->count();

                return $sisakuota;
            })
            ->rawColumns(['action','status','pendaftar'])
            ->make(true);
    }
    public function hapus($id){
        DB::table('kelompok')->where('id_perusahaan',$id)->delete();
    }
    public function konfirmasi($id){
        DB::table('kelompok')->where('id_perusahaan',$id)->update(["konfirmasi" => "yes"]);
    }
    public function batal_konfirmasi($id){
        DB::table('kelompok')->where('id_perusahaan',$id)->update(["konfirmasi" => "no"]);
    }
    public function get_data_kelompok($id){
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
            ->where('id_perusahaan',$id)
            ->orderBy('nama','asc')
            ->get();

        return Datatables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
    public function show($id){
        $data = DB::table('perusahaan')->where('id',$id)->first();

        return response()->json($data);
    }
}
