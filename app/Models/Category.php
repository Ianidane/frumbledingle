<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;

    protected $guarded = ['id'];

    // public function category()
    // {
    //     //A category belongs to a parent category, though the parent may be null
    //     return $this->belongsTo(Category::class);
    // }

    public function parent()
    {
        //A category belongs to a parent category, though the parent may be null
        return $this->belongsTo(self::class);
    }

    public function item()
    {
        //A category belongs to a parent category, though the parent may be null
        return $this->hasMany(Item::class);
    }
}