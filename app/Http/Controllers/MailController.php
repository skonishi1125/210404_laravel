<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function log(Request $request) {
      $user = [
        'name' => 'skonishi',
        'address' => 'japan',
        'age' => 24,
        'timestamp' => date('Y-m-d H:i:s'),
      ];

      // ログで送った時だけsubjectが文字化けする？
      Mail::send('mail.message', [
        'me' => 'こんにちは！！($user付きだよ)',
        'array' => $user,
      ], function($message) {
        $sub = '登録ありがとうございます。';
        $message->to('user@example.com')
                ->bcc('admin@sample.com')
                ->subject($sub);
      });

      return view('mail.log');
    }

}
