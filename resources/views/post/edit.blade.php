@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">かあスレッド(Edit)</div>

               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
                  @endif

                  <form method="POST" action="{{ route('post.update', ['id' => $post->id]) }}">
                     @csrf
                     <textarea name="message">{{ $post->message }}</textarea>
                     <input type="hidden" name="reply_post_id" value="0">
                     <button class="btn btn-info" type="submit">更新する</button>
                  </form>

                  <h5>あなたの投稿</h5>

                  {{ $post->id }}
                  {{ $post->message }}
                  {{ $post->user_id }}
                  {{ $post->reply_post_id }}
                  {{ $post->created_at }}
                  {{ $post->updated_at }}

                  {{-- <form action="" method="GET">
                        @csrf
                        <input class="btn btn-info" type="submit" value="更新する">
                    </form> --}}
                  <a href="{{ route('post.index') }}">post/indexへ</a>


               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
