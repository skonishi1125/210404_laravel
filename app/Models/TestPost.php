<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TestPost extends Model
{
    // $guardedしているのにseederでデータ生成できている。
    // seederの場合は下記機能しないかも。evernote、Seederの項目参照。
    protected $table = 'test_posts';
    protected $primaryKey = 'id';
    public $timestamps = true;

    // protected $guarded = [
    //   'index','good','tag'
    // ];

    protected $fillable = [
      'index'
    ];

    // クエリースコープ
    public function scopePopular($query)
    {
      return $query->where('good','>=',10);
    }

    // 動的スコープ
    public static function getPopularPost()
    {
      // staticの場合、$this->whereではなくself::を使用する
      return self::where('good','>=',10)->get();
    }



}
