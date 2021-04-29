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
    public function param(int $id) {
      $book = Book::find($id);
      dd($book);
      return view('route.param',compact('book'));
    }
}
