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
    Schema::table('chapitres', function (Blueprint $table) {
        $table->string('numero_chapitre')->nullable()->after('document_url');
    });
}

public function down()
{
    Schema::table('chapitres', function (Blueprint $table) {
        $table->dropColumn('numero_chapitre');
    });
}
};
