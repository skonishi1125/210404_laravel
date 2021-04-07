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

    public function secondFnc(Request $request) {
      // ajaxで送られてきた値は、Request $変数['名前']で指定できる
      $data = [
        'val' => $request['val'],
        'num' => $request['num'],
        'string' => 'お元気ですか？',
        'array' => [1,2,3,4,5,11,22,33,44],
      ];

      return response()->json(json_encode($data));

    }

}
