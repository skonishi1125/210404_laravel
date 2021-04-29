@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>かあスレッド(dbpractice)</h3>
        </div>

        <div class="card-body">
          <h2>DBファサードを使用</h2>
          <p>
            「use Illuminate\Support\Facades\DB;」と宣言必須。<br>
            ない場合はClass "App\Http\Controllers\DB" not foundエラー
          </p>
          {{ dd($get,$whereQuery,$value,$find) }}

        </div>

      </div>
    </div>
  </div>
</div>
<!-- jsを読み込むときは、backend/publicのパス記述を省略させる -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>

@endsection
