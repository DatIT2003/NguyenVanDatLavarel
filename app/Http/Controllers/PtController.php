<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PtController extends Controller
{
    //giaiptbac1
    public function getgiaiptb1() {
    return view('giaiptb1.giaiptb1');
    }
    public function giaiptb1(request $req){
        $validated = $req->validate([
            'hsa' => 'required|numeric',
            'hsb' => 'required|numeric',
        ],[
            'hsa.required' => 'không được để trống',
            'hsa.numeric' => 'hệ số a phải là số',

            'hsb.required' => 'không được để trống',
            'hsb.numeric' => 'hệ số b phải là số',
        ]);
  
        $a = $req->hsa;
        $b = $req->hsb;
    
        $a = floatval($a);
        $b = floatval($b);
    
        if($a == 0) {
            if($b == 0)
                $ketqua = "Phương trình vô số nghiệm";
            else
                $ketqua = "Phương trình vô nghiệm";
        } else {
            $ketqua = "Phương trình có nghiệm x=" . (-$b / $a);
        }
        return view('giaiptb1.giaiptb1', compact('ketqua','a', 'b'));
    }
}