<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobArea extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];
    public function jobs()
    {
        return $this->belongsToMany(UserJob::class);
    }
}
