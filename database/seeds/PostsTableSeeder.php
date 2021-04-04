<?php

use Illuminate\Database\Seeder;
// factory使用
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
   /**
    * Run the database seeds.
    *
    * @return void
    */
   public function run()
   {
      // factoryで200個データを生成する
      factory(Post::class, 200)->create();

      // factoryを使用しないseeder記述

      // DB::table('posts')->insert([
      //    [
      //       'message' => 'こんにちは！',
      //       'user_id' => 2,
      //       'reply_post_id' => NULL,
      //    ],
      //    [
      //       'message' => '月が綺麗ですね',
      //       'user_id' => 1,
      //       'reply_post_id' => NULL,
      //    ],
      //    [
      //       'message' => '悲しいことがあった。。。',
      //       'user_id' => 3,
      //       'reply_post_id' => NULL,
      //    ],
      //    [
      //       'message' => 'どうしたの？',
      //       'user_id' => 1,
      //       'reply_post_id' => 3
      //    ],
      // ]);


   }
}
