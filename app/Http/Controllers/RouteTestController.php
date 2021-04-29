<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class RouteTestController extends Controller
{
    //
    public function route() {
      return view('route/route');
    }
    public function param(int $id = 3) {
      $book = Book::find($id);
      dd($book);
      return view('route.param',compact('book'));
    }

    public function keywd($keywds) {
      $array = explode('/',$keywds);
      dd($keywds, $array);
    }
}
