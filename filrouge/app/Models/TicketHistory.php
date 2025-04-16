<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class messageHistory extends Model
{
    public function message()
{
    return $this->belongsTo(Message::class);
}



}
