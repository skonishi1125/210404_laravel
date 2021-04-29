@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>かあスレッド(Route)</h3>
        </div>

        <div class="card-body">
          <h2>ルーティング</h2>
          <a href="http://localhost/route/param/1">パラメータ1を渡す</a>
          <a href="http://localhost/route/param/2">パラメータ2を渡す</a>
        </div>

      </div>
    </div>
  </div>
</div>
<!-- jsを読み込むときは、backend/publicのパス記述を省略させる -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>

@endsection
