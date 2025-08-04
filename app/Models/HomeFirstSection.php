<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeFirstSection extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'description', 'image', 'logo', 'link', 'button_name'];
}
