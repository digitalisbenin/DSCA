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
        Schema::create('notequizzes', function (Blueprint $table) {
            $table->id();
            $table->string('note')->nullable();
            $table->string('titre')->nullable();
            $table->string('description')->nullable();
            $table->enum('status', ['echouer', 'valider'])->nullable();
            $table->unsignedBigInteger('quiz_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->unsignedBigInteger('user_reponse_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('user_reponse_id')
            ->references('id')
            ->on('user_reponses')
            ->onDelete('cascade');

            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade');


            $table->foreign('quiz_id')
            ->references('id')
            ->on('quizzes')
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
        Schema::dropIfExists('notequizzes');
    }
};
