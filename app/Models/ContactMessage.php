<?php

namespace App\Models;

use App\Mail\ContactMail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContactMessage extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'message', 'telephone'];

    public function contactreplys()
    {
        return $this->hasMany(ContactReply::class);
    }
}
