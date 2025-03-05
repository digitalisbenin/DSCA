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
        Schema::table('users', function (Blueprint $table) {
            // Ajout de la colonne user_class_id
            $table->unsignedBigInteger('user_class_id')->nullable()->after('user_categorie_id');

            // Ajout de la clé étrangère
            $table->foreign('user_class_id')
                ->references('id')
                ->on('class_users')
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
        Schema::table('users', function (Blueprint $table) {
            // Suppression de la clé étrangère
            $table->dropForeign(['user_class_id']);

            // Suppression de la colonne
            $table->dropColumn('user_class_id');
        });
    }
};
