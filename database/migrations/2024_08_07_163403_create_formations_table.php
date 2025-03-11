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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->string('description')->nullable();
            $table->string('image_url');
            $table->enum('status', ['abandonné', 'valider', 'terminer']);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->unsignedBigInteger('difficulte_id')->nullable();
            $table->unsignedBigInteger('user_class_id')->nullable();
            $table->unsignedBigInteger('cours_id')->nullable();
            $table->timestamps();


            $table->foreign('user_id')
            ->references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->foreign('categorie_id')
            ->references('id')
            ->on('categories')
            ->onDelete('cascade');

            $table->foreign('difficulte_id')
            ->references('id')
            ->on('difficuletes')
            ->onDelete('cascade');

            $table->foreign('user_class_id')
            ->references('id')
            ->on('class_users')
            ->onDelete('cascade');

        $table->foreign('cours_id')
            ->references('id')
            ->on('cours')
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
        Schema::dropIfExists('formations');
    }
};
