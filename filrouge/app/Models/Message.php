<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

   

public function ticket()
{
    return $this->belongsTo(Ticket::class);
}

public function messageHistory()
{
    return $this->belongsTo(MessageHistory::class);
}


public function response()
{
    return $this->hasmany(Response::class);
}
}
