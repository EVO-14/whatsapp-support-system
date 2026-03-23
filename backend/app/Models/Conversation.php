<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    protected $fillable = ['contact_id', 'status'];

    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
