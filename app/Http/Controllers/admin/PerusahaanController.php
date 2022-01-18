<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class PerusahaanController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Perusahaan';

        return view('admin.perusahaan-list',$data);
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
    public function simpan(Request $request)
    {
        $id = $request->get('id');

        $data['nama'] = $request->get('nama');
        $data['email'] = strtolower($request->get('email'));
        $data['no_telp'] = $request->get('no_telp');
        $data['alamat'] = $request->get('alamat');
        $data['recommended'] = $request->get('status');
        $data['kuota'] = $request->get('kuota');

        if($id == ''){
            $rules = [
                'nama'                  => 'required|min:3|max:35',
                'alamat'                 => 'required|min:3|max:255',
            ];
            $messages = [
                'nama.required'         => 'Nama Perusahaan wajib diisi',
                'nama.min'              => 'Nama Perusahaan minimal 3 karakter',
                'nama.max'              => 'Nama Perusahaan maksimal 35 karakter',
                'alamat.required'          => 'Alamat wajib diisi',
                'alamat.min'              => 'Alamat minimal 3 karakter',
                'alamat.max'              => 'Alamat maksimal 255 karakter'
            ];

            $validator = Validator::make($request->all(), $rules,$messages);

            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all(),'status' => '2']);
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            DB::table('perusahaan')->insert($data);

            return response()->json(['status' => '1']);
        }else if($id != ''){
            $data['updated_at'] = Carbon::now();
            DB::table('perusahaan')->where('id',$id)->update($data);

            return response()->json(['status' => '1']);
        }else{
            return response()->json(['status' => '0']);
        }
    }
    public function edit($id){
        $data = DB::table('perusahaan')->where('id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        DB::table('perusahaan')->where('id',$id)->delete();
        DB::table('kelompok')->where('id_perusahaan',$id)->delete();
    }
}
