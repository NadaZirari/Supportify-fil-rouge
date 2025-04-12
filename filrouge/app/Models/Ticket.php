<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'description',
        'priority',
        'user_id',
        'status', // Vous pourriez vouloir ajouter un statut par défaut
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

  

public function messages()
{
    return $this->hasMany(Message::class);
}
public function histories()
{
    return $this->hasMany(TicketHistory::class);
}
}
