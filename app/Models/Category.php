<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'deleted',
        'parent_id',
    ];

    public $timestamps = false;

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function subcategories()
    {
        return $this->hasMany(Category::class, 'parent_id')->active();
    }

    public function scopeActive($query){
        return $query->where('deleted', 0);
    }
}
