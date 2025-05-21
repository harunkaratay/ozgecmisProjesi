<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'parent_id'];

    // Alt kategoriler
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Üst kategori
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Bu kategoriye ait bloglar
    public function blogs()
    {
        return $this->hasMany(Blog::class);
    }
    public function childrenRecursive()
    {
        return $this->children()->with('childrenRecursive');
    }
}
