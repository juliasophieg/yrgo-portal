<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Events extends Model
{
    use HasFactory;

    public function attendees(): HasMany
    {
        return $this->hasMany(User::class);
    }
    //TODO: Check if we can make this specific to the user type

    protected $fillable = [
        'name',
        'date',
        'description'
    ];
}
