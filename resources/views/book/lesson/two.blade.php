@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>かあスレッド(Book/lesson/)</h3>
        </div>

        <div class="card-body">
          <h2>h2タイトル</h2>
          @php
            print_r($posts) . PHP_EOL;
            echo $posts[0]['text'] . PHP_EOL;
          @endphp
        </div>

      </div>
    </div>
  </div>
</div>
<!-- jsを読み込むときは、backend/publicのパス記述を省略させる -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>

@endsection
