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
        Schema::create('affecters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('module_id')->nullable();
            $table->unsignedBigInteger('niveau_difficulte_id')->nullable();
            $table->unsignedBigInteger('user_class_id')->nullable();
            $table->unsignedBigInteger('categorie_id')->nullable();
            $table->timestamps();

            $table->foreign('module_id')
            ->references('id')
            ->on('modules')
            ->onDelete('cascade');
            
            $table->foreign('niveau_difficulte_id')
            ->references('id')
            ->on('niveau_dificultes')
            ->onDelete('cascade');

            $table->foreign('user_class_id')
                ->references('id')
                ->on('class_users')
                ->onDelete('cascade');

                $table->foreign('categorie_id')
                ->references('id')
                ->on('categories')
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
        Schema::dropIfExists('affecters');
    }
};
