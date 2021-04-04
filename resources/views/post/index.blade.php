@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">かあスレッド(index)</div>

               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
                  @endif

                  <div>
                     <p>セッションとして以下の値を保存する</p>
                     <form action="{{ route('post.session') }}" method="POST">
                        @csrf
                        <input type="text" name="testSession" value="">
                        <input type="submit" class="btn btn-success btn-sm">
                     </form>
                     {{--
                        セッション取得
                        Session::get('セッション名',デフォルトの値)
                     --}}
                     <p>
                        現在のセッション -> {{ Session::get('session_controller', '未設定です') }}
                        <a href="{{ route('post.d_session') }}">セッションを削除する</a>
                     </p>
                  </div>


                  <div>
                     <p>クッキーを生成してみよう</p>
                     <form action="{{ route('post.cookie') }}" method="POST">
                        @csrf
                        <input type="text" name="testCookie" value="">
                        <input type="submit" class="btn btn-secondary btn-sm">
                     </form>
                     {{--
                        クッキー取得(値は暗号化されている)
                        関数のように呼び出すだけでOK
                     --}}
                     <p>

                        @if ($cookie == null)
                           クッキーの値 -> cookieには現在設定されていません
                        @else
                           クッキーの値 -> {{ $cookie }}
                        @endif

                        <a href="{{ route('post.d_cookie') }}">クッキーを削除する</a>

                     </p>
                  </div>

                  {{-- エラー表示その１ --}}
                  @if ($errors->any())
                     <div class="alert alert-danger">
                        <ul>
                           @foreach ($errors->all() as $error)
                              <li>{{ $error }}</li>
                           @endforeach
                        </ul>
                     </div>
                  @endif

                  {{-- エラー表示その２ --}}
                  <div>
                     @error('message')
                        <span class="" style="color: red">
                           {{ $message }}
                        </span>
                     @enderror



                     <p>{{ Auth::user()->name }}さん、投稿してみましょう！</p>
                     <form method="POST" action="{{ route('post.store') }}">
                        @csrf
                        <textarea name="message"></textarea>
                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                        <br>reply_post_idを付与する
                        {{-- セッション(フラッシュ)呼び出しその１ --}}
                        {{-- <input type="text" name="reply_post_id" value="{{ Session::get('reply') }}"> --}}
                        {{-- セッション(フラッシュ)呼び出しその２ --}}
                        <input type="number" name="reply_post_id" value="{{ session('reply') }}" style="width:40px">
                        <button class="btn btn-primary btn-sm" type="submit">
                           投稿する
                        </button>
                     </form>
                  </div>

                  <h5>現在の投稿状況</h5>

                  <table class="table" font-size="10px">
                     <thead>
                        <tr>
                           <th scope="col">id</th>
                           <th scope="col">メッセージ</th>
                           <th scope="col">User ID</th>
                           <th scope="col">Reply</th>
                           <th scope="col">Created</th>
                           <th scope="col">Updated</th>
                           <th scope="col">Config</th>
                           <th scope="col">###</th>

                        </tr>
                     </thead>
                     @foreach ($posts as $post)
                        <tr>
                           <td>{{ $post->id }}</td>
                           <td>{{ $post->message }}</td>
                           <td>{{ $post->user_id }}</td>
                           <td>{{ $post->reply_post_id }}</td>
                           <td>{{ $post->created_at }}</td>
                           <td>{{ $post->updated_at }}</td>
                           <td><a href="{{ route('post.show', ['id' => $post->id]) }}">詳細</a></td>
                           <td><a href="{{ route('post.reply', ['id' => $post->id]) }}">返信</a></td>
                        </tr>
                     @endforeach
                     <tbody>

                     </tbody>
                  </table>
                  {{ $posts->links() }}

                  <h5>現在の登録状況</h5>

                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">id</th>
                           <th scope="col">name</th>
                           <th scope="col">email</th>
                           <th scope="col">password</th>
                           <th scope="col">picture</th>
                           <th scope="col">Created</th>
                           <th scope="col">Updated</th>
                        </tr>
                     </thead>
                     @foreach ($members as $member)
                        <tr>
                           <td>{{ $member->id }}</td>
                           <td>{{ $member->name }}</td>
                           <td>{{ $member->email }}</td>
                           <td>{{ $member->password }}</td>
                           <td>{{ $member->picture }}</td>
                           <td>{{ $member->created_at }}</td>
                           <td>{{ $member->updated_at }}</td>
                        </tr>
                     @endforeach
                     <tbody>

                     </tbody>
                  </table>
                  {{ $members->links() }}
               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
