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
        Schema::create('certificates', function (Blueprint $table) {
            $table->id();
            $table->string('note');
            $table->unsignedBigInteger('module_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('note_quiz_id')->nullable();
            $table->timestamps();

            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade');

            $table->foreign('note_quiz_id')
            ->references('id')
            ->on('notequizzes')
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
        Schema::dropIfExists('certificates');
    }
};
