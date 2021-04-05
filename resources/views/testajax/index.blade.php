@extends('layouts.app')

@section('content')
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h3>かあスレッド(ajax練習)</h3>
        </div>

        <div class="card-body">
          <h2>ajaxTest</h2>
          <button type="button" name="ajaxbtn" id="firstBtn">
            GETで送る($_GETで取得する)
          </button>
          <div class="ajax-space" style="border:1px solid red;">
            <h3>ajaxでここに文章が追加されます</h3>
          </div>
        </div>

        <div class="card-body">
          <button type="button" name="ajaxbtn" id="secondBtn">
            POSTで送る(Request data:{....}で取得する)
          </button>
          <div id="second-space" style="border:1px solid red;">
            <h3>ajaxでここに文章が追加されます</h3>
          </div>
        </div>



      </div>
    </div>
  </div>
</div>
<!-- jsを読み込むときは、backend/publicのパス記述を省略させる -->
<script type="text/javascript" src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/test.js') }}"></script>
<script>
  console.log('読み込みテスト');
  $(function() {
    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': $('input[name="_token"]').val()
      }
    });

    $('#firstBtn').click(function() {
      console.log('first btn push');
      $.ajax({
        type: 'GET',
        url: 'http://localhost/testajax/first_fnc',
        dataType: 'json',
        data: {
          val: 10,
        }
      }).done(function(results) {
        console.log('処理は走りました');
        var html = '';
        // コントローラから送られてきたjsonをjsで使えるように変換すること
        var result = JSON.parse(results);
          html += '<p>送った値は' + result['val'] + 'です。</p>';
          html += '<p>帰ってきた値は' + result['add_val'] + 'です。</p>';

        $('.ajax-space').html(html);

      }).fail(function(jqXHR, textStatus, errorThrown) { //失敗時の処理
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました")
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
      }); // end $.ajax
    }); // end firstBtn.click.function

    $('#secondBtn').click(function() {
      console.log('second btn push');
      const greet = 'こんにちは';
      $.ajax({
        type: 'POST',
        // コントローラ名:secondFncだが、route名はsecond_fncなのでパスのsecond_fncを指定する
        url: 'http://localhost/testajax/second_fnc',
        dataType: 'json',
        data: {
          val: greet,
        }
      }).done(function(results) {
        console.log('処理は走りました');
        var html = '';
        // コントローラから送られてきたjsonをjsで使えるように変換すること
        var result = JSON.parse(results);
          console.dir('results : ' + results);
          console.dir('result : ' + result);
          html += '<p>送った値は' + result['val'] + 'です。</p>';
          html += '<p>追加で受け取った値は「' + result['string'] + '」です。</p>';
          valだけ受け取れていないので受け取り方を調べる

        $('#second-space').html(html);

      }).fail(function(jqXHR, textStatus, errorThrown) { //失敗時の処理
        alert('ファイルの取得に失敗しました。');
        console.log("ajax通信に失敗しました")
        console.log(jqXHR.status);
        console.log(textStatus);
        console.log(errorThrown.message);
      }); // end $.ajax
    }); // end firstBtn.click.function




  }); //end $(function)



</script>

@endsection
