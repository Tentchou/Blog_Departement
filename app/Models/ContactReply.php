<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactReply extends Model
{
    use HasFactory;

    protected $fillable = ['contact_message_id', 'reply_message', 'admin_name'];

    public function contact_messages()
    {
        return $this->belongsTo(ContactMessage::class);
    }
}
