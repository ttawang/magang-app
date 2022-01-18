<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SiswaController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Guru';
        $data['kelas'] = DB::table('kelas')->get();
        return view('admin.siswa-list',$data);
    }
    public function get_data()
    {
            $data = DB::table('siswa as s')
            ->join('users as u','s.id_user','u.id')
            ->leftjoin('kelas as k','s.id_kelas','k.id')
            ->select(DB::raw('
                s.*,
                u.name nama,
                u.email email,
                k.nama nama_kelas
            '))
            ->orderBy('id','desc')
            ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    //$actionBtn = '<a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" data-toggle="modal" data-id="'.$row->id.'" class="delete btn btn-danger btn-sm ">Delete</a>';
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
        $id_user = $request->get('id_user');

        $users['name'] = ucwords(strtolower($request->get('nama')));
        $users['email'] = strtolower($request->get('email'));
        $users['no_induk'] = $request->get('no_induk');
        $siswa['id_kelas'] = $request->get('kelas');


        // DB::beginTransaction();
        // try{
            if($id == ''){
                $rules = [
                    'nama'                  => 'required|min:3|max:35',
                    'email'                 => 'required|email|unique:users,email',
                    'no_induk'                 => 'required|unique:users,no_induk',
                ];
                $messages = [
                    'nama.required'         => 'Nama siswa wajib diisi',
                    'nama.min'              => 'Nama siswa minimal 3 karakter',
                    'nama.max'              => 'Nama siswa maksimal 35 karakter',
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
                $users['password'] = Hash::make("siswasiswa");
                $users['email_verified_at'] = Carbon::now();
                $users['role'] = 'siswa';
                DB::table('users')->insert($users);

                $id_user_temp = DB::table('users')->orderBy('id','desc')->first();
                $siswa['created_at'] = Carbon::now();
                $siswa['updated_at'] = Carbon::now();
                $siswa['id_user'] = $id_user_temp->id;
                DB::table('siswa')->insert($siswa);

                return response()->json(['status' => '1']);
            }else if($id != ''){
                $users['updated_at'] = Carbon::now();
                $siswa['updated_at'] = Carbon::now();
                DB::table('siswa')->where('id',$id)->update($siswa);
                DB::table('users')->where('id',$id_user)->update($users);

                return response()->json(['status' => '1']);
            }else{
                return response()->json(['status' => '0']);
            }
        //     DB::commit();

		// }catch (Exception $e){
		// 	DB::rollback();
		// 	$arr = ['status' => '0'];
		// }
        // return response()->json($arr);
    }
    public function edit($id){
        $data = DB::table('siswa as s')
        ->join('users as u','s.id_user','u.id')
        ->leftjoin('kelas as k','s.id_kelas','k.id')
        ->select(DB::raw('
            s.*,
            u.no_induk no_induk,
            u.name nama,
            u.email email,
            s.id_kelas id_kelas,
            k.nama nama_kelas
        '))
        ->where('s.id','=',$id)->first();

        return response()->json($data);
    }
    public function hapus($id){
        $id_user = DB::table('siswa')->where('id',$id)->first();
        DB::table('users')->where('id',$id_user->id_user)->delete();
        DB::table('siswa')->delete($id);

    }
}
