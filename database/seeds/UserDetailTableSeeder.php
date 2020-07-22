<?php

use App\Models\UserDetail;
use Illuminate\Database\Seeder;

class UserDetailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserDetail::truncate();
        factory(UserDetail::class,20)->create();
    }
}
