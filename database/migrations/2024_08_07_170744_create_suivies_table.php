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
        Schema::create('suivies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tauxprogression');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->timestamps();

            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
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
        Schema::dropIfExists('suivies');
    }
};
