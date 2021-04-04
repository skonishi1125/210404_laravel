<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
// クエリビルダの使用
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;
use App\Services\testSlimCont;
use App\Http\Requests\StorePost;

class PostController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index()
   {
      //
      $posts = DB::table('posts')
         ->orderBy('id', 'asc')
         ->paginate(20);
      $members = DB::table('members')
         ->orderBy('id', 'desc')
         ->paginate(5);
      // dd($posts,$members);

      // テストクッキー取得
      $cookie = Cookie::get('cookie_controller');

      // replyセッションはviewで取得する


      return view('post.index', compact('posts', 'members', 'cookie'));
   }

   /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function create()
   {
      // 使っていない
      $posts = DB::table('posts')->get();
      return view('post.create', compact('posts'));
   }

   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(StorePost $request)
   {
      // DBインスタンス化
      $post = new Post;

      $post->message = $request->input('message');
      $post->user_id = $request->input('user_id');

      $val = testSlimCont::checkReply($request->input('reply_post_id'));
      $post->reply_post_id = $val;
      // dd($post->reply_post_id);

      $post->save();
      // dd($post);
      return redirect('post/index');
   }

   /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function show($id)
   {
      //エロクアント
      $post = Post::find($id);
      return view('post.show', compact('post'));
   }

   /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function edit($id)
   {
      //
      $post = Post::find($id);
      return view('post.edit', compact('post'));
   }

   /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function update(Request $request, $id)
   {
      // 今あるインスタンス(idのもの)を入れる
      $post = Post::find($id);

      $post->message = $request->input('message');
      $post->save();
      // dd($post);
      return redirect('post/index');
   }

   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
      // 今あるインスタンス(idのもの)を入れる
      $post = Post::find($id);
      $post->delete();

      return redirect('post/index');
   }

   //  クッキー、セッションの練習
   public function session(Request $request)
   {
      $session = $request->testSession;
      // dd($session);

      if ($session == null) {
         $request->session()->put('session_controller', 'nullでした');
         return redirect('post/index');
      }
      // セッション配置
      // $request->session()->put('セッションの名前',入れる値);
      $request->session()->put('session_controller', $session);
      return redirect('post/index');
   }

   public function d_session(Request $request)
   {
      $request->session()->forget('session_controller');
      return redirect('post/index');
   }

   public function cookie(Request $request)
   {
      $cookie = $request->testCookie;

      // クッキー生成
      // 名前、値、有効期限(分) 値は暗号化される！
      // cookie('cookie_controller',$cookie,1);
      return redirect('post/index')->cookie('cookie_controller', $cookie, 3);
   }

   public function d_cookie()
   {
      // nullとする
      Cookie::queue('cookie_controller', null);
      return redirect('post/index');
   }

   public function reply(Request $request, $id)
   {
      // フラッシュを使う
      $request->session()->flash('reply', $id);
      return redirect('post/index');

      // セッションを使った場合の保存
      // $request->session()->put('reply',$id);

   }
}
