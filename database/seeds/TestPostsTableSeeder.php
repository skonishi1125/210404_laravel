<?php

use Illuminate\Database\Seeder;
// 必須
use App\Models\TestPost;

class TestPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Eloquentで記述
        $testpost = new Testpost(
          [
              'index' => '今日もいい天気！',
              'good' => 10,
              'tag' => '報告/進捗'
          ]
        );
        $testpost->save();

        $testpost = new Testpost(
          [
              'index' => '晴れるかな？',
              'good' => 2,
              'tag' => 'つぶやき/独り言'
          ]
        );
        $testpost->save();

    }
}
