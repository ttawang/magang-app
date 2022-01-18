<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = "Home";
        $data['cek'] = DB::table('periode')->where('status','on')->count();
        $data['periode'] = DB::table('periode')->where('status','on')->first();

        return view('admin.home',$data);
    }
    public function simpan(Request $req)
    {
        $id = $req->get('id');
        $mulaibaru = $req->get('mulaibaru');

        $data['nama_periode'] = $req->get('nama_periode');
        $data['tglmulai'] = db_date($req->get('tglmulai'));
        $data['tglselesai'] = db_date($req->get('tglselesai'));
        DB::beginTransaction();
        try{
            if($id == ''){
                $data['created_at'] = now_date_full();
                $data['updated_at'] = now_date_full();
                DB::table('periode')->insert($data);

                $arr = ['status' => '1'];
            }elseif($id != '' && $mulaibaru == 'yes' ){
                DB::table('periode')->where('id',$id)->update(['status'=>'off','updated_at'=>now_date_full()]);
                $data['created_at'] = now_date_full();
                $data['updated_at'] = now_date_full();

                DB::table('periode')->insert($data);
                $arr = ['status' => '1'];
            }else{
                $data['updated_at'] = now_date_full();
                DB::table('periode')->where('id',$id)->update($data);
                $arr = ['status' => '1'];
            }
            DB::commit();

		}catch (Exception $e){
			DB::rollback();
			$arr = ['status' => '0'];
		}
        return response()->json($arr);
    }
    public function mulaibaru($id)
    {
        DB::table('periode')->where('id',$id)->update(['status'=>'off','updated_at'=>now_date_full()]);
    }
    public function edit($id)
    {
        $data = DB::table('periode')->where('id',$id)->first();
        return response()->json($data);
    }
}
