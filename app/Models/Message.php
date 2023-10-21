<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Pest\Logging\TeamCity\Converter;

class Message extends Model
{
    protected $fillable=
    [
        'sender_id',
        'receiver_id',
        'conversation_id',
        'message',
        'read',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function conversation()
    {
        return $this->belongsTo(Conversation::class);
    }
}
