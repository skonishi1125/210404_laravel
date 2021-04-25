<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TestMembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DBファサードで記述
        \DB::table('test_members')->insert(
          [
            [
              'name' => 'あああ 太郎',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
              'name' => 'いいい 花子',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
              'name' => 'ううう 三郎',
              'created_at' => date('Y-m-d H:i:s'),
              'updated_at' => date('Y-m-d H:i:s'),
            ],
          ]
        );
    }
}
