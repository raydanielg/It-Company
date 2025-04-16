<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function rPostCategory()
    {
        return $this->belongsTo(PostCategory::class, 'post_category_id', 'id');
    }
}
