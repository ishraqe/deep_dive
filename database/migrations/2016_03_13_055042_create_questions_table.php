<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('body',1000000)->nullable();
            $table->string('tag_id');
            $table->integer('user_id');
            $table->integer('marking');
            $table->integer('parent_id')->nullable();
            $table->integer('parent_answer_id')->nullable();
            $table->timestamps();
            $table->timestamp('published_at');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}

