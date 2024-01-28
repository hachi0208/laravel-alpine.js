<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Blog;

class Tag extends Model
{
    use HasFactory;


    //manytomanyの定義
    public function blogs()
    {
        return $this->belongsToMany(Blog::class, 'blog_tag');
    }
}
