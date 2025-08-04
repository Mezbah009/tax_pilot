<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Category belongs to many Blogs
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_category', 'category_id', 'blog_id')->withTimestamps();
    }
}
