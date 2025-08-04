<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogTag extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];

    // Tag belongs to many Blogs
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_blog_tag', 'tag_id', 'blog_id')->withTimestamps();
    }
}
