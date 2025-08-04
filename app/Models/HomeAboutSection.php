<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeAboutSection extends Model
{
    use HasFactory;


    protected $table = 'home_about_sections';

    protected $fillable = [
        'heading',
        'subheading',
        'description',
        'brochure',
        'image',
    ];
}
