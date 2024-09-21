<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('nouvelles', function (Blueprint $table) {
            $table->integer('views')->default(0);  // Ajouter la colonne views avec une valeur par défaut de 0

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('nouvelles', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
};
