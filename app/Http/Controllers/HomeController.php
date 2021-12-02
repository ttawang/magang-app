<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DataTables;

class HomeController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = "Home";
        return view('admin.home',$data);
    }
    public function get_data(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::table('students')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function($row){
                    $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
}
