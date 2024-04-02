<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Likes extends Model
{
    use HasFactory;

    public function likedUser()
    {
        return $this->belongsTo(User::class, 'liked_user_id');
    }

    protected $fillable = [
        'liker_id',
        'liked_user_id'
    ];

    public function note(): HasOne
    {
        return $this->hasOne(Notes::class);
    }
}
