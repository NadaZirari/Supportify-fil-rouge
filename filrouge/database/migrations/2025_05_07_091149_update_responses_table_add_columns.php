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
        Schema::table('responses', function (Blueprint $table) {
            // Ajouter les colonnes manquantes
            if (!Schema::hasColumn('responses', 'ticket_id')) {
                $table->foreignId('ticket_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('responses', 'user_id')) {
                $table->foreignId('user_id')->constrained()->onDelete('cascade');
            }
            if (!Schema::hasColumn('responses', 'message_id')) {
                $table->foreignId('message_id')->nullable()->constrained()->onDelete('set null');
            }
            if (!Schema::hasColumn('responses', 'content')) {
                $table->text('content');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responses');
    }
};
