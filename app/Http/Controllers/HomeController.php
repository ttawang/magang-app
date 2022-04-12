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
            $jumlah = DB::table('kelompok')->where('id_periode',$i->id)->count();
            $temp = (object)[
                "nama_periode" => $i->nama_periode,
                "jumlah" => $jumlah
            ];
            array_push($data, $temp);
        }
        $data = collect($data);
        $result = DB::table('stocks')->orderBy('stockYear','asc')->get();
        return response()->json($data);
    }
    public function chartperusahaan()
    {
        $perusahaan = DB::table('perusahaan')->get();
        $data = [];
        foreach($perusahaan as $i){
            $jumlah = DB::table('kelompok')->where('id_perusahaan', $i->id)->count();
            $temp = (object)[
                "nama_perusahaan" => $i->nama,
                "jumlah" => $jumlah
            ];
            array_push($data, $temp);
        }
        $data = collect($data);
        return response()->json($data);
    }
    public function chart()
    {
        $result = DB::table('stocks')->orderBy('stockYear','asc')->get();

        return response()->json($result);
    }

}
