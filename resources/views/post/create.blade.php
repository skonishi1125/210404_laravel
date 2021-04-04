@extends('layouts.app')

@section('content')
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12">
            <div class="card">
               <div class="card-header">かあスレッド(create)</div>

               <div class="card-body">
                  @if (session('status'))
                     <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                     </div>
                  @endif



                  <table class="table">
                     <thead>
                        <tr>
                           <th scope="col">id</th>
                           <th scope="col">メッセージ</th>
                           <th scope="col">User ID</th>
                           <th scope="col">Reply</th>
                           <th scope="col">Created</th>
                           <th scope="col">Updated</th>
                        </tr>
                     </thead>
                     @foreach ($posts as $post)
                        <tr>
                           <th>{{ $post->id }}</th>
                           <th>{{ $post->message }}</th>
                           <th>{{ $post->user_id }}</th>
                           <th>{{ $post->reply_post_id }}</th>
                           <th>{{ $post->created_at }}</th>
                           <th>{{ $post->updated_at }}</th>
                        </tr>
                     @endforeach
                     <tbody>

                     </tbody>
                  </table>


               </div>
            </div>
         </div>
      </div>
   </div>
@endsection
