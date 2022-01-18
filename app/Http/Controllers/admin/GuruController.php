<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;


class GuruController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Guru';
        return view('admin.guru-list',$data);
    }
    public function get_data()
    {
            $data = DB::table('users')->where('role','guru')->orderBy('id','desc')->get();
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

        $users['name'] = ucwords(strtolower($request->get('name')));
        $users['email'] = strtolower($request->get('email'));
        $users['no_induk'] = $request->get('no_induk');

        if($id == ''){
            $rules = [
                'name'                  => 'required|min:3|max:35',
                'email'                 => 'required|email|unique:users,email',
                'no_induk'                 => 'required|unique:users,no_induk',
            ];
            $messages = [
                'name.required'         => 'Nama guru wajib diisi',
                'name.min'              => 'Nama guru minimal 3 karakter',
                'name.max'              => 'Nama guru maksimal 35 karakter',
                'email.required'        => 'Email wajib diisi',
                'email.email'           => 'Email tidak valid',
                'email.unique'          => 'Email sudah terdaftar',
                'no_induk.required'          => 'No. Induk wajib diisi',
                'no_induk.unique'            => 'No. Induk sudah terdaftar',
            ];

            $validator = Validator::make($request->all(), $rules,$messages);

            if($validator->fails()){
                return response()->json(['errors' => $validator->errors()->all(),'status' => '2']);
            }
            $users['created_at'] = Carbon::now();
            $users['updated_at'] = Carbon::now();
            $users['password'] = Hash::make("guruguru");
            $users['email_verified_at'] = Carbon::now();
            $users['role'] = 'guru';
            DB::table('users')->insert($users);

            return response()->json(['status' => '1']);
        }else if($id != ''){
            $users['updated_at'] = Carbon::now();
            DB::table('users')->where('id',$id)->update($users);

            return response()->json(['status' => '1']);
        }else{
            return response()->json(['status' => '0']);
        }
    }
    public function edit($id){
        $data = DB::table('users')->where('id',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        DB::table('users')->where('id',$id)->delete();
        DB::table('kelas')->where('id_walikelas',$id)->update(['id_walikelas' => 0,'updated_at' => Carbon::now()]);
    }
}
