<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_reponses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->unsignedBigInteger('reponse_id');
            $table->unsignedBigInteger('question_id')->nullable();
            $table->integer('note')->nullable();
            $table->timestamps();

            $table->foreign('question_id')
            ->references('id')
            ->on('questions')
            ->onDelete('cascade');

            $table->foreign('quiz_id')
            ->references('id')
            ->on('quizzes')
            ->onDelete('cascade');

            $table->foreign('reponse_id')
            ->references('id')
            ->on('reponses')
            ->onDelete('cascade');

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_reponses');
    }
};
