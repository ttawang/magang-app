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
    public function akhiri($id)
    {
        DB::table('periode')->where('id',$id)->update(['status'=>'off','updated_at'=>now_date_full()]);
    }
    public function edit($id)
    {
        $data = DB::table('periode')->where('id',$id)->first();
        return response()->json($data);
    }
    public function chartperiode()
    {
        $periode = DB::table('periode as p')->get();
        $data = [];
        foreach($periode as $i){
            $temp = ["total" => "anu",
                    "tetel" => "ina"];
            array_push($data, $temp);
        }
        $result = DB::table('stocks')->orderBy('stockYear','asc')->get();
        dd($result);
    }
    public function chart()
    {
        $result = DB::table('stocks')->orderBy('stockYear','asc')->get();

        return response()->json($result);
    }

}
