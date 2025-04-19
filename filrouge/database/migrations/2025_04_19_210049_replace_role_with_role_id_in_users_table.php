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
      // 1. Assurez-vous que la table roles existe et contient les rôles nécessaires
      if (!Schema::hasTable('roles')) {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->timestamps();
        });
         // Insérer les rôles de base
         DB::table('roles')->insert([
            ['nom' => 'User', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Agent', 'created_at' => now(), 'updated_at' => now()],
            ['nom' => 'Admin', 'created_at' => now(), 'updated_at' => now()]
        ]);
    }
    
    // 2. Ajouter la colonne role_id si elle n'existe pas déjà
    if (!Schema::hasColumn('users', 'role_id')) {
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('role_id')->nullable()->after('password');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('set null');
        });
    }
    
    // 3. Migrer les données: convertir les valeurs de 'role' en 'role_id'
    DB::statement('UPDATE users SET role_id = (SELECT id FROM roles WHERE nom = users.role OR nom = CONCAT(UPPER(SUBSTRING(users.role, 1, 1)), SUBSTRING(users.role, 2)) LIMIT 1)');
    
    // 4. Mettre à jour les utilisateurs ayant role_id = null en leur attribuant un role_id par défaut (par exemple, "User")
    $defaultRoleId = DB::table('roles')->where('nom', 'User')->value('id');
    DB::table('users')->whereNull('role_id')->update(['role_id' => $defaultRoleId]);

    // 4. Supprimer la colonne role une fois la migration des données terminée
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('role');
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // 1. Recréer la colonne role avec NULL autorisé temporairement
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->nullable()->after('password');
    });
    
    // 2. Restaurer les données: convertir les valeurs de 'role_id' en 'role'
    DB::statement('UPDATE users SET role = (SELECT nom FROM roles WHERE id = users.role_id)');
    
    // 3. Définir une valeur par défaut pour les entrées NULL
    DB::statement("UPDATE users SET role = 'User' WHERE role IS NULL");
    
    // 4. Modifier la colonne pour qu'elle soit NOT NULL avec une valeur par défaut
    Schema::table('users', function (Blueprint $table) {
        $table->string('role')->default('User')->nullable(false)->change();
    });
    
    // 5. Supprimer la colonne role_id
    Schema::table('users', function (Blueprint $table) {
        $table->dropForeign(['role_id']);
        $table->dropColumn('role_id');
    });
    }
};
