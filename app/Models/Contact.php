<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'flag',
        'country_name',
        'company_name',
        'office_name',
        'address',
        'website',
        'linkedIn',
        'facebook',
        'youtube',
    ];
}
