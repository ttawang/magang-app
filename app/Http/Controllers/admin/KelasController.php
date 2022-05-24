<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KelasController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Kelas';
        $data['guru'] = DB::table('users')->where('role','guru')->get();
        return view('admin.kelas-list',$data);
    }
    public function get_data()
    {
        $data = DB::table('kelas as k')
        ->leftjoin('users as u','k.id_walikelas','u.id')
        ->select(DB::raw('
            k.*,
            u.name nama_walikelas
        '))
        ->orderBy('id','desc')->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<button type="button" class="edit btn btn-success btn-sm" id="btn_edit" data-id="'.$row->id.'"><i class="fas fa-pen"></i></button> <button type="button" class="delete btn btn-danger btn-sm" id="btn_hapus" data-id="'.$row->id.'"><i class="fas fa-trash-alt"></i></button>'.
                    '<input type="hidden" id="id'.$row->id.'" value="'.$row->id.'">';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);

    }
    public function simpan(Request $request)
    {
        $id = $request->get('id');

        $data['nama'] = $request->get('nama');
        $data['id_walikelas'] = $request->get('walikelas');

        if($id == ''){
            $rules = [
                'nama'                  => 'required|min:3|max:35'
            ];
            $messages = [
                'nama.required'         => 'Nama kelas wajib diisi',
                'nama.min'              => 'Nama kelas minimal 3 karakter',
                'nama.max'              => 'Nama kelas maksimal 35 karakter'
            ];

            $validator = Validator::make($request->all(), $rules,$messages);

            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all(),'status' => '2']);
            }
            $data['created_at'] = Carbon::now();
            $data['updated_at'] = Carbon::now();

            DB::table('kelas')->insert($data);

            return response()->json(['status' => '1']);
        }else if($id != ''){
            $data['updated_at'] = Carbon::now();
            DB::table('kelas')->where('id',$id)->update($data);

            return response()->json(['status' => '1']);
        }else{
            return response()->json(['status' => '0']);
        }
    }
    public function edit($id){
        $data = DB::table('kelas as k')
        ->leftjoin('users as u','k.id_walikelas','u.id')
        ->select(DB::raw('
            k.*,
            u.name nama_walikelas
        '))->where('k.id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        DB::table('kelas')->where('id',$id)->delete();
    }
}
