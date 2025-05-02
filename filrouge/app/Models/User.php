<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Les attributs qui sont massivement assignables.
     *
     * @var list<string>
     */
    protected $fillable = ['name', 'email', 'photo', 'password', 'role_id', 'is_premium'];

    /**
     * Les attributs qui doivent être cachés lors de la sérialisation.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Les attributs qui doivent être castés.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    /**
     * Relation avec le modèle Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

   
    /**
     * Relation avec les tickets de l'utilisateur
     */
    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
    public function assignedTickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_to');
    }
    /**
     * Vérifie si l'utilisateur a un rôle spécifique
     */
    public function hasRole($role)
    {
        return $this->role->nom === $role;  // Vérifie le nom du rôle
    }
}
