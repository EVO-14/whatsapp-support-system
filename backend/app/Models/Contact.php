<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name', 'phone', 'profile_picture'];

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }
}
