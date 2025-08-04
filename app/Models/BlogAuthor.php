<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogAuthor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email'];

    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id');
    }
}
