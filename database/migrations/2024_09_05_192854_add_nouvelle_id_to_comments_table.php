<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Ajout de la colonne news_id, nullable pour les commentaires qui ne concernent pas les actualités
            $table->foreignId('nouvelle_id')->nullable()->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('comments', function (Blueprint $table) {
            // Supprimer la colonne news_id
            $table->dropForeign(['news_id']);
            $table->dropColumn('news_id');
        });
    }
};
