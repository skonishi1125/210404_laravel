<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NameSpaceTestController extends Controller
{
    //
    public function ns() {
      return 'name space test!';
    }
}
