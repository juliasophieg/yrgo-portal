<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyInfo extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->morphOne(User::class, 'userable');
    }

    protected $fillable = [
        'company_name',
        'company_contact_number',
        'company_contact_email',
        'employees',
        'company_industry',
        'company_website',
        'looking_for',
        'total_positions',
        'location',
    ];
}
