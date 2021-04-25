<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPost extends Model
{
    // $guadedしているのにseederでデータ生成できている。
    // seederの場合は下記機能しないかも。evernote、Seederの項目参照。
    protected $table = 'test_posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $guarded = [
      'index',
     ];
}
