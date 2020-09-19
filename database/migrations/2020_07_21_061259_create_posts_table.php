<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->text('content');
            $table->integer('sid');
            $table->softDeletes();
            $table->integer('goodQuestionCount')->unsigned()->default(0);
            $table->integer('replyCount')->unsigned()->default(0);;
            $table->integer('user_id')->unsigned();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('last_reply_at')->nullable();
            $table->string('repliesStr')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
