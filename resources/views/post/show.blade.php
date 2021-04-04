@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">かあスレッド(show)</div>

               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
                  @endif

                  <h5>あなたの投稿</h5>

                  {{ $post->id }}
                  {{ $post->message }}
                  {{ $post->user_id }}
                  {{ $post->reply_post_id }}
                  {{ $post->created_at }}
                  {{ $post->updated_at }}

                  <form action="{{ route('post.edit', ['id' => $post->id]) }}" method="GET">
                     @csrf
                     <input class="btn btn-info" type="submit" value="変更する">
                  </form>

                  <form method="POST" action="{{ route('post.destroy', ['id' => $post->id]) }}"
                     id="delete_{{ $post->id }}">
                     @csrf
                     <a href="#" class="btn btn-danger" data-id="{{ $post->id }}" onclick="deletePost(this);">削除する</a>
                  </form>

                  <a href="{{ route('post.index') }}">post/indexへ</a>


               </div>
            </div>
         </div>
      </div>
   </div>

   <script>
      // onclickでこの関数が呼ばれている
      function deletePost(e) {
         'use strict';
         if (confirm('本当に削除してもいいですか?')) {
            // submit:実行する
            document.getElementById('delete_' + e.dataset.id).submit();
         }
      }

   </script>

@endsection
