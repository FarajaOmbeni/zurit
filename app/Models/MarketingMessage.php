<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketingMessage extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function marketingMessages()
    {
        return $this->hasMany(MarketingMessage::class);
    }
}
