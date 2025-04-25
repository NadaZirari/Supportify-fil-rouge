<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Supprimer la colonne status existante
            $table->dropColumn('status');
        });

        Schema::table('tickets', function (Blueprint $table) {
            // Recréer la colonne status avec les nouvelles valeurs
            $table->enum('status', ['ouvert', 'en_cours', 'résolu', 'fermé'])->default('ouvert');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tickets', function (Blueprint $table) {
            // Supprimer la colonne status modifiée
            $table->dropColumn('status');
        });

        Schema::table('tickets', function (Blueprint $table) {
            // Recréer la colonne status avec les valeurs originales
            $table->enum('status', ['ouvert', 'en_cours', 'résolu'])->default('ouvert');
        });
    }
};
