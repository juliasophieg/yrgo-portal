<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technologies extends Model
{
    use HasFactory;

    protected $fillable = [
        "name",
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    //TODO: add type of technology maybe? 
}
