<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testAjaxController extends Controller
{
    //
    public function index() {
      return view('testajax.index');
    }

    public function first_fnc() {
      $add_val = $_GET['val'] + 55;
      $data = [
        'val' =>  $_GET['val'],
        'add_val' => $add_val,
      ];

      return response()->json(json_encode($data));
    }

    public function secondFnc(Request $val) {
      // $data = $val; 送っても空白になってしまった
      $data = [
        'val' => $val,
        'string' => 'お元気ですか？',
      ];

      return response()->json(json_encode($data));

    }

}
