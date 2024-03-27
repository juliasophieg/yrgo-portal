<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;


class UserJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
    ];

    public function jobAreas(): BelongsToMany
    {
        return $this->belongsToMany(JobArea::class);
    }
}
