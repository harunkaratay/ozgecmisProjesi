<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['blog_id', 'author_name', 'comment'];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}
