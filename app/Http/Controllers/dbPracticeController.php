<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// ファサードの使用
use Illuminate\Support\Facades\DB;

// Eloquent使用時のModel呼び出しの簡略化
use App\User;
use App\Models\Book;


class dbPracticeController extends Controller
{
    //
    public function facade() {
      $test_posts = DB::table('test_posts')->get();
      // id=3のものを配列の中に入れる形で取得
      $get = DB::table('test_posts')->where('id',3)->get();
      $whereQuery = DB::table('test_members')
                    ->where('id', 1)->first();
      $value = DB::table('test_posts')
              ->where('id',5)->value('index');
      $find = DB::table('test_members')->find(2);

      // // 値の挿入
      // $date = date('Y-m-d H:i:s');
      // DB::table('test_posts')
      // ->insert([
      //   'index' => 'insert文で追記',
      //   'created_at' => $date,
      //   'updated_at' => $date,
      //   'good' => 21,
      //   'tag' => 'ほうこく',
      // ]);
      //

      // // 値の編集
      // DB::table('test_posts')
      // ->where('id',17)
      // ->update(['index' => '編集!', 'updated_at' => $date]);

      // // 値の削除
      // DB::table('test_posts')
      // ->where('id',18)
      // ->delete();

      return view('dbpractice.facade',
      compact('test_posts','get','whereQuery','value','find'));
    }

    public function Eloquent() {
      $all = \App\Models\TestPost::all();
      $find = \App\Models\TestPost::find(5);
      $userall = User::all();
      $bookall = Book::all();

      $w = \App\Models\TestPost::where('good','>=',10)->get();
      $cnt = \App\Models\TestPost::where('good','>=',10)->count();

      $toArray = Book::all()->toArray();
      // dd($bookall,$toArray);

      // スコープ scope
      $queryScope = \App\Models\Testpost::popular()->get();
      $getPopularPosts = \App\Models\TestPost::getPopularPost();

      $user = new \App\User();
      $user->email = 'skonishi1125@gmail.com';
      $findData = $user->UserEmail()->first();
      // dd($findData);
      // dd($queryScope,$getPopularPosts);

      // 値の挿入
      // $u = new User();
      // $u->fill([
      //   'name' => '山田太郎',
      //   'email' => 'yamada1@test.com',
      //   'password' => sha1('test'),
      // ]);
      // $u->save();

      $tp_tag = '飯テロ';
      $tp = new \App\Models\TestPost();

      //直接記入
      // $tp->index = '食べたよ';
      // $tp->good = 99;
      // $tp->tag = $tp_tag;

      // fillを使う
      // $tp->fill([
      //   'index' => 'ああ',
      //   'good' => 10,
      //   'tag' => $tp_tag,
      // ]);

      // $tp->save();

      $update_tp = \App\Models\TestPost::find(23);
      // $update_tp->index = '更新';
      // $update_tp->good = 10;
      // $update_tp->tag = 'お腹ぺこぺこ';
      // $update_tp->save();

      $update_tp->update([
        'index' => 'update()で更新 fillable()チェック',
        'good' => 5,
        'tag' => 'ごはん'
      ]);
      // $update_tp->save();

      // dd($update_tp);
      $del = \App\Models\TestPost::find(22);
      // $del->delete();

      // $create = \App\Models\TestPost::create([
      //   'index' => 'createで挿入！',
      //   'good' => 0,
      //   'tag' => 'テスト',
      // ]);
      return view('dbpractice.eloquent',
      compact('all','find','userall','bookall','w', 'cnt'));
    }

    public function queryBuilder() {
      // Eloquent Book::get()でも同じ collection型からarrayにするときは->toArray()
      $eloquent_books = Book::all()->toArray();
      // ファサード
      $facades_books = DB::table('books')->get();
      // dd($eloquent_books, $facades_books);

      $select = DB::select('SELECT * FROM books');
      $take = Book::take(3)->get();
      $where = Book::where('price','<=',2500)->get();

      $q = Book::query()->where('id','1');
      $b = $q->get();

      $value = Book::where('id',5)->value('isbn');
      $sql = $q->toSql();

      dd($select, $take, $where, $q, $b, $value, $sql);



      return view('dbpractice.queryBuilder');
    }

}
