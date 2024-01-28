<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;

class Blog extends Model
{
    use HasFactory;

    //tagsが逆参照でblog_tagがDBのからむめい
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'blog_tag');
    }
    public function author()
    {
        return $this->belongsTo(User::class, 'author_id');
    }
}
