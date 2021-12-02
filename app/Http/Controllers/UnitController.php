<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UnitController extends Controller
{
    //
    public function index()
    {
        $data['judul'] = 'Data Unit';
        return view('master.data-unit',$data);
    }

    public function get_data(Request $request)
    {
    
    }
}