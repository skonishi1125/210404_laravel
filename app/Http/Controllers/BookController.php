<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    //
    public function list() {
      $data = [
        'records' => Book::all()
      ];
      return view('book.list', $data);
    }

    // Part6.1 レスポンス
    public function plain() {
      return response('ハローワールド',200)
        ->header('Content-Type', 'text/plain');
    }
    public function header() {
      return response()
        ->view('book.header',['msg' => 'ハロー'],200)
        ->header('Content-Type','text/xml');
    }
    public function outJson() {
      return response()
        ->json([
          'name' => 'Satoru Konishi',
          'age' => 25,
        ]);
    }
    public function outCsv() {
      return response()
        ->streamDownload(function() {
          print(
            "1,2021-01-01\n".
            "2,2021-01-02\n".
            "3,2021-01-03\n".
            "4,2021-01-04\n"
          );
        }, 'download.csv',['Content-Type' => 'text/csv']);
    }
    // dotinstall オブジェクト編
    public function lesson2() {
      $posts = [];
      $posts[0] = [
        'text' => 'hello',
        'likes' => 1,
      ];
      // dd($posts[0]);
      return view('book.lesson.two',compact('posts'));
    }


}
