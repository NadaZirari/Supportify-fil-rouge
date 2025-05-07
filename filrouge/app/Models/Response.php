<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{

    protected $fillable = [
        'content',
        'user_id',
        'ticket_id',
        'message_id'
    ];

    public function message()
{
    return $this->belongsTo(Message::class);
}

public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
