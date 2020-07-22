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
        $this->call(UsersTableSeeder::class);
        $this->call(SectionTableSeeder::class);
        $this->call(ArticleTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(ReplyTableSeeder::class);
        $this->call(UserDetailTableSeeder::class);
    }
}
