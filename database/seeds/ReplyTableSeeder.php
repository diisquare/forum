<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class ReplyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Reply::truncate();
        factory(Reply::class, 100)->create();
    }
}
