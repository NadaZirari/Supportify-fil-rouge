<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $fillable = ['nom'];

    public function tickets()
    {
        return $this->hasMany(Ticket::class);
    }
}
