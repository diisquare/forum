<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_details', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->boolean('isBanned')->default('0');
            $table->string('avatar')->nullable();
            $table->text('slogan')->nullable();
            $table->integer('postCount')->default('0');
            $table->integer('goodQuestionCount')->default('0');
            $table->integer('AgreeCount')->default('0');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_details');
    }
}
