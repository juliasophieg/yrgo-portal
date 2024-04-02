<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Notes extends Model
{
    use HasFactory;

    public function like(): BelongsTo
    {
        return $this->belongsTo(Likes::class);
    }

    protected $fillable = [
        'text',
        'like_id'
    ];
}
