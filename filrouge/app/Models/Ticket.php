<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;
    protected $dates = ['archived_at'];
    protected $fillable = [
        'title',
        'description',
        'priority',
        'user_id',
        'status',
        'categorie_id',
        'assigned_to',
        'fichier'
    ];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

  
    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }
    
public function messages()
{
    return $this->hasMany(Message::class);
}
public function responses()
{
    return $this->hasMany(Response::class);
}

public function agent()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }
    
public function scopeArchived(Builder $query)
{
    return $query->whereNotNull('archived_at');
}

public function scopeNotArchived(Builder $query)
{
    return $query->whereNull('archived_at');
}

}
