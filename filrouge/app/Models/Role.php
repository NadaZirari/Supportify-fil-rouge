<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Role extends Model
{
    use HasFactory;

    /**
     * Les attributs qui sont massivement assignables.
     *
     * @var list<string>
     */
    protected $fillable = ['nom'];

    /**
     * Relation inverse avec les utilisateurs
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
