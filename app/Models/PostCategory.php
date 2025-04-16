<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostCategory extends Model
{
    use HasFactory;
    
    public function rPost()
    {
        return $this->hasMany(Post::class, 'post_category_id', 'id');
    }
}
