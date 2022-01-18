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
            ->addColumn('status', function($row){
                if($row->recommended == 1){
                    $status = '<span class="badge bg-success">Recommended</span>';
                }else{
                    $status = '<span class="badge bg-warning">Underated</span>';
                }

                return $status;
            })
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'"><i class="fas fa-pen"></i></button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>'.
                    '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                return $actionBtn;
            })
            ->addColumn('sisakuota', function($row){
                $sisakuota = $row->kuota - DB::table('kelompok')->where('id_perusahaan',$row->id)->count();

                return $sisakuota;
            })
            ->rawColumns(['action','status','sisakuota'])
            ->make(true);
    }
}
