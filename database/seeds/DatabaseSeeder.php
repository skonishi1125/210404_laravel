<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PostsTableSeeder::class);
        $this->call(MembersTableSeeder::class);
        $this->call(TestMembersTableSeeder::class);
        $this->call(TestPostsTableSeeder::class);
    }
}
